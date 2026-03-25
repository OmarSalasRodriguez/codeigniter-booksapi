# Docker MySQL 
docker run -d \
--name books-api \
-e MYSQL_ROOT_PASSWORD=pass123 \
-e MYSQL_DATABASE=books \
-e MYSQL_USER=book \
-e MYSQL_PASSWORD=pass123 \
-p 3306:3306 \
-v mysql_data:/var/lib/mysql \
mysql:8

# MySQL user
CREATE USER 'book'@'%' IDENTIFIED BY 'pass123';
GRANT ALL PRIVILEGES ON books.* TO 'book'@'%';
FLUSH PRIVILEGES;

# Docker Redis
docker exec -it books-api bash

# Seeders
php artisan make:seeder BooksTableSeeder
php artisan db:seed