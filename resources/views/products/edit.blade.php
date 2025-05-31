@extends('layouts.app')

@section('content')
<div class="container">
    <h1>製品の新規登録</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="product_code" class="form-label">製品番号</label>
            <input type="text" name="product_code" id="product_code" class="form-control" value="{{ old('product_code') }}" required>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">製品名</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">数量</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity') }}" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">価格</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}" required>
        </div>

        <button type="submit" class="btn btn-success">登録</button>
    </form>
</div>
@endsection
