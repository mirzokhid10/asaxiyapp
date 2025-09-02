<?php

namespace App\Http\Controllers\Backend;

use App\Models\Products;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductsCharacters;
use App\Http\Controllers\Controller;
use App\DataTables\ProductsCharacterDataTable;
use Illuminate\Validation\ValidationException;

class ProductCharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductsCharacterDataTable $dataTable, Request $request)
    {

        return $dataTable->render('admin.products-characters.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products-characters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name'          => ['required', 'string', 'max:200'],
            'type'          => ['required', 'in:string,text,integer,decimal,boolean,date,select,multiselect'],
            'unit'          => ['nullable', 'string', 'max:50'],
            'is_filterable' => ['required', 'boolean'],
            'sort_order'    => ['nullable', 'integer'],
        ];

        $messages = [
            'name.required'   => 'Characteristic name is required.',
            'type.required'   => 'Type is required.',
            'type.in'         => 'Invalid type selected.',
            'is_filterable.required' => 'Filterable status is required.',
        ];

        try {
            $validated = $request->validate($rules, $messages);
        } catch (ValidationException $e) {
            foreach ($e->errors() as $field => $msgs) {
                foreach ($msgs as $msg) {
                    notify()->error($msg);
                }
            }
            return back()->withErrors($e->errors())->withInput();
        }

        ProductsCharacters::create([
            'name'          => $validated['name'],
            'slug'          => Str::slug($validated['name']),
            'type'          => $validated['type'],
            'unit'          => $validated['unit'],
            'is_filterable' => $validated['is_filterable'],
            'sort_order'    => $validated['sort_order'],
        ]);

        notify()->success('Characteristic created successfully.');
        return redirect()->route('admin.products-characters.index');
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
        $productCharacters = ProductsCharacters::findOrFail($id);
        return view('admin.characteristics.edit', compact('productCharacters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $productCharacters = ProductsCharacters::findOrFail($id);

        $rules = [
            'name'          => ['required', 'string', 'max:200'],
            'slug'          => ['required', 'string', 'max:200', 'unique:product_characteristics,slug,' . $characteristic->id],
            'type'          => ['required', 'in:string,text,integer,decimal,boolean,date,select,multiselect'],
            'unit'          => ['nullable', 'string', 'max:50'],
            'is_filterable' => ['required', 'boolean'],
            'sort_order'    => ['nullable', 'integer'],
        ];

        $messages = [
            'name.required'   => 'Characteristic name is required.',
            'slug.required'   => 'Slug is required.',
            'slug.unique'     => 'Slug must be unique.',
            'type.required'   => 'Type is required.',
            'type.in'         => 'Invalid type selected.',
            'is_filterable.required' => 'Filterable status is required.',
        ];

        try {
            $validated = $request->validate($rules, $messages);
        } catch (ValidationException $e) {
            foreach ($e->errors() as $field => $msgs) {
                foreach ($msgs as $msg) {
                    notify()->error($msg);
                }
            }
            return back()->withErrors($e->errors())->withInput();
        }

        $productCharacters->update($validated);

        notify()->success('Product Character has been updated successfully.');
        return redirect()->route('admin.products-characters.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $productCharacters = ProductsCharacters::findOrFail($id);
        $productCharacters->delete();

        notify()->success('Product Character has been deleted successfully.');
        return redirect()->route('admin.products-characters.index');
    }
}
