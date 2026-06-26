# Picha Picasso University — Enterprise Architecture Document

> **Platform:** Laravel 13 / PHP 8.4 / Filament 4 / MySQL 8  
> **Author:** Senior Software Architecture  
> **Status:** Approved for Phased Implementation

---

## SECTION 1: Complete System Modules

```
┌─────────────────────────────────────────────────────────────┐
│                  PICHA PICASSO UNIVERSITY                     │
├─────────────────────────────────────────────────────────────┤
│                                                              │
│  1. AUTH & IDENTITY MODULE                                   │
│     ├── Registration / Login / Password Reset                │
│     ├── Role-Based Access Control (Spatie Permission)        │
│     ├── Email Verification                                   │
│     └── Profile Management                                   │
│                                                              │
│  2. ACADEMIC STRUCTURE MODULE                                │
│     ├── Course Categories                                    │
│     ├── Courses                                              │
│     ├── Subjects (per course)                                │
│     ├── Modules (per subject)                                │
│     └── Topics / Lessons (per module)                        │
│                                                              │
│  3. TEACHER MANAGEMENT MODULE                                │
│     ├── Teacher Profiles                                     │
│     ├── Course Assignment                                    │
│     ├── Student Roster                                       │
│     └── Teacher Dashboard                                    │
│                                                              │
│  4. STUDENT MANAGEMENT MODULE                                │
│     ├── Student Profiles                                     │
│     ├── Enrollment & Tracking                                │
│     ├── Learning Progress                                    │
│     └── Student Dashboard                                    │
│                                                              │
│  5. LEARNING MANAGEMENT SYSTEM (LMS) MODULE                  │
│     ├── Course Outlines                                      │
│     ├── Chapter / Topic Progression                          │
│     ├── Topic Progress Tracking                              │
│     ├── Attendance Tracking                                  │
│     ├── YouTube Tutorial Integration                         │
│     ├── Paid vs Free Topics                                  │
│     └── Self-Study vs Teacher-Led Topics                     │
│                                                              │
│  6. EXAMINATION MODULE                                       │
│     ├── Exam Creation (Teacher)                              │
│     ├── Exam Registration                                    │
│     ├── Exam Fees & Payment                                  │
│     ├── Exam Scheduling                                      │
│     ├── Result Publishing                                    │
│     └── Scorecards                                           │
│                                                              │
│  7. PAYMENT / FINANCE MODULE                                 │
│     ├── Course Fees                                          │
│     ├── Topic/ Lesson Fees                                   │
│     ├── Exam Fees                                            │
│     ├── Certificate Fees                                     │
│     ├── Payment Verification                                 │
│     └── Revenue Reports                                      │
│                                                              │
│  8. CERTIFICATE MODULE                                       │
│     ├── Certificate Generation                               │
│     ├── Certificate Verification (Public)                    │
│     ├── Certificate Download                                 │
│     └── Certificate Templates                                │
│                                                              │
│  9. ANALYTICS & REPORTING MODULE                             │
│     ├── Student Analytics                                    │
│     ├── Revenue Analytics                                    │
│     ├── Course Analytics                                     │
│     ├── Teacher Analytics                                    │
│     ├── Exam Analytics                                       │
│     └── Enrollment Analytics                                 │
│                                                              │
│ 10. COMMUNICATION MODULE                                     │
│     ├── Announcements                                        │
│     ├── Notifications (DB & Mail)                            │
│     ├── Contact Form                                         │
│     └── Reviews & Ratings                                    │
│                                                              │
│ 11. AUDIT & COMPLIANCE MODULE                                │
│     ├── Audit Logs                                           │
│     ├── Activity Logging                                     │
│     └── Data Export                                          │
│                                                              │
└─────────────────────────────────────────────────────────────┘
```

## SECTION 2: User Roles & Permissions

### Roles (3 roles via Spatie Permission)

| Role | Guard | Description |
|------|-------|-------------|
| `super-admin` | web | Full system access, all CRUD, analytics, user management |
| `teacher` | web | Academic content, own students, exams, certificates |
| `student` | web | Enroll, learn, take exams, view certificates |

### Super Admin Permissions

```
user.list | user.create | user.edit | user.delete
teacher.list | teacher.create | teacher.edit | teacher.delete
student.list | student.create | student.edit | student.delete
course.list | course.create | course.edit | course.delete
category.list | category.create | category.edit | category.delete
subject.list | subject.create | subject.edit | subject.delete
module.list | module.create | module.edit | module.delete
topic.list | topic.create | topic.edit | topic.delete
topic.toggle-paid
exam.list | exam.create | exam.edit | exam.delete
exam.approve
certificate.list | certificate.create | certificate.edit | certificate.delete
certificate.verify
payment.list | payment.verify | payment.refund
enrollment.list | enrollment.edit
analytics.view-all
announcement.list | announcement.create | announcement.edit | announcement.delete
settings.view | settings.edit
audit.view
reviews.moderate
```

### Teacher Permissions

```
course.view-assigned
subject.view-assigned
module.create | module.edit | module.delete
topic.create | topic.edit | topic.delete
topic.mark-paid | topic.mark-free
youtube-tutorial.create | youtube-tutorial.edit | youtube-tutorial.delete
exam.create | exam.edit | exam.delete
exam.grade
student.view-assigned
enrollment.view-assigned
certificate.create | certificate.edit
attendance.mark | attendance.edit
progress.view-own-students
announcement.create | announcement.edit
```

### Student Permissions

```
course.browse
enrollment.create | enrollment.view-own
topic.view-enrolled
topic.mark-complete
exam.view-available | exam.register | exam.take
exam-result.view-own
certificate.view-own | certificate.download
payment.make | payment.view-own
review.create | review.edit-own
profile.view-own | profile.edit-own
progress.view-own
attendance.view-own
```

---

## SECTION 3: Complete Database Schema

### Database Name: `picha_picasso_university`

### Table 1: `users`

| Field | Type | Constraints | Index |
|-------|------|-------------|-------|
| id | BIGINT UNSIGNED | PK, AUTO_INCREMENT | PRIMARY |
| name | VARCHAR(255) | NOT NULL | |
| email | VARCHAR(255) | NOT NULL, UNIQUE | UNIQUE |
| email_verified_at | TIMESTAMP | NULLABLE | |
| password | VARCHAR(255) | NOT NULL | |
| phone | VARCHAR(50) | NULLABLE | |
| avatar | VARCHAR(255) | NULLABLE | |
| bio | TEXT | NULLABLE | |
| timezone | VARCHAR(64) | DEFAULT 'UTC' | |
| locale | VARCHAR(10) | DEFAULT 'en' | |
| is_active | BOOLEAN | DEFAULT TRUE | INDEX |
| last_login_at | TIMESTAMP | NULLABLE | |
| remember_token | VARCHAR(100) | NULLABLE | |
| created_at | TIMESTAMP | NULLABLE | |
| updated_at | TIMESTAMP | NULLABLE | |
| deleted_at | TIMESTAMP | NULLABLE | SOFT DELETE |

### Table 2: `teachers`

| Field | Type | Constraints | Index |
|-------|------|-------------|-------|
| id | BIGINT UNSIGNED | PK, AUTO_INCREMENT | PRIMARY |
| user_id | BIGINT UNSIGNED | NOT NULL, FK → users.id | UNIQUE |
| employee_id | VARCHAR(50) | NOT NULL, UNIQUE | UNIQUE |
| qualification | TEXT | NULLABLE | |
| specialization | VARCHAR(255) | NULLABLE | |
| years_of_experience | INT | DEFAULT 0 | |
| social_links | JSON | NULLABLE | |
| is_active | BOOLEAN | DEFAULT TRUE | INDEX |
| hire_date | DATE | NULLABLE | |
| created_at | TIMESTAMP | NULLABLE | |
| updated_at | TIMESTAMP | NULLABLE | |
| deleted_at | TIMESTAMP | NULLABLE | |

### Table 3: `students`

| Field | Type | Constraints | Index |
|-------|------|-------------|-------|
| id | BIGINT UNSIGNED | PK, AUTO_INCREMENT | PRIMARY |
| user_id | BIGINT UNSIGNED | NOT NULL, FK → users.id | UNIQUE |
| student_no | VARCHAR(50) | NOT NULL, UNIQUE | UNIQUE |
| date_of_birth | DATE | NULLABLE | |
| address | TEXT | NULLABLE | |
| city | VARCHAR(100) | NULLABLE | |
| country | VARCHAR(100) | NULLABLE | |
| guardian_name | VARCHAR(255) | NULLABLE | |
| guardian_phone | VARCHAR(50) | NULLABLE | |
| enrollment_date | DATE | NULLABLE | |
| status | ENUM('active','suspended','graduated','expelled') | DEFAULT 'active' | INDEX |
| created_at | TIMESTAMP | NULLABLE | |
| updated_at | TIMESTAMP | NULLABLE | |
| deleted_at | TIMESTAMP | NULLABLE | |

### Table 4: `offices`

| Field | Type | Constraints | Index |
|-------|------|-------------|-------|
| id | BIGINT UNSIGNED | PK, AUTO_INCREMENT | PRIMARY |
| name | VARCHAR(255) | NOT NULL | |
| slug | VARCHAR(255) | NOT NULL, UNIQUE | UNIQUE |
| location | VARCHAR(255) | NULLABLE | |
| phone | VARCHAR(50) | NULLABLE | |
| email | VARCHAR(255) | NULLABLE | |
| working_hours | VARCHAR(255) | NULLABLE | |
| latitude | DECIMAL(10,7) | NULLABLE | |
| longitude | DECIMAL(10,7) | NULLABLE | |
| is_active | BOOLEAN | DEFAULT TRUE | |
| sort_order | INT | DEFAULT 0 | |
| created_at | TIMESTAMP | NULLABLE | |
| updated_at | TIMESTAMP | NULLABLE | |

### Table 5: `course_categories`

| Field | Type | Constraints | Index |
|-------|------|-------------|-------|
| id | BIGINT UNSIGNED | PK, AUTO_INCREMENT | PRIMARY |
| name | VARCHAR(255) | NOT NULL | |
| slug | VARCHAR(255) | NOT NULL, UNIQUE | UNIQUE |
| description | TEXT | NULLABLE | |
| icon | VARCHAR(255) | NULLABLE | |
| thumbnail | VARCHAR(255) | NULLABLE | |
| is_active | BOOLEAN | DEFAULT TRUE | |
| sort_order | INT | DEFAULT 0 | |
| created_at | TIMESTAMP | NULLABLE | |
| updated_at | TIMESTAMP | NULLABLE | |

### Table 6: `courses`

| Field | Type | Constraints | Index |
|-------|------|-------------|-------|
| id | BIGINT UNSIGNED | PK, AUTO_INCREMENT | PRIMARY |
| category_id | BIGINT UNSIGNED | NOT NULL, FK → course_categories.id | INDEX |
| title | VARCHAR(255) | NOT NULL | |
| slug | VARCHAR(255) | NOT NULL, UNIQUE | UNIQUE |
| short_description | VARCHAR(500) | NULLABLE | |
| description | LONGTEXT | NULLABLE | |
| duration | VARCHAR(100) | NULLABLE (e.g., "6 months") | |
| level | ENUM('beginner','intermediate','advanced','all') | DEFAULT 'beginner' | |
| price | DECIMAL(10,2) | DEFAULT 0.00 | INDEX |
| discount_price | DECIMAL(10,2) | NULLABLE | |
| currency | CHAR(3) | DEFAULT 'USD' | |
| thumbnail | VARCHAR(255) | NULLABLE | |
| banner | VARCHAR(255) | NULLABLE | |
| total_lessons | INT | DEFAULT 0 | |
| total_hours | DECIMAL(5,1) | DEFAULT 0 | |
| has_certificate | BOOLEAN | DEFAULT TRUE | |
| is_featured | BOOLEAN | DEFAULT FALSE | INDEX |
| is_published | BOOLEAN | DEFAULT FALSE | INDEX |
| enrollment_count | INT | DEFAULT 0 | INDEX |
| created_at | TIMESTAMP | NULLABLE | |
| updated_at | TIMESTAMP | NULLABLE | |
| deleted_at | TIMESTAMP | NULLABLE | |

### Table 7: `course_teacher` (Pivot)

| Field | Type | Constraints | Index |
|-------|------|-------------|-------|
| id | BIGINT UNSIGNED | PK, AUTO_INCREMENT | PRIMARY |
| course_id | BIGINT UNSIGNED | NOT NULL, FK → courses.id | INDEX |
| teacher_id | BIGINT UNSIGNED | NOT NULL, FK → teachers.id | INDEX |
| is_lead | BOOLEAN | DEFAULT FALSE | |
| created_at | TIMESTAMP | NULLABLE | |

*UNIQUE(course_id, teacher_id)*

### Table 8: `subjects`

| Field | Type | Constraints | Index |
|-------|------|-------------|-------|
| id | BIGINT UNSIGNED | PK, AUTO_INCREMENT | PRIMARY |
| course_id | BIGINT UNSIGNED | NOT NULL, FK → courses.id | INDEX |
| title | VARCHAR(255) | NOT NULL | |
| slug | VARCHAR(255) | NOT NULL | |
| description | TEXT | NULLABLE | |
| sort_order | INT | DEFAULT 0 | INDEX |
| is_published | BOOLEAN | DEFAULT FALSE | |
| created_at | TIMESTAMP | NULLABLE | |
| updated_at | TIMESTAMP | NULLABLE | |
| deleted_at | TIMESTAMP | NULLABLE | |

*UNIQUE(course_id, slug)*

### Table 9: `modules`

| Field | Type | Constraints | Index |
|-------|------|-------------|-------|
| id | BIGINT UNSIGNED | PK, AUTO_INCREMENT | PRIMARY |
| subject_id | BIGINT UNSIGNED | NOT NULL, FK → subjects.id | INDEX |
| title | VARCHAR(255) | NOT NULL | |
| slug | VARCHAR(255) | NOT NULL | |
| description | TEXT | NULLABLE | |
| sort_order | INT | DEFAULT 0 | INDEX |
| is_published | BOOLEAN | DEFAULT FALSE | |
| created_at | TIMESTAMP | NULLABLE | |
| updated_at | TIMESTAMP | NULLABLE | |
| deleted_at | TIMESTAMP | NULLABLE | |

*UNIQUE(subject_id, slug)*

### Table 10: `topics`

