1. clone
2. composer install
3. config/database (настроить логин/пароль и таблицу базы, а так же тип ( по стандарту mysql))
4. скопировать .env.example как .env, поменяв данные базы (13 строка)
5. php artisan storage:link
6. php artiasn migrate
7. php artisan db:seed
8. php artisan key:generate
9. php artisan serve

логин admin@admin.ru
пароль admin
