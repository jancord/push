<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * このアプリケーションの「ホーム」ルート。
     *
     * @var string
     */
    public const HOME = '/products'; // ← ここを修正！

    // 以下省略（この行だけ変えればOK）
}
