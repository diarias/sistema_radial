<?php

namespace App\DataTables;

use App\Models\Programa;
use App\Models\Programas;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProgramasDataTable extends DataTable
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
                $editBtn = "<a href='" . route('director.programa.edit', $query->id) . "' class='btn btn-warning'><i class='far fa-edit'></i></a>";
                $deleteBtn = "<a href='" . route('director.programa.destroy', $query->id) . "' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";
                $moreBtn = '<div class="dropdown dropleft d-inline">
          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"><i class="fas fa-cog"></i></button>
                <div class="dropdown-menu"  style="position: absolute; transform: translate3d(0px, 28px, 0px); top:0px; left:0px; will-change:transform;">
                <a class="dropdown-item has-icon" style="margin-rigth:3%; font-size:15px " href="' . route('director.programa.show', ['programa' => $query->id]) . '"><i class="fas fa-address-card"></i> Información</a>
                <a class="dropdown-item has-icon" style="margin-rigth:3%; font-size:15px " href="' . route('director.programa-usuario.index', ['programa' => $query->id]) . '"><i class="fas fa-microphone"></i>Asign. Locutores</a>
                </div>
                </div>';
                return $editBtn . $deleteBtn . $moreBtn;
            })
            ->addColumn('inicio_programa', function ($query) {
                return '<i class="badge badge-success">' . $query->inicio_programa . '</i>';
            })
            ->addColumn('fin_programa', function ($query) {
                return '<i class="badge badge-warning">' . $query->fin_programa . '</i>';
            })
            ->addColumn('estado', function ($query) {
                $estado = $query->estado == 1 ? '<span class="badge badge-success">Activo</span>' : '<span class="badge badge-danger">Inactivo</span>';
                return $estado;
            })
            ->rawColumns(['inicio_programa', 'action', 'fin_programa', 'estado'])
            //->make(true)
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Programas $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('programas-table')
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
            Column::make('id')->addClass('text-center'),
            Column::make('nombre_programa'),
            Column::make('inicio_programa'),
            Column::make('fin_programa'),
            Column::make('estado')->addClass('text-center'),
            Column::computed('action')->addClass('text-center')
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
        return 'Programas_' . date('YmdHis');
    }
}
