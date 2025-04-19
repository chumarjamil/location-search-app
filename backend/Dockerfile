FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . /var/www/html

# Generate a Laravel key
RUN touch .env && php -r "file_put_contents('.env', 'APP_KEY=base64:'.substr(base64_encode(random_bytes(32)), 0, 32).PHP_EOL);"

# Run simple PHP server
CMD php -S 0.0.0.0:8000 -t public 