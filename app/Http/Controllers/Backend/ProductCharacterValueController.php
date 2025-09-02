<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProductCharacterValuesDataTable;
use App\Models\Products;
use App\Models\ProductsCharactersValues;
use Illuminate\Http\Request;
use App\Models\ProductsCharacters;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class ProductCharacterValueController extends Controller
{
    public function index(ProductCharacterValuesDataTable $dataTable, $productId)
    {
        $product = Products::with('characteristicValues.characteristic', 'characteristicValues.option')
            ->findOrFail($productId);

        return $dataTable->render('admin.products.values.index', compact('product'));
    }

    public function create($productId)
    {
        $product = Products::findOrFail($productId);

        // Load options too
        $characteristics = ProductsCharacters::with('options')
            ->orderBy('sort_order')
            ->get();

        return view('admin.products.values.create', compact('product', 'characteristics'));
    }

    public function store(Request $request, $productId)
    {
        $rules = [
            'product_character_id' => ['required', 'exists:products_characters,id'],
            'option_id'            => ['nullable', 'exists:products_characters_options,id'],
            'value_string'         => ['nullable', 'string', 'max:255'],
            'value_integer'        => ['nullable', 'integer'],
            'value_decimal'        => ['nullable', 'numeric'],
            'value_boolean'        => ['nullable', 'boolean'],
            'value_date'           => ['nullable', 'date'],
        ];

        $validated = $request->validate($rules);

        $value = ProductsCharactersValues::create([
            'product_id'           => $productId,
            'product_character_id' => $validated['product_character_id'],
            'value_string'         => $validated['value_string'] ?? null,
            'value_integer'        => $validated['value_integer'] ?? null,
            'value_decimal'        => $validated['value_decimal'] ?? null,
            'value_boolean'        => $validated['value_boolean'] ?? null,
            'value_date'           => $validated['value_date'] ?? null,
        ]);

        if ($request->has('option_id') && is_array($request->option_id)) {
            $value->options()->sync($request->option_id);
        }

        notify()->success('Characteristic value added successfully.');
        return redirect()->route('admin.products.values.index', $productId);
    }

    public function edit($productId, $valueId)
    {
        $product = Products::findOrFail($productId);
        $value = ProductsCharactersValues::findOrFail($valueId);

        $characteristics = ProductsCharacters::with('options')
            ->orderBy('sort_order')
            ->get();

        return view('admin.products.values.edit', compact('product', 'value', 'characteristics'));
    }

    public function update(Request $request, $productId, $valueId)
    {
        $value = ProductsCharactersValues::findOrFail($valueId);

        $rules = [
            'product_character_id' => ['required', 'exists:products_characters,id'],
            'option_id'            => ['nullable', 'exists:products_characters_options,id'],
            'value_string'         => ['nullable', 'string', 'max:255'],
            'value_integer'        => ['nullable', 'integer'],
            'value_decimal'        => ['nullable', 'numeric'],
            'value_boolean'        => ['nullable', 'boolean'],
            'value_date'           => ['nullable', 'date'],
        ];

        $validated = $request->validate($rules);

        $value->update($validated);

        if ($request->has('option_id')) {
            $value->options()->sync($request->option_id);
        }

        notify()->success('Characteristic value updated successfully.');
        return redirect()->route('admin.products.values.index', $productId);
    }

    public function destroy($productId, $valueId)
    {
        $value = ProductsCharactersValues::findOrFail($valueId);
        $value->delete();

        return response()->json(['status' => 'success', 'message' => 'Value deleted successfully.']);
    }
}
