<?php

namespace App\DataTables;

use App\Models\Cobertura;
use App\Models\Coberturas;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CoberturasDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                $editBtn = "<a href='" . route('director.coberturas.edit', $query->id) . "' class='btn btn-warning'><i class='far fa-edit'></i></a>";
                $deleteBtn = "<a href='" . route('director.coberturas.destroy', $query->id) . "' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";
                $moreBtn = '<div class="dropdown dropleft d-inline">
      
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"><i class="fas fa-cog"></i></button>
            <div class="dropdown-menu"  style="position: absolute; transform: translate3d(0px, 28px, 0px); top:0px; left:0px; will-change:transform;">
            <a class="dropdown-item has-icon" style="margin-rigth:3%; font-size:15px " href="' . route('director.coberturas.show', ['cobertura' => $query->id]) . '"><i class="fas fa-address-card"></i> Información</a>
            <a class="dropdown-item has-icon" style="margin-rigth:3%; font-size:15px " href="'. route('director.usuario-cobertura.index', ['cobertura'=> $query->id]).'"><i class="fas fa-microphone"></i> Usuarios</a>
            </div>
        </div>';


        


                return $editBtn . $deleteBtn . $moreBtn;
            })
            ->addColumn('fecha', function ($query) {
                return '<i class="badge badge-success">' . $query->fecha . '</i>';
            })
            ->addColumn('hora', function ($query) {
                return '<i class="badge badge-warning">' . $query->hora . '</i>';
            })
            ->rawColumns(['fecha', 'action', 'hora'])
            ->setRowId('id',);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Coberturas $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('coberturas-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('titulo'),
            Column::make('fecha'),
            Column::make('hora'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(150)
                ->addClass('text-center'),


        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Coberturas_' . date('YmdHis');
    }
}
