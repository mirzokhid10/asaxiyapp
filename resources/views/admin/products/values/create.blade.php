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
                            <form action="{{ route('admin.products.values.store', $product->id) }}" method="POST">
                                @csrf

                                 Select Characteristic
                                <div class="form-group">
                                    <label for="product_character_id"></label>
                                    <select class="form-control" name="product_character_id" id="product_character_id" required>
                                        <option value="">-- Select Characteristic --</option>
                                        @foreach ($characteristics as $char)
                                            <option value="{{ $char->id }}" data-type="{{ $char->type }}">
                                                {{ $char->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group value-field d-none" id="field-multiselect">
                                    <label>Select Multiple Options</label>
                                    <select class="form-control" name="option_id[]" multiple>
                                        @foreach ($characteristics->find(old('product_character_id'))->options ?? [] as $opt)
                                            <option value="{{ $opt->id }}">{{ $opt->label }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div id="characteristic-value-fields">
                                    <!-- JS will inject the correct input here -->
                                </div>

                                {{-- Dynamic Inputs --}}
                                <div class="form-group value-field d-none" id="field-string">
                                    <label>Value (Text)</label>
                                    <input type="text" class="form-control" name="value_string" value="{{ old('value_string') }}">
                                </div>

                                <div class="form-group value-field d-none" id="field-integer">
                                    <label>Value (Integer)</label>
                                    <input type="number" class="form-control" name="value_integer" value="{{ old('value_integer') }}">
                                </div>

                                <div class="form-group value-field d-none" id="field-decimal">
                                    <label>Value (Decimal)</label>
                                    <input type="number" step="0.01" class="form-control" name="value_decimal" value="{{ old('value_decimal') }}">
                                </div>

                                <div class="form-group value-field d-none" id="field-boolean">
                                    <label>Value (Yes/No)</label>
                                    <select class="form-control" name="value_boolean">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('value_boolean') == '1' ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ old('value_boolean') == '0' ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>

                                <div class="form-group value-field d-none" id="field-date">
                                    <label>Value (Date)</label>
                                    <input type="date" class="form-control" name="value_date" value="{{ old('value_date') }}">
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
        const allCharacteristics = @json($characteristics);

        document.getElementById('product_character_id').addEventListener('change', function () {
            let charId = this.value;
            let char = allCharacteristics.find(c => c.id == charId);
            let container = document.getElementById('characteristic-value-fields');
            container.innerHTML = '';

            if (!char) return;


            switch (char.type) {
                case 'string':
                    container.innerHTML = `
                    <div class="form-group">
                        <label>Value (string)</label>
                        <input type="text" name="value_string" class="form-control">
                    </div>`;
                    break;

                case 'integer':
                    container.innerHTML = `
                    <div class="form-group">
                        <label>Value (integer)</label>
                        <input type="number" name="value_integer" class="form-control">
                    </div>`;
                    break;

                case 'decimal':
                    container.innerHTML = `
                    <div class="form-group">
                        <label>Value (decimal)</label>
                        <input type="text" name="value_decimal" class="form-control">
                    </div>`;
                    break;

                case 'boolean':
                    container.innerHTML = `
                    <div class="form-group">
                        <label>Value (boolean)</label>
                        <select name="value_boolean" class="form-control">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>`;
                    break;

                case 'date':
                    container.innerHTML = `
                    <div class="form-group">
                        <label>Value (date)</label>
                        <input type="date" name="value_date" class="form-control">
                    </div>`;
                    break;

                case 'select':
                case 'multiselect':
                    let options = char.options || [];
                    let html = `<div class="form-group">
                    <label>${char.name}</label>
                    <select name="option_id[]" class="form-control" multiple>`;
                    options.forEach(opt => {
                        html += `<option value="${opt.id}">${opt.label}</option>`;
                    });
                    html += `</select></div>`;
                    container.innerHTML = html;
                    break
            }
        });
    </script>
@endpush
