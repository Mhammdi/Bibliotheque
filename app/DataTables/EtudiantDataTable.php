<?php

namespace App\DataTables;

use App\Models\Etudiant;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Illuminate\Support\Facades\Auth;

class EtudiantDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'etudiants.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Etudiant $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Etudiant $model)
    {
        $niveau=Auth::user()->niveau;
        if($niveau == 1){    
            $etudiants = Etudiant::where('universite', 'FSTG');
            return $this->applyScopes($etudiants);
        }else if($niveau == 2){
            $etudiants = Etudiant::where('universite', 'FSSM');
            return $this->applyScopes($etudiants);
        }else{
            return $model->newQuery();
        }
       

        
        //
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        $user= Auth::user();

        
        return [
            'cne',
            'name',
            'adresse',
            'universite',
            'cursus',
            'nombre_emprunts',
            
        ];
       
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'etudiantsdatatable_' . time();
    }
}
