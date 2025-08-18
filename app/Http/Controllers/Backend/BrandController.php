<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\BrandsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(BrandsDataTable $dataTable)
    {
        return $dataTable->render('admin.brands.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'image'     => ['required', 'image', 'max:4096'],
            'name'      => ['required', 'string', 'max:255'],
            'link'      => ['nullable', 'url'],
            'alt_text'  => ['nullable', 'string', 'max:255'],
            'status'    => ['required', 'boolean'],
        ];

        $messages = [
            'image.required'     => 'Logo image is required.',
            'image.image'        => 'Logo must be a valid image file.',
            'image.max'          => 'Logo image may not be greater than 4MB.',
            'name.required'      => 'Brand name is required.',
            'link.url'           => 'Brand link must be a valid URL.',
            'status.required'    => 'Status is required.',
            'status.boolean'     => 'Status must be true or false.',
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

        $imagePath = $this->uploadImage($request, 'image', 'uploads/brands');

        // Create brand
        Brands::create([
            'image'     => $imagePath,
            'name'      => $validated['name'],
            'slug'      => Str::slug($validated['name']),
            'link'      => $validated['link'] ?? null,
            'alt_text'  => $validated['alt_text'] ?? null,
            'status'    => $request->boolean('status'),
        ]);

        notify()->success('Brand Created Successfully.');
        return redirect()->route('admin.brands.index');
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
        $brands = Brands::findOrFail($id);
        return view('admin.brands.edit', compact('brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'image'     => ['nullable', 'image', 'max:4096'],
            'name'      => ['required', 'string', 'max:255'],
            'link'      => ['nullable', 'url'],
            'alt_text'  => ['nullable', 'string', 'max:255'],
            'status'    => ['required', 'boolean'],
        ];

        $messages = [
            'image.required'     => 'Logo image is required.',
            'image.image'        => 'Logo must be a valid image file.',
            'image.max'          => 'Logo image may not be greater than 4MB.',
            'name.required'      => 'Brand name is required.',
            'link.url'           => 'Brand link must be a valid URL.',
            'status.required'    => 'Status is required.',
            'status.boolean'     => 'Status must be true or false.',
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

        $brand = Brands::findOrFail($id);

        $imagePath = $this->updateImage($request, 'image', 'uploads/brands') ?: $brand->image;

        $brand->update([
            'image'     => $imagePath,
            'name'      => $validated['name'],
            'slug'      => Str::slug($validated['name']),
            'link'      => $validated['link'] ?? null,
            'alt_text'  => $validated['alt_text'] ?? null,
            'status'    => $request->boolean('status'),
        ]);

        notify()->success('Brand Updated Successfully.');
        return redirect()->route('admin.brands.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brands = Brands::findOrFail($id);

        $this->deleteImage($brands->image);
        $brands->delete();

        notify()->success('Brand Information Deleted Successfully!');

        return redirect()->back();
    }

    public function changeStatus(Request $request)
    {
        $brands = Brands::findOrFail($request->id);
        $brands->status = $request->status == 'true' ? 1 : 0;
        $brands->save();


        return response()->json(['message' => 'Brand Status Changed Successfully!']);
    }

    public function getData()
    {
        return datatables()->of(Brands::query())->make(true);
    }
}