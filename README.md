# ctif-laravel-task  

## Зависимости:  
* PHP: ver. 7.4.27+  
* Laravel: ver. 8.83.5+  
* MySQL: ver. 10.4.18-MariaDB+  

## Инструкция по установке:  
1. Установить пакеты и зависимости: `composer install`.  
2. Создать файл конфигурации .env: `cp .env.example .env`.  
3. Настроить подключение к базе данных: файл .env -> строки 11-16.  
4. Сгенерировать ключ шифрования сессий и кук: `php artisan key:generate`.  
5. Запустить миграции и наполнить таблицы необходимыми данными: `php artisan migrate --seed`.  
6. Запустить приложение: `php artisan serve`.  

## Примечания:
  — По умолчанию UserSeeder создаёт пользователя с ролью администратора и пять операторов районов.
  
  **Учётная запись администратора:**  
  **Login:** admin@localhost  
  **Password:** admin@localhost  
  
  **Учётные записи операторов районов:**  
  **Login:** operator_raion_100@localhost (где 100 - код района в таблице `districts`)  
  **Password:** operator_raion