| Field | Type | Constraints | Index |
|-------|------|-------------|-------|
| id | BIGINT UNSIGNED | PK, AUTO_INCREMENT | PRIMARY |
| module_id | BIGINT UNSIGNED | NOT NULL, FK → modules.id | INDEX |
| teacher_id | BIGINT UNSIGNED | NULLABLE, FK → teachers.id | INDEX |
| title | VARCHAR(255) | NOT NULL | |
| slug | VARCHAR(255) | NOT NULL | |
| content | LONGTEXT | NULLABLE | |
| content_type | ENUM('text','video','pdf','embedded','youtube') | DEFAULT 'text' | |
| video_url | VARCHAR(500) | NULLABLE | |
| youtube_tutorial_id | BIGINT UNSIGNED | NULLABLE, FK → youtube_tutorials.id | |
| duration_minutes | INT | DEFAULT 0 | |
| is_paid | BOOLEAN | DEFAULT FALSE | INDEX |
| price | DECIMAL(10,2) | DEFAULT 0.00 | |
| is_free_preview | BOOLEAN | DEFAULT FALSE | |
| is_teacher_led | BOOLEAN | DEFAULT FALSE | |
| is_self_study | BOOLEAN | DEFAULT TRUE | |
| sort_order | INT | DEFAULT 0 | INDEX |
| is_published | BOOLEAN | DEFAULT FALSE | INDEX |
| created_at | TIMESTAMP | NULLABLE | |
| updated_at | TIMESTAMP | NULLABLE | |
| deleted_at | TIMESTAMP | NULLABLE | |

*UNIQUE(module_id, slug)*

### Table 11: `topic_progress`

| Field | Type | Constraints | Index |
|-------|------|-------------|-------|
| id | BIGINT UNSIGNED | PK, AUTO_INCREMENT | PRIMARY |
| student_id | BIGINT UNSIGNED | NOT NULL, FK → students.id | INDEX |
| topic_id | BIGINT UNSIGNED | NOT NULL, FK → topics.id | INDEX |
| status | ENUM('not_started','in_progress','completed') | DEFAULT 'not_started' | INDEX |
| progress_percentage | INT | DEFAULT 0 | |
| started_at | TIMESTAMP | NULLABLE | |
| completed_at | TIMESTAMP | NULLABLE | |
| time_spent_minutes | INT | DEFAULT 0 | |
| created_at | TIMESTAMP | NULLABLE | |
| updated_at | TIMESTAMP | NULLABLE | |

*UNIQUE(student_id, topic_id)*

### Table 12: `attendances`

| Field | Type | Constraints | Index |
|-------|------|-------------|-------|
| id | BIGINT UNSIGNED | PK, AUTO_INCREMENT | PRIMARY |
| student_id | BIGINT UNSIGNED | NOT NULL, FK → students.id | INDEX |
| topic_id | BIGINT UNSIGNED | NOT NULL, FK → topics.id | INDEX |
| teacher_id | BIGINT UNSIGNED | NOT NULL, FK → teachers.id | INDEX |
| status | ENUM('present','absent','late','excused') | DEFAULT 'present' | |
| date | DATE | NOT NULL | INDEX |
| notes | TEXT | NULLABLE | |
| created_at | TIMESTAMP | NULLABLE | |
| updated_at | TIMESTAMP | NULLABLE | |

*UNIQUE(student_id, topic_id, date)*

### Table 13: `enrollments`

| Field | Type | Constraints | Index |
|-------|------|-------------|-------|
| id | BIGINT UNSIGNED | PK, AUTO_INCREMENT | PRIMARY |
| student_id | BIGINT UNSIGNED | NOT NULL, FK → students.id | INDEX |
| course_id | BIGINT UNSIGNED | NOT NULL, FK → courses.id | INDEX |
| enrollment_date | DATE | NOT NULL | |
| status | ENUM('pending','active','completed','cancelled','expelled') | DEFAULT 'pending' | INDEX |
| progress_percentage | INT | DEFAULT 0 | |
| is_paid | BOOLEAN | DEFAULT FALSE | |
| paid_amount | DECIMAL(10,2) | DEFAULT 0.00 | |
| payment_method | VARCHAR(50) | NULLABLE | |
| transaction_id | VARCHAR(255) | NULLABLE | |
| expires_at | DATE | NULLABLE | |
| completed_at | TIMESTAMP | NULLABLE | |
| created_at | TIMESTAMP | NULLABLE | |
| updated_at | TIMESTAMP | NULLABLE | |
| deleted_at | TIMESTAMP | NULLABLE | |

*UNIQUE(student_id, course_id)*

### Table 14: `enrollment_tracking`

| Field | Type | Constraints | Index |
|-------|------|-------------|-------|
| id | BIGINT UNSIGNED | PK, AUTO_INCREMENT | PRIMARY |
| enrollment_id | BIGINT UNSIGNED | NOT NULL, FK → enrollments.id | INDEX |
| event_type | ENUM('enrolled','topic_started','topic_completed','exam_registered','exam_passed','exam_failed','certificate_issued','payment_made','course_completed') | NOT NULL | INDEX |
| description | TEXT | NULLABLE | |
| metadata | JSON | NULLABLE | |
| created_at | TIMESTAMP | NULLABLE | |

### Table 15: `youtube_tutorials`

| Field | Type | Constraints | Index |
|-------|------|-------------|-------|
| id | BIGINT UNSIGNED | PK, AUTO_INCREMENT | PRIMARY |
| teacher_id | BIGINT UNSIGNED | NOT NULL, FK → teachers.id | INDEX |
| course_id | BIGINT UNSIGNED | NULLABLE, FK → courses.id | INDEX |
| subject_id | BIGINT UNSIGNED | NULLABLE, FK → subjects.id | |
| title | VARCHAR(255) | NOT NULL | |
| slug | VARCHAR(255) | NOT NULL, UNIQUE | UNIQUE |
| description | TEXT | NULLABLE | |
| youtube_id | VARCHAR(100) | NOT NULL | |
| youtube_url | VARCHAR(500) | NOT NULL | |
| duration | VARCHAR(20) | NULLABLE | |
| thumbnail | VARCHAR(500) | NULLABLE | |
| is_published | BOOLEAN | DEFAULT TRUE | INDEX |
| views | INT | DEFAULT 0 | |
| created_at | TIMESTAMP | NULLABLE | |
| updated_at | TIMESTAMP | NULLABLE | |
| deleted_at | TIMESTAMP | NULLABLE | |

### Table 16: `exams`

| Field | Type | Constraints | Index |
|-------|------|-------------|-------|
| id | BIGINT UNSIGNED | PK, AUTO_INCREMENT | PRIMARY |
| course_id | BIGINT UNSIGNED | NOT NULL, FK → courses.id | INDEX |
| teacher_id | BIGINT UNSIGNED | NOT NULL, FK → teachers.id | INDEX |
| title | VARCHAR(255) | NOT NULL | |
| slug | VARCHAR(255) | NOT NULL, UNIQUE | UNIQUE |
| description | TEXT | NULLABLE | |
| exam_type | ENUM('exam_1','exam_2','exam_3','final_graduation') | NOT NULL | INDEX |
| pass_percentage | INT | DEFAULT 50 | |
| duration_minutes | INT | NOT NULL | |
| total_marks | INT | NOT NULL | |
| fee | DECIMAL(10,2) | DEFAULT 0.00 | |
| registration_deadline | DATETIME | NULLABLE | |
| exam_date | DATETIME | NULLABLE | |
| is_published | BOOLEAN | DEFAULT FALSE | INDEX |
| sort_order | INT | DEFAULT 0 | |
| created_at | TIMESTAMP | NULLABLE | |
| updated_at | TIMESTAMP | NULLABLE | |
| deleted_at | TIMESTAMP | NULLABLE | |

### Table 17: `exam_questions`

| Field | Type | Constraints | Index |
|-------|------|-------------|-------|
| id | BIGINT UNSIGNED | PK, AUTO_INCREMENT | PRIMARY |
| exam_id | BIGINT UNSIGNED | NOT NULL, FK → exams.id | INDEX |
| question | TEXT | NOT NULL | |
| question_type | ENUM('multiple_choice','true_false','essay','short_answer') | DEFAULT 'multiple_choice' | |
| options | JSON | NULLABLE | |
| correct_answer | TEXT | NOT NULL | |
| marks | INT | DEFAULT 1 | |
| sort_order | INT | DEFAULT 0 | |
| created_at | TIMESTAMP | NULLABLE | |
| updated_at | TIMESTAMP | NULLABLE | |

### Table 18: `exam_registrations`

| Field | Type | Constraints | Index |
|-------|------|-------------|-------|
| id | BIGINT UNSIGNED | PK, AUTO_INCREMENT | PRIMARY |
| exam_id | BIGINT UNSIGNED | NOT NULL, FK → exams.id | INDEX |
| student_id | BIGINT UNSIGNED | NOT NULL, FK → students.id | INDEX |
| registration_date | DATETIME | NOT NULL | |
| status | ENUM('registered','paid','cancelled','attended','absent') | DEFAULT 'registered' | INDEX |
| fee_paid | BOOLEAN | DEFAULT FALSE | |
| fee_amount | DECIMAL(10,2) | DEFAULT 0.00 | |
| transaction_id | VARCHAR(255) | NULLABLE | |
| payment_verified_at | TIMESTAMP | NULLABLE | |
| verified_by | BIGINT UNSIGNED | NULLABLE, FK → users.id | |
| created_at | TIMESTAMP | NULLABLE | |
| updated_at | TIMESTAMP | NULLABLE | |

*UNIQUE(exam_id, student_id)*

### Table 19: `exam_results`

| Field | Type | Constraints | Index |
|-------|------|-------------|-------|
| id | BIGINT UNSIGNED | PK, AUTO_INCREMENT | PRIMARY |
| exam_registration_id | BIGINT UNSIGNED | NOT NULL, FK → exam_registrations.id | UNIQUE |
| student_id | BIGINT UNSIGNED | NOT NULL, FK → students.id | INDEX |
| exam_id | BIGINT UNSIGNED | NOT NULL, FK → exams.id | INDEX |
| total_marks_obtained | INT | DEFAULT 0 | |
| percentage | DECIMAL(5,2) | DEFAULT 0.00 | |
| passed | BOOLEAN | DEFAULT FALSE | INDEX |
| graded_by | BIGINT UNSIGNED | NULLABLE, FK → teachers.id | |
| graded_at | TIMESTAMP | NULLABLE | |
| started_at | TIMESTAMP | NULLABLE | |
| submitted_at | TIMESTAMP | NULLABLE | |
| answers | JSON | NULLABLE | |
| remarks | TEXT | NULLABLE | |
| created_at | TIMESTAMP | NULLABLE | |
| updated_at | TIMESTAMP | NULLABLE | |

### Table 20: `certificates`

| Field | Type | Constraints | Index |
|-------|------|-------------|-------|
| id | BIGINT UNSIGNED | PK, AUTO_INCREMENT | PRIMARY |
| student_id | BIGINT UNSIGNED | NOT NULL, FK → students.id | INDEX |
| course_id | BIGINT UNSIGNED | NOT NULL, FK → courses.id | INDEX |
| certificate_no | VARCHAR(100) | NOT NULL, UNIQUE | UNIQUE |
| verification_code | VARCHAR(100) | NOT NULL, UNIQUE | UNIQUE |
| title | VARCHAR(255) | NOT NULL | |
| description | TEXT | NULLABLE | |
| grade | VARCHAR(20) | NULLABLE (e.g., 'A', 'B+', 'Distinction') | |
| total_marks | INT | NULLABLE | |
| percentage | DECIMAL(5,2) | NULLABLE | |
| issue_date | DATE | NOT NULL | INDEX |
| expiry_date | DATE | NULLABLE | |
| template | VARCHAR(100) | DEFAULT 'default' | |
| file_path | VARCHAR(500) | NULLABLE (generated PDF) | |
| is_verified | BOOLEAN | DEFAULT FALSE | |
| issued_by | BIGINT UNSIGNED | NULLABLE, FK → users.id | |
| metadata | JSON | NULLABLE | |
| created_at | TIMESTAMP | NULLABLE | |
| updated_at | TIMESTAMP | NULLABLE | |
| deleted_at | TIMESTAMP | NULLABLE | |

*UNIQUE(student_id, course_id)*

### Table 21: `payments`

| Field | Type | Constraints | Index |
|-------|------|-------------|-------|
| id | BIGINT UNSIGNED | PK, AUTO_INCREMENT | PRIMARY |
| user_id | BIGINT UNSIGNED | NOT NULL, FK → users.id | INDEX |
| student_id | BIGINT UNSIGNED | NULLABLE, FK → students.id | INDEX |
| payable_type | VARCHAR(100) | NOT NULL (polymorphic) | INDEX |
| payable_id | BIGINT UNSIGNED | NOT NULL (polymorphic) | INDEX |
| transaction_id | VARCHAR(255) | NULLABLE, UNIQUE | UNIQUE |
| reference | VARCHAR(255) | NOT NULL, UNIQUE | UNIQUE |
| amount | DECIMAL(10,2) | NOT NULL | INDEX |
| currency | CHAR(3) | DEFAULT 'USD' | |
| payment_method | VARCHAR(50) | NULLABLE | |
| status | ENUM('pending','processing','completed','failed','refunded') | DEFAULT 'pending' | INDEX |
| paid_at | TIMESTAMP | NULLABLE | |
| verified_by | BIGINT UNSIGNED | NULLABLE, FK → users.id | |
| notes | TEXT | NULLABLE | |
| metadata | JSON | NULLABLE | |
| created_at | TIMESTAMP | NULLABLE | |
| updated_at | TIMESTAMP | NULLABLE | |

### Table 22: `reviews`

| Field | Type | Constraints | Index |
|-------|------|-------------|-------|
| id | BIGINT UNSIGNED | PK, AUTO_INCREMENT | PRIMARY |
| student_id | BIGINT UNSIGNED | NOT NULL, FK → students.id | INDEX |
| course_id | BIGINT UNSIGNED | NOT NULL, FK → courses.id | INDEX |
| review | TEXT | NULLABLE | |
| is_approved | BOOLEAN | DEFAULT FALSE | INDEX |
| created_at | TIMESTAMP | NULLABLE | |
| updated_at | TIMESTAMP | NULLABLE | |

*UNIQUE(student_id, course_id)*

### Table 23: `ratings`

| Field | Type | Constraints | Index |
|-------|------|-------------|-------|
| id | BIGINT UNSIGNED | PK, AUTO_INCREMENT | PRIMARY |
| review_id | BIGINT UNSIGNED | NULLABLE, FK → reviews.id | INDEX |
| student_id | BIGINT UNSIGNED | NOT NULL, FK → students.id | INDEX |
| rateable_type | VARCHAR(100) | NOT NULL (polymorphic) | INDEX |
| rateable_id | BIGINT UNSIGNED | NOT NULL (polymorphic) | INDEX |
| rating | TINYINT UNSIGNED | NOT NULL (1-5) | |
| created_at | TIMESTAMP | NULLABLE | |
| updated_at | TIMESTAMP | NULLABLE | |

*UNIQUE(student_id, rateable_type, rateable_id)*

### Table 24: `contacts`

