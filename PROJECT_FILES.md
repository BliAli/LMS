# 📁 Project Files Summary - LMS MPPL

Daftar lengkap file-file penting dalam project.

---

## 📄 Documentation Files (Root Directory)

### Main Documentation
- **README.md** - Main project README dengan overview
- **README_LMS.md** - Dokumentasi lengkap LMS
- **QUICKSTART.md** - Quick start guide ⭐
- **SUMMARY.md** - Project summary
- **ROADMAP.md** - Future development roadmap
- **CHANGELOG.md** - Version history
- **DEPLOYMENT.md** - Deployment guide
- **TESTING_CHECKLIST.md** - Testing checklist
- **PRESENTATION_GUIDE.md** - Presentation guide
- **DOCUMENTATION_INDEX.md** - Documentation index
- **PROJECT_FILES.md** - This file

### Configuration Files
- **.env.example** - Environment configuration template
- **composer.json** - PHP dependencies
- **package.json** - Node dependencies
- **vite.config.js** - Vite configuration
- **phpunit.xml** - PHPUnit configuration
- **artisan** - Laravel CLI

---

## 🔧 Application Files

### App Directory (`app/`)

#### Controllers (`app/Http/Controllers/`)
- **DashboardController.php** - Dashboard logic
  - index() - Main dashboard
  - classes() - Classes page
  - schedule() - Schedule page
  - grades() - Grades page

- **CourseController.php** - Course resource (future)

#### Auth Controllers (`app/Http/Controllers/Auth/`)
- **LoginController.php** - Authentication
  - showLoginForm() - Display login
  - login() - Handle login
  - logout() - Handle logout

#### Models (`app/Models/`)
- **User.php** - User model
  - Relationships: courses, enrollments, todos, taskProgress, teachingCourses
  - Fillable: name, email, password, role, program, avatar

- **Course.php** - Course model
  - Relationships: teacher, students, enrollments
  - Fillable: name, code, teacher_id, day, start_time, end_time, description

- **Enrollment.php** - Enrollment model
  - Relationships: user, course
  - Fillable: user_id, course_id, enrolled_at

- **Todo.php** - Todo model
  - Relationships: user
  - Fillable: user_id, title, description, due_date, is_completed

- **TaskProgress.php** - Task progress model
  - Relationships: user
  - Fillable: user_id, title, current, total
  - Attribute: progress_percentage

---

### Database Directory (`database/`)

#### Migrations (`database/migrations/`)
1. **0001_01_01_000000_create_users_table.php**
   - users table: id, name, email, password, role, program, avatar
   - password_reset_tokens table
   - sessions table

2. **0001_01_01_000001_create_cache_table.php**
   - cache table

3. **0001_01_01_000002_create_jobs_table.php**
   - jobs table
   - job_batches table
   - failed_jobs table

4. **2025_12_18_085543_create_courses_table.php**
   - courses table: id, name, code, teacher_id, day, start_time, end_time, description

5. **2025_12_18_085551_create_enrollments_table.php**
   - enrollments table: id, user_id, course_id, enrolled_at

6. **2025_12_18_085558_create_todos_table.php**
   - todos table: id, user_id, title, description, due_date, is_completed

7. **2025_12_18_085605_create_task_progress_table.php**
   - task_progress table: id, user_id, title, current, total

#### Seeders (`database/seeders/`)
- **DatabaseSeeder.php** - Main seeder
  - Creates 3 teachers (Agus, Yanto, Purwiyanta)
  - Creates 1 main student (Fakhri)
  - Creates 25 additional students
  - Creates 4 courses
  - Creates enrollments
  - Creates sample todos
  - Creates sample task progress

#### Factories (`database/factories/`)
- **UserFactory.php** - User factory (Laravel default)

---

### Views Directory (`resources/views/`)

#### Layouts (`resources/views/layouts/`)
- **app.blade.php** - Main layout
  - Sidebar navigation
  - Header with search
  - Content area
  - Tailwind CSS styling
  - Font Awesome icons
  - Poppins font

#### Auth (`resources/views/auth/`)
- **login.blade.php** - Login page
  - Modern login form
  - Email & password fields
  - Remember me checkbox
  - Error display
  - Gradient background

#### Pages
- **dashboard.blade.php** - Dashboard page
  - User greeting
  - Recently accessed courses (4 cards)
  - To-do list sidebar
  - Task progress sidebar
  - Campus calendar

- **classes.blade.php** - Classes page
  - Grid layout
  - Course cards with all info
  - Empty state

- **schedule.blade.php** - Schedule page
  - Table layout
  - Grouped by day
  - Complete schedule info

- **grades.blade.php** - Grades page
  - Placeholder content
  - Future development

- **welcome.blade.php** - Welcome page (Laravel default, not used)

---

### Routes (`routes/`)
- **web.php** - Web routes
  - Root redirect to login
  - Auth routes (login, logout)
  - Protected routes (dashboard, classes, schedule, grades)

- **console.php** - Console routes (Laravel default)

---

### Config Directory (`config/`)
Standard Laravel config files:
- **app.php** - Application config
- **auth.php** - Authentication config
- **cache.php** - Cache config
- **database.php** - Database config
- **filesystems.php** - File storage config
- **logging.php** - Logging config
- **mail.php** - Mail config
- **queue.php** - Queue config
- **services.php** - Third-party services
- **session.php** - Session config

---

### Public Directory (`public/`)
- **index.php** - Application entry point
- **robots.txt** - SEO robots file

