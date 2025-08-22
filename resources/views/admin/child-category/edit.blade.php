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
                            <h4>Update Child Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.child-category.update', $childcategory->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <input type="text" class="form-control"
                                           value="{{ $childcategory->category->name }}" disabled>

                                    {{-- hidden field to keep category_id in form --}}
                                    <input type="hidden" name="category_id" value="{{ $childcategory->category_id }}">
                                </div>

                                <div class="form-group">
                                    <label for="category_id">Sub Category</label>
                                    <input type="text" class="form-control"
                                           value="{{ $childcategory->subcategory->name }}" disabled>

                                    {{-- hidden field to keep category_id in form --}}
                                    <input type="hidden" name="sub_category_id" value="{{ $childcategory->sub_category_id }}">
                                </div>

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$childcategory->name}}">
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputState">Status</label>
                                    <select id="inputState" class="form-control" name="status">
                                        <option {{ $childcategory->status == 1 ? 'selected' : '' }} value="1">Active
                                        </option>
                                        <option {{ $childcategory->status == 0 ? 'selected' : '' }} value="0">Inactive
                                        </option>
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
