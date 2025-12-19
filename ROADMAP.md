# 📋 Roadmap Pengembangan LMS MPPL

## ✅ Fitur yang Sudah Selesai (MVP)

### Authentication & Authorization
- [x] Login system
- [x] Logout functionality
- [x] Session management
- [x] Role-based access (student, teacher, admin)

### Dashboard
- [x] Greeting dengan nama user dan hari
- [x] Recently accessed courses
- [x] To-do list dengan due date
- [x] Task progress dengan progress bar
- [x] Campus calendar

### Classes Management
- [x] Daftar kelas yang diikuti
- [x] Informasi kelas (nama, kode, dosen, jadwal)
- [x] Enrollment system
- [x] Display jumlah mahasiswa yang terdaftar

### Schedule
- [x] Jadwal kelas terurut per hari
- [x] Tabel schedule yang informatif
- [x] Filter by day of week

### Database & Models
- [x] Users (students, teachers, admin)
- [x] Courses
- [x] Enrollments
- [x] Todos
- [x] Task Progress
- [x] Proper relationships

### UI/UX
- [x] Responsive sidebar navigation
- [x] Modern design dengan Tailwind CSS
- [x] Icons dari Font Awesome
- [x] Hover effects & animations
- [x] Clean & professional layout

---

## 🚧 Fitur yang Bisa Dikembangkan Selanjutnya

### 1. Grades/Nilai ⭐⭐⭐
**Priority: HIGH**
- [ ] Input nilai oleh dosen
- [ ] View nilai oleh mahasiswa
- [ ] Perhitungan rata-rata
- [ ] Export nilai ke PDF/Excel
- [ ] Grafik performa akademik

**Database yang Diperlukan:**
```sql
CREATE TABLE grades (
    id BIGINT PRIMARY KEY,
    user_id BIGINT, -- mahasiswa
    course_id BIGINT,
    assignment_name VARCHAR(255),
    score DECIMAL(5,2),
    max_score DECIMAL(5,2),
    weight DECIMAL(5,2), -- bobot nilai
    graded_at TIMESTAMP,
    created_at TIMESTAMP
);
```

### 2. Assignment Management ⭐⭐⭐
**Priority: HIGH**
- [ ] Dosen bisa membuat assignment
- [ ] Mahasiswa submit assignment
- [ ] Upload file (PDF, Word, etc)
- [ ] Deadline management
- [ ] Status tracking (submitted, graded, late)
- [ ] Feedback dari dosen

**Database yang Diperlukan:**
```sql
CREATE TABLE assignments (
    id BIGINT PRIMARY KEY,
    course_id BIGINT,
    title VARCHAR(255),
    description TEXT,
    deadline TIMESTAMP,
    max_score DECIMAL(5,2),
    created_at TIMESTAMP
);

CREATE TABLE submissions (
    id BIGINT PRIMARY KEY,
    assignment_id BIGINT,
    user_id BIGINT,
    file_path VARCHAR(255),
    submitted_at TIMESTAMP,
    score DECIMAL(5,2),
    feedback TEXT,
    status ENUM('pending', 'graded', 'late')
);
```

### 3. Course Materials ⭐⭐⭐
**Priority: MEDIUM**
- [ ] Upload materi perkuliahan
- [ ] Organize by weeks/topics
- [ ] Support multiple file types (PDF, PPT, Video)
- [ ] Download materials
- [ ] Preview files online

**Database yang Diperlukan:**
```sql
CREATE TABLE materials (
    id BIGINT PRIMARY KEY,
    course_id BIGINT,
    title VARCHAR(255),
    description TEXT,
    file_path VARCHAR(255),
    file_type VARCHAR(50),
    week INT,
    uploaded_at TIMESTAMP
);
```

### 4. Attendance System ⭐⭐
**Priority: MEDIUM**
- [ ] Dosen bisa buat sesi absensi
- [ ] QR Code untuk check-in
- [ ] Time-based attendance
- [ ] Rekap kehadiran
- [ ] Export data kehadiran

