# CodeIgniter Books API

Books REST API built with CodeIgniter 4.

## Docker Setup

### MySQL Container
```bash
docker run -d \
  --name books-api \
  -e MYSQL_ROOT_PASSWORD=pass123 \
  -e MYSQL_DATABASE=books \
  -e MYSQL_USER=book \
  -e MYSQL_PASSWORD=pass123 \
  -p 3306:3306 \
  -v mysql_data:/var/lib/mysql \
  mysql:8
```

### MySQL Configuration
```sql
CREATE USER 'book'@'%' IDENTIFIED BY 'pass123';
GRANT ALL PRIVILEGES ON books.* TO 'book'@'%';
FLUSH PRIVILEGES;
```

### Connect to Container
```bash
docker exec -it books-api bash
```

## CodeIgniter Commands

### Server
```bash
php spark serve
```

### Migrations
```bash
# Run pending migrations
php spark migrate

# Rollback last migration
php spark migrate:rollback

# Reset migrations
php spark migrate:refresh

# Seed database
php spark db:seed BookSeeder
```

### Database (requires database configured in .env)
```bash
# Show tables
php spark db:table

# Create migration
php spark make:migration create_books_table

# Create seeder
php spark make:seeder BookSeeder
```

### Cache
```bash
# Clear all cache
php spark cache:clear

# Clear only views cache
php spark cache:clearview
```

### Environment
```bash
# Create .env from env template
cp env .env
```

### Routes
```bash
# List all routes
php spark routes
```

### Console
```bash
# Run shell (interactive)
php spark shell
```

### Help
```bash
php spark help
```

## Installation

```bash
# Install dependencies
composer install

# Copy and configure environment
cp env .env

# Run migrations
php spark migrate

# Seed database
php spark db:seed BookSeeder

# Start server
php spark serve
```

## API Endpoints

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | /api/books | List all books |
| GET | /api/books/{id}?include=author | Get book by ID |
| POST | /api/books | Create book |
| PUT | /api/books/{id} | Update book |
| DELETE | /api/books/{id} | Delete book |

## Configuration

Update `.env` with your database credentials:

```env
database.default.hostname = localhost
database.default.database = books
database.default.username = book
database.default.password = pass123
```
