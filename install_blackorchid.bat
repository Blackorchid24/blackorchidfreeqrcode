@echo off
title Blackorchid Free QR Code - Laravel Installer
cd /d "%~dp0"

echo.
echo [1/6] Installing PHP dependencies...
call composer install
if errorlevel 1 goto fail

echo.
echo [2/6] Generating application key...
php artisan key:generate

echo.
echo [3/6] Creating public storage link...
php artisan storage:link

echo.
echo [4/6] Running MySQL migrations and admin seeder...
php artisan migrate --seed

echo.
echo [5/6] Installing frontend dependencies...
call npm install
if errorlevel 1 goto fail

echo.
echo [6/6] Building Tailwind/Vite assets...
call npm run build
if errorlevel 1 goto fail

echo.
echo ==========================================
echo Blackorchid installation completed.
echo Client: http://127.0.0.1:8000
echo Admin:  http://127.0.0.1:8000/admin/login
echo Admin username: blackorchidadmin
echo Admin password: BlackorchidAdmin@123
echo ==========================================
echo.
pause
exit /b 0

:fail
echo.
echo Installation stopped because a command failed.
pause
exit /b 1
