<?php

namespace App\DataTables;

use App\Models\ProductCharacteristicsOptions;
use App\Models\ProductCharacterOption;
use App\Models\ProductsCharacters;
use App\Models\ProductsCharactersOptions;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductCharacterOptionsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<ProductCharacterOption> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                $editBtn = "<a href='" . route('admin.products-characters.options.edit', [
                        'characteristicId' => $query->product_character_id,
                        'optionId' => $query->id
                    ]) . "' class='btn btn-primary'>
                        <i class='far fa-edit'></i>
                    </a>";
                    $deleteBtn = "
                    <form method='POST' action='" . route('admin.products-characters.options.destroy', [
                                            'characteristicId' => $query->product_character_id,
                                            'optionId' => $query->id
                                        ]) . "' style='display:inline-block;' onsubmit='return confirm(\"Are you sure?\")'>
                        " . csrf_field() . method_field('DELETE') . "
                        <button type='submit' class='btn btn-danger mx-2' style='background:#fc544b;'>
                            <i class='far fa-trash-alt'></i>
                        </button>
                    </form>";

                return "<div class='d-flex justify-content-center align-items-center gap-3'>{$editBtn} {$deleteBtn}</div>";
            })
            ->editColumn('value', function ($query) {
                return $query->value ?: '<span class="text-muted">—</span>';
            })
            ->editColumn('sort_order', function ($query) {
                return $query->sort_order ?? 0;
            })
            ->rawColumns(['action', 'value'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<ProductCharacterOption>
     */
    public function query(ProductsCharactersOptions $model): QueryBuilder
    {
        $characteristicId = request()->route('characteristicId'); // get it from route

        return $model->newQuery()
            ->where('product_character_id', $characteristicId) // filter only related options
            ->orderBy('sort_order', 'asc');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('productcharacteroptions-table')
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
            Column::make('id')->addClass('text-left'),
            Column::make('product_character_id')->title('Character')->addClass('text-left'),
            Column::make('label')->title('Option Label')->addClass('text-left'),
            Column::make('value')->title('Option Value')->addClass('text-left'),
            Column::make('sort_order')->title('Sort Order')->addClass('text-left'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(200)
                ->addClass('text-left'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ProductCharacterOptions_' . date('YmdHis');
    }
}
