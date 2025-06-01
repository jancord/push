# 製品管理アプリ

## アプリケーションを作成した背景
在庫管理を紙やExcelで行っている現場が多く、ミスや手間がかかると感じていました。  
Laravelを使って簡単に在庫を管理できるWebアプリを作りたいと思い、本アプリを作成しました。

## アプリケーション概要
製品番号・製品名・数量・価格を登録し、編集・削除・一覧表示ができるシンプルなCRUDアプリです。  
Bootstrapを用いたデザイン、バリデーションエラー表示、フラッシュメッセージにも対応しています。

## URL
※デプロイしていればURLを記載  
例：`https://your-app-name.onrender.com`

## テスト用アカウント
- メールアドレス: `test@example.com`  
- パスワード: `password`

## 利用方法
1. トップページから「製品登録」をクリック  
2. 必要な情報（製品番号、製品名、数量、価格）を入力して登録  
3. 一覧ページから編集・削除が可能  

## トップページのスクリーンショット
※画像がある場合：  
`![スクリーンショット](public/images/screenshot.png)`

## 開発環境
- macOS 15.5
- Visual Studio Code

## 使用技術
- Laravel 12.x
- PHP 8.4.x
- MySQL
- Bootstrap 5

## ローカルでの動作方法

```bash
git clone https://github.com/jancord/push.git
cd push
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate
php artisan serve


## 工夫したポイント
- バリデーションエラーや登録成功時のフラッシュメッセージを明示的に表示  
- 製品番号による並び替え  
- Bootstrap による見やすくシンプルなUI設計  

## 実装予定の機能
- 日本語バリデーションメッセージの追加  
- ログインユーザーごとのデータ管理（マルチユーザー化）  
- 検索・絞り込み機能の追加  
- デザインの微調整（余白・カラー・見出しなど）

