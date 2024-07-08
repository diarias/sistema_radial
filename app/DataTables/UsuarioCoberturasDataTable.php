<?php

namespace App\DataTables;

use App\Models\User;
use App\Models\UsuarioCobertura;
use App\Models\UsuarioCoberturas;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use PHPUnit\Metadata\Uses;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsuarioCoberturasDataTable extends DataTable
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
                $deletBtn = "<a href='" . route('director.usuario-cobertura.destroy', $query->id) . "' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";
                return $deletBtn;
            })
         

            ->addColumn('personal', function ($query) {
                $prog = User::findOrFail($query->usuario_id);
                $nombre = $prog->nombre;
                $apellido = $prog->apellido;
                $nombre_completo = $nombre.' '.$apellido;
                return $nombre_completo;
            })
            ->addColumn('fecha_creacion', function($query){
                $fecha = UsuarioCoberturas::findOrFail($query->id);
                return $fecha->created_at;
             })

            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(UsuarioCoberturas $model): QueryBuilder
    {
        return $model->where('cobertura_id', request()->cobertura)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('usuariocoberturas-table')
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
          
            
            Column::make('personal'),
            Column::make('fecha_creacion'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),


        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'UsuarioCoberturas_' . date('YmdHis');
    }
}
