FROM php:8.2-apache

# 必要な PHP 拡張をインストール（bcmath 含む）
RUN apt-get update && apt-get install -y \
    zip unzip git curl libzip-dev libpng-dev libjpeg-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip bcmath

# Composer（Laravelに必須）をインストール
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Apache の mod_rewrite を有効に
RUN a2enmod rewrite

# Laravel のドキュメントルートを public に設定
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf

# 作業ディレクトリを設定
WORKDIR /var/www/html

# アプリケーションのソースをコピー
COPY . .

# 権限設定
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# 起動スクリプトをコピーして実行可能に
COPY start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

# ポート開放
EXPOSE 80

# Laravel 起動スクリプトを実行
CMD ["start.sh"]



