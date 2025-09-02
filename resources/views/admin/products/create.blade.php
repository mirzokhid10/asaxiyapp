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
                            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control" name="thumb_image">
                                </div>

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label>Category</label>
                                        <select class="form-control main-category" name="category_id">
                                            <option value="">Select</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Sub Category</label>
                                        <select class="form-control sub-category" name="sub_category_id">
                                            <option value="">Select</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Child Category</label>
                                        <select class="form-control child-category" name="child_category_id">
                                            <option value="">Select</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Brand</label>
                                    <select class="form-control" name="brand_id">
                                        <option value="">Select</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group row d-flex justify-content-center align-items-center ">
                                    <div class="col-md-4 col-12">
                                        <label>SKU</label>
                                        <input type="text" class="form-control" name="sku" value="{{ old('sku') }}">
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <label>Price</label>
                                        <input type="text" class="form-control" name="price" value="{{ old('price') }}">
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <label>Discount Price</label>
                                        <input type="text" class="form-control" name="discount_price" value="{{ old('discount_price') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4 col-sm-4 col-12">
                                        <label>Offer Start Date</label>
                                        <input type="date" class="form-control datepicker" name="offer_start_date" value="{{ old('offer_start_date') }}">
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-12">
                                        <label>Offer End Date</label>
                                        <input type="date" class="form-control datepicker" name="offer_end_date" value="{{ old('offer_end_date') }}">
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-12">
                                        <label>Stock Quantity</label>
                                        <input type="number" min="0" class="form-control" name="qty" value="{{ old('qty') }}">
                                    </div>
                                </div>


                                <div class="form-group mt-2">
                                    <label>Short Description</label>
                                    <textarea name="short_description" class="form-control">{{ old('short_description') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Long Description</label>
                                    <textarea name="long_description" class="form-control summernote">{{ old('long_description') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Product Type</label>
                                    <select class="form-control" name="product_type">
                                        <option value="">Select</option>
                                        <option value="super_price">Super Price</option>
                                        <option value="top">Top</option>
                                        <option value="discount">Discount</option>
                                        <option value="new">New</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>SEO Title</label>
                                    <input type="text" class="form-control" name="seo_title" value="{{ old('seo_title') }}">
                                </div>

                                <div class="form-group">
                                    <label>SEO Description</label>
                                    <textarea name="seo_description" class="form-control">{{ old('seo_description') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('body').on('change', '.main-category', function(e) {
                let id = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.products.get-subcategories') }}",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $('.sub-category').html('<option value="">Select</option>')

                        $.each(data, function(i, item) {
                            $('.sub-category').append(
                                `<option value="${item.id}">${item.name}</option>`)
                        })
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })
            })
            /** get child categories **/
            $('body').on('change', '.sub-category', function(e) {
                let id = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.products.get-child-categories') }}",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $('.child-category').html('<option value="">Select</option>')

                        $.each(data, function(i, item) {
                            $('.child-category').append(
                                `<option value="${item.id}">${item.name}</option>`)
                        })
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })
            })
        })
    </script>
@endpush

