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
        $input = $request->all();

        $ouvrage = $this->ouvrageRepository->create($input);

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

        if (empty($ouvrage)) {
            Flash::error('Ouvrage not found');

            return redirect(route('ouvrages.index'));
        }

        $ouvrage = $this->ouvrageRepository->update($request->all(), $id);

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
