<?php

namespace App\DataTables;

use App\Models\ProductsCharacters;
use App\Models\ProductsCharactersValues;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductCharacterValuesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<ProductCharacterValue> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                $editBtn = "<a href='" . route('admin.products.values.edit', [
                                'productId' => $query->product_id,
                                'value'     => $query->id
                            ]) . "' class='btn btn-primary'>
                   <i class='far fa-edit'></i>
                </a>";

                        $deleteBtn = "
                <form method='POST' action='" . route('admin.products.values.destroy', [
                                'productId' => $query->product_id,
                                'value'     => $query->id
                            ]) . "' style='display:inline-block;' onsubmit='return confirm(\"Are you sure?\")'>
                    " . csrf_field() . method_field('DELETE') . "
                    <button type='submit' class='btn btn-danger mx-2 delete-product-values' style='background:#fc544b;'>
                        <i class='far fa-trash-alt'></i>
                    </button>
                </form>";

                return "<div class='d-flex justify-content-center align-items-center gap-3'>{$editBtn} {$deleteBtn}</div>";
            })
            ->editColumn('characteristic.name', fn ($query) => $query->characteristic->name ?? '<span class="text-muted">—</span>')
            ->editColumn('option.label', fn ($query) => $query->option->label ?? '<span class="text-muted">—</span>')
            ->editColumn('value_string', fn ($query) => $query->value_string ?: '<span class="text-muted">—</span>')
            ->editColumn('value_integer', fn ($query) => $query->value_integer ?: '<span class="text-muted">—</span>')
            ->editColumn('value_decimal', fn ($query) => $query->value_decimal ?: '<span class="text-muted">—</span>')
            ->editColumn('value_boolean', fn ($query) => $query->value_boolean ? 'Yes' : 'No')
            ->editColumn('value_date', fn ($query) => $query->value_date ?: '<span class="text-muted">—</span>')
            ->editColumn('value', function ($query) {
                if ($query->value_string !== null) return $query->value_string;
                if ($query->value_integer !== null) return $query->value_integer;
                if ($query->value_decimal !== null) return $query->value_decimal;
                if ($query->value_boolean !== null) return $query->value_boolean ? 'Yes' : 'No';
                if ($query->value_date !== null) return \Carbon\Carbon::parse($query->value_date)->format('Y-m-d');
                if ($query->option_id !== null && $query->option) return $query->option->label;

                return '<span class="text-muted">—</span>';
            })

            ->rawColumns(['action', 'characteristic.name', 'option.label', 'value_string', 'value_integer', 'value_decimal', 'value_date', 'value'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<ProductCharacterValue>
     */
    public function query(ProductsCharactersValues $model): QueryBuilder
    {
        $productId = request()->route('productId');

        return $model->newQuery()
            ->select(
                'products_characters_values.*',
                'products_characters.name as characteristic_name'
            )
            ->leftJoin('products_characters', 'products_characters_values.product_character_id', '=', 'products_characters.id')
            ->where('product_id', $productId)
            ->orderBy('products_characters_values.id', 'asc')
            ->orderBy('products_characters.name', 'desc');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('productcharactervalues-table')
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
            Column::make('id')->title('ID')->data('id')->addClass('text-left'),
            Column::make('characteristic_name')->title('Characteristic')->addClass('text-left'),
            Column::make('value_string')->title('String')->addClass('text-left'),
            Column::make('value_integer')->title('Integer')->addClass('text-left'),
            Column::make('value_decimal')->title('Decimal')->addClass('text-left'),
            Column::make('value_boolean')->title('Boolean')->addClass('text-left'),
            Column::make('value_date')->title('Date')->addClass('text-left'),
            Column::make('value')->title('Resolved Value')->addClass('text-left'),

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
        return 'ProductCharacterValues_' . date('YmdHis');
    }
}
