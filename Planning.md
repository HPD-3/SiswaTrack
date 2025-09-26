# 🎓 SiswaTrack – Student Information & Academic Management System

SiswaTrack is a **student information and academic management system** built with **Laravel**.  
It provides role-based access for **Admins, Teachers, and Students**, ensuring smooth management of academic data, student profiles, and performance tracking.  

---

## 🚀 Core Features

### 🔐 Authentication & Roles (Laravel Breeze)
- **Admin** → Manage students, teachers, classes, majors, etc.  
- **Teacher** → Manage and view their assigned students only.  
- **Student** → View their own profile, grades, and announcements.  

---

### 🧑‍🎓 Student Management
- CRUD for student data:  
  - `NISN`, full name, birth details, address, major, batch/year, phone, etc.  
- Student status: `Active` / `Inactive`.  
- Track **who added** the student (`added_by`).  

---

### 🏫 Class & Major Management
- Assign students to **classes** & **majors (jurusan)**.  
- Manage **batch / angkatan**.  

---

### 📚 Academic Records
- **Grades**: subjects (mapel), scores, semester-based.  
- **Attendance**: daily absensi tracking.  

---

### 📊 Dashboard & Analytics
- Total students (active / inactive).  
- Charts:
  - Students per **jurusan**.  
  - Students per **angkatan**.  
  - Monthly **new student registrations**.  

---

### 🔍 Search & Filter
- Search by `NISN`, `Name`, or `Jurusan`.  
- Filter by **angkatan** or **status**.  

---

### 🔔 Notifications & Logs
- **Activity logs**: who added / updated / deleted students.  
- (Optional) Push/email notifications when a student is added.  

---

## 🛠️ Tech Stack
- **Backend**: Laravel  
- **Auth**: Laravel Breeze  
- **Database**: MySQL / MariaDB  
- **Frontend**: Blade / (extendable to Vue/React)  

---

## 📂 Project Structure (key modules)
