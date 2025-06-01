#!/bin/bash

# Laravel キャッシュ削除（念のため）
php artisan config:clear
php artisan route:clear
php artisan view:clear

# マイグレーション実行
php artisan migrate --force

# サーバー起動
apache2-foreground

