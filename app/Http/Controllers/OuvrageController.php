<?php

namespace App\Http\Controllers;

use App\DataTables\OuvrageDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateOuvrageRequest;
use App\Http\Requests\UpdateOuvrageRequest;
use App\Repositories\OuvrageRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Write;
use App\Rate;
use App\Models\Auteur;
use App\Models\Ouvrage;

class OuvrageController extends AppBaseController
{
    /** @var  OuvrageRepository */
    private $ouvrageRepository;

    public function __construct(OuvrageRepository $ouvrageRepo)
    {
        $this->ouvrageRepository = $ouvrageRepo;
    }

    /**
     * Display a listing of the Ouvrage.
     *
     * @param OuvrageDataTable $ouvrageDataTable
     * @return Response
     */
    public function index(OuvrageDataTable $ouvrageDataTable)
    {
        return $ouvrageDataTable->render('ouvrages.index');
    }

    public function getOuvrages(){
        $ouvrages=Ouvrage::all();
        return response()->json(['ouvrages' => $ouvrages]);
    }
    public function getRatedOuvrages()
    {
        $rates=DB::table('rates')->orderBy('rate')->take(6)->get();
        $ouvrages=[];
        $i=0;
        foreach($rates as $rate){
            $ouvrages[$i]=Ouvrage::find($rate->ouvrage_id);
            $i++;       
        }
        return response()->json(['ouvrages' => $ouvrages]);
    }

    /**
     * Show the form for creating a new Ouvrage.
     *
     * @return Response
     */
    public function create()
    {
        return view('ouvrages.create');
    }

    /**
     * Store a newly created Ouvrage in storage.
     *
     * @param CreateOuvrageRequest $request
     *
     * @return Response
     */
    public function store(CreateOuvrageRequest $request)
    {
        $input=$request->all();
        $current = Carbon::now();
        $path='img/users/anonym.jpg';
       
        if($request->hasFile('photo')){
            $path=$request->photo->store('images'); 
        }

        $ouvrage=DB::table('ouvrages')->insert([
            'titre' => $input['titre'],
            'editeur' => $input['editeur'],
            'annee' => $input['annee'],
            'domaine' => $input['domaine'],
            'stock' => $input['stock'],
            'site' => $input['site'],
            'photo' => $path,
            'description' => $input['description'],
            'created_at' => $current,
            'updated_at' => $current,
            'deleted_at' => null
        ]);

        $rate=new Rate();
        $write = new Write();
        $ouvrageId = DB::table('ouvrages')->select('id')->max('id');
        $rate->user_id = 0;
        $rate->ouvrage_id =$ouvrageId;
        $rate->save();
        $count = DB::table('auteurs')->where('name', $input['auteur'])->count();
        if($count > 0){
            
            $auteur = DB::table('auteurs')->where('name', $input['auteur'])->first();            
            $write->auteur_id = $auteur->id;          
        }else{
            
            $auteur=new Auteur();
            $auteur->name=$input['auteur'];
            $auteur->save();
            $auteurId = DB::table('auteurs')->select('id')->max('id');
            $write->auteur_id=$auteurId;
        }
        $write->ouvrage_id = $ouvrageId;
        $write->save(); 
        
          
        
        
        Flash::success('Ouvrage saved successfully.');

        return redirect(route('ouvrages.index'));
    }

    /**
     * Display the specified Ouvrage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ouvrage = $this->ouvrageRepository->find($id);

        if (empty($ouvrage)) {
            Flash::error('Ouvrage not found');

            return redirect(route('ouvrages.index'));
        }

        return view('ouvrages.show')->with('ouvrage', $ouvrage);
    }

    /**
     * Show the form for editing the specified Ouvrage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ouvrage = $this->ouvrageRepository->find($id);

        if (empty($ouvrage)) {
            Flash::error('Ouvrage not found');

            return redirect(route('ouvrages.index'));
        }

        return view('ouvrages.edit')->with('ouvrage', $ouvrage);
    }

    /**
     * Update the specified Ouvrage in storage.
     *
     * @param  int              $id
     * @param UpdateOuvrageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOuvrageRequest $request)
    {
        $ouvrage = $this->ouvrageRepository->find($id);
        $input=$request->all();
        
        $current = Carbon::now();

       
        if($request->hasFile('photo')){
            $path = $request->photo->store('images'); 
            echo "test";
            DB::table('ouvrages')->where('id', $id)->update([
            'photo' => $path,
        ]);
            
        }
        
        if (empty($ouvrage)) {
            Flash::error('Ouvrage not found');

            return redirect(route('ouvrages.index'));
        }

        $count = DB::table('rates')->where('ouvrage_id', $id)->count();
        if($count>0){
            $rate = DB::table('rates')->where('ouvrage_id', $id)->first();
            
            $rates=Rate::find($rate->id);
            $rates->number=$input['rate'];
            dump($rates);
            $rates->save();

        }else{
            $rate=new Rate();
            $rate->Ouvrage_id=$id;
            $rate->User_id=0;
            $rate->rate=$input['rate'];
            $rate->save();
            
        }
        

        DB::table('ouvrages')->where('id', $id)->update([
            'titre' => $input['titre'],
            'editeur' => $input['editeur'],
            'annee' => $input['annee'],
            'domaine' => $input['domaine'],
            'stock' => $input['stock'],
            'site' => $input['site'],
            'description' => $input['description'],
            'updated_at' => $current,

        ]);
        
        Flash::success('Ouvrage updated successfully.');

        return redirect(route('ouvrages.index'));
    }

    /**
     * Remove the specified Ouvrage from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ouvrage = $this->ouvrageRepository->find($id);

        if (empty($ouvrage)) {
            Flash::error('Ouvrage not found');

            return redirect(route('ouvrages.index'));
        }

        $this->ouvrageRepository->delete($id);

        Flash::success('Ouvrage deleted successfully.');

        return redirect(route('ouvrages.index'));
    }
}
