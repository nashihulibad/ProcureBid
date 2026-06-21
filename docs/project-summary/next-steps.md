# Next Steps

Dokumen ini menampung pekerjaan lanjutan yang belum dianggap selesai.

## Prioritas keamanan

1. Upgrade Laravel secara bertahap ke versi yang sudah memperbaiki advisory dependency; audit saat ini menemukan tiga advisory framework, termasuk CRLF injection ber-severity tinggi. Laravel 11 tidak mempunyai versi aman dalam rentang advisory tersebut.
2. Upgrade Vite setelah memeriksa kompatibilitas Laravel Vite Plugin; audit npm memerlukan major upgrade untuk menutup dua advisory development server.
3. Tambahkan throttling pada action login/register Livewire. Rate limiter saat ini sudah aktif untuk endpoint API, tetapi belum membatasi request update Livewire per akun/IP.
4. Terapkan email verification dan tentukan pembatasan akses bagi akun yang belum terverifikasi.

## Penyempurnaan authentication

- Tambahkan logout seluruh perangkat dan scheduled token pruning.
- Tambahkan forgot/reset password serta pencabutan sesi setelah reset.
- Tambahkan MFA/passkey ketika risiko bisnis membutuhkannya.
- Migrasikan seluruh consumer ke `/api/v1`, lalu tentukan jadwal penghentian endpoint `/api/auth` legacy.

## Implementasi reverse auction

- Finalisasi `goals_auction.MD`, ERD, status lifecycle, role, dan permission sebelum membuat migration domain.
- Bangun Auction dan Bidding melalui shared Action agar dapat dipakai Livewire serta API.
- Gunakan transaction dan row lock pada bid submission; waktu dan validasi harga wajib berasal dari server.
- Mulai dengan polling Livewire. Pasang Reverb, queue, dan Redis setelah core auction serta concurrency test stabil.

## Di luar cakupan

- React/Inertia belum diperlukan selama kebutuhan UI dapat dipenuhi Livewire.
- Perubahan visual kecil dan refactor kosmetik tidak dicatat sebagai milestone.
