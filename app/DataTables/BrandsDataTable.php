<?php

namespace App\DataTables;

use App\Models\Brand;
use App\Models\Brands;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BrandsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Brand> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($brand) {
                $editBtn = "<a href='" . route('admin.brands.edit', $brand->id) . "' class='btn btn-primary'><i class='far fa-edit'></i></a>";
                $deleteBtn = "
                    <form method='POST' action='" . route('admin.brands.destroy', $brand->id) . "' style='display:inline-block;' onsubmit='return confirm(\"Are you sure?\")'>
                        " . csrf_field() . method_field('DELETE') . "
                        <button type='submit' class='btn btn-danger ml-2' style='background:#fc544b;'><i class='far fa-trash-alt'></i></button>
                    </form>";
                return $editBtn . $deleteBtn;
            })
            ->addColumn('image', function ($brand) {
                return "<img width='100px' src='" . asset($brand->image) . "' alt='" . e($brand->alt_text) . "'>";
            })
            ->addColumn('status', function ($brand) {
                $checked = $brand->status ? 'checked' : '';
                return '
                    <label class="custom-switch mt-2">
                        <input type="checkbox" name="custom-switch-checkbox" data-id="' . $brand->id . '" class="custom-switch-input change-status" ' . $checked . '>
                        <span class="custom-switch-indicator"></span>
                    </label>';
            })
            ->rawColumns(['image', 'status', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Brand>
     */
    public function query(Brands $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('brands-table')
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
            Column::make('image')->title('Logo')->width(200),
            Column::make('name')->width(200),
            Column::make('slug'),
            Column::make('link')->title('Brand Link'),
            Column::make('alt_text')->title('Alt Text'),
            Column::make('status')->title('Status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(200)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Brands_' . date('YmdHis');
    }
}