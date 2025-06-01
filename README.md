# 製品管理アプリ

Laravelで作成した在庫管理アプリケーションです。製品の登録・編集・削除・一覧表示が可能です。

---

## アプリ概要

製品番号・製品名・数量・価格を管理するシンプルな CRUD 機能付きの在庫管理ツールです。

---

## URL

（例）https://your-app-name.onrender.com  
※デプロイしていない場合は空欄でもOK

---

## 使用方法

1. 「製品登録」から新しい製品を追加
2. 一覧ページで製品情報を確認
3. 編集・削除ボタンから更新または削除

---

## テスト用アカウント（任意）

- メールアドレス: test@example.com  
- パスワード: password

---

## 開発環境・使用技術

- Laravel 12.x  
- PHP 8.4.x  
- MySQL  
- Bootstrap 5  
- Visual Studio Code  

---

## ローカル環境での実行方法

```bash
git clone https://github.com/ユーザー名/リポジトリ名.git
cd リポジトリ名
cp .env.example .env
php artisan key:generate
composer install
php artisan migrate
php artisan serve
