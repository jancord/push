#!/bin/bash

# ComposerでLaravelの必要なパッケージをインストール
composer install --no-dev --optimize-autoloader

# Laravelのキャッシュをクリア＆再生成
php artisan config:clear
php artisan config:cache

# データベースのテーブルを作る（マイグレーション）
php artisan migrate --force

# Apacheサーバーを起動する
apache2-foreground

