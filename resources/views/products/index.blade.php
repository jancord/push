@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">

            {{-- 見出し --}}
            <h1 class="h3 text-center text-info mb-4" style="font-family: 'Segoe UI', 'Hiragino Kaku Gothic ProN', sans-serif;">
                <i class="fas fa-boxes-stacked me-2"></i>🌟 製品一覧 🌟
            </h1>

            {{-- フラッシュメッセージ --}}
            @if (session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
                </div>
            @endif

            {{-- 新規作成ボタン --}}
            <div class="mb-3 text-end">
                <a href="{{ route('products.create') }}" class="btn btn-success">
                    <i class="fas fa-plus me-1"></i> 新規作成
                </a>
            </div>

            {{-- 製品一覧テーブル --}}
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>製品番号</th>
                            <th>製品名</th>
                            <th>数量</th>
                            <th>価格</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>{{ $product->product_code }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ number_format($product->price) }} 円</td>
                                <td>
                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-outline-warning me-1">
                                        <i class="fas fa-pen"></i> 編集
                                    </a>

                                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('本当に削除しますか？')">
                                            <i class="fas fa-trash-alt"></i> 削除
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">登録された製品がありません。</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
