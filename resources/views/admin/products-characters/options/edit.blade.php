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
                            <h4>Edit Option</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.products-characters.options.update', [$characteristic->id, $option->id]) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="product_character_id" value="{{ $characteristic->id }}">
                                <div class="form-group">
                                    <label>Attribute</label>
                                    <input type="text" class="form-control" value="{{ $characteristic->name }}" disabled>
                                </div>


                                <div class="form-group">
                                    <label for="label">Option Label</label>
                                    <input type="text" class="form-control" name="label" value="{{ $option->label }}" required>
                                    <small class="form-text text-muted">Visible to users</small>
                                </div>

                                <div class="form-group">
                                    <label for="value">Option Value (optional)</label>
                                    <input type="text" class="form-control" name="value" value="{{ $option->value }}">
                                    <small class="form-text text-muted">Used internally for filtering or logic</small>
                                </div>

                                <div class="form-group">
                                    <label for="sort_order">Sort Order</label>
                                    <input type="number" class="form-control" name="sort_order" value="{{ $option->sort_order }}" min="0">
                                </div>

                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary">Create Option</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
