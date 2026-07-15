# Blog Pribadi Laravel

Website Blog Pribadi adalah aplikasi web yang dibangun menggunakan framework **Laravel 12**. Aplikasi ini dibuat sebagai tugas mata kuliah **Pemrograman Web Lanjut** dengan menerapkan konsep **Model-View-Controller (MVC)**, autentikasi, routing, migration, dan operasi **CRUD (Create, Read, Update, Delete)**.

aplikasi web yang dibangun menggunakan framework Laravel untuk mengelola artikel blog secara mudah dan modern. Pengguna yang telah login dapat membuat, mengubah, menghapus, dan mempublikasikan artikel serta mengelola kategori. Selain itu, pengunjung dapat membaca artikel yang telah dipublikasikan dan memberikan komentar tanpa harus login.
---

# 🚀 Teknologi yang Digunakan

- Laravel 12
- PHP 8.x
- MySQL
- Bootstrap 5
- HTML5
- CSS3
- JavaScript
- Composer

---

# ✨ Fitur Utama

### 🔐 Login
Fitur autentikasi yang digunakan administrator untuk masuk ke dalam sistem dan mengakses dashboard.

### 📊 Dashboard
Halaman utama administrator yang menjadi pusat pengelolaan data website.

### 🌐 Blog Pribadi
Halaman publik yang menampilkan daftar artikel. Pengunjung dapat membaca artikel secara lengkap dan melihat artikel berdasarkan kategori.

### 📂 Kategori
Administrator dapat menambahkan, mengubah, menghapus, dan melihat daftar kategori artikel.

### 📝 Artikel
Administrator dapat menambahkan artikel baru, mengubah artikel, menghapus artikel, serta mengunggah thumbnail artikel sebelum dipublikasikan.

### 💬 Komentar
Pengunjung dapat memberikan komentar pada setiap artikel tanpa harus login. Komentar akan langsung ditampilkan pada halaman detail artikel.

### 👤 Profil
Administrator dapat mengelola informasi akun seperti nama, email, dan kata sandi.

### 🚪 Logout
Fitur untuk keluar dari sistem agar keamanan akun administrator tetap terjaga.

---

# 📁 Struktur Fitur

- Login Administrator
- Dashboard
- Manajemen Kategori
- Manajemen Artikel
- Halaman Blog
- Detail Artikel
- Komentar Pengunjung
- Profil Administrator
- Logout

---

# ⚙️ Cara Menjalankan Project

1. Clone repository.

```bash
git clone https://github.com/HauraNadhifah/blog-pribadi-laravel.git
```

2. Masuk ke folder project.

```bash
cd blog-pribadi-laravel
```

3. Install dependency.

```bash
composer install
```

4. Salin file `.env.example` menjadi `.env`.

```bash
cp .env.example .env
```

5. Generate application key.

```bash
php artisan key:generate
```

6. Atur konfigurasi database pada file `.env`.

7. Jalankan migration database.

```bash
php artisan migrate
```

8. Jalankan server Laravel.

```bash
php artisan serve
```

9. Buka browser.

```
http://127.0.0.1:8000
```

---

# 👤 Developer

**Nama** : Haura Nadhifah

**NIM** : 240170026

**Program Studi** : Teknik Informatika

**Universitas** : Universitas Malikussaleh

---

# 🎯 Tujuan Pengembangan

Project **Blog Pribadi Laravel** ini dikembangkan sebagai salah satu tugas mata kuliah **Pemrograman Web Lanjut**. Tujuan utama project ini adalah menerapkan framework Laravel 12 dalam membangun aplikasi blog yang memiliki sistem autentikasi, pengelolaan artikel dan kategori, serta fitur komentar untuk pengunjung.

---

# 📄 Lisensi

Project ini dibuat untuk keperluan pembelajaran dan tugas akademik di Program Studi Teknik Informatika, Universitas Malikussaleh.