| Field | Type | Constraints | Index |
|-------|------|-------------|-------|
| id | BIGINT UNSIGNED | PK, AUTO_INCREMENT | PRIMARY |
| name | VARCHAR(255) | NOT NULL | |
| email | VARCHAR(255) | NOT NULL | |
| phone | VARCHAR(50) | NULLABLE | |
| subject | VARCHAR(255) | NOT NULL | |
| message | TEXT | NOT NULL | |
| is_read | BOOLEAN | DEFAULT FALSE | INDEX |
| replied_at | TIMESTAMP | NULLABLE | |
| created_at | TIMESTAMP | NULLABLE | |
| updated_at | TIMESTAMP | NULLABLE | |

### Table 25: `announcements`

| Field | Type | Constraints | Index |
|-------|------|-------------|-------|
| id | BIGINT UNSIGNED | PK, AUTO_INCREMENT | PRIMARY |
| user_id | BIGINT UNSIGNED | NOT NULL, FK → users.id | INDEX |
| title | VARCHAR(255) | NOT NULL | |
| slug | VARCHAR(255) | NOT NULL, UNIQUE | UNIQUE |
| content | TEXT | NOT NULL | |
| type | ENUM('general','academic','exam','payment','emergency') | DEFAULT 'general' | INDEX |
| target_audience | ENUM('all','students','teachers','specific_course') | DEFAULT 'all' | |
| course_id | BIGINT UNSIGNED | NULLABLE, FK → courses.id | |
| is_published | BOOLEAN | DEFAULT FALSE | INDEX |
| published_at | TIMESTAMP | NULLABLE | |
| created_at | TIMESTAMP | NULLABLE | |
| updated_at | TIMESTAMP | NULLABLE | |
| deleted_at | TIMESTAMP | NULLABLE | |

### Table 26: `analytics` (Aggregated/Cached)

| Field | Type | Constraints | Index |
|-------|------|-------------|-------|
| id | BIGINT UNSIGNED | PK, AUTO_INCREMENT | PRIMARY |
| metric | VARCHAR(100) | NOT NULL | INDEX |
| value | DECIMAL(15,2) | NOT NULL | |
| period | ENUM('daily','weekly','monthly','yearly') | NOT NULL | INDEX |
| period_date | DATE | NOT NULL | INDEX |
| metadata | JSON | NULLABLE | |
| created_at | TIMESTAMP | NULLABLE | |
| updated_at | TIMESTAMP | NULLABLE | |

*UNIQUE(metric, period, period_date)*

### Table 27: `audit_logs`

| Field | Type | Constraints | Index |
|-------|------|-------------|-------|
| id | BIGINT UNSIGNED | PK, AUTO_INCREMENT | PRIMARY |
| user_id | BIGINT UNSIGNED | NULLABLE, FK → users.id | INDEX |
| action | VARCHAR(100) | NOT NULL | INDEX |
| description | TEXT | NULLABLE | |
| auditable_type | VARCHAR(100) | NOT NULL | INDEX |
| auditable_id | BIGINT UNSIGNED | NOT NULL | INDEX |
| old_values | JSON | NULLABLE | |
| new_values | JSON | NULLABLE | |
| ip_address | VARCHAR(45) | NULLABLE | |
| user_agent | VARCHAR(500) | NULLABLE | |
| created_at | TIMESTAMP | NULLABLE | |

### Table 28: `notifications`

Laravel default `notifications` table with:

| Field | Type | Constraints |
|-------|------|-------------|
| id | CHAR(36) | PK |
| type | VARCHAR(255) | NOT NULL |
| notifiable_type | VARCHAR(255) | NOT NULL |
| notifiable_id | BIGINT UNSIGNED | NOT NULL |
| data | JSON | NOT NULL |
| read_at | TIMESTAMP | NULLABLE |
| created_at | TIMESTAMP | NULLABLE |
| updated_at | TIMESTAMP | NULLABLE |

### Spatie Permission Tables (default)

| Table | Purpose |
|-------|---------|
| `permissions` | All permissions |
| `roles` | All roles |
| `model_has_roles` | User-role assignment |
| `model_has_permissions` | Direct user-permission |
| `role_has_permissions` | Role-permission assignment |

### Spatie Media Library Tables (default)

| Table | Purpose |
|-------|---------|
| `media` | Media files metadata |
| `mediables` | Polymorphic media associations |

### Laravel Session Table

`sessions` — Laravel default for DB sessions.

### Laravel Job/Batch Tables

`jobs`, `job_batches`, `failed_jobs` — Laravel default for queues.

---

## SECTION 4: Eloquent Relationships

```
User (1) ──hasOne──> Teacher (1)
User (1) ──hasOne──> Student (1)

Teacher (1) ──belongsToMany──> Course (N)  [course_teacher pivot]
Teacher (1) ──hasMany──> Topic (N)
Teacher (1) ──hasMany──> Exam (N)
Teacher (1) ──hasMany──> YoutubeTutorial (N)
Teacher (1) ──hasMany──> Attendance (N)
Teacher (1) ──hasManyThrough──> Student (N)  [via enrolled courses]

Student (1) ──belongsToMany──> Course (N)  [enrollments pivot]
Student (1) ──hasMany──> TopicProgress (N)
Student (1) ──hasMany──> Enrollment (N)
Student (1) ──hasMany──> Attendance (N)
Student (1) ──hasMany──> ExamRegistration (N)
Student (1) ──hasMany──> ExamResult (N)
Student (1) ──hasMany──> Certificate (N)
Student (1) ──hasMany──> Payment (N)
Student (1) ──hasMany──> Review (N)
Student (1) ──hasMany──> Rating (N)

CourseCategory (1) ──hasMany──> Course (N)
Course (N) ──belongsTo──> CourseCategory (1)
Course (N) ──belongsToMany──> Teacher (N)  [course_teacher]
Course (N) ──hasMany──> Subject (N)
Course (N) ──hasMany──> Exam (N)
Course (N) ──hasMany──> Enrollment (N)
Course (N) ──hasMany──> Certificate (N)
Course (N) ──hasMany──> Review (N)
Course (N) ──hasMany──> YoutubeTutorial (N)
Course (N) ──hasMany──> Announcement (N)

Subject (N) ──belongsTo──> Course (1)
Subject (N) ──hasMany──> Module (N)

Module (N) ──belongsTo──> Subject (1)
Module (N) ──hasMany──> Topic (N)

Topic (N) ──belongsTo──> Module (1)
Topic (N) ──belongsTo──> Teacher (1)
Topic (N) ──belongsTo──> YoutubeTutorial (1)
Topic (N) ──hasMany──> TopicProgress (N)
Topic (N) ──hasMany──> Attendance (N)

TopicProgress (N) ──belongsTo──> Student (1)
TopicProgress (N) ──belongsTo──> Topic (1)

Exam (N) ──belongsTo──> Course (1)
Exam (N) ──belongsTo──> Teacher (1)
Exam (N) ──hasMany──> ExamQuestion (N)
Exam (N) ──hasMany──> ExamRegistration (N)
Exam (N) ──hasMany──> ExamResult (N)

ExamQuestion (N) ──belongsTo──> Exam (1)

ExamRegistration (N) ──belongsTo──> Exam (1)
ExamRegistration (N) ──belongsTo──> Student (1)
ExamRegistration (1) ──hasOne──> ExamResult (1)

ExamResult (N) ──belongsTo──> ExamRegistration (1)
ExamResult (N) ──belongsTo──> Student (1)
ExamResult (N) ──belongsTo──> Exam (1)
ExamResult (N) ──belongsTo──> Teacher (1) [graded_by]

Certificate (N) ──belongsTo──> Student (1)
Certificate (N) ──belongsTo──> Course (1)

Payment (N) ──belongsTo──> User (1)
Payment (N) ──morphTo──> payable (Course, Topic, ExamRegistration, Certificate)

Review (N) ──belongsTo──> Student (1)
Review (N) ──belongsTo──> Course (1)
Review (1) ──hasOne──> Rating (1)

Rating (N) ──belongsTo──> Student (1)
Rating (N) ──morphTo──> rateable (Course, Teacher, Topic)

Contact (N) ── (standalone, no user relation — public form)

Announcement (N) ──belongsTo──> User (1)
Announcement (N) ──belongsTo──> Course (1) [optional]

EnrollmentTracking (N) ──belongsTo──> Enrollment (1)
```

### Polymorphic Map

| Morph Map Key | Model |
|---------------|-------|
| `course` | App\Models\Course |
| `topic` | App\Models\Topic |
| `exam` | App\Models\Exam |
| `exam-registration` | App\Models\ExamRegistration |
| `certificate` | App\Models\Certificate |

---

## SECTION 5: Complete Public Website Design

### Pages & Routes

| # | Page | Route | Controller Method |
|---|------|-------|-------------------|
| 1 | Homepage | `/` | `HomeController@index` |
| 2 | About Us | `/about` | `PageController@about` |
| 3 | Contact | `/contact` | `PageController@contact` |
| 4 | Offices | `/offices` | `OfficeController@index` |
| 5 | Teachers | `/teachers` | `TeacherController@index` |
| 6 | Teacher Detail | `/teachers/{slug}` | `TeacherController@show` |
| 7 | Courses | `/courses` | `CourseController@index` |
| 8 | Course Detail | `/courses/{slug}` | `CourseController@show` |
| 9 | Enrollment | `/courses/{slug}/enroll` | `EnrollmentController@create` |
| 10 | Enrollment Tracking | `/enrollments/track` | `EnrollmentController@track` |
| 11 | YouTube Tutorials | `/tutorials` | `YoutubeTutorialController@index` |
| 12 | Student Dashboard | `/dashboard` | `DashboardController@index` |
| 13 | Learning Page | `/learning/{course}/{module}/{topic}` | `LearningController@show` |
| 14 | Certificate Verify | `/certificates/verify/{code}` | `CertificateController@verify` |

### Homepage Sections

```
┌──────────────────────────────────────────────────┐
│  HERO SECTION                                    │
│  ┌──────────────────────────────────────┐        │
│  │  Headline: "Shape Your Future at     │        │
│  │  Picha Picasso University"           │        │
│  │  Subtext: Industry-leading education │        │
│  │  CTA: "Browse Courses" | "Enroll Now" │       │
│  │  Background: Video/Image carousel    │        │
│  └──────────────────────────────────────┘        │
├──────────────────────────────────────────────────┤
│  WHY PICHA PICASSO SECTION                       │
│  ┌──────┐ ┌──────┐ ┌──────┐ ┌──────┐           │
│  │Icon 1│ │Icon 2│ │Icon 3│ │Icon 4│           │
│  │Expert│ │Hands-│ │Certi-│ │Flexi-│            │
│  │Teachers│ │on    │ │fied  │ │ble   │          │
│  │      │ │Learn │ │       │ │      │           │
│  └──────┘ └──────┘ └──────┘ └──────┘           │
├──────────────────────────────────────────────────┤
│  COURSES SECTION                                 │
│  ┌──────┐ ┌──────┐ ┌──────┐ ┌──────┐           │
│  │Course│ │Course│ │Course│ │Course│           │
│  │Card 1│ │Card 2│ │Card 3│ │Card 4│           │
│  └──────┘ └──────┘ └──────┘ └──────┘           │
│  [View All Courses →]                           │
├──────────────────────────────────────────────────┤
│  STUDENT STATISTICS                              │
│  ┌─────────┐ ┌─────────┐ ┌─────────┐           │
│  │ 2,500+  │ │   98%   │ │   50+   │           │
│  │ Students│ │Pass Rate│ │ Courses │           │
│  └─────────┘ └─────────┘ └─────────┘           │
├──────────────────────────────────────────────────┤
│  TEACHER STATISTICS                              │
│  ┌─────────┐ ┌─────────┐ ┌─────────┐           │
│  │   8     │ │  200+   │ │  500+   │           │
│  │ Teachers│ │YouTube  │ │Certified│           │
│  │         │ │Tutorials│ │Students │           │
│  └─────────┘ └─────────┘ └─────────┘           │
├──────────────────────────────────────────────────┤
│  REVIEWS & RATINGS SECTION                       │
│  ┌──────────────────────────────────────┐        │
│  │ Testimonial Carousel                 │        │
│  │ ⭐⭐⭐⭐⭐ "Best university ever"    │        │
│  │ — Student Name                       │        │
│  └──────────────────────────────────────┘        │
├──────────────────────────────────────────────────┤
│  FOOTER                                          │
│  ┌──────┐ ┌──────┐ ┌──────┐ ┌──────┐           │
│  │Quick │ │Courses│ │Contact│ │Social│          │
│  │Links │ │       │ │       │ │      │          │
│  └──────┘ └──────┘ └──────┘ └──────┘           │
└──────────────────────────────────────────────────┘
```

### Course Detail Page Layout

```
┌──────────────────────────────────────────────────┐
│  Course Banner/Header                            │
│  ┌────────────────────────────────────────┐      │
│  │  Title: "Computer Science"             │      │
│  │  Category • Level • Duration           │      │
│  │  Price: $499 — CTA: "Enroll Now"       │      │
│  └────────────────────────────────────────┘      │
├──────────────────────────────────────────────────┤
│  Course Content (Tabbed or Side-by-Side)         │
│  ┌───────────────┐ ┌──────────────────────┐      │
│  │ Course Outline │ │   Instructors        │      │
│  │ ├─ Subject 1   │ │   Teacher Card x3    │      │
│  │ │ ├─ Module 1  │ └──────────────────────┘      │
│  │ │ └─ Module 2 │                              │
│  │ ├─ Subject 2   │ ┌──────────────────────┐      │
│  │ └─ Subject 3   │ │   Reviews & Ratings  │      │
│  └───────────────┘ └──────────────────────┘      │
└──────────────────────────────────────────────────┘
```

---

## SECTION 6: Filament Admin Panel Resources

### Navigation Groups

```
📊 Analytics Dashboard (default)
👥 User Management
  ├── Users
  ├── Teachers
  └── Students
📚 Academic
  ├── Course Categories
  ├── Courses
  ├── Subjects
  ├── Modules
  └── Topics
📖 Learning
  ├── YouTube Tutorials
  └── Attendances
📝 Examinations
  ├── Exams
  ├── Exam Questions
  ├── Exam Registrations
  └── Exam Results
🎓 Certificates
💰 Payments
⭐ Reviews & Ratings
📢 Communication
  ├── Announcements
  └── Contacts
📋 System
  ├── Offices
  ├── Audit Logs
  ├── Roles (Spatie)
  └── Permissions (Spatie)
```

### Resource Definitions

