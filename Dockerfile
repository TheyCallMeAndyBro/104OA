FROM php:8.2-fpm

# 安裝 PHP 擴展
RUN docker-php-ext-install pdo pdo_mysql

# 設定工作目錄
WORKDIR /var/www

# 複製專案檔案
COPY . .

# 安裝 Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# 安裝 Laravel 依賴
RUN composer install --no-dev --optimize-autoloader

# 啟動 PHP-FPM
CMD ["php-fpm"]
