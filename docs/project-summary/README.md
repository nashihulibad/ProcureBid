# Project Summary

Folder ini adalah konteks ringkas untuk memahami proyek dan melanjutkan pengembangan tanpa membaca ulang seluruh repository.

## Struktur dokumen

| File | Fungsi | Kapan diperbarui |
|---|---|---|
| `historical.md` | Riwayat permintaan fitur/teknologi fundamental yang sudah dikerjakan | Setelah implementasi penting selesai |
| `next-steps.md` | Saran dan pekerjaan lanjutan yang belum dikerjakan | Setelah implementasi menghasilkan follow-up penting |
| `tech-spec.md` | Teknologi yang benar-benar sudah digunakan | Hanya ketika stack, library, atau infrastruktur berubah |
| `guide.md` | Perintah instalasi dan menjalankan sistem | Ketika ada command atau dependency operasional baru |
| `auth-documentation.md` | Catatan arsitektur khusus fitur authentication | Ketika desain auth berubah secara substansial |

## Aturan pemeliharaan

- Setiap fitur atau teknologi fundamental yang selesai diimplementasikan masuk `historical.md`.
- Perubahan UI kecil, rename minor, atau perbaikan kosmetik tidak masuk historical.
- Saran tidak boleh ditulis seolah sudah diimplementasikan; tempatnya di `next-steps.md`.
- Teknologi yang masih berupa opsi tidak masuk `tech-spec.md`.
- `guide.md` tidak perlu berubah jika implementasi tidak menambah command atau langkah operasional.
- Item `next-steps.md` harus dihapus atau diperbarui ketika sudah diselesaikan.
- Dokumentasi fitur kompleks dibuat terpisah dengan format: konsep, pilihan teknis, trade-off, integrasi, dan arah evolusi.
