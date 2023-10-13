## Установка проекта

### Клонирование репозитория


`git clone https://github.com/BakhtiyarTayir/catalog.git`


### Установка зависимостей

`composer install` 

## Настройка окружения

### Настройка `.env` файла

Скопируйте `.env.example` и переименуйте в `.env`, затем отредактируйте настройки базы данных и другие переменные окружения.


DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password


### Генерация ключа

`php artisan key:generate`

## Миграции и Seeders

### Запуск миграций


`php artisan migrate`


### Заполнение таблиц данными


`php artisan db:seed`

## Аутентификация через Sanctum


## Работа с API

### Регистрация и авторизация

- Регистрация: `POST /api/register`
- Авторизация: `POST /api/login`

## Роуты API

### Работа с товарами

#### Получение списка товаров
- `GET /api/products`

#### Получение товара по ID
- `GET /api/products/{id}`

#### Добавление нового товара
- `POST /api/products`

#### Обновление информации о товаре
- `PUT /api/products/{id}`

#### Удаление товара
- `DELETE /api/products/{id}`

#### Фильтрация товаров
- `GET /api/products`

#### Получение товара по slug
- `GET /api/products-slug/{slug}`

### Работа с категориями

#### Получение списка категорий
- `GET /api/categories`

#### Получение категории по ID
- `GET /api/categories/{id}`

#### Добавление новой категории
- `POST /api/categories`

#### Обновление информации о категории
- `PUT /api/categories/{id}`

#### Удаление категории
- `DELETE /api/categories/{id}`

### Работа с атрибутами товаров

#### Получение списка всех атрибутов
- `GET /api/product-attributes`

#### Добавление нового атрибута
- `POST /api/product-attributes`

#### Удаление атрибута по ID
- `DELETE /api/product-attributes/{id}`


### Корзина

- Добавление товара в корзину: `POST /api/cart`
  - JSON параметры: `product_id`, `quantity`

### Заказы

- Оформление заказа: `POST /api/order`
  - JSON параметры: `email`, `phone`, `address`

---