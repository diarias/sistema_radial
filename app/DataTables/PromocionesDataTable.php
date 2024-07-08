<?php

namespace App\DataTables;

use App\Models\Promocione;
use App\Models\Promociones;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PromocionesDataTable extends DataTable
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
                $editBtn = "<a href='" . route('director.promociones.edit', $query->id) . "' class='btn btn-warning'><i class='far fa-edit'></i></a>";
                $deleteBtn = "<a href='" . route('director.promociones.destroy', $query->id) . "' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";
                $moreBtn = '<div class="dropdown dropleft d-inline">       
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cog"></i></button>
                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 28px, 0px); top:0px; left:0px; will-change:transform;">
                <a class="dropdown-item has-icon" style="margin-rigth:3%" href="' . route('director.promociones.show', $query->id) . '"><i class="fas fa-address-card"> </i> Información</a>
                <a class="dropdown-item has-icon" style="margin-rigth:3%" href="' . route('director.programa-promocion.index', ['promocion' => $query->id]) . '"><i class="fas fa-microphone"> </i>Asig. Programas</a>
                </div>

            </div>';
                return $editBtn . $deleteBtn . $moreBtn;
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Promociones $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('promociones-table')
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

            Column::make('titulo'),
            Column::make('fecha_inicio'),
            Column::make('fecha_fin'),
            Column::computed('action')
                ->exportable(true)
                ->printable(true)
                ->width(150)
                ->addClass('text-center'),

        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Promociones_' . date('YmdHis');
    }
}
