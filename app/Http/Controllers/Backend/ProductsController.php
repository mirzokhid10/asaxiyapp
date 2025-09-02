<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProductsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Category;
use App\Models\Products;
use App\Models\SubCategory;
use App\Models\ChildCategory;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;


class ProductsController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(ProductsDataTable $dataTable)
    {
        return $dataTable->render('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brands::all();
        return view('admin.products.create', compact('categories', 'brands'));
    }

    public function getSubCategories(Request $request)
    {
        $subCategories = SubCategory::where('category_id', $request->id)->get();
        return $subCategories;
    }

    /**
     * Show the getChildCategories for creating a new resource.
     */
    public function getChildCategories(Request $request)
    {
        $childCategories = ChildCategory::where('sub_category_id', $request->id)->get();
        return $childCategories;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'category_id'        => ['required', 'exists:categories,id'],
            'sub_category_id'    => ['nullable', 'exists:categories,id'],
            'child_category_id'  => ['nullable', 'exists:categories,id'],

            'name'               => ['required', 'string', 'max:255'],
            'thumb_image'        => ['required', 'image', 'max:4096'], // 4MB max
            'description'        => ['nullable', 'string'],
            'short_description'  => ['nullable', 'string'],
            'long_description'   => ['nullable', 'string'],

            'brand_id'           => ['required', 'exists:brands,id'],
            'qty'                => ['required', 'integer', 'min:0'],
            'sku'                => ['nullable', 'string', 'max:100'],

            'price'              => ['required', 'numeric', 'min:0'],
            'discount_price'     => ['nullable', 'numeric', 'lt:price'],
            'offer_start_date'   => ['nullable', 'date'],
            'offer_end_date'     => ['nullable', 'date', 'after_or_equal:offer_start_date'],

            'product_type'       => ['nullable', 'in:super_price,top,discount,new'],
            'status'             => ['required', 'boolean'],
            'is_approved'        => ['nullable', 'boolean'],

            'seo_title'          => ['nullable', 'string', 'max:255'],
            'seo_description'    => ['nullable', 'string'],
        ];

        $messages = [
            'name.required'            => 'Product name is required.',
            'thumb_image.required'     => 'Product image is required.',
            'thumb_image.image'        => 'Uploaded file must be a valid image.',
            'thumb_image.max'          => 'Image must not exceed 4MB.',
            'category_id.required'     => 'Category is required.',
            'brand_id.required'        => 'Brand is required.',
            'qty.required'             => 'Quantity is required.',
            'price.required'           => 'Price is required.',
            'discount_price.lt'        => 'Discount must be less than the original price.',
            'offer_end_date.after_or_equal' => 'Offer end date must be after start date.',
            'status.required'          => 'Status is required.',
            'status.boolean'           => 'Status must be true or false.',
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

        // Upload image
        $imagePath = $this->uploadImage($request, 'thumb_image', 'uploads/products');

        // Create product
        Products::create([
            'category_id'        => $validated['category_id'],
            'sub_category_id'    => $validated['sub_category_id'] ?? null,
            'child_category_id'  => $validated['child_category_id'] ?? null,
            'name'               => $validated['name'],
            'slug'               => Str::slug($validated['name']),
            'thumb_image'        => $imagePath,
            'description'        => $validated['description'] ?? null,
            'short_description'  => $validated['short_description'] ?? null,
            'long_description'   => $validated['long_description'] ?? null,
            'brand_id'           => $validated['brand_id'],
            'qty'                => $validated['qty'],
            'sku'                => $validated['sku'] ?? null,
            'price'              => $validated['price'],
            'discount_price'     => $validated['discount_price'] ?? null,
            'offer_start_date'   => $validated['offer_start_date'] ?? null,
            'offer_end_date'     => $validated['offer_end_date'] ?? null,
            'product_type'       => $validated['product_type'] ?? null,
            'status'             => $request->boolean('status'),
            'is_approved'        => $request->boolean('is_approved'),
            'seo_title'          => $validated['seo_title'] ?? null,
            'seo_description'    => $validated['seo_description'] ?? null,
        ]);

        notify()->success('Product created successfully.');
        return redirect()->route('admin.products.index');

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
        $products = Products::findOrFail($id);
        $categories = Category::all();
        $subCategories = SubCategory::where('category_id', $products->category_id)->get();
        $childCategories = ChildCategory::where('sub_category_id', $products->sub_category_id)->get();
        $brands = Brands::all();

        return view(
            'admin.products.edit',
            compact(
                'products',
                'categories',
                'subCategories',
                'childCategories',
                'brands'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $products = Products::findOrFail($id);

        $rules = [
            'category_id'        => ['required', 'exists:categories,id'],
            'sub_category_id'    => ['nullable', 'exists:categories,id'],
            'child_category_id'  => ['nullable', 'exists:categories,id'],

            'name'               => ['required', 'string', 'max:255'],
            'thumb_image'        => ['nullable', 'image', 'max:4096'], // Optional on update
            'description'        => ['nullable', 'string'],
            'short_description'  => ['nullable', 'string'],
            'long_description'   => ['nullable', 'string'],

            'brand_id'           => ['required', 'exists:brands,id'],
            'qty'                => ['required', 'integer', 'min:0'],
            'sku'                => ['nullable', 'string', 'max:100'],

            'price'              => ['required', 'numeric', 'min:0'],
            'discount_price'     => ['nullable', 'numeric', 'lt:price'],
            'offer_start_date'   => ['nullable', 'date'],
            'offer_end_date'     => ['nullable', 'date', 'after_or_equal:offer_start_date'],

            'product_type'       => ['nullable', 'in:super_price,top,discount,new'],
            'status'             => ['required', 'boolean'],
            'is_approved'        => ['nullable', 'boolean'],

            'seo_title'          => ['nullable', 'string', 'max:255'],
            'seo_description'    => ['nullable', 'string'],
        ];

        $messages = [
            'name.required'            => 'Product name is required.',
            'thumb_image.image'        => 'Uploaded file must be a valid image.',
            'thumb_image.max'          => 'Image must not exceed 4MB.',
            'category_id.required'     => 'Category is required.',
            'brand_id.required'        => 'Brand is required.',
            'qty.required'             => 'Quantity is required.',
            'price.required'           => 'Price is required.',
            'discount_price.lt'        => 'Discount must be less than the original price.',
            'offer_end_date.after_or_equal' => 'Offer end date must be after start date.',
            'status.required'          => 'Status is required.',
            'status.boolean'           => 'Status must be true or false.',
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

        // Upload new image if provided
        if ($request->hasFile('thumb_image')) {
            $imagePath = $this->uploadImage($request, 'thumb_image', 'uploads/products');
            $products->thumb_image = $imagePath;
        }

        // Update product
        $products->update([
            'category_id'        => $validated['category_id'],
            'sub_category_id'    => $validated['sub_category_id'] ?? null,
            'child_category_id'  => $validated['child_category_id'] ?? null,
            'name'               => $validated['name'],
            'slug'               => Str::slug($validated['name']),
            'description'        => $validated['description'] ?? null,
            'short_description'  => $validated['short_description'] ?? null,
            'long_description'   => $validated['long_description'] ?? null,
            'brand_id'           => $validated['brand_id'],
            'qty'                => $validated['qty'],
            'sku'                => $validated['sku'] ?? null,
            'price'              => $validated['price'],
            'discount_price'     => $validated['discount_price'] ?? null,
            'offer_start_date'   => $validated['offer_start_date'] ?? null,
            'offer_end_date'     => $validated['offer_end_date'] ?? null,
            'product_type'       => $validated['product_type'] ?? null,
            'status'             => $request->boolean('status'),
            'is_approved'        => $request->boolean('is_approved'),
            'seo_title'          => $validated['seo_title'] ?? null,
            'seo_description'    => $validated['seo_description'] ?? null,
        ]);

        notify()->success('Product updated successfully.');
        return redirect()->route('admin.products.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Products::findOrFail($id);

        // Delete The Main Product Image
        if ($product->thumb_image) {
            $this->deleteImage($product->thumb_image);
        }

        $product->delete();

        notify()->success('Product Information Deleted Successfully!');
        return redirect()->route('admin.products.index');
    }

    public function changeStatus(Request $request)
    {
        $product = Products::findOrFail($request->id);
        $product->status = $request->status == 'true' ? 1 : 0;
        $product->save();

        return response(['message' => 'Status has been updated!']);
    }
}
