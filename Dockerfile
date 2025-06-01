FROM php:8.2-apache

# パッケージインストール
RUN apt-get update && apt-get install -y \
    unzip zip git curl libzip-dev libonig-dev libxml2-dev libpng-dev libjpeg-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Apacheのmod_rewrite有効化
RUN a2enmod rewrite

# Composerインストール
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

# Laravelのpublicをドキュメントルートに設定
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf

# 作業ディレクトリ
WORKDIR /var/www/html

# アプリのコードをコピー
COPY . .

# 権限設定
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# start.sh 経由で起動
CMD ["./start.sh"]

