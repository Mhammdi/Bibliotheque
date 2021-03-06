<?php

namespace App\DataTables;

use App\Models\Ouvrage;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Illuminate\Support\Facades\Auth;

class OuvrageDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'ouvrages.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Ouvrage $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Ouvrage $model)
    {
        $niveau = Auth::user()->niveau;
        if ($niveau == 1) {
            $ouvrages = Ouvrage::where('site', 'FSTG');
            return $this->applyScopes($ouvrages);
        } else if ($niveau == 2) {
            $ouvrages = Ouvrage::where('site', 'FSSM');
            return $this->applyScopes($ouvrages);
        } else {
            return $model->newQuery();
        }
        return $model->newQuery();
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
       
        return [
            'titre',
            'editeur',
            'annee',
            'domaine',
            'stock',
            'site',
            'description',
            
            
            
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ouvragesdatatable_' . time();
    }
}
