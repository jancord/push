@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">
            <h1 class="h3 text-primary mb-4">
                <i class="fas fa-plus-circle me-2"></i>製品の新規登録
            </h1>

            {{-- バリデーションエラー表示 --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('products.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="product_code" class="form-label">
                        <i class="fas fa-barcode me-1"></i>製品番号
                    </label>
                    <input type="text" name="product_code" id="product_code" class="form-control" placeholder="例：ABC1234" value="{{ old('product_code') }}" required>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">
                        <i class="fas fa-box-open me-1"></i>製品名
                    </label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="例：スニーカー" value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">
                        <i class="fas fa-sort-numeric-up me-1"></i>数量
                    </label>
                    <input type="number" name="quantity" id="quantity" class="form-control" placeholder="例：10" value="{{ old('quantity') }}" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">
                        <i class="fas fa-yen-sign me-1"></i>価格
                    </label>
                    <input type="number" name="price" id="price" class="form-control" placeholder="例：3000" value="{{ old('price') }}" required>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check me-1"></i>登録
                    </button>
                    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary ms-2">
                        戻る
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
