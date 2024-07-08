<?php

namespace App\DataTables;

use App\Models\Programas;
use App\Models\ProgramaUsuario;
use App\Models\ProgramaUsuarios;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProgramaUsuariosDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('programa', function ($query) {
                $prog = Programas::findOrFail($query->programa_id);
                return $prog->nombre_programa;
            })
            ->addColumn('nombre', function ($query) {
                $usu = User::findOrFail($query->usuario_id);
                return $usu->nombre;
            })
            
            ->addColumn('apellido', function ($query) {
                $usu = User::findOrFail($query->usuario_id);
                return $usu->apellido;
            })
            ->addColumn('action', function ($query) {
                $deleteBtn = "<a href='" . route('director.programa-usuario.destroy', $query->id) . "'style='padding:1rem 2rem' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";
                return $deleteBtn;
            })

            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ProgramaUsuarios $model): QueryBuilder
    {
        return $model->where('programa_id', request()->programa)->newQuery();

    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('programausuarios-table')
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
            Column::make('nombre'),
            Column::make('apellido'),
            Column::make('programa'),

            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->height(500)
                ->addClass('text-center'),

        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ProgramaUsuarios_' . date('YmdHis');
    }
}