| Resource | Model | Icon | Key Features |
|----------|-------|------|-------------|
| UserResource | User | `heroicon-o-users` | CRUD, roles, activate/deactivate, impersonate |
| TeacherResource | Teacher | `heroicon-o-academic-cap` | CRUD, course assignment (Repeater), qualifications |
| StudentResource | Student | `heroicon-o-user-group` | CRUD, enrollment history, status badges |
| CourseCategoryResource | CourseCategory | `heroicon-o-tag` | CRUD, sort order, icon picker |
| CourseResource | Course | `heroicon-o-book-open` | CRUD, media (thumbnail/banner), pricing, teacher assignment (multi-select), featured toggle |
| SubjectResource | Subject | `heroicon-o-collection` | CRUD, course select, sortable |
| ModuleResource | Module | `heroicon-o-folder` | CRUD, subject select, sortable |
| TopicResource | Topic | `heroicon-o-document-text` | CRUD, rich text editor (Tiptik), YouTube link, paid/free toggle, teacher select |
| YoutubeTutorialResource | YoutubeTutorial | `heroicon-o-play` | CRUD, YouTube embed, teacher select |
| AttendanceResource | Attendance | `heroicon-o-clipboard-check` | Mark attendance per topic/date, status select |
| ExamResource | Exam | `heroicon-o-clipboard-document-list` | CRUD, exam type select, fee, questions (Repeater), publish toggle |
| ExamQuestionResource | ExamQuestion | `heroicon-o-question-mark-circle` | CRUD, question type, options (JSON), correct answer |
| ExamRegistrationResource | ExamRegistration | `heroicon-o-document-check` | Status management, payment verification |
| ExamResultResource | ExamResult | `heroicon-o-chart-bar` | Grade entry, pass/fail toggle, scorecard view |
| CertificateResource | Certificate | `heroicon-o-document` | Issue, regenerate PDF, verify/invalidate |
| PaymentResource | Payment | `heroicon-o-currency-dollar` | View, verify, refund, filter by status/date range |
| ReviewResource | Review | `heroicon-o-star` | Moderate, approve/reject, view ratings |
| AnnouncementResource | Announcement | `heroicon-o-megaphone` | CRUD, audience select, publish scheduling |
| ContactResource | Contact | `heroicon-o-inbox` | View, mark read, reply |
| OfficeResource | Office | `heroicon-o-building-office` | CRUD, location, contact info |
| AnalyticsResource | Analytics (Widget) | `heroicon-o-chart-pie` | Dashboard widgets only (no CRUD) |

### Global Search

Enable global search for: Users, Courses, Students, Teachers, Certificates.

### Widgets on Admin Dashboard

```
┌──────────────────────────────────────────────────────┐
│  STATS OVERVIEW (Row of 4)                          │
│  ┌──────────┐ ┌──────────┐ ┌──────────┐ ┌──────────┐ │
│  │Total     │ │Total     │ │Active    │ │Revenue   │ │
│  │Students  │ │Courses   │ │Enrollments│ │This Month│ │
│  │  2,500   │ │   6      │ │  1,800   │ │  $45,000 │ │
│  └──────────┘ └──────────┘ └──────────┘ └──────────┘ │
├──────────────────────────────────────────────────────┤
│  ENROLLMENT CHART (Line Chart - Monthly)             │
│  ┌──────────────────────────────────────────────┐    │
│  │  📈 Enrollments over time                     │    │
│  └──────────────────────────────────────────────┘    │
├──────────────────────────────────────────────────────┤
│  REVENUE CHART (Bar Chart - Monthly)                 │
│  ┌──────────────────────────────────────────────┐    │
│  │  💰 Revenue over time                         │    │
│  └──────────────────────────────────────────────┘    │
├──────────────────────────────────────────────────────┤
│  RECENT ENROLLMENTS (Table - latest 10)              │
│  ├─────────────┬────────────┬──────────┬───────────┤│
│  │ Student     │ Course     │ Date     │ Status    ││
│  └─────────────┴────────────┴──────────┴───────────┘│
├──────────────────────────────────────────────────────┤
│  PENDING PAYMENTS (Table)                            │
├──────────────────────────────────────────────────────┤
│  RECENT ACTIVITY (Audit Log Feed)                    │
└──────────────────────────────────────────────────────┘
```

---

## SECTION 7: Learning Management System (LMS) Design

### Course Structure Hierarchy

```
Course
 └── Subject 1
      └── Module 1 (e.g., "Introduction")
           └── Topic 1 (Free Preview — Video)
           └── Topic 2 (Free — Text)
           └── Topic 3 (Paid — $10)
      └── Module 2 (e.g., "Advanced Concepts")
           └── Topic 4 (Teacher-led — Zoom/Live)
           └── Topic 5 (Self-study — PDF)
           └── Topic 6 (YouTube Tutorial)
 └── Subject 2
      └── Module 3
           └── ...
```

### Topic Types

| Type | `is_teacher_led` | `is_self_study` | `content_type` | Behavior |
|------|------------------|-----------------|----------------|----------|
| Teacher-led | true | false | any | Requires attendance tracking, teacher schedules |
| Self-study | false | true | text/video/pdf | Student progresses independently |
| YouTube | false | true | youtube | Embedded YouTube video, linked to tutorials |

### Progress Tracking Flow

```
Student enrolls → Course dashboard shows subjects/modules
  → Student clicks topic → TopicProgress created (status: not_started)
  → Student starts reading/watching → status: in_progress
  → Student marks complete → status: completed, completed_at: now
  → Module progress recalculated
  → Subject progress recalculated
  → Course progress recalculated (enrollment.progress_percentage updated)
  → EnrollmentTracking record created
  → If 100% → enrollment status: completed
```

### Attendance Tracking

```
Teacher-led topics only:
  Teacher marks attendance per student per topic date
  Statuses: present, absent, late, excused
  Attendance visible on Student Dashboard
```

### Paid vs Free Lessons

```
Topics.is_paid = false → Accessible to all enrolled students
Topics.is_paid = true → Requires additional payment via Payments
  → Payment.payable_type = 'topic', payable_id = topic.id
  → Access granted only if payment.status = 'completed'
```

---

## SECTION 8: Examination System Design

### Exam Progression

```
Course Enrollment
        │
        ▼
┌─────────────────┐     ┌──────────────────┐
│   EXAM 1 (30%)   │────▶│  Register + Pay  │
│  Covers Overview │     │  Fee: $30        │
└────────┬────────┘     └──────────────────┘
         │
         ▼
┌─────────────────┐     ┌──────────────────┐
│   EXAM 2 (60%)   │────▶│  Register + Pay  │
│  Cores Subjects  │     │  Fee: $50        │
└────────┬────────┘     └──────────────────┘
         │
         ▼
┌─────────────────┐     ┌──────────────────┐
│   EXAM 3 (90%)   │────▶│  Register + Pay  │
│  Advanced Topics │     │  Fee: $70        │
└────────┬────────┘     └──────────────────┘
         │
         ▼
┌────────────────────────┐     ┌──────────────────┐
│ FINAL GRADUATION EXAM  │────▶│  Register + Pay  │
│       (100%)           │     │  Fee: $100       │
│ Comprehensive (all)    │     │                  │
└───────────┬────────────┘     └──────────────────┘
            │
            ▼
    ┌──────────────┐
    │  CERTIFICATE  │
    │  Issued Upon  │
    │    Passing    │
    └──────────────┘
```

### Exam Flow (per exam)

```
1. Teacher creates exam → Publishes
2. Student sees exam in dashboard → Clicks "Register"
3. Payment required → Student pays exam fee
4. Payment verified (Admin or auto) → Registration status: 'paid'
5. Exam date arrives → Student takes exam
6. Answers submitted → stored in exam_results.answers (JSON)
7. Teacher grades (auto for MC, manual for essay) → percentage calculated
8. If percentage >= pass_percentage → passed = true
9. Result published → Student views scorecard
10. EnrollmentTracking: 'exam_passed' or 'exam_failed'
```

### Scorecard Design

```
┌──────────────────────────────────────────────────────┐
│  PICHA PICASSO UNIVERSITY                            │
│  EXAM SCORECARD                                      │
├──────────────────────────────────────────────────────┤
│  Student: John Doe                                   │
│  Course: Computer Science                            │
│  Exam: Exam 2 — Database Engineering                 │
│  Date: 2026-03-15                                    │
├──────────────────────────────────────────────────────┤
│  Total Marks: 100        Obtained: 78                │
│  Percentage: 78%         Status: ✅ PASSED           │
├──────────────────────────────────────────────────────┤
│  Section Breakdown:                                  │
│  ┌────────────────────┬──────┬──────┬──────┐         │
│  │ Section            │ Marks│Score │ %    │         │
│  ├────────────────────┼──────┼──────┼──────┤         │
│  │ Multiple Choice    │  40  │  35  │ 87%  │         │
│  │ True/False         │  20  │  18  │ 90%  │         │
│  │ Essay Questions    │  40  │  25  │ 62%  │         │
│  └────────────────────┴──────┴──────┴──────┘         │
├──────────────────────────────────────────────────────┤
│  Remarks: Well done! Keep up the good work.           │
│  Graded by: Dr. Smith                                 │
└──────────────────────────────────────────────────────┘
```

---

## SECTION 9: Payment System Design

### Payment Types

| Type | Payable Model | Description | Amount Source |
|------|---------------|-------------|---------------|
| Course Enrollment | Course | Full course fee | `courses.price` |
| Topic Access | Topic | Single topic purchase | `topics.price` |
| Exam Registration | ExamRegistration | Per exam fee | `exams.fee` |
| Certificate | Certificate | Certificate issuance | System setting |

### Payment Flow

```
1. User initiates payment
2. Payment record created (payable polymorphic)
   └── status: 'pending', reference: UUID
3. User redirected to payment gateway (or manual bank transfer)
4. Webhook/manual verification → Payment status: 'completed'
5. Payable model updated:
   └── Enrollment → is_paid = true
   └── Topic → access granted
   └── ExamRegistration → fee_paid = true, status = 'paid'
   └── Certificate → generated
6. Notification sent to user
7. EnrollmentTracking created
```

### Payment Verification (Admin)

```
Payments table → status: 'pending' filter
Admin reviews proof → clicks "Verify"
  → status: 'completed'
  → paid_at: now
  → verified_by: admin_id
  → linked payable updated
```

---

## SECTION 10: Certificate Generation System

### Certificate Generation Flow

```
Student passes FINAL GRADUATION EXAM
        │
        ▼
System checks:
  ┌─ All 4 exams passed? (Exam 1 + Exam 2 + Exam 3 + Final)
  └─ enrollment.status = 'active'?
        │
        ▼
Certificate auto-generated (or Admin triggers)
  ┌─ certificate_no: UNIV-YYYY-NNNN (auto)
  └─ verification_code: UUID (random, for public URL)
        │
        ▼
PDF generated (Laravel + Laravel Media Library + DomPDF/Barryvdh)
  ┌─ Template with:
  │   ├─ University logo & crest
  │   ├─ Student name
  │   ├─ Course name
  │   ├─ "With Distinction" / Grade
  │   ├─ Percentage
  │   ├─ Issue date
  │   ├─ Certificate number
  │   ├─ QR code (verification URL)
  │   └─ Authorized signature (Super Admin)
  └─ Saved via Media Library to 'certificates' collection
        │
        ▼
Student notified (DB Notification + Email)
        │
        ▼
Student downloads PDF from dashboard
Public verification: /certificates/verify/{code}
```

### Certificate Verification (Public Page)

```
URL: /certificates/verify/ABC123XYZ
Page shows:
  ✅ This certificate is VALID
  ├─ Student Name
  ├─ Course Name
  ├─ Issue Date
  ├─ Certificate Number
  └─ Issued by Picha Picasso University
```

---

## SECTION 11: Analytics Dashboard Design

### Student Analytics

| Metric | Source | Chart |
|--------|--------|-------|
| Total students | `students.count` | Stat card |
| Active students | `students.where(status:'active').count` | Stat card |
| New enrollments (monthly) | `enrollments.groupBy(month)` | Line chart |
| Student growth (YoY) | `students.groupBy(year)` | Bar chart |
| Students per course | `enrollments.groupBy(course)` | Pie chart |
| Graduation rate | `certificates / enrollments` | Stat card |
| Student demographics | `students.country` | Map/Bar |

### Revenue Analytics

| Metric | Source | Chart |
|--------|--------|-------|
| Total revenue | `payments.where(status:'completed').sum(amount)` | Stat card |
| Revenue this month | Same + date filter | Stat card |
| Revenue by source (course/exam/certificate) | `payments.groupBy(payable_type)` | Pie chart |
| Revenue trend (monthly) | `payments.groupBy(month)` | Line chart |
| Pending payments | `payments.where(status:'pending').sum(amount)` | Stat card |
| Average revenue per student | `total_revenue / total_students` | Stat card |

### Course Analytics

| Metric | Source | Chart |
|--------|--------|-------|
| Total courses | `courses.count` | Stat card |
| Most popular course | `enrollments.groupBy(course).sortDesc().first()` | Bar chart |
| Course completion rate | `enrollments.where(status:'completed') / total` | Progress bar |
| Average course rating | `ratings.avg('rating')` grouped by course | Star rating |
| Revenue per course | `payments where payable_type=course` | Bar chart |

### Teacher Analytics

| Metric | Source | Chart |
|--------|--------|-------|
| Total teachers | `teachers.count` | Stat card |
| Courses per teacher | `course_teacher.groupBy(teacher)` | Bar chart |
| Students per teacher | `enrollments.where(course in teacher.courses)` | Bar chart |
| Avg student rating per teacher | `ratings where rateable_type=teacher` | Star rating |
| YouTube tutorials published | `youtube_tutorials.groupBy(teacher)` | Bar chart |
| Topics created | `topics.groupBy(teacher)` | Bar chart |

### Exam Analytics

| Metric | Source | Chart |
|--------|--------|-------|
| Total exams created | `exams.count` | Stat card |
| Exams taken (total) | `exam_results.count` | Stat card |
| Pass rate | `exam_results.where(passed:true) / total` | Percentage |
| Pass rate per exam type | `exam_results.groupBy('exam_type')` | Bar chart |
| Registrations per exam | `exam_registrations.groupBy(exam)` | Bar chart |
| Revenue from exam fees | `payments where payable_type=exam` | Bar chart |

### Enrollment Analytics

| Metric | Source | Chart |
|--------|--------|-------|
| Total enrollments | `enrollments.count` | Stat card |
| Active enrollments | `enrollments.where(status:'active')` | Stat card |
| Enrollments by month | `enrollments.groupBy(month)` | Line chart |
| Enrollment status distribution | `enrollments.groupBy(status)` | Pie chart |
| Course-wise enrollment | `enrollments.groupBy(course)` | Horizontal bar |

---

## SECTION 12: Complete Folder Structure

