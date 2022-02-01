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

### 3. Create and `Setup` .env file (DB)
```bash
cp .env.example .env
```

### 4. Generate key
```bash
php artisan key:generate
```

### 5. Migrate database
```bash
php artisan migrate:fresh --seed
```

### 4. Run application
```bash
php artisan serve
```
