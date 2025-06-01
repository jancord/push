# 製品管理アプリ

## アプリケーション名
製品管理アプリ（在庫管理システム）

## アプリケーションを作成した背景
未経験からのエンジニア転職を目指しており、実務を意識したCRUDアプリケーションをLaravelでゼロから構築しました。製品情報を登録・管理できる機能を通して、バリデーション・レイアウト・認証・デプロイなどWebアプリ開発の基礎力を習得することを目的としました。

## アプリケーション概要
- 製品の登録・一覧表示・編集・削除が可能
- バリデーションエラー・登録完了メッセージ表示対応
- 製品番号による並び替え機能付き
- Bootstrapによる見やすいデザイン
- ログイン認証あり（マルチユーザー化予定）

## テスト用アカウント
- メールアドレス：`demo@example.com`  
- パスワード：`password`

## 利用方法
1. ログイン後、製品の登録ボタンから製品情報を追加
2. 製品一覧ページで編集・削除・並び替え可能

## 開発環境
- macOS 15.5 (24F74)
- PHP 8.4.7
- Laravel 12.x
- MySQL
- VS Code

## 使用技術
- Laravel 12.x
- PHP 8.4.x
- MySQL
- Bootstrap 5
- Bladeテンプレートエンジン
- Laravel Breeze（認証機能）

## ローカルでの動作方法

```bash
# プロジェクトをクローン
git clone https://github.com/your-username/your-repo.git

# プロジェクトディレクトリに移動
cd your-repo

# 依存パッケージをインストール
composer install
npm install && npm run dev

# 環境ファイルのコピーとキー生成
cp .env.example .env
php artisan key:generate

# .env を編集して DB 接続情報を設定

# マイグレーション実行
php artisan migrate

# サーバー起動
php artisan serve
