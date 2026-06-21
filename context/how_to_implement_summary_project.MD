# Context: Memperbarui Project Summary Setelah Implementasi

Gunakan instruksi ini setiap mengerjakan fitur atau memasang teknologi baru pada proyek.

## Tujuan

Setelah implementasi selesai, perbarui dokumentasi di `docs/project-summary` agar mencerminkan hasil pekerjaan, teknologi yang benar-benar digunakan, cara menjalankannya, dan pekerjaan lanjutan yang belum matang.

Dokumentasi harus ringkas dan ditulis untuk Tech Lead: fokus pada keputusan, alur teknis, trade-off penting, dan status implementasi. Hindari penjelasan akademis yang terlalu panjang.

## File yang harus dievaluasi

### `historical.md`

Perbarui untuk setiap permintaan yang menghasilkan fitur atau perubahan fundamental, misalnya:

- login dan register;
- ERD atau migration domain utama;
- auction;
- realtime chat;
- payment;
- integrasi HRIS;
- pemasangan Sanctum, Pusher, WebSocket, queue, atau teknologi utama lain.

Catat secara ringkas:

- fitur atau permintaan yang dikerjakan;
- hasil implementasi utamanya;
- endpoint, module, atau kemampuan penting yang ditambahkan;
- hasil verifikasi atau test bila relevan.

Jangan mencatat perubahan kecil seperti warna button, spacing, copy, rename minor, atau refactor kosmetik.

### `tech-spec.md`

Perbarui hanya jika ada perubahan teknologi yang benar-benar sudah diimplementasikan, misalnya package, framework, database, cache, queue, WebSocket, message broker, atau layanan eksternal baru.

Tuliskan:

- nama dan fungsi teknologi;
- versi atau driver jika dapat diverifikasi;
- posisi teknologi dalam arsitektur;
- pola komunikasi atau penyimpanan yang digunakan;
- dampak penting terhadap komponen lain.

Jangan memasukkan teknologi yang masih berupa ide, opsi, atau rencana.

### `guide.md`

Perbarui hanya jika implementasi menambah langkah yang harus dilakukan developer atau operator, seperti:

- command instalasi package;
- migration atau seeding;
- environment variable baru;
- command build;
- queue worker, scheduler, WebSocket server, atau service tambahan;
- langkah menjalankan dan memverifikasi integrasi.

Jangan mengubah file ini jika tidak ada command atau langkah operasional baru.

Jangan menulis nilai secret. Gunakan placeholder dan sebutkan nama environment variable saja.

### `next-steps.md`

Masukkan kekurangan, hardening, optimasi, atau penyempurnaan yang belum dikerjakan, misalnya:

- implementasi masih minimum viable;
- error handling belum lengkap;
- security hardening;
- scaling dan observability;
- test yang belum tersedia atau masih gagal;
- fallback, retry, idempotency, atau recovery flow;
- fitur lanjutan yang sengaja ditunda.

Urutkan berdasarkan prioritas. Jangan menduplikasi fitur yang sudah selesai. Jika suatu item sudah diimplementasikan, hapus atau ubah item tersebut.

### Dokumentasi fitur khusus

Untuk fitur yang membutuhkan pembahasan arsitektur, buat atau perbarui dokumen khusus seperti `auth-documentation.md`.

Gunakan format:

1. implementasi saat ini;
2. konsep dan alur teknis;
3. pilihan teknologi;
4. kelebihan dan trade-off;
5. integrasi dengan sistem lain;
6. arah evolusi ketika sistem menjadi lebih kompleks;
7. referensi resmi bila riset diperlukan.

Dokumen khusus tidak wajib untuk perubahan sederhana.

## Alur kerja wajib

1. Baca source code, dependency manifest, migration, konfigurasi, dan test yang relevan.
2. Bedakan dengan jelas antara yang sudah diimplementasikan dan yang masih disarankan.
3. Implementasikan serta verifikasi fitur sesuai permintaan utama.
4. Perbarui hanya file project summary yang relevan berdasarkan aturan di atas.
5. Pastikan nama teknologi, versi, endpoint, command, dan status test sesuai repository.
6. Pada response akhir, sebutkan file summary yang diperbarui dan saran penting yang ditempatkan di `next-steps.md`.

## Prinsip utama

- Source code dan hasil test adalah source of truth.
- `historical.md` menjawab: “permintaan fundamental apa yang sudah selesai dikerjakan?”
- `tech-spec.md` menjawab: “teknologi apa yang benar-benar dipakai dan untuk apa?”
- `guide.md` menjawab: “apa yang harus dijalankan atau dikonfigurasi?”
- `next-steps.md` menjawab: “apa yang masih kurang atau perlu ditingkatkan?”
- Jangan mengklaim rencana sebagai implementasi.
- Jangan memenuhi dokumentasi dengan detail yang belum dibutuhkan oleh kompleksitas sistem saat ini.
