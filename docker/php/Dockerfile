FROM php:8.2-fpm

# Устанавливаем зависимости и PHP-расширения
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo pdo_mysql gd

# Устанавливаем Node.js и npm
RUN curl -fsSL https://deb.nodesource.com/setup_lts.x | bash - && \
    apt-get install -y nodejs && \
    apt-get clean

# Устанавливаем Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Проверяем версии Node.js и npm (опционально, для отладки)
RUN node -v && npm -v \

RUN groupadd web \
    useradd -s /bin/bash -u 1000 -g web user123 \
    usermod -aG web www-data \
    cd /var/www \
    chown -R user123:web html \
    chmod -R 774 html \
    umask



# Устанавливаем рабочую директорию
WORKDIR /var/www

# Запускаем php-fpm
CMD ["php-fpm"]

