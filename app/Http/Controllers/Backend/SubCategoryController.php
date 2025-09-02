<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SubCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SubCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.sub-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.sub-category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'category_id' => ['required'],
            'name'      => ['required', 'string', 'max:255'],
            'status'    => ['required', 'boolean'],
        ];

        $messages = [
            'category_id.required' => 'The category field is required.',
            'name.required'      => 'Category name is required.',
            'status.required'    => 'Status is required.',
            'status.boolean'     => 'Status must be active or inactive.',
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

        SubCategory::create([
            'category_id' => $request->get('category_id'),
            'name'      => $validated['name'],
            'slug'      => Str::slug($validated['name']),
            'status'    => $validated['status'],
        ]);

        notify()->success('New Sub Category Has Been Created Successfully.');
        return redirect()->route('admin.sub-category.index');
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
        $categories = Category::all();
        $subcategory = SubCategory::findOrFail($id);
        return view('admin.sub-category.edit', compact('categories','subcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'category_id' => ['nullable'],
            'name'      => ['required', 'string', 'max:255'],
            'status'    => ['required', 'boolean'],
        ];

        $messages = [
            'category_id.required' => 'The category field is required.',
            'name.required'      => 'Category name is required.',
            'status.required'    => 'Status is required.',
            'status.boolean'     => 'Status must be active or inactive.',
        ];

        try {
            $validated = $request->validate($rules, $messages);
        } catch (ValidationException $e) {
            // Show each validation error via notification
            foreach ($e->errors() as $field => $messages) {
                foreach ($messages as $message) {
                    notify()->error($message);
                }
            }

            return back()->withErrors($e->errors())->withInput();
        }

        $subcategory = SubCategory::findOrFail($id);

        $subcategory->update([
            'name'      => $validated['name'],
            'slug'      => Str::slug($validated['name']),
            'status'    => $validated['status'],
        ]);


        notify()->success('Sub Category Has Been Edited Successfully.');
        return redirect()->route('admin.sub-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subCategory = SubCategory::with('childCategories')->findOrFail($id);

        if ($subCategory->childCategories->count() > 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'Please delete child-categories before deleting this sub-category.'
            ], 400);
        }

        $subCategory->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Sub-category deleted successfully.'
        ]);
    }

    public function changeStatus(Request $request)
    {
        $subCategory = SubCategory::findOrFail($request->id);
        $subCategory->status = $request->status == 'true' ? 1 : 0;
        $subCategory->save();

        // return notify()->success('Category Status Changed Successfully!');
        return response()->json(['message' => 'Sub Category Status Changed Successfully!']);
    }
}
