# UTS Pemrograman Web - Dashboard Database AdminLTE v4 [Narendra ilham akbar (2522105026) dan Selvia nur laela salim (2522105087)]

Repositori ini dibuat untuk memenuhi tugas **Ujian Tengah Semester (UTS)** mata kuliah Pemrograman Web. Proyek ini mengintegrasikan template **AdminLTE v4** dengan database **MySQL** lokal menggunakan **XAMPP**.

## 🚀 Fitur Dashboard Saat Ini
*   **Koneksi Real-time ke Database:** Berhasil menghubungkan template AdminLTE dengan MySQL via PHP.
*   **Statistik Dinamis:** Menggunakan fungsi `mysqli_num_rows()` untuk menghitung dan menampilkan total jumlah user dari database pada kotak informasi atas.
*   **Tabel Data Dinamis:** Menampilkan data `ID`, `Nama Lengkap`, dan `Alamat Email` dari database ke komponen tabel HTML di dalam dashboard menggunakan perulangan `while` dan `mysqli_fetch_array()`.

---

## 🛠️ Langkah-Langkah Pengembangan & Troubleshooting

Selama proses pengerjaan, terdapat beberapa kendala teknis yang berhasil diselesaikan sebagai berikut:

### 1. Konfigurasi Awal & Database
*   Menyalakan modul **Apache** and **MySQL** pada XAMPP Control Panel.
*   Membuat database baru bernama `db_adminlte` dan tabel bernama `user` dengan struktur kolom: `id` (INT, Primary Key, Auto Increment), `nama` (VARCHAR 100), dan `email` (VARCHAR 100) melalui **phpMyAdmin**.

### 2. Integrasi File & Pembersihan Struktur Kode
*   Memindahkan file template AdminLTE v4 ke dalam direktori `C:\xampp\htdocs\belajar-dashboard\`.
*   **Masalah Ekstensi File:** File bawaan sebelumnya tersimpan secara ganda sebagai `index.php.html` karena Windows menyembunyikan ekstensi file. Masalah diselesaikan dengan mengaktifkan fitur *File name extensions* pada File Explorer dan mengubah nama murni menjadi `index.php`.
*   **Pembersihan Sintaks:** Menggabungkan baris kode PHP pembuka di baris paling atas secara rapi agar tidak terjadi kebocoran kode (*code leaking*) pada visual browser.

### 3. Penanganan Error Database (Troubleshooting)
*   **Error Jalur File (404 / Missing File):** Mengatasi error `Failed to open stream` dengan memastikan file `koneksi.php` berada di dalam satu folder yang sama dengan file utama (`/dist/index.php`).
*   **Error Kueri SQL (Table Doesn't Exist):** Mengatasi masalah ketidaksesuaian nama tabel antara kode kodingan (`users`) dengan database asli (`user`). Kueri diperbaiki menjadi `SELECT * FROM user` sehingga data dapat ditarik dengan sempurna tanpa memicu *Fatal Error*.

---

## 💻 Cara Menjalankan Proyek Ini Secara Lokal

1.  Pastikan Anda sudah menginstal **XAMPP** dan **Git** (opsional).
2.  Unduh atau klon repositori ini, lalu letakkan di folder `C:\xampp\htdocs\belajar-dashboard\`.
3.  Buka **phpMyAdmin** (`http://localhost/phpmyadmin`), buat database baru bernama `db_adminlte`, lalu buat tabel bernama `user`.
4.  Buka browser dan akses alamat berikut untuk melihat hasilnya:
    ```text
    http://localhost/belajar-dashboard/dist/index.php
    ```

---
*Catatan Dosen: Proyek dikerjakan hingga tahap integrasi database dan tabel dinamis dasar berhasil berjalan 100% lancar tanpa error.*
