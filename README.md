## Документация API

Посмотреть документацию можно на сервере:  
[http://v73415.hosted-by-vdsina.com/api/documentation/#/Notes](http://v73415.hosted-by-vdsina.com/api/documentation/#/Notes)

## Используемые технологии
- Laravel 10
- PHP 8.3
- SQLite

## Установка

1. **Предварительные требования**:
   - Убедитесь, что установлены:
     - SQLite (`sudo apt install sqlite3 php-sqlite3`)
     - Composer

2. **Развертывание**:
   ```
   git clone https://github.com/yourusername/notes-api-test.git
   cd notes-api-test
   composer install
   cp .env.example .env
   php artisan key:generate
   ```
3. **Настройка базы данных**
```
touch database/database.sqlite
chmod 664 database/database.sqlite
php artisan migrate
php artisan serve
```
   
   
