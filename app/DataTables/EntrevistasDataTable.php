<?php

namespace App\DataTables;

use App\Models\Entrevista;
use App\Models\Entrevistas;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use SebastianBergmann\Type\TrueType;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class EntrevistasDataTable extends DataTable
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
            $editBtn = "<a href='" . route('director.entrevistas.edit', $query->id) . "' class='btn btn-warning'><i class='far fa-edit'></i></a>";
            $moreBtn = "<a href='" . route('director.entrevistas.show', $query->id) . "' class='btn btn-info ml-2'><i class='bi bi-eye-fill'></i></a>";
            $deleteBtn = "<a href='" . route('director.entrevistas.destroy', $query->id) . "' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";

            return $editBtn . $moreBtn . $deleteBtn;
        })
        ->addColumn('imagen', function ($query) {
            return $img = "<img width='100px' height='70px' src='".asset($query->imagen)."'></img>";
        })
        ->addColumn('estado', function ($query) {
            if ($query->estado == '1') {
                return '<span class="badge badge-success">Pendiente</span>';
            } else {
                return '<span class="badge badge-danger">Realizado</span>';
            }
        })
       
        ->rawColumns(['action','imagen','estado'])
        ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Entrevistas $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('entrevistas-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                   // ->dom('Bfrtip')
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
           // Column::make('id'),
            Column::computed('imagen')
            ->exportable(false)
            ->printable(false)
            ->responsivePriority(false)
            ->width(150)
            ->addClass('responsive'),
            Column::make('fecha'),
            Column::make('hora'),
            Column::make('nombre_entrevistado'),
            Column::make('estado')->title('Estado'),
            Column::computed('action')
                ->exportable(true)
                ->printable(true)
                ->responsivePriority(true)
               
                
                ->width(150)
                ->addClass('responsive'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Entrevistas_' . date('YmdHis');
    }
}
