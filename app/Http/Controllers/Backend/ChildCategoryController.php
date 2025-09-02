<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ChildCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\ChildCategory;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ChildCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.child-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.child-category.create', compact('categories' ));

    }

    public function getSubCategories(Request $request)
    {
        $subcategories = SubCategory::where('category_id', $request->category_id)->where('status', 1)->get();
        return response()->json($subcategories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'category_id' => ['required'],
            'sub_category_id' => ['required'],
            'name'      => ['required', 'string', 'max:255'],
            'status'    => ['required', 'boolean'],
        ];

        $messages = [
            'category_id.required' => 'The category field is required.',
            'sub_category_id.required' => 'The sub category field is required.',
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

        ChildCategory::create([
            'category_id' => $request->get('category_id'),
            'sub_category_id' => $request->get('sub_category_id'),
            'name' => $request->get('name'),
            'slug' => Str::slug($request->get('name')),
            'status' => $request->get('status'),
        ]);

        notify()->success('New Child Category Has Been Created Successfully.');
        return redirect()->route('admin.child-category.index');
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
        $childcategory = ChildCategory::findOrFail($id);
        $subcategories = SubCategory::where('category_id', $childcategory->category_id)->get();

        return view('admin.child-category.edit', compact('categories', 'subcategories', 'childcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'category_id'      => ['nullable', 'exists:categories,id'],
            'sub_category_id'  => ['nullable', 'exists:sub_categories,id'],
            'name'             => ['required', 'string', 'max:255'],
            'status'           => ['nullable', 'boolean'],
        ];

        $messages = [
            'category_id.required' => 'The category field is required.',
            'sub_category_id.required' => 'The sub category field is required.',
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

        $childcategory = ChildCategory::findOrFail($id);

        $childcategory->update([
            'name'      => $validated['name'],
            'slug'      => Str::slug($validated['name']),
            'status'    => $validated['status'],
        ]);

        notify()->success('New Child Category Has Been Edited Successfully.');
        return redirect()->route('admin.child-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $childCategory = ChildCategory::findOrFail($id);

        $childCategory->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Category deleted successfully.'
        ]);
    }

    public function changeStatus(Request $request)
    {
        $childCategory = ChildCategory::findOrFail($request->id);
        $childCategory->status = $request->status == 'true' ? 1 : 0;
        $childCategory->save();

        // return notify()->success('Category Status Changed Successfully!');
        return response()->json(['message' => 'Child Category Status Changed Successfully!']);
    }
}
