<?php

namespace App\DataTables;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CategoryDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Category> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
            return (new EloquentDataTable($query))
                ->addIndexColumn()
                ->addColumn('action', function ($query) {
                    $editBtn = "<a href='" . route('admin.category.edit', $query->id) . "' class='btn btn-primary'><i class='far fa-edit'></i></a>";
                    $deleteBtn = '<button type="submit" href="javascript:void(0);" class="btn btn-danger ml-2 delete-category" data-id="' . $query->id . '" style="background-color: #fc544b !important;">
                        <i class="far fa-trash-alt"></i>
                    </button>';
                    return $editBtn . $deleteBtn;
                })
                ->addColumn('image', function ($query) {
                    if (!empty($query->image)) {
                        return '<img src="' . asset($query->image) . '" alt="Category Image" style="width:40px; height:40px;" />';
                    }
                    return '<span class="text-muted">Image not provided</span>';
                })
                ->addColumn('status', function ($query) {
                    if ($query->status == 1) {
                        $button = '<label class="custom-switch mt-2">
                        <input type="checkbox" checked name="custom-switch-checkbox" data-id="' . $query->id . '" class="custom-switch-input change-status" >
                        <span class="custom-switch-indicator"></span>
                    </label>';
                    } else {
                        $button = '<label class="custom-switch mt-2">
                        <input type="checkbox" name="custom-switch-checkbox" data-id="' . $query->id . '" class="custom-switch-input change-status">
                        <span class="custom-switch-indicator"></span>
                    </label>';
                    }
                    return $button;
                })
                ->rawColumns(['image', 'action', 'status'])
                ->setRowId('id');

    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Category>
     */
    public function query(Category $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('category-table')
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
            Column::make('DT_RowIndex')
                ->title('#') // ✅ This will display row numbers
                ->searchable(false)
                ->orderable(false)
                ->width(80),
            Column::make('name'),
            Column::make('slug'),
            Column::make('image')->width(300),
            Column::make('status')->width(200),
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
        return 'Category_' . date('YmdHis');
    }
}
