@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Product</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Product</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.products.update', $products->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    @if ($products->thumb_image)
                                        <img src="{{ asset($products->thumb_image) }}" alt="Current Image" width="100" class="mt-2">
                                    @endif
                                    <label>Image</label>
                                    <input type="file" class="form-control" name="thumb_image">
                                </div>

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name', $products->name) }}">
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label>Category</label>
                                        <select class="form-control main-category" name="category_id">
                                            <option value="">Select</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ $products->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Sub Category</label>
                                        <select class="form-control sub-category" name="sub_category_id">
                                            <option value="">Select</option>
                                            @foreach ($subCategories as $sub)
                                                <option value="{{ $sub->id }}" {{ $products->sub_category_id == $sub->id ? 'selected' : '' }}>
                                                    {{ $sub->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Child Category</label>
                                        <select class="form-control child-category" name="child_category_id">
                                            <option value="">Select</option>
                                            @foreach ($childCategories as $child)
                                                <option value="{{ $child->id }}" {{ $products->child_category_id == $child->id ? 'selected' : '' }}>
                                                    {{ $child->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Brand</label>
                                    <select class="form-control" name="brand_id">
                                        <option value="">Select</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}" {{ $products->brand_id == $brand->id ? 'selected' : '' }}>
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label>SKU</label>
                                        <input type="text" class="form-control" name="sku" value="{{ old('sku', $products->sku) }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Price</label>
                                        <input type="text" class="form-control" name="price" value="{{ old('price', $products->price) }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Discount Price</label>
                                        <input type="text" class="form-control" name="discount_price" value="{{ old('discount_price', $products->discount_price) }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label>Offer Start Date</label>
                                        <input type="date" class="form-control" name="offer_start_date" value="{{ old('offer_start_date', $products->offer_start_date) }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Offer End Date</label>
                                        <input type="date" class="form-control" name="offer_end_date" value="{{ old('offer_end_date', $products->offer_end_date) }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Stock Quantity</label>
                                        <input type="number" min="0" class="form-control" name="qty" value="{{ old('qty', $products->qty) }}">
                                    </div>
                                </div>

                                <div class="form-group mt-2">
                                    <label>Short Description</label>
                                    <textarea name="short_description" class="form-control">{{ old('short_description', $products->short_description) }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Long Description</label>
                                    <textarea name="long_description" class="form-control summernote">{{ old('long_description', $products->long_description) }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Product Type</label>
                                    <select class="form-control" name="product_type">
                                        <option value="">Select</option>
                                        @foreach (['super_price', 'top', 'discount', 'new'] as $type)
                                            <option value="{{ $type }}" {{ $products->product_type == $type ? 'selected' : '' }}>
                                                {{ ucfirst(str_replace('_', ' ', $type)) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>SEO Title</label>
                                    <input type="text" class="form-control" name="seo_title" value="{{ old('seo_title', $products->seo_title) }}">
                                </div>

                                <div class="form-group">
                                    <label>SEO Description</label>
                                    <textarea name="seo_description" class="form-control">{{ old('seo_description', $products->seo_description) }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="1" {{ $products->status ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ !$products->status ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
