# Development Guide

## Persiapan

Kebutuhan lokal: PHP 8.2+, Composer, MySQL, Node.js, dan npm.

```powershell
Copy-Item .env.example .env
composer install
php artisan key:generate
```

Sesuaikan `DB_*` pada `.env`, buat database tujuan, kemudian jalankan:

```powershell
php artisan migrate
```

`AUTH_API_TOKEN_EXPIRATION` mengatur masa aktif bearer token API dalam menit; default development adalah `60`.

## Menjalankan aplikasi

Backend Laravel:

```powershell
php artisan serve
```

Asset frontend Laravel:

```powershell
npm install
npm run dev
```

Livewire tidak membutuhkan server Node terpisah. `npm run dev` hanya menjalankan Vite untuk asset CSS/JavaScript. Untuk build production:

```powershell
npm run build
```

Halaman web utama:

- `/login`
- `/register`
- `/dashboard`

API contract utama tersedia di `/api/v1/auth/*`; `/api/auth/*` dipertahankan sementara untuk client lama.

## Verifikasi

```powershell
php artisan test
```

Hasil verifikasi terakhir: 10 test lulus dengan 47 assertion.

File ini hanya diperbarui jika dependency atau infrastruktur baru menambahkan command instalasi, build, worker, scheduler, atau service yang harus dijalankan.