```
picha-picasso/
│
├── app/
│   ├── Console/
│   │   ├── Commands/
│   │   │   ├── GenerateCertificates.php
│   │   │   ├── CalculateAnalytics.php
│   │   │   ├── SendExamReminders.php
│   │   │   └── CleanupPendingPayments.php
│   │   └── Kernel.php
│   │
│   ├── Enums/
│   │   ├── EnrollmentStatus.php
│   │   ├── ExamType.php
│   │   ├── TopicType.php
│   │   ├── PaymentStatus.php
│   │   ├── AttendanceStatus.php
│   │   └── StudentStatus.php
│   │
│   ├── Events/
│   │   ├── StudentEnrolled.php
│   │   ├── ExamCompleted.php
│   │   ├── PaymentVerified.php
│   │   ├── CertificateIssued.php
│   │   └── TopicCompleted.php
│   │
│   ├── Exceptions/
│   │   └── Handler.php
│   │
│   ├── Filament/
│   │   ├── Resources/
│   │   │   ├── UserResource.php
│   │   │   ├── TeacherResource.php
│   │   │   ├── StudentResource.php
│   │   │   ├── CourseCategoryResource.php
│   │   │   ├── CourseResource.php
│   │   │   ├── SubjectResource.php
│   │   │   ├── ModuleResource.php
│   │   │   ├── TopicResource.php
│   │   │   ├── YoutubeTutorialResource.php
│   │   │   ├── AttendanceResource.php
│   │   │   ├── ExamResource.php
│   │   │   ├── ExamQuestionResource.php
│   │   │   ├── ExamRegistrationResource.php
│   │   │   ├── ExamResultResource.php
│   │   │   ├── CertificateResource.php
│   │   │   ├── PaymentResource.php
│   │   │   ├── ReviewResource.php
│   │   │   ├── AnnouncementResource.php
│   │   │   ├── ContactResource.php
│   │   │   └── OfficeResource.php
│   │   │
│   │   ├── Resources/ (each has folder)
│   │   │   ├── UserResource/
│   │   │   │   ├── Pages/
│   │   │   │   │   ├── ListUsers.php
│   │   │   │   │   ├── CreateUser.php
│   │   │   │   │   ├── EditUser.php
│   │   │   │   │   └── ViewUser.php
│   │   │   │   └── RelationManagers/
│   │   │   │       ├── RolesRelationManager.php
│   │   │   │       └── EnrollmentsRelationManager.php
│   │   │   ├── CourseResource/
│   │   │   │   ├── Pages/
│   │   │   │   │   ├── ListCourses.php
│   │   │   │   │   ├── CreateCourse.php
│   │   │   │   │   └── EditCourse.php
│   │   │   │   └── RelationManagers/
│   │   │   │       ├── SubjectsRelationManager.php
│   │   │   │       ├── TeachersRelationManager.php
│   │   │   │       └── EnrollmentsRelationManager.php
│   │   │   ├── ExamResource/ ... (similar pattern)
│   │   │   └── StudentResource/
│   │   │       └── RelationManagers/
│   │   │           ├── EnrollmentsRelationManager.php
│   │   │           ├── ExamRegistrationsRelationManager.php
│   │   │           └── CertificatesRelationManager.php
│   │   │
│   │   ├── Clusters/
│   │   │   └── SystemCluster.php  (groups Roles, Permissions, Audit, Settings)
│   │   │
│   │   ├── Widgets/
│   │   │   ├── StatsOverviewWidget.php
│   │   │   ├── EnrollmentChartWidget.php
│   │   │   ├── RevenueChartWidget.php
│   │   │   ├── RecentEnrollmentsWidget.php
│   │   │   ├── PendingPaymentsWidget.php
│   │   │   └── LatestActivityWidget.php
│   │   │
│   │   └── Pages/
│   │       ├── Dashboard.php
│   │       └── AnalyticsDashboard.php
│   │
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Web/
│   │   │   │   ├── HomeController.php
│   │   │   │   ├── PageController.php
│   │   │   │   ├── CourseController.php
│   │   │   │   ├── TeacherController.php
│   │   │   │   ├── OfficeController.php
│   │   │   │   ├── EnrollmentController.php
│   │   │   │   ├── LearningController.php
│   │   │   │   ├── YoutubeTutorialController.php
│   │   │   │   ├── ExamController.php
│   │   │   │   ├── CertificateController.php
│   │   │   │   ├── PaymentController.php
│   │   │   │   ├── ReviewController.php
│   │   │   │   ├── ContactController.php
│   │   │   │   └── DashboardController.php
│   │   │   └── Api/
│   │   │       └── (future mobile API endpoints)
│   │   │
│   │   ├── Middleware/
│   │   │   ├── RedirectIfAuthenticated.php
│   │   │   ├── EnsureUserIsActive.php
│   │   │   └── SetLocale.php
│   │   │
│   │   ├── Requests/
│   │   │   ├── StoreContactRequest.php
│   │   │   ├── StoreEnrollmentRequest.php
│   │   │   ├── StoreReviewRequest.php
│   │   │   ├── RegisterExamRequest.php
│   │   │   └── UpdateProfileRequest.php
│   │   │
│   │   └── Livewire/
│   │       ├── Components/
│   │       │   ├── CourseCard.php
│   │       │   ├── CourseList.php
│   │       │   ├── TeacherCard.php
│   │       │   ├── TestimonialSlider.php
│   │       │   ├── StudentStats.php
│   │       │   ├── TopicPlayer.php
│   │       │   ├── ProgressBar.php
│   │       │   ├── ExamTimer.php
│   │       │   └── CertificatePreview.php
│   │       └── Student/
│   │           ├── MyCourses.php
│   │           ├── MyProgress.php
│   │           ├── MyExams.php
│   │           ├── MyCertificates.php
│   │           └── MyPayments.php
│   │
│   ├── Jobs/
│   │   ├── GenerateCertificatePdf.php
│   │   ├── SendEnrollmentConfirmation.php
│   │   ├── SendExamReminder.php
│   │   ├── CalculateCourseProgress.php
│   │   ├── AggregateAnalytics.php
│   │   └── ProcessPaymentVerification.php
│   │
│   ├── Listeners/
│   │   ├── LogSuccessfulLogin.php
│   │   ├── SendEnrollmentNotification.php
│   │   ├── SendExamResultNotification.php
│   │   ├── UpdateEnrollmentTracking.php
│   │   └── UpdateProgressOnTopicComplete.php
│   │
│   ├── Mail/
│   │   ├── EnrollmentConfirmationMail.php
──   │   ├── ExamResultMail.php
│   │   ├── CertificateIssuedMail.php
│   │   ├── PaymentConfirmationMail.php
│   │   └── ContactFormMail.php
│   │
│   ├── Models/
│   │   ├── User.php (extends Authenticatable, HasRoles)
│   │   ├── Teacher.php
│   │   ├── Student.php
│   │   ├── Office.php
│   │   ├── CourseCategory.php
│   │   ├── Course.php
│   │   ├── Subject.php
│   │   ├── Module.php
│   │   ├── Topic.php
│   │   ├── TopicProgress.php
│   │   ├── Attendance.php
│   │   ├── Enrollment.php
│   │   ├── EnrollmentTracking.php
│   │   ├── YoutubeTutorial.php
│   │   ├── Exam.php
│   │   ├── ExamQuestion.php
│   │   ├── ExamRegistration.php
│   │   ├── ExamResult.php
│   │   ├── Certificate.php
│   │   ├── Payment.php
│   │   ├── Review.php
│   │   ├── Rating.php
│   │   ├── Contact.php
│   │   ├── Announcement.php
│   │   ├── Analytic.php
│   │   └── AuditLog.php
│   │
│   ├── Notifications/
│   │   ├── EnrollmentConfirmed.php
│   │   ├── ExamResultPublished.php
│   │   ├── CertificateIssued.php
│   │   ├── PaymentReceived.php
│   │   └── NewAnnouncement.php
│   │
│   ├── Observers/
│   │   ├── UserObserver.php
│   │   ├── EnrollmentObserver.php
│   │   ├── TopicProgressObserver.php
│   │   ├── PaymentObserver.php
│   │   └── ExamResultObserver.php
│   │
│   ├── Policies/
│   │   ├── CoursePolicy.php
│   │   ├── TopicPolicy.php
│   │   ├── ExamPolicy.php
│   │   ├── EnrollmentPolicy.php
│   │   ├── CertificatePolicy.php
│   │   ├── PaymentPolicy.php
│   │   └── ReviewPolicy.php
│   │
│   ├── Providers/
│   │   ├── AppServiceProvider.php
│   │   ├── AuthServiceProvider.php
│   │   ├── EventServiceProvider.php
│   │   └── FilamentServiceProvider.php
│   │
│   ├── Rules/
│   │   ├── ValidExamRegistration.php
│   │   ├── SufficientProgressForExam.php
│   │   └── UniqueEnrollment.php
│   │
│   ├── Services/
│   │   ├── CertificateService.php
│   │   ├── PaymentService.php
│   │   ├── ExamService.php
│   │   ├── ProgressService.php
│   │   ├── AnalyticsService.php
│   │   ├── EnrollmentService.php
│   │   └── YoutubeService.php
│   │
│   └── Traits/
│       ├── HasAuditLog.php
│       ├── HasEnrollmentTracking.php
│       ├── HasPayment.php
│       └── HasMediaCollections.php
│
├── bootstrap/
│
├── config/
│   ├── app.php
│   ├── auth.php
│   ├── cache.php
│   ├── database.php
│   ├── filesystems.php
│   ├── logging.php
│   ├── mail.php
│   ├── queue.php
│   ├── session.php
│   ├── permission.php (Spatie)
│   ├── media-library.php (Spatie)
│   ├── filament.php
│   └── university.php  (custom: exam thresholds, fees, etc.)
│
├── database/
│   ├── factories/
│   │   ├── UserFactory.php
│   │   ├── TeacherFactory.php
│   │   ├── StudentFactory.php
│   │   ├── CourseFactory.php
│   │   ├── SubjectFactory.php
│   │   ├── ModuleFactory.php
│   │   ├── TopicFactory.php
│   │   ├── ExamFactory.php
│   │   └── EnrollmentFactory.php
│   │
│   ├── migrations/
│   │   ├── 0001_01_01_000000_create_users_table.php
│   │   ├── 0001_01_01_000001_create_cache_table.php
│   │   ├── 0001_01_01_000002_create_jobs_table.php
│   │   ├── YYYY_MM_DD_create_teachers_table.php
│   │   ├── YYYY_MM_DD_create_students_table.php
│   │   ├── YYYY_MM_DD_create_offices_table.php
│   │   ├── YYYY_MM_DD_create_course_categories_table.php
│   │   ├── YYYY_MM_DD_create_courses_table.php
│   │   ├── YYYY_MM_DD_create_course_teacher_table.php
│   │   ├── YYYY_MM_DD_create_subjects_table.php
│   │   ├── YYYY_MM_DD_create_modules_table.php
│   │   ├── YYYY_MM_DD_create_topics_table.php
│   │   ├── YYYY_MM_DD_create_topic_progress_table.php
│   │   ├── YYYY_MM_DD_create_attendances_table.php
│   │   ├── YYYY_MM_DD_create_enrollments_table.php
│   │   ├── YYYY_MM_DD_create_enrollment_tracking_table.php
│   │   ├── YYYY_MM_DD_create_youtube_tutorials_table.php
│   │   ├── YYYY_MM_DD_create_exams_table.php
│   │   ├── YYYY_MM_DD_create_exam_questions_table.php
│   │   ├── YYYY_MM_DD_create_exam_registrations_table.php
│   │   ├── YYYY_MM_DD_create_exam_results_table.php
│   │   ├── YYYY_MM_DD_create_certificates_table.php
│   │   ├── YYYY_MM_DD_create_payments_table.php
│   │   ├── YYYY_MM_DD_create_reviews_table.php
│   │   ├── YYYY_MM_DD_create_ratings_table.php
│   │   ├── YYYY_MM_DD_create_contacts_table.php
│   │   ├── YYYY_MM_DD_create_announcements_table.php
│   │   ├── YYYY_MM_DD_create_analytics_table.php
│   │   ├── YYYY_MM_DD_create_audit_logs_table.php
│   │   └── YYYY_MM_DD_create_permission_tables.php (Spatie)
│   │
│   └── seeders/
│       ├── DatabaseSeeder.php
│       ├── RoleAndPermissionSeeder.php
│       ├── SuperAdminSeeder.php
│       ├── TeacherSeeder.php
│       ├── CourseSeeder.php
│       └── ExamSeeder.php
│
├── public/
│   ├── index.php
│   ├── .htaccess
│   └── build/ (Vite)
│
├── resources/
│   ├── css/
│   │   └── app.css
│   ├── js/
│   │   └── app.js
│   └── views/
│       ├── layouts/
│       │   ├── app.blade.php        (guest layout)
│       │   └── dashboard.blade.php  (student dashboard layout)
│       ├── components/
│       │   ├── header.blade.php
│       │   ├── footer.blade.php
│       │   ├── hero.blade.php
│       │   ├── course-card.blade.php
│       │   └── teacher-card.blade.php
│       ├── pages/
│       │   ├── home.blade.php
│       │   ├── about.blade.php
│       │   ├── contact.blade.php
│       │   ├── offices.blade.php
│       │   ├── teachers.blade.php
│       │   ├── teacher-detail.blade.php
│       │   ├── courses.blade.php
│       │   ├── course-detail.blade.php
│       │   ├── enroll.blade.php
│       │   ├── enrollment-tracking.blade.php
│       │   ├── tutorials.blade.php
│       │   ├── livewire/ (Livewire components)
│       │   └── student/
│       │       ├── dashboard.blade.php
│       │       ├── learning.blade.php
│       │       ├── exams.blade.php
│       │       ├── certificates.blade.php
│       │       └── payments.blade.php
│       └── vendor/ (Filament views)
│
├── routes/
│   ├── web.php
│   ├── filament.php (Filament admin)
│   └── console.php
│
├── storage/
│   └── app/
│       ├── public/
│       │   ├── certificates/ (generated PDFs)
│       │   ├── media/ (Spatie Media Library)
│       │   └── uploads/
│       └── private/
│           └── invoices/
│
├── tests/
│   ├── Feature/
│   │   ├── Controllers/
│   │   ├── Livewire/
│   │   ├── Services/
│   │   └── Filament/
│   └── Unit/
│       ├── Models/
│       └── Enums/
│
├── .env.example
├── .gitignore
├── artisan
├── composer.json
├── package.json
├── phpunit.xml
└── vite.config.js
```

---

## SECTION 13: All Laravel Models Details

### Model: User (extends Authenticatable)

| Trait/Contract | Purpose |
|----------------|---------|
| `HasFactory` | Factory support |
| `Notifiable` | Laravel notifications |
| `HasRoles` (Spatie) | Role-based access |
| `HasPermissions` (Spatie) | Direct permissions |
| `MustVerifyEmail` (optional) | Email verification |
| `HasMediaCollections` (custom) | Avatar collection |

