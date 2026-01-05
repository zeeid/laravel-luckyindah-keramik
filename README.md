# TEST LUCKYINDAHKERAMIK

Aplikasi manajemen data akademik sederhana yang dibangun menggunakan **Laravel** dan **Tailwind CSS**. Proyek ini mencakup fitur pengelolaan data Mahasiswa, Mata Kuliah, dan Kartu Rencana Studi (KRS) dengan relasi database yang lengkap.

# Demo Online
https://luckyindahkeramik.jundi.hm
```bash
Program ini akan dihapus dari server jundi.hm setelah selesai proses recruitment
```
## 🚀 Fitur Utama

* **CRUD Mahasiswa:** Manajemen data mahasiswa dengan validasi lengkap.
* **CRUD Mata Kuliah:** Manajemen mata kuliah dengan pemisahan warna badge jurusan.
* **CRUD KRS (Kartu Rencana Studi):** Implementasi *Many-to-Many Relationship* dengan *Composite Primary Key*.
* **Laporan & Ekspor:**
    * Fitur **Print** Laporan (CSS Print Friendly).
    * **Export to Excel** (Native Headers).
    * **Kirim ke WhatsApp** (Redirect Link).
* **Keamanan (Security Aware):**
    * Proteksi **SQL Injection** (via Eloquent ORM).
    * Proteksi **XSS** (Input Sanitization dengan `strip_tags`).
    * Proteksi **Mass Assignment** (via `$fillable`).
    * Proteksi **CSRF**.

## 🛠️ Teknologi yang Digunakan

* **Backend:** Laravel 11 (PHP 8.2+)
* **Frontend:** Blade Templating + Tailwind CSS (CDN)
* **Database:** MySQL
* **Arsitektur:** MVC (Model-View-Controller)

## 📋 Prasyarat Sistem

Sebelum menginstal, pastikan komputer Anda memiliki:

* PHP >= 8.2
* Composer
* MySQL / MariaDB
* Git

## ⚙️ Cara Instalasi (Lokal)

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di komputer Anda:

### 1. Clone Repositori
```bash
git clone [https://github.com/zeeid/laravel-luckyindah-keramik.git](https://github.com/zeeid/laravel-luckyindah-keramik.git)
cd nama-repo-anda
```

### 2. Install Dependensi
Unduh semua library Laravel yang dibutuhkan.
```bash
composer install
```

### 3. Konfigurasi Environment
Salin file konfigurasi .env.
```bash
cp .env.example .env
```
Buka file .env dan sesuaikan koneksi database Anda. Pastikan Anda sudah membuat database kosong (misal: luckyindahkeramik) di phpMyAdmin.
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=luckyindahkeramik
DB_USERNAME=root
DB_PASSWORD=root
```

### 4. Generate Key
Buat kunci enkripsi aplikasi.
```bash
php artisan key:generate
```

### 5. Migrasi Database & Seeding
Langkah ini akan membuat tabel (mahasiswas, mata_kuliahs, krs, jenis_kelamins) dan mengisinya dengan Data Dummy (Yanny, Andi, Stella, dll) sesuai soal tes.
```bash
php artisan migrate:fresh --seed
```

### 6. Jalankan Server
Jalankan server development lokal.
```bash
php artisan serve
```
Akses aplikasi di browser: http://127.0.0.1:8000
