@extends('layouts.app')

@section('content')
<div class="container">
    <h1>詳細</h1>

    <div class="card mt-3">
        <div class="card-body">
            <p><strong>製品番号：</strong> {{ $product->product_code }}</p>
            <p><strong>製品名：</strong> {{ $product->product_name }}</p>
            <p><strong>数量：</strong> {{ $product->quantity }}</p>
            <p><strong>価格：</strong> ¥{{ number_format($product->price) }}</p>
        </div>
    </div>

    <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">戻る</a>
</div>
@endsection
