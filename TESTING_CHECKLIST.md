# ✅ Testing Checklist - LMS MPPL

Checklist untuk testing manual aplikasi LMS.

---

## 🔐 Authentication Testing

### Login Page
- [ ] Akses halaman login di `/login` atau `/`
- [ ] Form login tampil dengan benar
- [ ] Logo dan title tampil
- [ ] Input email dan password visible
- [ ] Checkbox "Remember me" berfungsi
- [ ] Link "Forgot password" tampil (placeholder)
- [ ] Link "Register" tampil (placeholder)

### Login Process
- [ ] Login dengan email valid: `fakhri@lms.com` dan password: `password`
- [ ] Redirect ke `/dashboard` setelah login sukses
- [ ] Login dengan email invalid menampilkan error
- [ ] Login dengan password salah menampilkan error
- [ ] Error message jelas dan informatif
- [ ] Old input (email) tetap ada setelah error

### Session & Security
- [ ] Session tersimpan setelah login
- [ ] Akses halaman protected tanpa login redirect ke login
- [ ] Remember me functionality (jika di-check)
- [ ] CSRF token berfungsi dengan benar

### Logout
- [ ] Klik tombol "Log Out" di sidebar
- [ ] User berhasil logout
- [ ] Redirect ke halaman login
- [ ] Session terhapus
- [ ] Akses dashboard setelah logout redirect ke login

---

## 📊 Dashboard Testing

### Header Section
- [ ] Greeting tampil: "Happy [Day], [Name]!"
- [ ] Day name sesuai dengan hari ini
- [ ] User name tampil dengan benar
- [ ] Search bar tampil (placeholder)
- [ ] Notification icon tampil
- [ ] Message icon tampil
- [ ] Help icon tampil

### Sidebar
- [ ] User avatar tampil (atau placeholder)
- [ ] User name tampil di sidebar
- [ ] Program/jurusan tampil (S1 Informatika)
- [ ] Menu "Dashboard" highlighted (active)
- [ ] Semua menu items tampil:
  - Dashboard
  - Classes
  - Schedule
  - Grades
  - Downloads
  - Settings
  - Trash
  - Log Out
- [ ] Hover effect pada menu items
- [ ] Icons tampil dengan benar

### Recently Accessed Courses
- [ ] Section heading tampil
- [ ] Maksimal 4 course cards tampil
- [ ] Setiap card menampilkan:
  - Nama kelas
  - Hari kuliah
  - Jam kuliah
  - Nama dosen
  - "Students" section
  - Avatar students (max 3)
  - Jumlah students yang join
  - Button "Enter"
- [ ] Card hover effect berfungsi
- [ ] Data sesuai dengan database
- [ ] Empty state jika tidak ada kelas

### To-Do List Sidebar
- [ ] Widget "To do List" tampil
- [ ] Tanggal hari ini tampil
- [ ] Maksimal 3 todos tampil
- [ ] Setiap todo menampilkan:
  - Checkbox
  - Title
  - Due date
- [ ] Format tanggal benar
- [ ] Empty state jika tidak ada todos

### Task Progress Sidebar
- [ ] Widget "Task Progress" tampil
- [ ] Maksimal 3 tasks tampil
- [ ] Setiap task menampilkan:
  - Title
  - Progress (current/total)
  - Progress bar
- [ ] Progress bar width sesuai persentase
- [ ] Warna progress bar (hijau)
- [ ] Animasi progress bar berfungsi
- [ ] Empty state jika tidak ada progress

### Campus Calendar
- [ ] Widget "Campus Calendar" tampil
- [ ] Icon kalender tampil
- [ ] Bulan dan tahun tampil
- [ ] Navigation arrows tampil
- [ ] Days header tampil (SUN-SAT)
- [ ] Hari ini di-highlight (biru)
- [ ] Tanggal bulan sebelumnya (gray)
- [ ] Tanggal bulan berikutnya (gray)
- [ ] Grid calendar proper (7 kolom)

---

## 📚 Classes Page Testing

### Navigation
- [ ] Klik "Classes" di sidebar
- [ ] URL berubah ke `/classes`
- [ ] Menu "Classes" menjadi active
- [ ] Page title: "My Classes"

### Course List
- [ ] Semua enrolled courses tampil
- [ ] Grid layout (3 kolom desktop)
- [ ] Setiap card menampilkan:
  - Nama kelas
  - Kode kelas (badge)
  - Nama dosen dengan icon
  - Hari dengan icon
  - Jam dengan icon
  - Description (jika ada)
  - Button "Enter Class"
- [ ] Card hover effect
- [ ] Button hover effect
- [ ] Empty state jika tidak ada kelas
- [ ] Responsive di berbagai screen size

---

## 📅 Schedule Page Testing

### Navigation
- [ ] Klik "Schedule" di sidebar
- [ ] URL berubah ke `/schedule`
- [ ] Menu "Schedule" menjadi active
- [ ] Page title: "Class Schedule"

### Schedule Table
- [ ] Tabel tampil dengan proper styling
- [ ] Header table:
  - Day
  - Course
  - Code
  - Teacher
  - Time
  - Action
- [ ] Courses digroup by day
- [ ] Rowspan untuk day column berfungsi
- [ ] Days urut: Monday - Sunday
- [ ] Setiap row menampilkan:
  - Hari (sekali per group)
  - Nama kelas
  - Kode kelas (badge)
  - Nama dosen
  - Jam (start - end)
  - Button "Enter"
- [ ] Row hover effect
- [ ] Empty state jika tidak ada schedule
- [ ] Table responsive

---

## 📈 Grades Page Testing

