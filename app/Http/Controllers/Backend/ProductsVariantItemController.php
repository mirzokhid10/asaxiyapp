<?php

namespace App\Http\Controllers\Backend;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\ProductsVariant;
use App\Models\ProductsVariantItem;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use App\DataTables\ProductsVariantItemDataTable;

class ProductsVariantItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductsVariantItemDataTable $dataTable, $productId, $productVariantId)
    {
        $product = Products::findOrFail($productId);
        $productVariant = ProductsVariant::findOrFail($productVariantId);
        return $dataTable->render('admin.products.products-variant-item.index', compact('product', 'productVariant'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $productId, string $productVariantId)
    {
        $product = Products::findOrFail($productId);
        $productVariant = ProductsVariant::findOrFail($productVariantId);
        return view(
            'admin.products.products-variant-item.create',
            compact('product', 'productVariant')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'product_id'        => ['required', 'exists:products,id'],
            'product_variant_id'=> ['required', 'exists:products_variants,id'],
            'name'              => ['required', 'string', 'max:200'],
            'price'             => ['required', 'integer'],
            'is_default'        => ['required', 'boolean'],
            'status'            => ['required', 'boolean'],
        ];

        $messages = [
            'product_id.required'         => 'Product reference is required.',
            'product_id.exists'           => 'Selected product does not exist.',
            'product_variant_id.required' => 'Variant reference is required.',
            'product_variant_id.exists'   => 'Selected variant does not exist.',
            'name.required'               => 'Item name is required.',
            'name.string'                 => 'Item name must be a valid string.',
            'name.max'                    => 'Item name may not exceed 200 characters.',
            'price.required'              => 'Price is required.',
            'price.integer'               => 'Price must be a valid number.',
            'is_default.required'         => 'Default status is required.',
            'is_default.boolean'          => 'Default status must be true or false.',
            'status.required'             => 'Status is required.',
            'status.boolean'              => 'Status must be true or false.',
        ];

        try {
            $validated = $request->validate($rules, $messages);
        } catch (ValidationException $e) {
            foreach ($e->errors() as $field => $messages) {
                foreach ($messages as $message) {
                    notify()->error($message);
                }
            }
            return back()->withErrors($e->errors())->withInput();
        }

        ProductsVariantItem::create([
            'product_id'         => $validated['product_id'],
            'product_variant_id' => $validated['product_variant_id'],
            'name'               => $validated['name'],
            'price'              => $validated['price'],
            'is_default'         => $validated['is_default'],
            'status'             => $validated['status'],
        ]);

        notify()->success('Product Variant Item created successfully.');
        return redirect()->route('admin.products-variant-item.index', [
            'productId'        => $validated['product_id'],
            'productVariantId' => $validated['product_variant_id'],
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $variantItemId)
    {
        $productVariantItem = ProductsVariantItem::findOrFail($variantItemId);

        return view('admin.products.products-variant-item.edit', compact(
            'productVariantItem'
        ));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $variantItemId)
    {
        $productVariantItem = ProductsVariantItem::findOrFail($variantItemId);

        $rules = [
            'name'               => ['required', 'string', 'max:200'],
            'price'              => ['required', 'integer'],
            'is_default'         => ['required', 'boolean'],
            'status'             => ['required', 'boolean'],
        ];

        $messages = [
            'name.required'               => 'Item name is required.',
            'name.string'                 => 'Item name must be a valid string.',
            'name.max'                    => 'Item name may not exceed 200 characters.',
            'price.required'              => 'Price is required.',
            'price.integer'               => 'Price must be a valid number.',
            'is_default.required'         => 'Default status is required.',
            'is_default.boolean'          => 'Default status must be true or false.',
            'status.required'             => 'Status is required.',
            'status.boolean'              => 'Status must be true or false.',
        ];

        try {
            $validated = $request->validate($rules, $messages);
        } catch (ValidationException $e) {
            foreach ($e->errors() as $field => $messages) {
                foreach ($messages as $message) {
                    notify()->error($message);
                }
            }
            return back()->withErrors($e->errors())->withInput();
        }

        $productVariantItem->update([
            'name'               => $validated['name'],
            'price'              => $validated['price'],
            'is_default'         => $validated['is_default'],
            'status'             => $validated['status'],
        ]);

        notify()->success('Product Variant Item updated successfully.');
        return redirect()->route('admin.products-variant-item.index', [
            'productId'        => $productVariantItem->productVariant->product_id,
            'productVariantId' => $productVariantItem->product_variant_id
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $variantItemId)
    {
        $variantItem = ProductsVariantItem::findOrFail($variantItemId);
        $variantItem->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

    public function changeStatus(Request $request)
    {
        $variantItem = ProductsVariantItem::findOrFail($request->id);
        $variantItem->status = $request->status == 'true' ? 1 : 0;
        $variantItem->save();

        return response(['message' => 'Status has been updated!']);
    }
}
