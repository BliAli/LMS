<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Todo;
use App\Models\TaskProgress;
use App\Models\Grade;
use App\Models\Material;
use App\Models\Announcement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin
        $admin = User::create([
            'name' => 'Sarah Admin',
            'email' => 'admin@lms.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'program' => 'Administrator',
        ]);
        
        // Create Teachers
        $agus = User::create([
            'name' => 'Mr. Agus',
            'email' => 'agus@lms.com',
            'password' => Hash::make('password'),
            'role' => 'teacher',
            'program' => 'Dosen Informatika',
        ]);

        $yanto = User::create([
            'name' => 'Mr. Yanto',
            'email' => 'yanto@lms.com',
            'password' => Hash::make('password'),
            'role' => 'teacher',
            'program' => 'Dosen Informatika',
        ]);

        $purwiyanta = User::create([
            'name' => 'Mr. Purwiyanta',
            'email' => 'purwiyanta@lms.com',
            'password' => Hash::make('password'),
            'role' => 'teacher',
            'program' => 'Dosen Informatika',
        ]);

        // Create Student (Fakhri)
        $fakhri = User::create([
            'name' => 'Fakhri',
            'email' => 'fakhri@lms.com',
            'password' => Hash::make('password'),
            'role' => 'student',
            'program' => 'S1 Informatika',
        ]);

        // Create more students
        $students = [];
        for ($i = 1; $i <= 100; $i++) {
            $students[] = User::create([
                'name' => 'Student ' . $i,
                'email' => 'student' . $i . '@lms.com',
                'password' => Hash::make('password'),
                'role' => 'student',
                'program' => 'S1 Informatika',
            ]);
        }

        // Create Courses for Agus
        $dataScience = Course::create([
            'name' => 'Data Science IF-A',
            'code' => 'IF-421',
            'teacher_id' => $agus->id,
            'day' => 'Monday',
            'start_time' => '14:00:00',
            'end_time' => '15:30:00',
            'description' => 'Mata kuliah Data Science mencakup analisis data, machine learning, dan visualisasi data.',
        ]);

        // Create Courses for Yanto
        $kriptografi = Course::create([
            'name' => 'Machine Learning IF-B',
            'code' => 'IF-532',
            'teacher_id' => $yanto->id,
            'day' => 'Wednesday',
            'start_time' => '10:00:00',
            'end_time' => '11:30:00',
            'description' => 'Pelajari machine learning dan artificial intelligence.',
        ]);
        
        $databaseSystems = Course::create([
            'name' => 'Database Systems IF-C',
            'code' => 'IF-321',
            'teacher_id' => $yanto->id,
            'day' => 'Friday',
            'start_time' => '13:00:00',
            'end_time' => '14:30:00',
            'description' => 'Database design, SQL, and database management systems.',
        ]);

        // Create Courses for Purwiyanta
        $mobileProgramming = Course::create([
            'name' => 'Mobile Programming IF-D',
            'code' => 'IF-D',
            'teacher_id' => $purwiyanta->id,
            'day' => 'Tuesday',
            'start_time' => '14:00:00',
            'end_time' => '15:30:00',
            'description' => 'Pengembangan aplikasi mobile menggunakan framework modern.',
        ]);

        $pengolahan_citra = Course::create([
            'name' => 'Pengolahan Citra IF-E',
            'code' => 'IF-E',
            'teacher_id' => $purwiyanta->id,
            'day' => 'Thursday',
            'start_time' => '14:00:00',
            'end_time' => '15:30:00',
            'description' => 'Teknik pengolahan dan analisis citra digital.',
        ]);

        // Enroll Fakhri to all courses
        $courses = [$dataScience, $kriptografi, $databaseSystems, $mobileProgramming, $pengolahan_citra];
        foreach ($courses as $index => $course) {
            Enrollment::create([
                'user_id' => $fakhri->id,
                'course_id' => $course->id,
                'enrolled_at' => now(),
                'status' => 'active',
                'progress' => [80, 75, 60, 70, 85][$index], // Different progress for each course
            ]);

            // Enroll random students to each course
            $numStudents = rand(30, 45); // 30-45 students per class
            $randomStudents = collect($students)->random(min($numStudents, count($students)));
            foreach ($randomStudents as $student) {
                if (!Enrollment::where('user_id', $student->id)->where('course_id', $course->id)->exists()) {
                    Enrollment::create([
                        'user_id' => $student->id,
                        'course_id' => $course->id,
                        'enrolled_at' => now()->subDays(rand(1, 60)),
                        'status' => 'active',
                        'progress' => rand(30, 95),
                    ]);
                }
            }
        }

        // Create Todos for Fakhri
        Todo::create([
            'user_id' => $fakhri->id,
            'title' => 'Latihan Responsi',
            'description' => 'Selesaikan latihan responsi untuk mata kuliah Data Science',
            'due_date' => Carbon::now()->addDays(1),
            'is_completed' => false,
        ]);

        Todo::create([
            'user_id' => $fakhri->id,
            'title' => 'Resume Pertemuan 9',
            'description' => 'Buat resume untuk pertemuan ke-9',
            'due_date' => Carbon::now()->addDays(2),
            'is_completed' => false,
        ]);

        Todo::create([
            'user_id' => $fakhri->id,
            'title' => 'Laporan Kriptografi',
            'description' => 'Selesaikan laporan tugas kriptografi',
            'due_date' => Carbon::now()->addDays(5),
            'is_completed' => false,
        ]);

        // Create Task Progress for Fakhri
        TaskProgress::create([
            'user_id' => $fakhri->id,
            'title' => 'Resume Pertemuan 9',
            'current' => 5,
            'total' => 10,
        ]);

        TaskProgress::create([
            'user_id' => $fakhri->id,
            'title' => 'Latihan Responsi',
            'current' => 4,
            'total' => 15,
        ]);

        TaskProgress::create([
            'user_id' => $fakhri->id,
            'title' => 'Proyek Akhir Data Science',
            'current' => 2,
            'total' => 20,
        ]);
        
        // Create Grades for Fakhri
        // Current semester (In Progress)
        Grade::create([
            'user_id' => $fakhri->id,
            'course_id' => $dataScience->id,
            'course_code' => 'IF-234',
            'course_name' => 'Data Science IF-A',
            'lecturer' => 'Mr. Agus',
            'semester' => 'Semester 4',
            'status' => 'in_progress',
            'credits' => 3,
        ]);
        
        Grade::create([
            'user_id' => $fakhri->id,
            'course_id' => $kriptografi->id,
            'course_code' => 'IF-348',
            'course_name' => 'Kriptografi IF-B',
            'lecturer' => 'Mr. Yanto',
            'semester' => 'Semester 4',
            'status' => 'in_progress',
            'credits' => 3,
        ]);
        
        Grade::create([
            'user_id' => $fakhri->id,
            'course_id' => $mobileProgramming->id,
            'course_code' => 'IF-542',
            'course_name' => 'Mobile Programming IF-D',
            'lecturer' => 'Mr. Purwiyanta',
            'semester' => 'Semester 4',
            'status' => 'in_progress',
            'credits' => 4,
        ]);
        
        Grade::create([
            'user_id' => $fakhri->id,
            'course_id' => $pengolahan_citra->id,
            'course_code' => 'IF-287',
            'course_name' => 'Pengolahan Citra IF-C',
            'lecturer' => 'Mr. Purwiyanta',
            'semester' => 'Semester 4',
            'status' => 'in_progress',
            'credits' => 3,
        ]);
        
        // Past semesters (Completed)
        Grade::create([
            'user_id' => $fakhri->id,
            'course_id' => null,
            'course_code' => 'IF-101',
            'course_name' => 'Algoritma dan Struktur Data',
            'lecturer' => 'Various',
            'semester' => 'Semester 1',
            'status' => 'completed',
            'grade' => 'A',
            'grade_point' => 4.00,
            'credits' => 4,
        ]);
        
        Grade::create([
            'user_id' => $fakhri->id,
            'course_id' => null,
            'course_code' => 'IF-102',
            'course_name' => 'Basis Data Lanjut',
            'lecturer' => 'Various',
            'semester' => 'Semester 2',
            'status' => 'completed',
            'grade' => 'A-',
            'grade_point' => 3.67,
            'credits' => 3,
        ]);
        
        Grade::create([
            'user_id' => $fakhri->id,
            'course_id' => null,
            'course_code' => 'IF-201',
            'course_name' => 'Pemrograman Web',
            'lecturer' => 'Various',
            'semester' => 'Semester 3',
            'status' => 'completed',
            'grade' => 'B+',
            'grade_point' => 3.33,
            'credits' => 3,
        ]);
        
        // Create Materials for courses
        Material::create([
            'course_id' => $dataScience->id,
            'title' => 'Week 1 - Introduction',
            'description' => 'Introduction to Data Science',
            'week' => 1,
            'uploaded_date' => Carbon::now()->subDays(20),
        ]);
        
        Material::create([
            'course_id' => $dataScience->id,
            'title' => 'Week 2 - Fundamentals',
            'description' => 'Data Science Fundamentals',
            'week' => 2,
            'uploaded_date' => Carbon::now()->subDays(13),
        ]);
        
        Material::create([
            'course_id' => $dataScience->id,
            'title' => 'Week 3 - Advanced Topics',
            'description' => 'Advanced Data Science Topics',
            'week' => 3,
            'uploaded_date' => Carbon::now()->subDays(6),
        ]);
        
        // Materials for Machine Learning
        Material::create([
            'course_id' => $kriptografi->id,
            'title' => 'Week 1 - Introduction',
            'description' => 'Introduction to Machine Learning',
            'week' => 1,
            'uploaded_date' => Carbon::now()->subDays(20),
        ]);
        
        Material::create([
            'course_id' => $kriptografi->id,
            'title' => 'Week 2 - Fundamentals',
            'description' => 'Machine Learning Fundamentals',
            'week' => 2,
            'uploaded_date' => Carbon::now()->subDays(13),
        ]);
        
        Material::create([
            'course_id' => $kriptografi->id,
            'title' => 'Week 3 - Advanced Topics',
            'description' => 'Advanced ML Topics',
            'week' => 3,
            'uploaded_date' => Carbon::now()->subDays(6),
        ]);
        
        // Materials for Database Systems
        Material::create([
            'course_id' => $databaseSystems->id,
            'title' => 'Week 1 - Introduction',
            'description' => 'Introduction to Database Systems',
            'week' => 1,
            'uploaded_date' => Carbon::now()->subDays(20),
        ]);
        
        Material::create([
            'course_id' => $databaseSystems->id,
            'title' => 'Week 2 - Fundamentals',
            'description' => 'Database Fundamentals',
            'week' => 2,
            'uploaded_date' => Carbon::now()->subDays(13),
        ]);
        
        Material::create([
            'course_id' => $databaseSystems->id,
            'title' => 'Week 3 - Advanced Topics',
            'description' => 'Advanced Database Topics',
            'week' => 3,
            'uploaded_date' => Carbon::now()->subDays(6),
        ]);
        
        // Create Announcements
        Announcement::create([
            'course_id' => $dataScience->id,
            'title' => 'Midterm Exam Schedule',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'posted_date' => Carbon::now()->subDays(7),
        ]);
        
        Announcement::create([
            'course_id' => $kriptografi->id,
            'title' => 'Office Hours Update',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'posted_date' => Carbon::now()->subDays(2),
        ]);
        
        Announcement::create([
            'course_id' => $databaseSystems->id,
            'title' => 'Project Submission Guidelines',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'posted_date' => Carbon::now()->subDay(),
        ]);
    }
}
