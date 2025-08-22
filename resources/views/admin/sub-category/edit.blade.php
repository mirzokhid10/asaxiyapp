@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Category</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Sub Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.sub-category.update', $subcategory->id) }}"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <input type="text" class="form-control"
                                           value="{{ $subcategory->category->name }}" disabled>

                                    {{-- hidden field to keep category_id in form --}}
                                    <input type="hidden" name="category_id" value="{{ $subcategory->category_id }}">
                                </div>
                                {{-- Name --}}
                                <div class="form-group">
                                    <label for="name">Subcategory Name</label>
                                    <input type="text" class="form-control" id="name"
                                           name="name" value="{{ old('name', $subcategory->name) }}" required>
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Status --}}
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select id="status" class="form-control" name="status">
                                        <option value="1" {{ $subcategory->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $subcategory->status == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>

                                {{-- Submit --}}
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
