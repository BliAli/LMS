# 📝 Changelog - LMS MPPL

All notable changes to this project will be documented in this file.

---

## [1.0.0] - 2025-12-18

### 🎉 Initial Release (MVP)

#### Added
- **Authentication System**
  - Login page dengan form modern
  - Session-based authentication
  - Logout functionality
  - Middleware untuk protected routes

- **Database Schema**
  - Users table dengan role (student, teacher, admin)
  - Courses table untuk mata kuliah
  - Enrollments table untuk pendaftaran kelas
  - Todos table untuk manajemen tugas
  - Task_progress table untuk tracking progress

- **Models & Relationships**
  - User model dengan relationships ke courses, todos, task_progress
  - Course model dengan teacher dan students relationships
  - Enrollment model untuk pivot table
  - Todo model dengan user relationship
  - TaskProgress model dengan progress calculation

- **Controllers**
  - LoginController untuk authentication
  - DashboardController untuk main dashboard
  - CourseController (resource) untuk future development

- **Views - Dashboard Page**
  - User greeting dengan dynamic day name
  - Recently accessed courses (max 4)
  - Course cards dengan:
    - Nama kelas dan kode
    - Jadwal (hari dan jam)
    - Nama dosen
    - Avatar mahasiswa yang terdaftar
    - Enter button
  - To-do list sidebar
  - Task progress dengan progress bars
  - Campus calendar widget

- **Views - Classes Page**
  - Grid layout untuk semua kelas
  - Course cards dengan informasi lengkap
  - Empty state ketika belum ada kelas

- **Views - Schedule Page**
  - Tabel jadwal terurut per hari
  - Grouping by day of week
  - Complete course information
  - Action buttons

- **Views - Grades Page**
  - Placeholder untuk future development

- **Views - Login Page**
  - Modern login form
  - Email & password fields
  - Remember me checkbox
  - Error messages display
  - Gradient background

- **Layout**
  - Responsive sidebar navigation
  - Header dengan search dan notifications (placeholder)
  - Active menu highlighting
  - User profile section
  - Icons dari Font Awesome
  - Poppins font dari Google Fonts

- **Routing**
  - Public routes (login)
  - Protected routes dengan auth middleware
  - Named routes untuk easy navigation

- **Database Seeders**
  - 1 main student (Fakhri)
  - 3 teachers (Mr. Agus, Mr. Yanto, Mr. Purwiyanta)
  - 25 additional students
  - 4 courses dengan realistic data
  - Enrollments untuk semua students
  - Sample todos dan task progress

#### Design Features
- **Colors**
  - Primary: Blue (#2563EB)
  - Background: Gray-50
  - White cards dengan shadow

- **Typography**
  - Font family: Poppins
  - Proper heading hierarchy
  - Readable font sizes

- **Components**
  - Card components dengan hover effects
  - Progress bars dengan animations
  - Buttons dengan consistent styling
  - Icons dengan proper sizing
  - Calendar grid

- **Animations**
  - Smooth transitions
  - Hover effects on cards
  - Progress bar animations
  - Sidebar item hover states

#### Documentation
- README_LMS.md - Main documentation
- QUICKSTART.md - Quick start guide
- ROADMAP.md - Future development plans
- DEPLOYMENT.md - Deployment instructions
- SUMMARY.md - Project summary
- CHANGELOG.md - This file

#### Configuration
- .env.example updated untuk MySQL
- APP_NAME set to "LMS MPPL"
- APP_LOCALE set to Indonesian
- Database configuration for local development

---

## [Unreleased]

### Planned for v1.1.0
- [ ] Grades/Nilai system
  - Input nilai oleh dosen
  - View nilai oleh mahasiswa
  - Grade statistics
  - Export to PDF/Excel

### Planned for v1.2.0
- [ ] Assignment Management
  - Create assignments
  - Submit assignments
  - File uploads
  - Deadline tracking
  - Auto-late marking

### Planned for v1.3.0
- [ ] Course Materials
  - Upload files
  - Organize by week/topic
  - Multiple file types support
  - Download functionality

### Planned for v1.4.0
- [ ] Notifications System
  - In-app notifications
  - Email notifications
  - Mark as read/unread
  - Notification preferences

### Planned for v2.0.0
- [ ] Discussion Forum
  - Create threads
  - Reply to discussions
  - Tag/categorize topics
  - Search functionality

---

## Development Notes

### Known Limitations (v1.0.0)
- Grades page is placeholder only
- Settings page not implemented
- Downloads page not implemented
- Trash page not implemented
- No file upload functionality yet
- No real-time notifications
- No email system
- Calendar is display-only (no events)
- Search functionality is placeholder

### Technical Debt
- Need to add unit tests
- Need to add integration tests
- Should implement caching for performance
- Should add API endpoints for future mobile app
- Should optimize database queries
- Should add logging system

### Browser Compatibility
- ✅ Chrome (latest)
- ✅ Firefox (latest)
- ✅ Edge (latest)
- ⚠️ Safari (not fully tested)
- ❌ IE11 (not supported)

### Performance
- Page load: < 1s on local
- Database queries: Optimized with Eloquent
- Asset loading: CDN for Tailwind & Font Awesome
- Images: Avatar via UI Avatars API

---

## Migration Guide

### From Initial Setup to v1.0.0
No migration needed - this is the initial release.

### Future Migrations
Will be documented when new versions are released.

---

## Security Updates

### v1.0.0
- Laravel 11.x with latest security patches
- CSRF protection enabled
- XSS protection via Blade templating
- SQL injection protection via Eloquent
- Password hashing with bcrypt
- Session security configured

---

## Credits

### Development Team
- Project MPPL Team

### Technologies
- Laravel 11.x
- Tailwind CSS 3.x
- Font Awesome 6.4.0
- Google Fonts
- PHP 8.2+
- MySQL 8.0+

### Design Inspiration
- Modern LMS platforms
- User-provided mockup design
- Best practices in educational software

---

## Versioning

This project follows [Semantic Versioning](https://semver.org/):
- MAJOR version for incompatible API changes
- MINOR version for new functionality (backward compatible)
- PATCH version for bug fixes (backward compatible)

---

## Contact

For questions, suggestions, or bug reports, please contact the development team.

---

**Last Updated**: 18 December 2025
