# 🚀 Quick Start Guide - LMS MPPL

## Langkah Cepat untuk Menjalankan Aplikasi

### 1️⃣ Pastikan XAMPP Sudah Berjalan
- Jalankan Apache dan MySQL di XAMPP Control Panel

### 2️⃣ Buat Database
- Buka phpMyAdmin: http://localhost/phpmyadmin
- Buat database baru dengan nama: `lms_mppl`

### 3️⃣ Setup Environment (Jika Belum)
Jika belum ada file `.env`:
```bash
copy .env.example .env
php artisan key:generate
```

Edit file `.env` dan pastikan konfigurasi database sudah benar:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lms_mppl
DB_USERNAME=root
DB_PASSWORD=
```

### 4️⃣ Jalankan Migrations & Seeders
```bash
php artisan migrate:fresh --seed
```

### 5️⃣ Jalankan Server
```bash
php artisan serve
```

### 6️⃣ Akses Aplikasi
Buka browser: **http://localhost:8000**

### 7️⃣ Login
Gunakan akun testing:
- **Email**: fakhri@lms.com
- **Password**: password

---

## ✨ Fitur yang Bisa Dicoba

### Dashboard
- Lihat kelas yang sedang diikuti
- Check to-do list
- Monitor task progress
- Lihat kalender kampus

### Classes
- Lihat semua kelas yang diikuti
- Informasi dosen dan jadwal
- Tombol "Enter" untuk masuk kelas (placeholder)

### Schedule
- Jadwal kelas terurut per hari
- Informasi lengkap setiap kelas

### Grades
- Fitur masih dalam pengembangan

---

## 👥 Daftar Akun Testing

### Mahasiswa Utama
- Email: `fakhri@lms.com`
- Password: `password`
- Sudah terdaftar di 4 kelas

### Dosen
- Mr. Agus: `agus@lms.com` / `password`
- Mr. Yanto: `yanto@lms.com` / `password`
- Mr. Purwiyanta: `purwiyanta@lms.com` / `password`

### Mahasiswa Lain
- Student 1-25: `student1@lms.com` - `student25@lms.com`
- Password: `password`

---

## 🎯 Data yang Tersedia

### Kelas yang Sudah Dibuat
1. **Data Science IF-A** - Monday, 14:00-15:30 (Mr. Agus)
2. **Kriptografi IF-B** - Tuesday, 14:00-15:30 (Mr. Yanto)
3. **Mobile Programming IF-D** - Wednesday, 14:00-15:30 (Mr. Purwiyanta)
4. **Pengolahan Citra IF-C** - Thursday, 14:00-15:30 (Mr. Purwiyanta)

### To-Do List (untuk Fakhri)
1. Latihan Responsi - Due: Besok
2. Resume Pertemuan 9 - Due: 2 hari lagi
3. Laporan Kriptografi - Due: 5 hari lagi

### Task Progress (untuk Fakhri)
1. Resume Pertemuan 9 - 5/10 (50%)
2. Latihan Responsi - 4/15 (27%)
3. Proyek Akhir Data Science - 2/20 (10%)

---

## 🔧 Troubleshooting

### Error: SQLSTATE[HY000] [1049] Unknown database
**Solusi**: Pastikan database `lms_mppl` sudah dibuat di phpMyAdmin

### Error: No application encryption key has been specified
**Solusi**: Jalankan `php artisan key:generate`

### Halaman tidak muncul dengan benar
**Solusi**: 
- Clear cache browser (Ctrl + F5)
- Pastikan koneksi internet aktif (untuk load Tailwind CSS & Font Awesome dari CDN)

### Login tidak berhasil
**Solusi**: 
- Pastikan sudah menjalankan `php artisan migrate:fresh --seed`
- Gunakan email dan password yang benar: `fakhri@lms.com` / `password`

---

## 📱 Responsive Design

Aplikasi ini responsive dan bisa diakses dari:
- Desktop/Laptop
- Tablet
- Mobile (landscape & portrait)

---

## 🎨 Teknologi UI

- **CSS Framework**: Tailwind CSS (via CDN)
- **Icons**: Font Awesome 6.4.0
- **Fonts**: Google Fonts - Poppins
- **Color Scheme**: Blue (#2563EB) sebagai primary color

---

## 📞 Dukungan

Jika ada masalah atau pertanyaan, silakan hubungi tim development.

**Selamat Menggunakan LMS MPPL! 🎓**
