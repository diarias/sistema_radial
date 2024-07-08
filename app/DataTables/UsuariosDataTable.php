<?php

namespace App\DataTables;

use App\Models\User;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsuariosDataTable extends DataTable
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
            $editBtn = "<a href='" . route('director.usuario.edit', $query->id) . "' class='btn btn-warning'><i class='far fa-edit'></i></a>";
            $moreBtn = "<a href='" . route('director.usuario.show', $query->id) . "' class='btn btn-info ml-2'><i class='bi bi-eye-fill'></i></a>";
         
            $deleteBtn = "<a href='" . route('director.usuario.destroy', $query->id) . "' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";
         
            return $editBtn . $moreBtn . $deleteBtn;
        })
        ->addColumn('imagen', function($query){
            return $img = "<img width='100px' height='70px' src='".asset($query->foto)."'></img>";
        })
        ->addColumn('nombre_completo', function($query){
            return $nombre = "<p>$query->nombre $query->apellido </p>";
        })
     /*   ->addColumn('tipo', function($query){
            switch ($query->role) {
                case 'director':
                    return '<i class="badge badge-success">Director</i>';
                    break;
                    case 'coordinador':
                        return '<i class="badge badge-warning">Coordinador</i>';
                        break;
                        case 'productor':
                            return '<i class="badge badge-black">Productor</i>';
                            break;
                            case 'locutor':
                                return '<i class="badge badge-info">Locutor</i>';
                                break;
                                
                default:
                return '<i class="badge badge-dark">None</i>';
                    break;
            }
        })*/
        ->rawColumns(['imagen', 'action','status', 'nombre_completo'])
        ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery();
        
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('usuarios-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1, 'desc')
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
            //Column::make('id'),
            Column::make('imagen'),
            Column::make('nombre_completo'),
            Column::make('role'),
            Column::make('telefono'),
            Column::make('email'),
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
        return 'Usuarios_' . date('YmdHis');
    }
}
