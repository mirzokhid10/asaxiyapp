<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $rules = [
            'name'      => ['required', 'string', 'max:255'],
            'image'     => ['required', 'mimes:jpeg,png,jpg,gif,svg', 'max:4096'],
            'status'    => ['required', 'boolean'],
        ];

        $messages = [
            'image.required'     => 'Category image is required.',
            'image.mimetypes'    => 'Category must be a valid image file (jpeg, png, jpg, gif, svg).',
            'image.max'          => 'Category image may not be greater than 4MB.',
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

        $imagePath = $this->uploadImage($request, 'image', 'uploads/categories');

        Category::create([
            'image'     => $imagePath,
            'name'      => $validated['name'],
            'slug'      => Str::slug($validated['name']),
            'status'    => $validated['status'],
        ]);

        notify()->success('New Category Has Been Created Successfully.');
        return redirect()->route('admin.category.index');
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
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name'      => ['required', 'string', 'max:255'],
            'image'     => ['nullable', 'mimes:jpeg,png,jpg,gif,svg', 'max:4096'],
            'status'    => ['required', 'boolean'],
        ];

        $messages = [
            'image.required'     => 'Category image is required.',
            'image.image'        => 'Category must be a valid image file.',
            'image.max'          => 'Category image may not be greater than 4MB.',
            'name.required'      => 'Brand name is required.',
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

        $category = Category::findOrFail($id);

        $imagePath = $this->updateImage($request, 'image', 'uploads/categories') ?: $category->image;


        $category->update([
            'image'     => $imagePath,
            'name'      => $validated['name'],
            'slug'      => Str::slug($validated['name']),
            'status'    => $validated['status'],
        ]);


        notify()->success('Category Has Been Edited Successfully.');
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

//        if ($category->subCategory()->exists()) {
//            return response()->json([
//                'error' => 'This category has sub/child categories. Please delete them first before deleting this category.'
//            ], 400);
//        }

        $category->delete();

        notify()->success('Category Has Been Deleted Successfully.');
        return redirect()->route('admin.category.index');
    }

    public function changeStatus(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category->status = $request->status == 'true' ? 1 : 0;
        $category->save();

        return response()->json(['message' => 'Category Status Changed Successfully!']);
    }
}
