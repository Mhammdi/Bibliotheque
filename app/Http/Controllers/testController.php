<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class testController extends Controller
{
    //

    public function store(Request $request)
    {

        echo "test";
        $input = $request->all();

        //$current = Carbon::now();
        dump($input);
        if ($request->hasFile('image')) {
            echo "test";
        }
        /*DB::table('ouvrages')->insert([
            'titre' => $input['titre'],
            'editeur' => $input['editeur'],
            'annee' => $input['annee'],
            'domaine' => $input['domaine'],
            'stock' => $input['stock'],
            'site' => $input['site'],
            'photo' => $input['image'],
            'created_at' => $current,
            'updated_at' => $current,
            'deleted_at' => null

        ]);

        Flash::success('Ouvrage saved successfully.');

        return redirect(route('ouvrages.index'));*/
    }
}
