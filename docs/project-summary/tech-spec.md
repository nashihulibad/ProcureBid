# Technical Specification

Dokumen ini hanya mencatat teknologi yang sudah menjadi bagian proyek, bukan kandidat teknologi.

## Stack aktif

| Area | Teknologi | Versi/driver |
|---|---|---|
| Runtime | PHP | `^8.2` |
| Backend | Laravel | `11.54.0` |
| Server-driven UI | Livewire | `3.8.1` |
| Authentication | Laravel Sanctum | `4.3.2` |
| Database | MySQL | Driver `mysql` |
| Testing | PHPUnit | `^10.5` |
| Asset build | Vite | `5.4.21` |
| HTTP client frontend | Axios | `1.18.0` |

## Pola implementasi aktual

- Aplikasi masih berbentuk Laravel monolith.
- Endpoint API didefinisikan di `routes/api.php`.
- Halaman web menggunakan Blade + Livewire dan session authentication.
- API menggunakan Sanctum personal access token yang disimpan di database.
- Model data menggunakan Eloquent ORM dan migration Laravel.
- Response endpoint yang tersedia memakai envelope `success`, `message`, dan `data`.
- Business logic auth berada di Action dan digunakan bersama oleh Livewire component serta API controller.
- Contract API baru menggunakan prefix `/api/v1`; endpoint `/api/auth` tetap tersedia sementara untuk kompatibilitas.
- Alpine.js yang diperlukan Livewire dibundel oleh Livewire, bukan dependency terpisah.

## Belum menjadi bagian stack

React, Inertia, Docker Compose, Redis sebagai service runtime, RabbitMQ, Kafka, WebSocket, OAuth/OIDC provider, dan message broker belum diimplementasikan. Jika salah satunya dipasang karena kebutuhan fitur, pindahkan ke stack aktif dan catat dampak arsitekturnya di file ini.
