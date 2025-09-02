
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
                            <form action="{{ route('admin.products-characters.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Attribute Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <select class="form-control" name="type" required>
                                        <option value="">Select Type</option>
                                        @foreach (['string','text','integer','decimal','boolean','date','select','multiselect'] as $type)
                                            <option value="{{ $type }}" {{ old('type') == $type ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="unit">Unit (optional)</label>
                                    <input type="text" class="form-control" name="unit" value="{{ old('unit') }}">
                                    <small class="form-text text-muted">Examples: kg, mm, l, GB</small>
                                </div>

                                <div class="form-group">
                                    <label for="is_filterable">Is Filterable</label>
                                    <select class="form-control" name="is_filterable">
                                        <option value="1" {{ old('is_filterable', '1') == '1' ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ old('is_filterable') == '0' ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="sort_order">Sort Order</label>
                                    <input type="number" class="form-control" name="sort_order" value="{{ old('sort_order', 0) }}" min="0">
                                </div>

                                <button type="submit" class="btn btn-primary">Create Attribute</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection


