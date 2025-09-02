@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Product Variant</h1>
        </div>
        <div class="mb-3">
            <a href="{{ route('admin.products.index') }}" class="btn btn-primary">Back</a>
        </div>
        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Products Characters</h4>
                            <div class="card-header-action d-flex">

                                <a href="{{ route('admin.products-characters.index', ['filter' => 'all']) }}"
                                   class="btn btn-outline-primary">
                                    <i class="fas fa-list"></i> Show All Characters
                                </a>

                                <a href="{{ route('admin.products-characters.index') }}"
                                   class="btn btn-outline-primary mx-3">
                                    <i class="fas fa-list"></i> Back To Specific Characters
                                </a>

                                <a href="{{ route('admin.products-characters.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Create New
                                </a>

                            </div>

                        </div>
                        <div class="card-body">
                            {{ $dataTable->table() }}
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@endpush
