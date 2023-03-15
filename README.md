# Mimpy.ID - Laravel

Same as [`Mimpy.ID - https://github.com/hairullana/mimpy.id`](https://github.com/hairullana/mimpy.id) but use Laravel v8

Overall done, but I want to improve the frontend (but I'm weak here).
Besides that I want to add some new features in the future.

---------

## INSTALLING

### 1. Clone this repo
```bash
git clone https://github.com/hairullana/mimpy.id-laravel
```

### 2. Change directory
```bash
cd gabut-chat
```

### 3. Create and `Setup` .env file (syntax in linux terminal)
```bash
cp .env.example .env
```

### 4. Install composer
```bash
composer install
```
if you get an error, use this command
```bash
composer update
```

### 5. Generate key
```bash
php artisan key:generate
```

### 6. Migrate database dan seeding
```bash
php artisan migrate:fresh --seed
```

### 7. Activate laravel storage
```bash
php artisan artisan storage:link
```

### 8. Run application
```bash
php artisan serve
```
