# LMS - Learning Management System

Aplikasi Learning Management System (LMS) sederhana untuk project MPPL.

## 🎓 Fitur Utama

- **Dashboard**: Menampilkan kelas yang sedang diikuti, to-do list, task progress, dan kalender kampus
- **Classes**: Daftar semua kelas yang diikuti mahasiswa
- **Schedule**: Jadwal kelas per hari
- **Grades**: Fitur nilai (dalam pengembangan)
- **Authentication**: Login dan logout

## 🎨 Desain

Aplikasi ini menggunakan desain modern dengan Tailwind CSS yang responsif dan user-friendly, sesuai dengan mockup yang diberikan.

## 📋 Persyaratan Sistem

- PHP >= 8.2
- Composer
- MySQL/MariaDB
- XAMPP (untuk local development)

## 🚀 Instalasi

1. **Clone atau extract project**
   ```bash
   cd c:\xampp\htdocs\mppl
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Setup environment**
   - Copy file `.env.example` menjadi `.env`
   - Sesuaikan konfigurasi database di `.env`:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=lms_mppl
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Generate application key**
   ```bash
   php artisan key:generate
   ```

5. **Buat database**
   - Buka phpMyAdmin
   - Buat database baru dengan nama `lms_mppl`

6. **Jalankan migrations dan seeders**
   ```bash
   php artisan migrate:fresh --seed
   ```

7. **Jalankan development server**
   ```bash
   php artisan serve
   ```

8. **Akses aplikasi**
   - Buka browser: `http://localhost:8000`

## 👥 Akun Testing

### Mahasiswa
- **Email**: fakhri@lms.com
- **Password**: password
- **Role**: Student

### Dosen
- **Email**: agus@lms.com / yanto@lms.com / purwiyanta@lms.com
- **Password**: password
- **Role**: Teacher

### Mahasiswa Lainnya
- **Email**: student1@lms.com sampai student25@lms.com
- **Password**: password
- **Role**: Student

## 📊 Struktur Database

### Tabel Users
- id, name, email, password
- role (student, teacher, admin)
- program (S1 Informatika, dll)
- avatar

### Tabel Courses
- id, name, code
- teacher_id (foreign key ke users)
- day, start_time, end_time
- description

### Tabel Enrollments
- id, user_id, course_id
- enrolled_at

### Tabel Todos
- id, user_id
- title, description
- due_date, is_completed

### Tabel Task Progress
- id, user_id
- title, current, total

## 🎯 Fitur yang Tersedia

### ✅ Sudah Implementasi
- [x] Dashboard dengan recently accessed courses
- [x] To-do list dengan due date
- [x] Task progress dengan progress bar
- [x] Campus calendar
- [x] Daftar kelas
- [x] Jadwal kelas per hari
- [x] Authentication (login/logout)
- [x] Responsive sidebar navigation
- [x] User profile display
- [x] Course enrollment system

### 🚧 Dalam Pengembangan
- [ ] Grades/Nilai
- [ ] Assignment submission
- [ ] Course materials/Materi
- [ ] Discussion forum
- [ ] Notifications
- [ ] File downloads
- [ ] Settings

## 🛠️ Teknologi yang Digunakan

- **Backend**: Laravel 11
- **Frontend**: Blade Templates, Tailwind CSS
- **Database**: MySQL
- **Icons**: Font Awesome
- **Fonts**: Google Fonts (Poppins)

## 📝 Catatan Pengembangan

Aplikasi ini dibuat sebagai MVP (Minimum Viable Product) untuk memenuhi kebutuhan dasar LMS:
- Manajemen kelas
- Jadwal perkuliahan
- Tracking tugas dan progress
- Authentication dasar

Desain mengikuti mockup yang diberikan dengan warna utama biru (#2563EB) dan layout yang bersih dan modern.

## 🤝 Kontributor

Project MPPL - Kelompok [Nama Kelompok]

## 📄 Lisensi

MIT License

---

**Happy Learning! 🎓**