### Navigation
- [ ] Klik "Grades" di sidebar
- [ ] URL berubah ke `/grades`
- [ ] Menu "Grades" menjadi active
- [ ] Page title: "My Grades"

### Content
- [ ] Placeholder content tampil
- [ ] Icon tampil
- [ ] Message "Fitur Grades akan segera hadir"
- [ ] Message "Dalam pengembangan"
- [ ] Styling proper (centered)

---

## 🎨 UI/UX Testing

### General Layout
- [ ] Layout konsisten di semua halaman
- [ ] Sidebar fixed di kiri
- [ ] Main content scrollable
- [ ] Header sticky atau static
- [ ] Spacing dan padding konsisten
- [ ] Border radius konsisten
- [ ] Shadow effects proper

### Colors & Typography
- [ ] Primary color blue (#2563EB) consistent
- [ ] Font Poppins loaded
- [ ] Font sizes hierarchy proper
- [ ] Font weights appropriate
- [ ] Text colors readable
- [ ] Gray scale consistent

### Icons
- [ ] Font Awesome icons loaded
- [ ] Icons size consistent
- [ ] Icons color appropriate
- [ ] Icons align dengan text

### Buttons
- [ ] Button styling consistent
- [ ] Hover effects smooth
- [ ] Active states visible
- [ ] Disabled states (jika ada)
- [ ] Button text centered

### Forms
- [ ] Input fields styled properly
- [ ] Labels clear
- [ ] Placeholders helpful
- [ ] Focus states visible
- [ ] Error states styled
- [ ] Success states styled

### Cards
- [ ] Card styling consistent
- [ ] Shadow on cards
- [ ] Hover effects smooth
- [ ] Card content well-spaced
- [ ] Card borders/radius consistent

---

## 📱 Responsive Testing

### Desktop (1920x1080)
- [ ] Layout proper
- [ ] All content visible
- [ ] No horizontal scroll
- [ ] Sidebar width appropriate
- [ ] Cards grid proper

### Laptop (1366x768)
- [ ] Layout adjusted
- [ ] Content readable
- [ ] Sidebar fit
- [ ] Cards responsive

### Tablet (768x1024)
- [ ] Layout appropriate
- [ ] Sidebar still functional
- [ ] Cards stack properly
- [ ] Touch targets adequate

### Mobile (375x667)
- [ ] Layout mobile-friendly
- [ ] Sidebar collapsed/hidden (if implemented)
- [ ] Cards single column
- [ ] Text readable
- [ ] Buttons tapable

---

## ⚡ Performance Testing

### Page Load
- [ ] Dashboard load < 2s
- [ ] Classes load < 2s
- [ ] Schedule load < 2s
- [ ] Grades load < 1s
- [ ] Login load < 1s

### Navigation
- [ ] Switching pages smooth
- [ ] No lag on menu clicks
- [ ] Active states update quickly

### Animations
- [ ] Hover effects smooth (no lag)
- [ ] Transitions natural
- [ ] Progress bar animation smooth

### Assets
- [ ] Images load quickly
- [ ] Fonts load properly
- [ ] Icons appear immediately (CDN)
- [ ] CSS loads without FOUC

---

## 🔍 Browser Testing

### Chrome
- [ ] All features work
- [ ] Layout correct
- [ ] No console errors
- [ ] Performance good

### Firefox
- [ ] All features work
- [ ] Layout correct
- [ ] No console errors
- [ ] Performance good

### Edge
- [ ] All features work
- [ ] Layout correct
- [ ] No console errors
- [ ] Performance good

### Safari (if available)
- [ ] All features work
- [ ] Layout correct
- [ ] Webkit compatibility

---

## 🐛 Bug Testing

### Common Issues
- [ ] No broken images
- [ ] No 404 errors
- [ ] No console errors
- [ ] No PHP errors
- [ ] No SQL errors
- [ ] No missing CSS
- [ ] No missing JS

### Edge Cases
- [ ] User dengan 0 courses
- [ ] User dengan banyak courses
- [ ] Long course names
- [ ] Special characters in names
- [ ] Empty to-do list
- [ ] Empty task progress

---

## 🔒 Security Testing

### Input Validation
- [ ] Email validation working
- [ ] Password min length (if any)
- [ ] XSS prevention
- [ ] SQL injection prevention

### Authentication
- [ ] Can't access protected routes without login
- [ ] Session timeout works
- [ ] CSRF protection active
- [ ] Password hashing secure

---

## 📊 Data Testing

### Database
- [ ] Migrations ran successfully
- [ ] Seeders created data
- [ ] Relationships working
- [ ] Data displayed correctly

### Sample Data
- [ ] Fakhri account exists
- [ ] Teachers accounts exist
- [ ] Courses created
- [ ] Enrollments created
- [ ] Todos created
- [ ] Task progress created

---

## ✨ User Experience Testing

### First Time User
- [ ] Login page welcoming
- [ ] Instructions clear
- [ ] Navigation intuitive
- [ ] Purpose obvious

### Regular User
- [ ] Quick access to features
- [ ] Information at glance
- [ ] Minimal clicks needed
- [ ] Consistent experience

### Overall Feel
- [ ] Professional appearance
- [ ] Modern design
- [ ] Clean interface
- [ ] Pleasant to use

---

## 📝 Testing Notes

### Date Tested: __________
### Tested By: __________
### Browser: __________
### OS: __________

### Issues Found:
1. ______________________
2. ______________________
3. ______________________

### Recommendations:
1. ______________________
2. ______________________
3. ______________________

---

**Testing Status**: 
- [ ] All tests passed
- [ ] Minor issues found
- [ ] Major issues found
- [ ] Ready for deployment

---

**Signature**: ________________
**Date**: ________________
