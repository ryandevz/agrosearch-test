@extends('product')

@section('content')
    <form action="{{ route('calculate') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="product_id" class="form-label">Выберите продукт</label>
            <select class="form-select @error('product_id') is-invalid @enderror" 
                    id="product_id" name="product_id" required>
                <option value="" selected disabled>Список продуктов</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                        {{ $product->name }} ({{ $product->price }} EUR)
                    </option>
                @endforeach
            </select>
            @error('product_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="tax_number" class="form-label">Налоговый номер покупателя</label>
            <input type="text" class="form-control @error('tax_number') is-invalid @enderror" 
                   id="tax_number" name="tax_number" 
                   placeholder="Например: DE123456789, IT12345678901, GR123456789" 
                   value="{{ old('tax_number') }}" required>
            <div class="form-text">
                Формат: DE[9 цифр] для Германии, IT[11 цифр] для Италии, GR[9 цифр] для Греции
            </div>
            @error('tax_number')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Рассчитать цену</button>
    </form>
@endsection