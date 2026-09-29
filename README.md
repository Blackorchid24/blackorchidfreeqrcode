# Blackorchid Free QR Code Generator

Laravel 12 + MySQL + Tailwind CSS + Google OAuth + QR generation with optional image logo.

## Requirements

- Windows + XAMPP
- PHP 8.2+
- MySQL
- Composer
- Node.js + npm
- PHP GD extension enabled
- PHP OpenSSL/cURL enabled

## Installation

1. Create the database in phpMyAdmin:

```sql
CREATE DATABASE blackorchid_qrcode CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

2. Open a terminal in this project folder.

3. Install PHP dependencies:

```bash
composer install
```

4. Generate the application key:

```bash
php artisan key:generate
```

5. Create the storage link:

```bash
php artisan storage:link
```

6. Run migrations and create the administrator:

```bash
php artisan migrate --seed
```

7. Install and build frontend assets:

```bash
npm install
npm run build
```

8. Start Laravel:

```bash
php artisan serve
```

Open:

- Client: http://127.0.0.1:8000
- Admin: http://127.0.0.1:8000/admin/login

## Default admin

Username: `blackorchidadmin`

Password: `BlackorchidAdmin@123`

Change this password before production use.

## Google Sign-In

Create OAuth credentials in Google Cloud Console and set:

```env
GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
GOOGLE_REDIRECT_URI=http://127.0.0.1:8000/auth/google/callback
```

The exact callback URL must be registered in the Google OAuth client.

## PHP GD

QR logo processing uses GD. In XAMPP open:

`C:\xampp\php\php.ini`

Make sure this line is enabled:

```ini
extension=gd
```

Restart Apache after changing php.ini.

## SSL / Google OAuth

If PHP reports `cURL error 60`, configure the CA certificate in `php.ini` with a current `cacert.pem`:

```ini
curl.cainfo="C:\path\to\cacert.pem"
openssl.cafile="C:\path\to\cacert.pem"
```

Restart Apache and your terminal after saving.

## Production

Do not use the included development `.env` or default admin password in production. Use HTTPS, strong credentials, a proper mail configuration, and production-safe storage.
