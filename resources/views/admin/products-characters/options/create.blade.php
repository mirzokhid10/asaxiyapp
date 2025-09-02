@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Product Character Options</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Option</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.products-characters.options.store', $characteristic->id) }}" method="POST">
                                @csrf

                                <input type="hidden" name="product_character_id" value="{{ $characteristic->id }}">
                                {{-- Attribute name (just displayed, not editable here) --}}
                                <div class="form-group">
                                    <label>Attribute</label>
                                    <input type="text" class="form-control" value="{{ $characteristic->name }}" disabled>
                                </div>

                                {{-- Option label --}}
                                <div class="form-group">
                                    <label for="label">Option Label</label>
                                    <input type="text" class="form-control" name="label" value="{{ old('label') }}" required>
                                    <small class="form-text text-muted">This is what users will see (e.g. "Красный", "XL", "Для офиса").</small>
                                </div>

                                {{-- Sort order --}}
                                <div class="form-group">
                                    <label for="sort_order">Sort Order</label>
                                    <input type="number" class="form-control" name="sort_order" value="{{ old('sort_order', 0) }}" min="0">
                                    <small class="form-text text-muted">Controls display order of options (0 = top).</small>
                                </div>

                                <button type="submit" class="btn btn-primary">Create Option</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
