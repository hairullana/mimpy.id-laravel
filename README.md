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
cd mimpy.id-laravel
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

## INTERFACE
<img width="960" alt="home" src="https://user-images.githubusercontent.com/71582007/197487905-69dcb249-b58b-45a5-b601-97afb0d14181.PNG">
<img width="960" alt="service" src="https://user-images.githubusercontent.com/71582007/197488052-d2403688-e74e-44b0-b906-8bfb78600618.PNG">
<img width="960" alt="job" src="https://user-images.githubusercontent.com/71582007/197488092-7c543000-1ae1-423d-af19-5a78b574bb30.PNG">
<img width="960" alt="about" src="https://user-images.githubusercontent.com/71582007/197488145-bd2d63a7-500d-48de-94a8-d4a22a01beec.PNG">
<img width="960" alt="register" src="https://user-images.githubusercontent.com/71582007/197488176-c08cd81d-620e-49e3-abb5-bbe2990db210.PNG">
<img width="960" alt="logim" src="https://user-images.githubusercontent.com/71582007/197488183-31467639-a9d2-4c34-9db5-6363e6b936be.PNG">



