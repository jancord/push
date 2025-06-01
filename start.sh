#!/bin/bash

# Composer で依存関係をインストール
composer install --no-dev --optimize-autoloader

# Laravel キャッシュクリア
php artisan config:clear
php artisan route:clear
php artisan view:clear

# マイグレーション実行（DB構築）
php artisan migrate --force

# Apache 起動
apache2-foreground

