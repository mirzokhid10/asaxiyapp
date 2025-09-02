<?php

namespace App\Http\Controllers\Backend;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\ProductsVariant;
use App\Http\Controllers\Controller;
use App\DataTables\ProductsVariantDataTable;
use Illuminate\Validation\ValidationException;

class ProductsVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductsVariantDataTable $dataTable, Request $request)
    {
        $product = Products::findOrFail($request->product);
        return $dataTable->render('admin.products.products-variant.index', compact('product'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.products-variant.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'product_id' => ['required', 'exists:products,id'],

            'name'       => ['required', 'string', 'max:255'],
            'status'     => ['required', 'boolean'],
        ];

        $messages = [
            'product_id.required' => 'Product reference is required.',
            'product_id.exists'   => 'Selected product does not exist.',
            'name.required'       => 'Variant name is required.',
            'name.string'         => 'Variant name must be a valid string.',
            'name.max'            => 'Variant name may not exceed 255 characters.',
            'status.required'     => 'Status is required.',
            'status.boolean'      => 'Status must be true or false.',
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

        ProductsVariant::create([
            'product_id' => $validated['product_id'],
            'name'       => $validated['name'],
            'status'     => $request->boolean('status'),
        ]);

        notify()->success('Product variant created successfully.');
        return redirect()->route('admin.products-variant.index', ['product' => $validated['product_id']]);
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
    public function edit(string $id)
    {
        $productsVariant = ProductsVariant::findOrFail($id);
        return view('admin.products.products-variant.edit', compact('productsVariant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $productsVariant = ProductsVariant::findOrFail($id);

        $rules = [
            'product_id' => ['required', 'exists:products,id'],
            'name'       => ['required', 'string', 'max:255'],
            'status'     => ['required', 'boolean'],
        ];

        $messages = [
            'product_id.required' => 'Product reference is required.',
            'product_id.exists'   => 'Selected product does not exist.',
            'name.required'       => 'Variant name is required.',
            'name.string'         => 'Variant name must be a valid string.',
            'name.max'            => 'Variant name may not exceed 255 characters.',
            'status.required'     => 'Status is required.',
            'status.boolean'      => 'Status must be true or false.',
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

        $productsVariant->update([
            'product_id' => $validated['product_id'],
            'name'       => $validated['name'],
            'status'     => $request->boolean('status'),
        ]);

        notify()->success('Product variant updated successfully.');
        return redirect()->route('admin.products-variant.index', ['product' => $validated['product_id']]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $productsVariant = ProductsVariant::findOrFail($id);

        $productsVariant->delete();

        notify()->success('Product Variant Deleted Successfully!');
        return redirect()->back();
    }

    public function changeStatus(Request $request)
    {
        $productsVariant = ProductsVariant::findOrFail($request->id);
        $productsVariant->status = $request->status == 'true' ? 1 : 0;
        $productsVariant->save();

        return response(['message' => 'Status has been updated!']);
    }
}
