<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return redirect('/products');
});

require __DIR__.'/auth.php';

// 🔓 認証不要に変更
Route::resource('products', ProductController::class);

