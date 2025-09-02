<?php

namespace App\Http\Controllers\Backend;

use App\Models\ProductCharacteristicsOptions;
use App\Models\ProductsCharactersOptions;
use Illuminate\Http\Request;
use App\Models\ProductsCharacters;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use App\DataTables\ProductCharacterOptionsDataTable;

class ProductCharacterOptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductCharacterOptionsDataTable $dataTable, $characteristicId)
    {
        $characteristic = ProductsCharacters::findOrFail($characteristicId);
        $options = $characteristic->options()->orderBy('sort_order')->get();

        return $dataTable->render('admin.products-characters.options.index ', compact('characteristic', 'options'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($characteristicId)
    {
        $characteristic = ProductsCharacters::findOrFail($characteristicId);
        return view('admin.products-characters.options.create', compact('characteristic'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $characteristicId)
    {
        $rules = [
            'label'      => ['required', 'string', 'max:255'],
            'value'      => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
        ];

        $messages = [
            'label.required'  => 'Option label is required.',
            'label.string'    => 'Option label must be a valid string.',
            'label.max'       => 'Option label may not exceed 255 characters.',
            'value.string'    => 'Value must be a valid string.',
            'value.max'       => 'Value may not exceed 255 characters.',
            'sort_order.integer' => 'Sort order must be a valid integer.',
        ];


        try {
            $validated = $request->validate($rules, $messages);
        } catch (ValidationException $e) {
            foreach ($e->errors() as $messages) {
                foreach ($messages as $message) {
                    notify()->error($message);
                }
            }
            return back()->withErrors($e->errors())->withInput();
        }

        ProductsCharactersOptions::create([
            'product_character_id' => (int)$characteristicId,
            'label'                => $validated['label'],
            'value'                => Str::slug($validated['label']),
            'sort_order'           => $validated['sort_order'] ?? 0,
        ]);

        notify()->success('Option has been created successfully.');
        return redirect()->route('admin.products-characters.options.index', $characteristicId);
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
    public function edit($characteristicId, $optionId)
    {
        $characteristic = ProductsCharacters::findOrFail($characteristicId);
        $option = ProductsCharactersOptions::where('product_character_id', $characteristicId)
            ->findOrFail($optionId);

        return view('admin.products-characters.options.edit', compact('characteristic', 'option'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $characteristicId, $optionId)
    {
        $rules = [
            'label'      => ['required', 'string', 'max:255'],
            'value'      => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
        ];

        $messages = [
            'label.required'  => 'Option label is required.',
            'label.string'    => 'Option label must be a valid string.',
            'label.max'       => 'Option label may not exceed 255 characters.',
            'value.string'    => 'Value must be a valid string.',
            'value.max'       => 'Value may not exceed 255 characters.',
            'sort_order.integer' => 'Sort order must be a valid integer.',
        ];

        try {
            $validated = $request->validate($rules, $messages);
        } catch (ValidationException $e) {
            foreach ($e->errors() as $messages) {
                foreach ($messages as $message) {
                    notify()->error($message);
                }
            }
            return back()->withErrors($e->errors())->withInput();
        }

        $option = ProductsCharactersOptions::where('product_character_id', $characteristicId)
            ->findOrFail($optionId);

        $option->update([
            'label'      => $validated['label'],
            'value'      => $validated['value'] ?? null,
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        notify()->success('Option has been updated successfully.');
        return redirect()->route('admin.products-characters.options.index', $characteristicId);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($characteristicId, $optionId)
    {
        $option = ProductCharacteristicsOptions::where('product_character_id', $characteristicId)
            ->findOrFail($optionId);

        $option->delete();

        notify()->success('Option has been deleted successfully.');
        return redirect()->route('admin.products-characters.options.index', $characteristicId);
    }
}