**Relations:**
- `teacher()`: `hasOne(Teacher::class)`
- `student()`: `hasOne(Student::class)`
- `payments()`: `hasMany(Payment::class)`
- `announcements()`: `hasMany(Announcement::class)`
- `auditLogs()`: `hasMany(AuditLog::class)`

**Accessors:**
- `getRoleLabelAttribute()`: Returns role name
- `getIsSuperAdminAttribute()`: `$this->hasRole('super-admin')`
- `getIsTeacherAttribute()`: `$this->hasRole('teacher')`
- `getIsStudentAttribute()`: `$this->hasRole('student')`

### Model: Teacher

| Trait/Column | Purpose |
|-------------|---------|
| `HasFactory`, `SoftDeletes` | |
| `HasMediaCollections` | Profile photo, documents |
| `HasAuditLog` (custom) | Track changes |

**Relations:**
- `user()`: `belongsTo(User::class)`
- `courses()`: `belongsToMany(Course::class, 'course_teacher')`
- `topics()`: `hasMany(Topic::class)`
- `exams()`: `hasMany(Exam::class)`
- `youtubeTutorials()`: `hasMany(YoutubeTutorial::class)`
- `attendances()`: `hasMany(Attendance::class)`
- `gradedResults()`: `hasMany(ExamResult::class, 'graded_by')`
- `leadCourses()`: `hasMany(Course::class, 'course_teacher')->where('is_lead', true)`

### Model: Student

| Trait | Purpose |
|-------|---------|
| `HasFactory`, `SoftDeletes` | |
| `HasMediaCollections` | Profile photo, ID documents |

**Relations:**
- `user()`: `belongsTo(User::class)`
- `enrollments()`: `hasMany(Enrollment::class)`
- `topicProgress()`: `hasMany(TopicProgress::class)`
- `attendances()`: `hasMany(Attendance::class)`
- `examRegistrations()`: `hasMany(ExamRegistration::class)`
- `examResults()`: `hasMany(ExamResult::class)`
- `certificates()`: `hasMany(Certificate::class)`
- `payments()`: `hasMany(Payment::class)`
- `reviews()`: `hasMany(Review::class)`
- `ratings()`: `hasMany(Rating::class)`
- `courses()`: `belongsToMany(Course::class, 'enrollments')`

**Accessors:**
- `getFullNameAttribute()`: `$this->user->name`
- `getEmailAttribute()`: `$this->user->email`
- `getAvatarAttribute()`: `$this->user->avatar`
- `getActiveEnrollmentsAttribute()`: `$this->enrollments()->where('status', 'active')->count()`
- `getOverallProgressAttribute()`: Average of all enrollment progress percentages

### Model: CourseCategory

**Relations:**
- `courses()`: `hasMany(Course::class)`

### Model: Course

| Trait | Purpose |
|-------|---------|
| `HasFactory`, `SoftDeletes` | |
| `HasMediaCollections` | Thumbnail, banner images |

**Relations:**
- `category()`: `belongsTo(CourseCategory::class)`
- `teachers()`: `belongsToMany(Teacher::class, 'course_teacher')`
- `subjects()`: `hasMany(Subject::class)->orderBy('sort_order')`
- `exams()`: `hasMany(Exam::class)`
- `enrollments()`: `hasMany(Enrollment::class)`
- `certificates()`: `hasMany(Certificate::class)`
- `reviews()`: `hasMany(Review::class)`
- `youtubeTutorials()`: `hasMany(YoutubeTutorial::class)`
- `announcements()`: `hasMany(Announcement::class)`
- `ratings()`: `morphMany(Rating::class, 'rateable')`

**Scopes:**
- `published()`: `where('is_published', true)`
- `featured()`: `where('is_featured', true)`

**Accessors:**
- `getAverageRatingAttribute()`: `$this->ratings()->avg('rating')`
- `getReviewCountAttribute()`: `$this->reviews()->where('is_approved', true)->count()`

### Model: Subject

| Trait | Purpose |
|-------|---------|
| `HasFactory`, `SoftDeletes` | |

**Relations:**
- `course()`: `belongsTo(Course::class)`
- `modules()`: `hasMany(Module::class)->orderBy('sort_order')`

### Model: Module

| Trait | Purpose |
|-------|---------|
| `HasFactory`, `SoftDeletes` | |

**Relations:**
- `subject()`: `belongsTo(Subject::class)`
- `topics()`: `hasMany(Topic::class)->orderBy('sort_order')`

**Accessors:**
- `getTotalTopicsAttribute()`: `$this->topics()->count()`
- `getPublishedTopicsAttribute()`: `$this->topics()->where('is_published', true)->count()`

### Model: Topic

| Trait | Purpose |
|-------|---------|
| `HasFactory`, `SoftDeletes` | |
| `HasMediaCollections` | PDF files, video uploads |

**Relations:**
- `module()`: `belongsTo(Module::class)`
- `teacher()`: `belongsTo(Teacher::class)`
- `youtubeTutorial()`: `belongsTo(YoutubeTutorial::class)`
- `progress()`: `hasMany(TopicProgress::class)`
- `attendances()`: `hasMany(Attendance::class)`
- `payments()`: `morphMany(Payment::class, 'payable')`

**Scopes:**
- `published()`: `where('is_published', true)`
- `paid()`: `where('is_paid', true)`
- `free()`: `where('is_paid', false)`
- `teacherLed()`: `where('is_teacher_led', true)`
- `selfStudy()`: `where('is_self_study', true)`

### Model: TopicProgress

| Trait | Purpose |
|-------|---------|
| `HasFactory` | |

**Relations:**
- `student()`: `belongsTo(Student::class)`
- `topic()`: `belongsTo(Topic::class)`

### Model: Attendance

**Relations:**
- `student()`: `belongsTo(Student::class)`
- `topic()`: `belongsTo(Topic::class)`
- `teacher()`: `belongsTo(Teacher::class)`

### Model: Enrollment

| Trait | Purpose |
|-------|---------|
| `HasFactory`, `SoftDeletes` | |
| `HasEnrollmentTracking` (custom) | Auto creates tracking events |

**Relations:**
- `student()`: `belongsTo(Student::class)`
- `course()`: `belongsTo(Course::class)`
- `tracking()`: `hasMany(EnrollmentTracking::class)`
- `payments()`: `morphMany(Payment::class, 'payable')`

**Scopes:**
- `active()`: `where('status', 'active')`
- `pending()`: `where('status', 'pending')`
- `completed()`: `where('status', 'completed')`

### Model: EnrollmentTracking

**Relations:**
- `enrollment()`: `belongsTo(Enrollment::class)`

### Model: YoutubeTutorial

| Trait | Purpose |
|-------|---------|
| `HasFactory`, `SoftDeletes` | |
| `HasMediaCollections` | Thumbnail |

**Relations:**
- `teacher()`: `belongsTo(Teacher::class)`
- `course()`: `belongsTo(Course::class)`
- `subject()`: `belongsTo(Subject::class)`
- `topic()`: `hasOne(Topic::class)` (inverse of optional link)

### Model: Exam

| Trait | Purpose |
|-------|---------|
| `HasFactory`, `SoftDeletes` | |

**Relations:**
- `course()`: `belongsTo(Course::class)`
- `teacher()`: `belongsTo(Teacher::class)`
- `questions()`: `hasMany(ExamQuestion::class)->orderBy('sort_order')`
- `registrations()`: `hasMany(ExamRegistration::class)`
- `results()`: `hasMany(ExamResult::class)`

**Accessors:**
- `getRegistrationCountAttribute()`: `$this->registrations()->count()`
- `getPassedCountAttribute()`: `$this->results()->where('passed', true)->count()`

### Model: ExamQuestion

**Relations:**
- `exam()`: `belongsTo(Exam::class)`

### Model: ExamRegistration

**Relations:**
- `exam()`: `belongsTo(Exam::class)`
- `student()`: `belongsTo(Student::class)`
- `result()`: `hasOne(ExamResult::class)`
- `verifier()`: `belongsTo(User::class, 'verified_by')`
- `payments()`: `morphMany(Payment::class, 'payable')`

### Model: ExamResult

**Relations:**
- `examRegistration()`: `belongsTo(ExamRegistration::class)`
- `student()`: `belongsTo(Student::class)`
- `exam()`: `belongsTo(Exam::class)`
- `grader()`: `belongsTo(Teacher::class, 'graded_by')`

### Model: Certificate

| Trait | Purpose |
|-------|---------|
| `HasFactory`, `SoftDeletes` | |
| `HasMediaCollections` | Generated PDF |

**Relations:**
- `student()`: `belongsTo(Student::class)`
- `course()`: `belongsTo(Course::class)`
- `issuer()`: `belongsTo(User::class, 'issued_by')`

### Model: Payment

| Trait | Purpose |
|-------|---------|
| `HasFactory` | |

**Relations:**
- `user()`: `belongsTo(User::class)`
- `student()`: `belongsTo(Student::class)`
- `payable()`: `morphTo()`
- `verifier()`: `belongsTo(User::class, 'verified_by')`

**Scopes:**
- `completed()`: `where('status', 'completed')`
- `pending()`: `where('status', 'pending')`
- `failed()`: `where('status', 'failed')`

### Model: Review

**Relations:**
- `student()`: `belongsTo(Student::class)`
- `course()`: `belongsTo(Course::class)`
- `rating()`: `hasOne(Rating::class)`

### Model: Rating

**Relations:**
- `student()`: `belongsTo(Student::class)`
- `review()`: `belongsTo(Review::class)`
- `rateable()`: `morphTo()`

### Model: Contact

**Relations:** (standalone — no FK to users)

### Model: Announcement

**Relations:**
- `user()`: `belongsTo(User::class)`
- `course()`: `belongsTo(Course::class)`

### Model: Office

**Relations:** (standalone)

### Model: Analytic

**Relations:** (standalone — aggregated data)

### Model: AuditLog

**Relations:**
- `user()`: `belongsTo(User::class)`

---

## SECTION 14: Filament Resources Design

### UserResource

| Section | Implementation |
|---------|---------------|
| Form Fields | TextInput(name), TextInput(email), TextInput(password) — hidden/visible, Select(roles) — multiple, Toggle(is_active), SpatieMediaLibraryFileUpload(avatar) |
| Table Columns | TextColumn(name), TextColumn(email), TextColumn(roles) — badge, IconColumn(is_active), TextColumn(created_at) — dateTime |
| Filters | Select(role), Toggle(is_active) |
| Actions | Create, Edit, View, Delete, Impersonate (using Laravel Impersonate) |
| Relation Managers | RolesRelationManager, EnrollmentsRelationManager (via student) |
| Global Search | name, email |
| Widgets | None |

### TeacherResource

| Section | Implementation |
|---------|---------------|
| Form | Select(user_id) — relationship, TextInput(employee_id), RichEditor(qualification), TagsInput(specialization), TextInput(years_of_experience), KeyValue(social_links), Toggle(is_active), DatePicker(hire_date) |
| Table | TextColumn(employee_id), TextColumn(user.name), TextColumn(specialization), TextColumn(courses_count), IconColumn(is_active), TextColumn(hire_date) |
| Filters | Select(course), Toggle(is_active) |
| Actions | Create, Edit, View, Delete, AssignCourses |
| Relation Managers | CoursesRelationManager, TopicsRelationManager, ExamsRelationManager, YoutubeTutorialsRelationManager |

### StudentResource

| Section | Implementation |
|---------|---------------|
| Form | Select(user_id), TextInput(student_no), DatePicker(date_of_birth), Textarea(address), TextInput(city), TextInput(country), TextInput(guardian_name), TextInput(guardian_phone), DatePicker(enrollment_date), Select(status) — options |
| Table | TextColumn(student_no), TextColumn(user.name), TextColumn(courses_count), TextColumn(status) — badge (color-coded), TextColumn(enrollment_date) |
| Filters | Select(status), Select(course) — via enrollment |
| Actions | Create, Edit, View, Delete, Suspend, Graduate |
| Relation Managers | EnrollmentsRelationManager, ExamRegistrationsRelationManager, CertificatesRelationManager, PaymentsRelationManager |

### CourseCategoryResource

| Section | Implementation |
|---------|---------------|
| Form | TextInput(name), TextInput(slug), Textarea(description), TextInput(icon), SpatieMediaLibraryFileUpload(thumbnail), Toggle(is_active), TextInput(sort_order) — numeric |
| Table | TextColumn(name), TextColumn(courses_count) — count, IconColumn(is_active), TextColumn(sort_order) — sortable |
| Actions | Create, Edit, View, Delete |
| Widgets | None |

### CourseResource

| Section | Implementation |
|---------|---------------|
| Form | Select(category_id), TextInput(title), TextInput(slug) — after title, Textarea(short_description), RichEditor(description), TextInput(duration), Select(level), TextInput(price) — numeric, TextInput(discount_price), TextInput(currency), SpatieMediaLibraryFileUpload(thumbnail) — single, SpatieMediaLibraryFileUpload(banner) — single, Toggle(has_certificate), Toggle(is_featured), Toggle(is_published) |
| Table | TextColumn(title) — searchable, TextColumn(category.name), TextColumn(price) — money, TextColumn(teachers_count) — count, TextColumn(enrollment_count) — count, IconColumn(is_featured), IconColumn(is_published), TextColumn(created_at) — date |
| Filters | Select(category), Select(level), Toggle(is_featured), Toggle(is_published) |
| Actions | Create, Edit, View, Delete, Clone |
| Relation Managers | SubjectsRelationManager (nested modules & topics), TeachersRelationManager, EnrollmentsRelationManager, ExamsRelationManager |
| Global Search | title, slug |

### SubjectResource

| Section | Implementation |
|---------|---------------|
| Form | Select(course_id), TextInput(title), TextInput(slug), Textarea(description), TextInput(sort_order), Toggle(is_published) |
| Table | TextColumn(title), TextColumn(course.title), TextColumn(modules_count), TextColumn(sort_order) — sortable, IconColumn(is_published) |
| Filters | Select(course) |
| Relation Managers | ModulesRelationManager |

### ModuleResource

| Section | Implementation |
|---------|---------------|
| Form | Select(subject_id), TextInput(title), TextInput(slug), Textarea(description), TextInput(sort_order), Toggle(is_published) |
| Table | TextColumn(title), TextColumn(subject.title), TextColumn(subject.course.title), TextColumn(topics_count), TextColumn(sort_order) — sortable, IconColumn(is_published) |
| Filters | Select(subject) |
| Relation Managers | TopicsRelationManager |

### TopicResource

