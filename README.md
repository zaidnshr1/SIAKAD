SIAKAD – Sistem Informasi Akademik (KRS)
SIAKAD adalah aplikasi berbasis Laravel untuk pengelolaan Kartu Rencana Studi (KRS) dengan tiga jenis pengguna: Admin, Dosen, dan Mahasiswa.

Fitur utama meliputi:
Admin: Manajemen mahasiswa, mata kuliah, dan monitoring KRS.
Mahasiswa: Pemilihan mata kuliah, cetak KRS PDF.
Dosen: Persetujuan atau penolakan KRS mahasiswa.

Persyaratan Sistem
PHP 8.0 atau lebih baru
Composer
MySQL / MariaDB
Git

Instalasi
1. Clone Repository
git clone https://github.com/zaidnshr1/SIAKAD.git
cd SIAKAD

2. Install Dependensi
composer install

3. Konfigurasi Environment
cp .env.example .env
Edit file .env sesuai konfigurasi database lokal

4. Generate Application Key
bash
Copy
Edit
php artisan key:generate

5. Migrasi dan Seeder
php artisan migrate --seed
cek tabel users untuk melihat akun di phpmyadmin

Menjalankan Aplikasi
php artisan serve
Akses melalui browser:
http://127.0.0.1:8000
