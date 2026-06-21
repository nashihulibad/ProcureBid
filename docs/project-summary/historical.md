# Historical Milestones

Dokumen ini hanya mencatat perubahan fundamental, bukan perubahan visual atau perbaikan kecil.

## Inisialisasi aplikasi

- Backend Laravel 11 dibuat sebagai fondasi aplikasi.
- Database aplikasi diarahkan ke MySQL.
- Endpoint health check `/api/health` ditambahkan untuk memeriksa status API.

## Authentication dasar

- Laravel Sanctum ditambahkan sebagai autentikasi bearer token.
- Migration user, session, password reset, dan personal access token tersedia.
- Endpoint register, login, profil user, dan logout dibuat.
- Route profil dan logout dilindungi middleware `auth:sanctum`.
- Password policy minimum 12 karakter dengan kombinasi karakter diterapkan.
- Feature test dasar untuk health check, register, login, dan profil dibuat.

## Fondasi Livewire dan API v1

- Livewire 3 dipasang sebagai UI utama dalam Laravel monolith; Alpine tersedia melalui bundle Livewire tanpa package terpisah.
- Halaman web login, register, dan dashboard dibuat dengan session authentication.
- Business logic register dan autentikasi dipindahkan ke shared Action yang digunakan oleh Livewire dan API.
- API auth versi `/api/v1` ditambahkan; endpoint lama `/api/auth` dipertahankan sebagai compatibility alias.
- API memakai Form Request, API Resource, bearer token ber-expiry, token ability, dan rate limiter.
- Test Livewire dan API mencakup register, login, profil, logout, expiry, ability, dan revocation; seluruh 10 test lulus dengan 47 assertion.

## Dokumentasi arsitektur

- Konsep Sanctum, JWT, SSO/OIDC, MFA, Active Directory, dan integrasi service-to-service dirangkum sebagai arah pengembangan authentication.