| Section | Implementation |
|---------|---------------|
| Form | Select(module_id), Select(teacher_id), TextInput(title), TextInput(slug), RichEditor(content), Select(content_type), TextInput(video_url), Select(youtube_tutorial_id), TextInput(duration_minutes), Toggle(is_paid), TextInput(price) — conditional on is_paid, Toggle(is_free_preview), Toggle(is_teacher_led), Toggle(is_self_study), TextInput(sort_order), Toggle(is_published), SpatieMediaLibraryFileUpload(attachments) — multiple |
| Table | TextColumn(title) — searchable, TextColumn(module.subject.course.title), TextColumn(module.title), TextColumn(teacher.user.name), IconColumn(is_paid) — color-coded, IconColumn(is_teacher_led), IconColumn(is_published), TextColumn(duration_minutes) |
| Filters | Select(module), Select(teacher), Toggle(is_paid), Toggle(is_teacher_led), Toggle(is_published) |
| Actions | Create, Edit, View, Delete |
| Relation Managers | None (TopicProgress view-only via table) |

### YoutubeTutorialResource

| Section | Implementation |
|---------|---------------|
| Form | Select(teacher_id), Select(course_id), Select(subject_id), TextInput(title), TextInput(slug), Textarea(description), TextInput(youtube_id), TextInput(youtube_url), TextInput(duration), SpatieMediaLibraryFileUpload(thumbnail), Toggle(is_published) |
| Table | TextColumn(title), TextColumn(teacher.user.name), TextColumn(course.title), TextColumn(youtube_id), TextColumn(views), IconColumn(is_published), TextColumn(created_at) — date |
| Filters | Select(teacher), Select(course) |
| Actions | Create, Edit, View, Delete |

### AttendanceResource

| Section | Implementation |
|---------|---------------|
| Form | Select(student_id) — searchable, Select(topic_id), Select(teacher_id), Select(status), DatePicker(date) — default today, Textarea(notes) |
| Table | TextColumn(student.user.name), TextColumn(topic.title), TextColumn(teacher.user.name), TextColumn(status) — badge, TextColumn(date) — date sortable |
| Filters | Select(topic), Select(status), DateFilter(date) |
| Actions | Create, Edit, View — bulk mark attendance |
| Widgets | Calendar widget showing attendance days |

### ExamResource

| Section | Implementation |
|---------|---------------|
| Form | Select(course_id), Select(teacher_id), TextInput(title), TextInput(slug), Textarea(description), Select(exam_type) — options with icons, TextInput(pass_percentage), TextInput(duration_minutes), TextInput(total_marks), TextInput(fee), DateTimePicker(registration_deadline), DateTimePicker(exam_date), Toggle(is_published), TextInput(sort_order) |
| Table | TextColumn(title), TextColumn(course.title), TextColumn(exam_type) — badge, TextColumn(fee) — money, TextColumn(questions_count), TextColumn(registrations_count), IconColumn(is_published), TextColumn(exam_date) — date |
| Filters | Select(course), Select(exam_type), Toggle(is_published) |
| Actions | Create, Edit, View, Delete, Clone with Questions |
| Relation Managers | ExamQuestionsRelationManager (Repeater), ExamRegistrationsRelationManager, ExamResultsRelationManager |

### ExamQuestionResource

| Section | Implementation |
|---------|---------------|
| Form | Select(exam_id), Textarea(question) — RichEditor, Select(question_type), KeyValue/Repeater(options), Textarea(correct_answer), TextInput(marks), TextInput(sort_order) |
| Table | TextColumn(exam.title), TextColumn(question) — limit 50, TextColumn(question_type) — badge, TextColumn(marks), TextColumn(sort_order) |
| Filters | Select(exam), Select(question_type) |

### ExamRegistrationResource

| Section | Implementation |
|---------|---------------|
| Form | Select(exam_id), Select(student_id), Select(status), Toggle(fee_paid), TextInput(fee_amount), TextInput(transaction_id), DateTimePicker(payment_verified_at), Select(verified_by) |
| Table | TextColumn(student.user.name), TextColumn(exam.title), TextColumn(exam.exam_type) — badge, TextColumn(status) — badge, IconColumn(fee_paid), TextColumn(registration_date) — date |
| Filters | Select(exam), Select(status), Toggle(fee_paid) |
| Actions | Create, Edit, View, VerifyPayment (custom action) |
| Relation Managers | ExamResultsRelationManager |

### ExamResultResource

| Section | Implementation |
|---------|---------------|
| Form | Select(exam_registration_id), Hidden(student_id), Hidden(exam_id), TextInput(total_marks_obtained), TextInput(percentage), Toggle(passed), Select(graded_by), DateTimePicker(graded_at), DateTimePicker(submitted_at), JSON(answers) — view, Textarea(remarks) |
| Table | TextColumn(student.user.name), TextColumn(exam.title), TextColumn(total_marks_obtained), TextColumn(percentage) — progress bar, IconColumn(passed) — color-coded, TextColumn(graded_by.user.name) |
| Filters | Select(exam), Toggle(passed) |
| Actions | Create, Edit, View, DownloadScorecard (PDF action) |

### CertificateResource

| Section | Implementation |
|---------|---------------|
| Form | Select(student_id), Select(course_id), TextInput(certificate_no), TextInput(verification_code), TextInput(title), Textarea(description), TextInput(grade), TextInput(total_marks), TextInput(percentage), DatePicker(issue_date), DatePicker(expiry_date), Select(template), Select(issued_by), Toggle(is_verified) |
| Table | TextColumn(certificate_no), TextColumn(student.user.name), TextColumn(course.title), TextColumn(grade) — badge, TextColumn(issue_date), TextColumn(verification_code), IconColumn(is_verified) |
| Filters | Select(course), Select(template), Toggle(is_verified) |
| Actions | Create, Edit, View, Delete, GeneratePdf (custom action with progress), Download, SendToStudent (notification), Verify (toggle) |
| Widgets | Certificate count stat, Issued this month |

### PaymentResource

| Section | Implementation |
|---------|---------------|
| Form | Select(user_id), Select(student_id), TextInput(payable_type), TextInput(payable_id), TextInput(transaction_id), TextInput(reference) — readOnly, TextInput(amount), TextInput(currency), Select(payment_method), Select(status), DateTimePicker(paid_at), Select(verified_by), Textarea(notes) |
| Table | TextColumn(reference), TextColumn(user.name), TextColumn(amount) — money, TextColumn(payable_type) — badge, TextColumn(status) — badge color-coded, TextColumn(payment_method), TextColumn(paid_at) — date |
| Filters | Select(status), Select(payment_method), DateFilter(created_at) |
| Actions | View, Verify (custom action: pending→completed), Refund (custom action) |

### ReviewResource

| Section | Implementation |
|---------|---------------|
| Form | Select(student_id), Select(course_id), Textarea(review), Toggle(is_approved) |
| Table | TextColumn(student.user.name), TextColumn(course.title), TextColumn(review) — limit 80, IconColumn(is_approved), TextColumn(rating.rating) — stars |
| Filters | Select(course), Toggle(is_approved) |
| Actions | View, Approve, Reject |

### AnnouncementResource

| Section | Implementation |
|---------|---------------|
| Form | Select(user_id) — hidden/auto, TextInput(title), TextInput(slug), RichEditor(content), Select(type), Select(target_audience), Select(course_id) — conditional, Toggle(is_published), DateTimePicker(published_at) |
| Table | TextColumn(title), TextColumn(type) — badge, TextColumn(target_audience) — badge, IconColumn(is_published), TextColumn(published_at) — date |
| Filters | Select(type), Select(target_audience), Toggle(is_published) |
| Actions | Create, Edit, View, Delete |

### ContactResource

| Section | Implementation |
|---------|---------------|
| Form | TextInput(name) — readOnly, TextInput(email) — readOnly, TextInput(phone), TextInput(subject), Textarea(message), Toggle(is_read), DateTimePicker(replied_at) |
| Table | TextColumn(name), TextColumn(email), TextColumn(subject), IconColumn(is_read), TextColumn(created_at) — date |
| Filters | Toggle(is_read), DateFilter(created_at) |
| Actions | View, MarkRead, Reply (opens mailto or internal reply form) |

### OfficeResource

| Section | Implementation |
|---------|---------------|
| Form | TextInput(name), TextInput(slug), TextInput(location), TextInput(phone), TextInput(email), TextInput(working_hours), TextInput(latitude), TextInput(longitude), Toggle(is_active), TextInput(sort_order) |
| Table | TextColumn(name), TextColumn(location), TextColumn(phone), TextColumn(email), IconColumn(is_active) |
| Actions | Create, Edit, View, Delete |

### AnalyticsWidgets (on Dashboard)

```
StatsOverviewWidget:
  ├─ Total Students (count)
  ├─ Total Courses (count)
  ├─ Active Enrollments (count)
  └─ Monthly Revenue (sum)

EnrollmentChartWidget (LineChart):
  ├─ Label: Enrollments per Month
  └─ Dataset: enrollments grouped by month for last 12 months

RevenueChartWidget (BarChart):
  ├─ Label: Revenue per Month
  └─ Dataset: completed payments grouped by month

RecentEnrollmentsWidget (Table):
  └─ Latest 10 enrollments with student, course, date, status
```

---

## SECTION 15: Phased Implementation Roadmap

### Phase 1: Foundation (Week 1-2)

| Task | Details |
|------|---------|
| 1.1 | Install Laravel 13 + Composer dependencies |
| 1.2 | Install & configure Filament 4 (`composer require filament/filament`) |
| 1.3 | Install Spatie Permission (`composer require spatie/laravel-permission`) |
| 1.4 | Install Spatie Media Library (`composer require spatie/laravel-medialibrary`) |
| 1.5 | Configure MySQL database in `.env` |
| 1.6 | Configure Queue (database driver) |
| 1.7 | Configure Mail (log for dev, SMTP for production) |
| 1.8 | Configure Session (database driver) |
| 1.9 | Install Livewire (`composer require livewire/livewire`) |
| 1.10 | Configure Vite + Tailwind CSS |
| 1.11 | Create `config/university.php` for system constants |
| 1.12 | Set up version control (Git) |
| **Verification** | `php artisan serve` + Filament login page accessible |

### Phase 2: Authentication & Authorization (Week 2-3)

| Task | Details |
|------|---------|
| 2.1 | Publish & run Spatie Permission migration |
| 2.2 | Create `RoleAndPermissionSeeder` — define all roles and permissions |
| 2.3 | Create `SuperAdminSeeder` — default admin account |
| 2.4 | Customize User model with HasRoles trait |
| 2.5 | Create Filament Dashboard with role-based middleware |
| 2.6 | Implement Filament Shield or manual permission integration |
| 2.7 | Add `EnsureUserIsActive` middleware |
| 2.8 | Configure email verification (optional) |
| 2.9 | Create `UserObserver` — log registrations, sync roles |
| **Verification** | Super Admin login → sees dashboard; restricted pages blocked for unauthorized |

### Phase 3: Public Website (Week 3-5)

| Task | Details |
|------|---------|
| 3.1 | Set up Blade layouts (app.blade.php — header, footer, nav) |
| 3.2 | Build Tailwind CSS theme (university colors, typography) |
| 3.3 | Create Homepage with Hero, Why Us, Stats sections |
| 3.4 | Create About Us page |
| 3.5 | Create Contact page with form + validation |
| 3.6 | Create Offices page (list with map) |
| 3.7 | Create Teachers listing & detail pages |
| 3.8 | Create Courses listing page (filterable, searchable) |
| 3.9 | Create Course Detail page (outline, teachers, reviews) |
| 3.10 | Create Livewire components: CourseCard, TeacherCard, TestimonialSlider |
| 3.11 | Implement student registration (public signup) |
| 3.12 | Implement student login |
| 3.13 | Create Student Dashboard layout |
| **Verification** | All public pages render, registration works, login works, responsive design |

### Phase 4: Academic Structure (Week 4-6)

| Task | Details |
|------|---------|
| 4.1 | Run migrations for: course_categories, courses, course_teacher, subjects, modules |
| 4.2 | Create models: CourseCategory, Course, Subject, Module |
| 4.3 | Seed course categories + 6 courses |
| 4.4 | Create Filament Resources: CourseCategoryResource, CourseResource, SubjectResource, ModuleResource |
| 4.5 | Implement course-teacher assignment (belongsToMany + pivot) |
| 4.6 | Create `TeacherSeeder` — 8 teachers |
| 4.7 | Assign teachers to courses per business rules |
| 4.8 | Create nested relation managers (Course → Subjects → Modules) |
| **Verification** | Admin can CRUD categories, courses, subjects, modules. Nested navigation works. |

### Phase 5: Learning Management (Week 6-9)

| Task | Details |
|------|---------|
| 5.1 | Run migrations for: topics, topic_progress, attendances, youtube_tutorials |
| 5.2 | Create models: Topic, TopicProgress, Attendance, YoutubeTutorial |
| 5.3 | Create Filament Resources: TopicResource, YoutubeTutorialResource, AttendanceResource |
| 5.4 | Implement Topic CRUD with RichEditor (Tiptap integration) |
| 5.5 | Implement paid/free topic toggle logic |
| 5.6 | Implement teacher-led vs self-study topic differentiation |
| 5.7 | Implement YouTube tutorial embedding |
| 5.8 | Run enrollment + enrollment_tracking migrations |
| 5.9 | Create Enrollment + EnrollmentTracking models |
| 5.10 | Implement Enrollment flow (student enrolls → enrollment record created) |
| 5.11 | Create EnrollmentResource in Filament |
| 5.12 | Create Enrollment Tracking page (student views progress) |
| 5.13 | Implement TopicProgress system (mark complete, auto-track) |
| 5.14 | Implement Progress calculation service (topic → module → subject → course) |
| 5.15 | Create Learning Page (course content player) |
| 5.16 | Implement Attendance marking (teacher-led topics only) |
| 5.17 | Create Student Dashboard widgets: MyCourses, MyProgress |
| 5.18 | Create EnrollmentObserver — auto tracking events |
| 5.19 | Implement topic payment gate (paid topics) |
| **Verification** | Student enrolls → sees course content → progresses through topics → attendance marked → progress calculated |

### Phase 6: Examinations (Week 9-12)

| Task | Details |
|------|---------|
| 6.1 | Run migrations for: exams, exam_questions, exam_registrations, exam_results |
| 6.2 | Create models: Exam, ExamQuestion, ExamRegistration, ExamResult |
| 6.3 | Create ExamResource with question Repeater |
| 6.4 | Define 4 exam types with thresholds (30%, 60%, 90%, 100%) |
| 6.5 | Implement exam question creation (MC, True/False, Essay) |
| 6.6 | Create ExamRegistration flow (student registers for exam) |
| 6.7 | Implement exam fee payment (linked to payment system) |
| 6.8 | Create exam-taking interface (Livewire timer, paginated questions) |
| 6.9 | Implement auto-grading for MC + True/False |
| 6.10 | Implement manual grading for essay questions |
| 6.11 | Create ExamResult model + result publishing |
| 6.12 | Create Scorecard PDF generation |
| 6.13 | Implement pre-exam eligibility check (must complete exam N to unlock exam N+1) |
| 6.14 | Create exam analytics widgets |
| **Verification** | Student registers → pays → takes exam → auto-graded → scorecard → result published. Sequential unlocking works. |

