<?php

namespace App\Http\Controllers;

use App\DataTables\AuteurDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAuteurRequest;
use App\Http\Requests\UpdateAuteurRequest;
use App\Repositories\AuteurRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AuteurController extends AppBaseController
{
    /** @var  AuteurRepository */
    private $auteurRepository;

    public function __construct(AuteurRepository $auteurRepo)
    {
        $this->auteurRepository = $auteurRepo;
    }

    /**
     * Display a listing of the Auteur.
     *
     * @param AuteurDataTable $auteurDataTable
     * @return Response
     */
    public function index(AuteurDataTable $auteurDataTable)
    {
        return $auteurDataTable->render('auteurs.index');
    }

    /**
     * Show the form for creating a new Auteur.
     *
     * @return Response
     */
    public function create()
    {
        return view('auteurs.create');
    }

    /**
     * Store a newly created Auteur in storage.
     *
     * @param CreateAuteurRequest $request
     *
     * @return Response
     */
    public function store(CreateAuteurRequest $request)
    {
        $input = $request->all();

        $auteur = $this->auteurRepository->create($input);

        Flash::success('Auteur saved successfully.');

        return redirect(route('auteurs.index'));
    }

    /**
     * Display the specified Auteur.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $auteur = $this->auteurRepository->find($id);

        if (empty($auteur)) {
            Flash::error('Auteur not found');

            return redirect(route('auteurs.index'));
        }

        return view('auteurs.show')->with('auteur', $auteur);
    }
    
    /**
     * Show the form for editing the specified Auteur.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $auteur = $this->auteurRepository->find($id);

        if (empty($auteur)) {
            Flash::error('Auteur not found');

            return redirect(route('auteurs.index'));
        }

        return view('auteurs.edit')->with('auteur', $auteur);
    }

    /**
     * Update the specified Auteur in storage.
     *
     * @param  int              $id
     * @param UpdateAuteurRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAuteurRequest $request)
    {
        $auteur = $this->auteurRepository->find($id);

        if (empty($auteur)) {
            Flash::error('Auteur not found');

            return redirect(route('auteurs.index'));
        }

        $auteur = $this->auteurRepository->update($request->all(), $id);

        Flash::success('Auteur updated successfully.');

        return redirect(route('auteurs.index'));
    }

    /**
     * Remove the specified Auteur from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $auteur = $this->auteurRepository->find($id);

        if (empty($auteur)) {
            Flash::error('Auteur not found');

            return redirect(route('auteurs.index'));
        }

        $this->auteurRepository->delete($id);

        Flash::success('Auteur deleted successfully.');

        return redirect(route('auteurs.index'));
    }
}