---

### Resources (`resources/`)

#### CSS (`resources/css/`)
- **app.css** - Main CSS (minimal, using Tailwind CDN)

#### JavaScript (`resources/js/`)
- **app.js** - Main JS
- **bootstrap.js** - Bootstrap JS

---

### Storage Directory (`storage/`)
- **app/** - Application storage
  - private/ - Private files
  - public/ - Public files
- **framework/** - Framework storage
  - cache/ - Cache files
  - sessions/ - Session files
  - testing/ - Testing files
  - views/ - Compiled views
- **logs/** - Application logs
  - laravel.log - Main log file

---

### Tests Directory (`tests/`)
- **TestCase.php** - Base test case
- **Feature/** - Feature tests
  - ExampleTest.php - Example feature test
- **Unit/** - Unit tests
  - ExampleTest.php - Example unit test

---

## 📊 File Statistics

### Documentation
- Total: 11 files
- Format: Markdown (.md)
- Total lines: ~4,000+ lines

### PHP Files
- Controllers: 3 files
- Models: 5 files
- Migrations: 7 files
- Seeders: 1 file

### Views
- Layouts: 1 file
- Auth views: 1 file
- Page views: 4 files

### Total Project Files
- ~100+ files (including vendor, node_modules)
- Core custom files: ~30 files
- Documentation files: 11 files

---

## 🎯 Important File Locations

### Need to Edit User Data?
→ `database/seeders/DatabaseSeeder.php`

### Need to Add New Route?
→ `routes/web.php`

### Need to Modify Dashboard?
→ `app/Http/Controllers/DashboardController.php`
→ `resources/views/dashboard.blade.php`

### Need to Change Layout?
→ `resources/views/layouts/app.blade.php`

### Need to Add New Model?
→ `php artisan make:model ModelName`
→ Edit in `app/Models/`

### Need to Add Migration?
→ `php artisan make:migration migration_name`
→ Edit in `database/migrations/`

### Need to Modify Styling?
→ Edit Blade files (inline Tailwind classes)
→ Or edit `resources/css/app.css`

---

## 🔍 File Search Quick Guide

### Find Controllers
```bash
# In terminal
ls app/Http/Controllers/
ls app/Http/Controllers/Auth/
```

### Find Models
```bash
ls app/Models/
```

### Find Views
```bash
ls resources/views/
ls resources/views/layouts/
```

### Find Migrations
```bash
ls database/migrations/
```

### Find Documentation
```bash
ls *.md
```

---

## 📦 Vendor & Dependencies

### Vendor Directory (`vendor/`)
- Laravel framework
- Laravel packages (Sanctum, Tinker, etc)
- Third-party packages
- Autoload files

**Note**: Don't edit vendor files directly!

### Node Modules (`node_modules/`)
- Not included in project initially
- Run `npm install` to generate
- Contains Vite and build tools

---

## 🚫 Files to Ignore

### Git Ignore (`.gitignore`)
Files not tracked in version control:
- `.env` (sensitive config)
- `vendor/` (dependencies)
- `node_modules/` (dependencies)
- `storage/` (runtime files)
- `.phpunit.result.cache`

### Laravel Ignore Files
- `.env` - Contains sensitive data
- `storage/logs/` - Log files
- `bootstrap/cache/` - Cache files

---

## 📝 Files You Should Customize

### Must Customize
- [x] `.env` - Set your database credentials
- [x] `database/seeders/DatabaseSeeder.php` - Adjust sample data
- [x] Views - Customize based on needs

### Optional Customize
- [ ] `app/Providers/AppServiceProvider.php` - Service providers
- [ ] Config files - Based on environment
- [ ] Middleware - Based on requirements

---

## 🔄 Files Changed from Laravel Default

### Modified Files
1. **routes/web.php** - Added LMS routes
2. **database/migrations/...users_table.php** - Added role, program, avatar
3. **app/Models/User.php** - Added relationships
4. **resources/views/** - All views recreated
5. **.env.example** - Updated for MySQL
6. **database/seeders/DatabaseSeeder.php** - Complete rewrite

### New Files
1. All documentation files (*.md)
2. DashboardController.php
3. LoginController.php
4. Course, Enrollment, Todo, TaskProgress models
5. All course-related migrations
6. All custom views

---

## 📐 File Size Reference

### Large Files (>100KB)
- vendor/ directory (~50MB)
- node_modules/ directory (~100MB if installed)

### Medium Files (10-100KB)
- Documentation files
- Views with extensive HTML

### Small Files (<10KB)
- Most PHP files
- Config files
- Migration files

---

## 🎯 File Dependencies

### Dashboard depends on:
- DashboardController.php
- dashboard.blade.php
- app.blade.php (layout)
- User, Course, Todo, TaskProgress models
- Auth middleware

### Login depends on:
- LoginController.php
- login.blade.php
- User model
- Laravel Auth system

### Views depend on:
- Tailwind CSS (CDN)
- Font Awesome (CDN)
- Google Fonts (CDN)
- Laravel Blade engine

---

## 📅 File Creation Dates

All core files created: **December 18, 2025**

### Migration Timeline
1. Initial Laravel setup
2. Created migrations (courses, enrollments, etc)
3. Created models
4. Created controllers
5. Created views
6. Created seeders
7. Created documentation

---

**Last Updated**: December 18, 2025  
**Total Project Size**: ~60MB (without node_modules)  
**Custom Code Lines**: ~3,000+ lines