**Database yang Diperlukan:**
```sql
CREATE TABLE attendance_sessions (
    id BIGINT PRIMARY KEY,
    course_id BIGINT,
    date DATE,
    start_time TIME,
    end_time TIME,
    qr_code VARCHAR(255)
);

CREATE TABLE attendances (
    id BIGINT PRIMARY KEY,
    session_id BIGINT,
    user_id BIGINT,
    check_in_time TIMESTAMP,
    status ENUM('present', 'late', 'absent')
);
```

### 5. Discussion Forum ⭐⭐
**Priority: MEDIUM**
- [ ] Forum per kelas
- [ ] Thread & replies
- [ ] Tag/kategori topik
- [ ] Search functionality
- [ ] Notifications untuk replies

**Database yang Diperlukan:**
```sql
CREATE TABLE forum_threads (
    id BIGINT PRIMARY KEY,
    course_id BIGINT,
    user_id BIGINT,
    title VARCHAR(255),
    content TEXT,
    is_pinned BOOLEAN,
    created_at TIMESTAMP
);

CREATE TABLE forum_replies (
    id BIGINT PRIMARY KEY,
    thread_id BIGINT,
    user_id BIGINT,
    content TEXT,
    created_at TIMESTAMP
);
```

### 6. Notifications System ⭐⭐
**Priority: MEDIUM**
- [ ] In-app notifications
- [ ] Email notifications
- [ ] Notif untuk assignment baru
- [ ] Notif untuk deadline
- [ ] Notif untuk nilai baru
- [ ] Mark as read/unread

**Database yang Diperlukan:**
```sql
CREATE TABLE notifications (
    id BIGINT PRIMARY KEY,
    user_id BIGINT,
    title VARCHAR(255),
    message TEXT,
    type VARCHAR(50), -- assignment, grade, announcement
    is_read BOOLEAN,
    link VARCHAR(255),
    created_at TIMESTAMP
);
```

### 7. Announcements ⭐
**Priority: LOW**
- [ ] Dosen bisa post pengumuman
- [ ] Tampil di dashboard
- [ ] Important/urgent flag
- [ ] Attach files ke pengumuman

### 8. Live Class/Video Conference ⭐
**Priority: LOW**
- [ ] Integrasi dengan Zoom/Google Meet
- [ ] Schedule live sessions
- [ ] Recording management
- [ ] Attendance via live class

### 9. Student Profile Enhancement ⭐
**Priority: LOW**
- [ ] Edit profile
- [ ] Upload avatar
- [ ] Academic information
- [ ] Contact details
- [ ] Change password

### 10. Analytics & Reports ⭐
**Priority: LOW**
- [ ] Dashboard untuk dosen (student performance)
- [ ] Analytics per kelas
- [ ] Export reports
- [ ] Grade distribution charts

---

## 🎯 Recommended Development Phases

### Phase 1: Core Learning Features (2-3 weeks)
1. Assignment Management
2. Grades System
3. Course Materials

### Phase 2: Engagement Features (2-3 weeks)
1. Discussion Forum
2. Notifications System
3. Announcements

### Phase 3: Enhanced Features (2-3 weeks)
1. Attendance System
2. Analytics & Reports
3. Profile Enhancement

### Phase 4: Advanced Features (Optional)
1. Live Class Integration
2. Mobile App
3. Advanced Analytics
4. AI-powered features (recommendation, chatbot)

---

## 🔧 Technical Improvements

### Performance
- [ ] Implement caching (Redis)
- [ ] Query optimization
- [ ] Lazy loading
- [ ] Image optimization

### Security
- [ ] CSRF protection enhancement
- [ ] XSS prevention
- [ ] SQL injection prevention
- [ ] Rate limiting
- [ ] Two-factor authentication

### Code Quality
- [ ] Unit tests
- [ ] Integration tests
- [ ] Code documentation
- [ ] API documentation

### DevOps
- [ ] Docker containerization
- [ ] CI/CD pipeline
- [ ] Automated testing
- [ ] Deployment automation

---

## 📝 Notes

- Prioritas fitur bisa disesuaikan dengan kebutuhan project
- Estimasi waktu bersifat flexible tergantung tim
- Setiap fitur sebaiknya melalui testing sebelum deployment
- Dokumentasi harus di-update seiring penambahan fitur

---

**Good luck with the development! 🚀**
