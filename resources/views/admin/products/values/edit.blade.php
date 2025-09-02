@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Product Characters: {{$product->name}}</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Variant</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.products.values.update', [$product->id, $value->id]) }}" method="POST">
    @csrf
    @method('PUT')

    {{-- Select Characteristic (disabled for editing) --}}
    <div class="form-group">
        <label for="product_character_id">Characteristic</label>
        <select class="form-control" name="product_character_id" id="product_character_id" disabled>
            @foreach ($characteristics as $char)
                <option value="{{ $char->id }}"
                        data-type="{{ $char->type }}"
                        data-options="{{ json_encode($char->options) }}"
                    {{ $value->product_character_id == $char->id ? 'selected' : '' }}>
                    {{ $char->name }}
                </option>
            @endforeach
        </select>
        <input type="hidden" name="product_character_id" value="{{ $value->product_character_id }}">
    </div>

    {{-- Dynamic Field Container --}}
    <div id="characteristic-value-fields">
        <!-- JS will inject the correct input here -->
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

@push('scripts')
    <script>
        const allCharacteristics = @json($characteristics);
        const currentValue = @json($value);

        window.addEventListener('DOMContentLoaded', () => {
            const charId = currentValue.product_character_id;
            const char = allCharacteristics.find(c => c.id == charId);
            const container = document.getElementById('characteristic-value-fields');
            container.innerHTML = '';

            if (!char) return;

            switch (char.type) {
                case 'string':
                    container.innerHTML = `
                    <div class="form-group">
                        <label>Value (string)</label>
                        <input type="text" name="value_string" class="form-control" value="${currentValue.value_string ?? ''}">
                    </div>`;
                    break;

                case 'integer':
                    container.innerHTML = `
                    <div class="form-group">
                        <label>Value (integer)</label>
                        <input type="number" name="value_integer" class="form-control" value="${currentValue.value_integer ?? ''}">
                    </div>`;
                    break;

                case 'decimal':
                    container.innerHTML = `
                    <div class="form-group">
                        <label>Value (decimal)</label>
                        <input type="number" step="0.01" name="value_decimal" class="form-control" value="${currentValue.value_decimal ?? ''}">
                    </div>`;
                    break;

                case 'boolean':
                    container.innerHTML = `
                    <div class="form-group">
                        <label>Value (boolean)</label>
                        <select name="value_boolean" class="form-control">
                            <option value="1" ${currentValue.value_boolean == 1 ? 'selected' : ''}>Yes</option>
                            <option value="0" ${currentValue.value_boolean == 0 ? 'selected' : ''}>No</option>
                        </select>
                    </div>`;
                    break;

                case 'date':
                    container.innerHTML = `
                    <div class="form-group">
                        <label>Value (date)</label>
                        <input type="date" name="value_date" class="form-control" value="${currentValue.value_date ?? ''}">
                    </div>`;
                    break;

                case 'select':
                case 'multiselect':
                    const options = char.options || [];
                    const multiple = char.type === 'multiselect' ? 'multiple' : '';
                    const name = char.type === 'multiselect' ? 'option_id[]' : 'option_id';
                    const selected = char.type === 'multiselect'
                        ? (currentValue.option_id || [])
                        : [currentValue.option_id];

                    let html = `<div class="form-group">
                            <label>Select Option</label>
                            <select name="${name}" class="form-control" ${multiple}>`;

                    options.forEach(opt => {
                        const isSelected = selected.includes(opt.id) ? 'selected' : '';
                        html += `<option value="${opt.id}" ${isSelected}>${opt.label}</option>`;
                    });

                    html += `</select></div>`;
                    container.innerHTML = html;
                    break;
            }
        });
    </script>
@endpush
