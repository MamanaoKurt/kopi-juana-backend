# Kopi Juana — Laravel-ready website package

This zip contains the custom app files for a Laravel website based on the Kopi Juana design.

## Important
This is **not a full Laravel framework download**. It is the ready-made custom code that should be placed inside a fresh Laravel project.

## Best setup
1. Create a fresh Laravel project on your machine or in Laravel Cloud.
2. Copy these folders into that project.
3. Replace matching files when asked.
4. Set the environment values below.
5. Run migrations and storage link.

## Required `.env` values

```env
APP_NAME="Kopi Juana"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com

DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database/database.sqlite

FILESYSTEM_DISK=public
KOPI_ADMIN_PASSWORD=kopijuanatalaadmin
```

You can also use MySQL if you prefer.

## Commands

```bash
php artisan migrate
php artisan storage:link
```

## Routes
- `/` public home page
- `/gallery` public gallery page
- `/admin/login` admin password page
- `/admin/gallery` admin upload page
- `/logout-admin` admin logout

## Upload rules
- Allowed: jpg, jpeg, png, webp
- Max size: 5 MB
- Uploads are stored in `storage/app/public/gallery`

## Notes
- Facebook buttons redirect to the page you provided.
- Video is included as a local file and set to autoplay muted by default because browsers normally block autoplay with sound.
- A manual unmute button is included in the site UI.
