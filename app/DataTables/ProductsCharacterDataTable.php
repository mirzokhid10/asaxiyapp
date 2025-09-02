<?php

namespace App\DataTables;

use App\Models\ProductsCharacters;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductsCharacterDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<ProductsCharacters> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                // Common buttons (edit + delete)
                $editBtn = "<a href='" . route('admin.products-characters.edit', $query->id) . "' class='btn btn-primary'>
                            <i class='far fa-edit'></i>
                        </a>";

                $deleteBtn = "
                <form method='POST' action='" . route('admin.products-characters.destroy', $query->id) . "' style='display:inline-block;' onsubmit='return confirm(\"Are you sure?\")'>
                    " . csrf_field() . method_field('DELETE') . "
                    <button type='submit' class='btn btn-danger mx-2' style='background:#fc544b;'>
                        <i class='far fa-trash-alt'></i>
                    </button>
                </form>";

                // Extra "More" button only if unit is select/multiselect
                $moreBtn = "";
                if (in_array($query->type, ['select', 'multiselect'])) {
                    $moreBtn = "
                    <div class='dropdown dropleft d-inline'>
                        <button class='btn btn-primary dropdown-toggle ml-1' style='background-color: #6777ef;' type='button' id='dropdownMenuButton2' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <i class='fas fa-cog'></i>
                        </button>
                        <div class='dropdown-menu'>
                            <a class='dropdown-item has-icon' href='" . route('admin.products-characters.options.index', $query->id) . "'>
                                <i class='far fa-file'></i> Attributes Options
                            </a>
                        </div>
                    </div>";
                }

                return "<div class='d-flex justify-content-center align-items-center gap-3'>" . $editBtn . $deleteBtn . $moreBtn . "</div>";
            })
            ->editColumn('unit', function ($query) {
                return $query->unit ? $query->unit : 'Unit is not provided';
            })
            ->editColumn('is_filterable', function ($query) {
                return $query->is_filterable
                    ? '<span class="badge badge-success">Yes</span>'
                    : '<span class="badge badge-secondary">No</span>';
            })
            ->rawColumns(['action', 'is_filterable'])
            ->setRowId('id');

    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<ProductsCharacters>
     */
    public function query(ProductsCharacters $model): QueryBuilder
    {
        $query = $model->newQuery()->orderBy('id', 'asc');

        // By default, only show select & multiselect
        if (request()->get('filter') !== 'all') {
            $query->whereIn('type', ['select', 'multiselect']);
        }

        return $query;


    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('ProductsCharacter-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
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
            Column::make('name')->title('Name'),
            Column::make('slug')->title('Slug'),
            Column::make('type')->title('Type'),
            Column::make('unit')->title('Unit'),
            Column::make('is_filterable')->title('Filterable'),
            Column::make('sort_order')->title('Sort Order'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(300)
                ->addClass('text-center'),
        ];

    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ProductsCharacter_' . date('YmdHis');
    }
}
