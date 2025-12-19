# 🎓 LMS MPPL - Learning Management System

![Laravel](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind-3.x-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)

> **Learning Management System MVP untuk Project MPPL**  
> Aplikasi web modern untuk mengelola pembelajaran online dengan fitur dashboard interaktif, manajemen kelas, dan tracking progress.

---

## 📚 Dokumentasi Lengkap

Untuk informasi detail, silakan baca dokumentasi berikut:

- 📖 **[QUICKSTART.md](QUICKSTART.md)** - Panduan cepat untuk setup & running ⭐ **START HERE**
- 📋 **[README_LMS.md](README_LMS.md)** - Dokumentasi utama lengkap
- 📊 **[SUMMARY.md](SUMMARY.md)** - Ringkasan project
- 🗺️ **[ROADMAP.md](ROADMAP.md)** - Rencana pengembangan future
- 📝 **[CHANGELOG.md](CHANGELOG.md)** - History perubahan
- ✅ **[TESTING_CHECKLIST.md](TESTING_CHECKLIST.md)** - Panduan testing
- 🌐 **[DEPLOYMENT.md](DEPLOYMENT.md)** - Panduan deployment
- 🎤 **[PRESENTATION_GUIDE.md](PRESENTATION_GUIDE.md)** - Panduan presentasi
- 📚 **[DOCUMENTATION_INDEX.md](DOCUMENTATION_INDEX.md)** - Index semua dokumentasi

---

## ✨ Fitur Utama

### 🏠 Dashboard
- Greeting personal dengan nama & hari
- Recently accessed courses (4 terakhir)
- To-do list dengan due dates
- Task progress dengan progress bars
- Campus calendar interaktif

### 📚 Classes
- Daftar semua kelas yang diikuti
- Info lengkap (dosen, jadwal, kode)
- Card-based responsive layout

### 📅 Schedule
- Tabel jadwal per hari (Senin-Minggu)
- Info waktu dan dosen
- Easy-to-read format

### 🔐 Authentication
- Secure login system
- Session management
- Role-based access (student, teacher, admin)

---

## 🚀 Quick Start

```bash
# 1. Install dependencies
composer install

# 2. Setup environment
copy .env.example .env
php artisan key:generate

# 3. Create database 'lms_mppl' di phpMyAdmin

# 4. Run migrations & seeders
php artisan migrate:fresh --seed

# 5. Start server
php artisan serve

# 6. Access at http://localhost:8000
# Login: fakhri@lms.com / password
```

**Untuk panduan lengkap, baca [QUICKSTART.md](QUICKSTART.md)**

---

## 🎨 Tech Stack

- **Backend**: Laravel 11.x
- **Frontend**: Blade, Tailwind CSS
- **Database**: MySQL 8.0
- **Icons**: Font Awesome 6.4.0
- **Fonts**: Google Fonts (Poppins)

---

## 👥 Default Users

| Email | Password | Role |
|-------|----------|------|
| fakhri@lms.com | password | Student |
| agus@lms.com | password | Teacher |
| yanto@lms.com | password | Teacher |
| purwiyanta@lms.com | password | Teacher |

---

## 📸 Screenshots

### Dashboard
![Dashboard](https://via.placeholder.com/800x400/2563EB/FFFFFF?text=Dashboard+Preview)

### Classes
![Classes](https://via.placeholder.com/800x400/2563EB/FFFFFF?text=Classes+Preview)

### Schedule
![Schedule](https://via.placeholder.com/800x400/2563EB/FFFFFF?text=Schedule+Preview)

---

## 🗺️ Roadmap

### ✅ Completed (v1.0.0 - MVP)
- Dashboard dengan widgets
- Classes management
- Schedule view
- Authentication system
- Modern UI design

### 🚧 Next (v1.1.0+)
- Grades system
- Assignment management
- Course materials
- Discussion forum
- Notifications

**Lihat [ROADMAP.md](ROADMAP.md) untuk detail lengkap**

---

## 🧪 Testing

Gunakan [TESTING_CHECKLIST.md](TESTING_CHECKLIST.md) untuk:
- Manual testing systematic
- Browser compatibility
- Responsive testing
- Security testing

---

## 🌐 Deployment

Ready untuk production! Lihat [DEPLOYMENT.md](DEPLOYMENT.md) untuk:
- Shared hosting deployment
- VPS deployment (Nginx)
- Docker deployment
- Security best practices

---

## 📞 Support

Untuk pertanyaan atau masalah:
1. Baca dokumentasi terkait
2. Check [TESTING_CHECKLIST.md](TESTING_CHECKLIST.md)
3. Review [CHANGELOG.md](CHANGELOG.md)
4. Contact development team

---

## 📄 License

MIT License - Free to use for educational purposes

---

## 🙏 Acknowledgments

- Laravel Framework Team
- Tailwind CSS Team
- Font Awesome
- Google Fonts
- MPPL Development Team

---

## 🎯 Project Info

- **Version**: 1.0.0 (MVP)
- **Status**: ✅ Production Ready
- **Last Updated**: December 18, 2025
- **Maintained by**: MPPL Team

---

**Made with ❤️ for MPPL Project**

**Happy Learning! 🎓**

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