### Phase 7: Payments (Week 11-13)

| Task | Details |
|------|---------|
| 7.1 | Run payments migration |
| 7.2 | Create Payment model + polymorphic relation |
| 7.3 | Create PaymentResource in Filament |
| 7.4 | Implement manual payment flow (bank transfer) |
| 7.5 | Implement payment verification workflow (Admin) |
| 7.6 | Implement payment receipt/confirmation |
| 7.7 | Integrate payment gateway (PayPal/Stripe/Flutterwave) — optional |
| 7.8 | Create PaymentObserver — auto update linked payable |
| 7.9 | Create PaymentService — reusable payment logic |
| 7.10 | Implement pending payments notifications |
| 7.11 | Create revenue reports in analytics |
| **Verification** | Student pays for course/exam/certificate → Admin verifies → access granted. Revenue tracked. |

### Phase 8: Certificates (Week 13-14)

| Task | Details |
|------|---------|
| 8.1 | Run certificates migration |
| 8.2 | Create Certificate model |
| 8.3 | Create CertificateResource in Filament |
| 8.4 | Create CertificateService — generation logic |
| 8.5 | Implement auto-certificate issuance on final exam pass |
| 8.6 | Create PDF certificate template (DomPDF) |
| 8.7 | Implement QR code on certificate (verification URL) |
| 8.8 | Create public certificate verification page |
| 8.9 | Implement certificate download from student dashboard |
| 8.10 | Implement certificate re-issuance (Admin) |
| 8.11 | Create certificate notification + email |
| **Verification** | Student passes final exam → certificate auto-generated → PDF → public verify URL works |

### Phase 9: Analytics (Week 14-16)

| Task | Details |
|------|---------|
| 9.1 | Run analytics + audit_logs migrations |
| 9.2 | Create Analytic + AuditLog models |
| 9.3 | Create AnalyticsService — aggregation logic |
| 9.4 | Implement scheduled job `CalculateAnalytics` (daily) |
| 9.5 | Create StatsOverviewWidget (4 stat cards) |
| 9.6 | Create EnrollmentChartWidget (monthly line) |
| 9.7 | Create RevenueChartWidget (monthly bar) |
| 9.8 | Create RecentEnrollmentsWidget |
| 9.9 | Create PendingPaymentsWidget |
| 9.10 | Create LatestActivityWidget (audit log feed) |
| 9.11 | Create separate Analytics Dashboard page with all charts |
| 9.12 | Implement teacher-specific analytics (their students only) |
| 9.13 | Implement exam analytics (pass rates, registrations) |
| 9.14 | Implement `AggregateAnalytics` job with proper caching |
| **Verification** | Dashboard shows real-time stats, charts render correctly, teacher sees only their data |

### Phase 10: Production Deployment (Week 16-18)

| Task | Details |
|------|---------|
| 10.1 | Security audit — all policies verified |
| 10.2 | SQL injection prevention (using Eloquent throughout) |
| 10.3 | XSS protection (Blade escaping, RichText sanitization) |
| 10.4 | CSRF protection (Laravel default) |
| 10.5 | Rate limiting on public forms (contact, enrollment) |
| 10.6 | Queue worker configuration (supervisor) |
| 10.7 | Cache configuration (Redis for production) |
| 10.8 | CDN for media files (S3/CloudFlare R2) |
| 10.9 | Database indexing optimization |
| 10.10 | N+1 query audit (eager loading) |
| 10.11 | Laravel Horizon for queue monitoring |
| 10.12 | Laravel Telescope for debug (dev only) |
| 10.13 | SSL/TLS configuration |
| 10.14 | Backup strategy (database + media) |
| 10.15 | Monitoring setup (Laravel Pulse) |
| 10.16 | Load testing (k6 or similar) |
| 10.17 | Documentation — system architecture, deployment, API |
| 10.18 | Go-live checklist verification |
| **Verification** | All pages load < 500ms, security scan passes, queue jobs work, deployment automated |

---

## Best Practices & Security Architecture

### Security Architecture

```
┌──────────────────────────────────────────────────┐
│                  SECURITY LAYERS                   │
├──────────────────────────────────────────────────┤
│                                                    │
│  L1: Network                                       │
│  ├── SSL/TLS (HTTPS)                               │
│  ├── WAF (CloudFlare)                              │
│  └── DDoS Protection                               │
│                                                    │
│  L2: Application (Laravel)                         │
│  ├── CSRF Tokens (all POST/PUT/DELETE)             │
│  ├── XSS Protection (Blade {{ }} escaping)         │
│  ├── SQL Injection (Eloquent parameter binding)    │
│  ├── Rate Limiting (throttle middleware)            │
│  ├── Session Security (HTTP-only, SameSite)        │
│  └── Cookie Security (encrypted)                   │
│                                                    │
│  L3: Authentication                                │
│  ├── Bcrypt password hashing (12 rounds)           │
│  ├── Email verification (optional)                 │
│  ├── Rate-limited login attempts                   │
│  └── Session timeout                               │
│                                                    │
│  L4: Authorization (Spatie Permission)             │
│  ├── Role-Based Access Control (3 roles)           │
│  ├── Policies per model (7 policies)               │
│  ├── Gates for custom permissions                  │
│  └── Filament middleware checks                    │
│                                                    │
│  L5: Data Security                                 │
│  ├── Input validation (Form Requests)              │
│  ├── Mass assignment protection (fillable/guarded) │
│  ├── Soft deletes (data recovery)                  │
│  └── Audit logging (all state changes)             │
│                                                    │
│  L6: File Security                                 │
│  ├── Spatie Media Library (signed URLs)            │
│  ├── File type validation                          │
│  ├── File size limits                              │
│  └── Private storage for sensitive docs            │
│                                                    │
│  L7: Infrastructure                                │
│  ├── .env (never committed)                        │
│  ├── APP_KEY rotation                             │
│  ├── Database encrypted at rest                    │
│  └── Regular dependency updates (Dependabot)       │
│                                                    │
└──────────────────────────────────────────────────┘
```

### Laravel Best Practices

| Practice | Implementation |
|----------|---------------|
| **SOLID** | Single-responsibility services, repository pattern optional |
| **DRY** | Reusable Livewire components, service classes, traits |
| **N+1 Prevention** | Eager loading with `with()`, `load()`, `withCount()` |
| **Caching** | Cache analytics results, course listings, teacher lists |
| **Queue Everything** | Certificate PDF, notifications, analytics aggregation, payment processing |
| **Form Requests** | Validation in dedicated `StoreXxxRequest` classes |
| **Enums** | PHP 8.4 native enums for statuses, types, levels |
| **Observers** | Auto-logging, tracking events, progress recalculation |
| **Policies** | Gate access per resource, teacher sees only own students |
| **Soft Deletes** | All major entities support soft deletes |
| **JSON Columns** | Flexible metadata fields (options, answers, social links) |
| **Morph Maps** | Explicit morph map for payable/rateable/auditable |
| **Database Indexing** | All FK columns indexed, status/slug columns indexed |
| **Localization** | `lang/` files for future i18n |
| **Testing** | Feature tests for all controllers, Livewire components, services |

### Performance Architecture

```
┌──────────────────────────────────────────────┐
│           PERFORMANCE STRATEGIES              │
├──────────────────────────────────────────────┤
│                                               │
│  DATABASE                                     │
│  ├── Composite indexes on (status, date)      │
│  ├── Partial indexes for common queries       │
│  ├── EXPLAIN all slow queries                 │
│  └── Read replicas for analytics (future)     │
│                                               │
│  CACHING                                      │
│  ├── Course listing: cache 1 hour            │
│  ├── Course detail: cache 30 min (invalidated │
│  │   on update)                               │
│  ├── Teacher list: cache 1 hour              │
│  ├── Analytics: cache 6 hours (nightly job)   │
│  └── Homepage stats: cache 1 hour            │
│                                               │
│  QUEUE                                        │
│  ├── Certificate PDF generation               │
│  ├── Notification dispatch                    │
│  ├── Analytics aggregation                    │
│  ├── Payment verification processing          │
│  └── Email sending                            │
│                                               │
│  ASSETS                                       │
│  ├── Vite code splitting                      │
│  ├── Image optimization (WebP)                │
│  ├── Lazy loading images                      │
│  └── CDN for media files                      │
│                                               │
└──────────────────────────────────────────────┘
```

---

## ERD Structure (Text Representation)

```
┌──────────────┐     ┌──────────────┐     ┌──────────────┐
│    users     │1──1│   teachers   │     │  courses     │
│──────────────│     │──────────────│1──N│──────────────│
│ id (PK)      │     │ id (PK)      │     │ id (PK)      │
│ name         │     │ user_id (FK) │     │ category_id  │
│ email        │     │ employee_id  │N──M│ title        │
│ password     │     │ qualification│     │ price        │
│ phone        │     │ years_exp    │     │ is_published │
│ is_active    │     │ is_active    │     │ level        │
└──────────────┘     └──────────────┘     └──────┬───────┘
       │1                                       │
       │1                                       │1
┌──────────────┐     ┌──────────────┐            │
│   students   │     │course_teacher│            │
│──────────────│     │──────────────│   N────────┘
│ id (PK)      │     │ course_id(FK)│
│ user_id (FK) │     │ teacher_id   │    ┌──────────────┐
│ student_no   │     └──────────────┘    │course_ctgrs  │
│ status       │                         │──────────────│
│ enrollment_dt│                         │ id (PK)      │
└──────┬───────┘                         │ name         │
       │                                 └──────────────┘
       │1
┌──────────────┐     ┌──────────────┐
│  enrollments │     │  subjects    │
│──────────────│     │──────────────│
│ student_id   │     │ course_id(FK)│
│ course_id    │     │ title        │
│ status       │     │ sort_order   │
│ progress_pct │     └──────┬───────┘
│ paid_amount  │            │1
└──────┬───────┘     ┌──────────────┐
       │1            │   modules    │
       │             │──────────────│
┌──────────────┐     │ subject_id   │
│enroll_track  │     │ title        │
│──────────────│     │ sort_order   │
│ enrollment_id│     └──────┬───────┘
│ event_type   │            │1
│ description  │     ┌──────────────┐
│ metadata(J)  │     │   topics     │
└──────────────┘     │──────────────│
                     │ module_id    │
┌──────────────┐     │ teacher_id   │
│  youtube_tut │     │ title        │
│──────────────│     │ is_paid      │
│ teacher_id   │     │ is_teacher_ld│
│ course_id    │     │ content_type │
│ title        │────>│ youtube_tut  │
│ youtube_id   │     │ price        │
└──────────────┘     └──────┬───────┘
                            │1
          ┌─────────────────┼─────────────────┐
          │                 │                  │
┌──────────────┐  ┌──────────────┐  ┌──────────────┐
│topic_progress│  │ attendances  │  │    exams     │
│──────────────│  │──────────────│  │──────────────│
│ student_id   │  │ student_id   │  │ course_id    │
│ topic_id     │  │ topic_id     │  │ teacher_id   │
│ status       │  │ teacher_id   │  │ exam_type    │
│ percentage   │  │ status       │  │ fee          │
│ completed_at │  │ date         │  │ pass_percent │
└──────────────┘  └──────────────┘  └──────┬───────┘
                                           │1
┌──────────────┐  ┌──────────────┐  ┌──────────────┐
│exam_questions│  │exm_registratn│  │ exam_results  │
│──────────────│  │──────────────│  │───────────────│
│ exam_id      │  │ exam_id      │  │ registration  │
│ question     │  │ student_id   │  │ student_id    │
│ question_type│  │ status       │  │ exam_id       │
│ options(J)   │  │ fee_paid     │  │ marks_obtain  │
│ correct_ans  │  │ transaction  │  │ percentage    │
│ marks        │  │ verified_by  │  │ passed(bool)  │
└──────────────┘  └──────┬───────┘  │ answers (J)   │
                         │1         └───────────────┘
                         │
┌──────────────┐  ┌──────────────┐
│ certificates │  │   payments   │
│──────────────│  │──────────────│
│ student_id   │  │ user_id      │
│ course_id    │  │ student_id   │
│ cert_no      │N>│ payable_type │ (polymorphic)
│ verify_code  │  │ payable_id   │
│ issue_date   │  │ amount       │
│ grade        │  │ status       │
│ percentage   │  │ transaction  │
│ file_path    │  │ verified_by  │
└──────────────┘  └──────────────┘

┌──────────────┐  ┌──────────────┐  ┌──────────────┐
│   reviews    │  │   ratings    │  │ announcement │
│──────────────│  │──────────────│  │──────────────│
│ student_id   │  │ student_id   │  │ user_id      │
│ course_id    │  │ rateable_type│  │ title        │
│ review       │  │ rateable_id  │  │ type         │
│ is_approved  │  │ rating (1-5) │  │ is_published │
└──────────────┘  └──────────────┘  └──────────────┘

┌──────────────┐  ┌──────────────┐  ┌──────────────┐
│   contacts   │  │   offices    │  │  audit_logs  │
│──────────────│  │──────────────│  │──────────────│
│ name         │  │ name         │  │ user_id      │
│ email        │  │ location     │  │ action       │
│ message      │  │ phone        │  │ auditable    │
│ is_read      │  │ email        │  │ old_values(J)│
└──────────────┘  └──────────────┘  │ new_values(J)│
                                    └──────────────┘
```

---

## System Configuration (`config/university.php`)

```php
<?php
return [
    'name' => 'Picha Picasso University',
    'website' => env('UNIVERSITY_WEBSITE', 'https://pichapicasso.edu'),
    
    'exam' => [
        'thresholds' => [
            'exam_1' => 30,
            'exam_2' => 60,
            'exam_3' => 90,
            'final_graduation' => 100,
        ],
        'default_pass_percentage' => 50,
        'auto_grade_types' => ['multiple_choice', 'true_false'],
    ],
    
    'certificate' => [
        'prefix' => 'PPU',
        'verification_url' => env('APP_URL') . '/certificates/verify',
        'templates' => ['default' => 'Default Template'],
    ],
    
    'payment' => [
        'currency' => 'USD',
        'methods' => ['bank_transfer', 'mobile_money', 'credit_card'],
        'auto_verify' => false, // false = manual admin verification
    ],

    'media' => [
        'max_avatar_size' => 2048, // KB
        'max_certificate_size' => 5120,
        'allowed_mime_types' => ['image/jpeg', 'image/png', 'image/webp', 'application/pdf'],
    ],

    'analytics' => [
        'cache_ttl' => 3600, // 1 hour
        'aggregation_schedule' => 'daily', // cron: daily at midnight
    ],
];
```

---

This architecture is ready for phased implementation. Each phase builds on the previous, with clear deliverables and verification steps. The system is designed for scalability, security, and maintainability from day one.
