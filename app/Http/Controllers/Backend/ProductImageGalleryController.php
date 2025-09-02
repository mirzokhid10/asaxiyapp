<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProductsImageGalleryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\ProductsImageGallery;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class ProductImageGalleryController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(ProductsImageGalleryDataTable $dataTable, Request $request)
    {
        $product = Products::findOrFail($request->product);
        return $dataTable->render('admin.products.image-gallery.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $rules = [
            'image.*' => ['required', 'image', 'max:2048'],
            'product_id' => ['required', 'exists:products,id'],
        ];

        $messages = [
            'image.*.required' => 'Please upload at least one image.',
            'image.*.image' => 'Each file must be a valid image.',
            'image.*.max' => 'Images must not exceed 2MB.',
            'product_id.required' => 'Product reference is missing.',
            'product_id.exists' => 'Selected product does not exist.',
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

        // Upload multiple images
        $imagePaths = $this->uploadMultiImage($request, 'image', 'uploads/products/gallery');

        foreach ($imagePaths as $path) {
            ProductsImageGallery::create([
                'product_id' => $validated['product_id'],
                'image' => $path,
            ]);
        }

        notify()->success('Product images have been added successfully!');
        return redirect()->route('admin.products-image-gallery.index', ['product' => $validated['product_id']]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $productImage = ProductsImageGallery::findOrFail($id);
        $this->deleteImage($productImage->image);
        $productImage->delete();

        notify()->success('Product image has been deleted successfully!');
        return redirect()->back();
    }
}
