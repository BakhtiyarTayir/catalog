## Установка проекта

### Клонирование репозитория

\`\`\`
git clone https://github.com/BakhtiyarTayir/catalog.git
\`\`\`

### Установка зависимостей

\`\`\`
composer install
\`\`\`

## Настройка окружения

### Настройка `.env` файла

Скопируйте `.env.example` и переименуйте в `.env`, затем отредактируйте настройки базы данных и другие переменные окружения.

\`\`\`
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
\`\`\`

### Генерация ключа

\`\`\`
php artisan key:generate
\`\`\`

## Миграции и Seeders

### Запуск миграций

\`\`\`
php artisan migrate
\`\`\`

### Заполнение таблиц данными

\`\`\`
php artisan db:seed
\`\`\`

## Аутентификация через Sanctum

### Установка Sanctum

\`\`\`
composer require laravel/sanctum
\`\`\`

### Публикация конфигурации

\`\`\`
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
\`\`\`

### Миграция

\`\`\`
php artisan migrate
\`\`\`

## Работа с API

### Регистрация и авторизация

- Регистрация: `POST /api/register`
- Авторизация: `POST /api/login`

### Корзина

- Добавление товара в корзину: `POST /api/cart`
  - JSON параметры: `product_id`, `quantity`

### Заказы

- Оформление заказа: `POST /api/order`
  - JSON параметры: `email`, `phone`, `address`

---