<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleAndPermissionSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $guard = 'web';

        $superAdminPermissions = [
            'user.list', 'user.create', 'user.edit', 'user.delete',
            'teacher.list', 'teacher.create', 'teacher.edit', 'teacher.delete',
            'student.list', 'student.create', 'student.edit', 'student.delete',
            'course.list', 'course.create', 'course.edit', 'course.delete',
            'category.list', 'category.create', 'category.edit', 'category.delete',
            'subject.list', 'subject.create', 'subject.edit', 'subject.delete',
            'module.list', 'module.create', 'module.edit', 'module.delete',
            'topic.list', 'topic.create', 'topic.edit', 'topic.delete',
            'topic.toggle-paid',
            'exam.list', 'exam.create', 'exam.edit', 'exam.delete',
            'exam.approve',
            'certificate.list', 'certificate.create', 'certificate.edit', 'certificate.delete',
            'certificate.verify',
            'payment.list', 'payment.verify', 'payment.refund',
            'enrollment.list', 'enrollment.edit',
            'analytics.view-all',
            'announcement.list', 'announcement.create', 'announcement.edit', 'announcement.delete',
            'settings.view', 'settings.edit',
            'audit.view',
            'reviews.moderate',
            'office.list', 'office.create', 'office.edit', 'office.delete',
            'contact.list', 'contact.edit',
            'youtube-tutorial.list', 'youtube-tutorial.create', 'youtube-tutorial.edit', 'youtube-tutorial.delete',
            'attendance.list', 'attendance.create', 'attendance.edit',
        ];

        $teacherPermissions = [
            'course.view-assigned',
            'subject.view-assigned',
            'module.create', 'module.edit', 'module.delete',
            'topic.create', 'topic.edit', 'topic.delete',
            'topic.mark-paid', 'topic.mark-free',
            'youtube-tutorial.create', 'youtube-tutorial.edit', 'youtube-tutorial.delete',
            'exam.create', 'exam.edit', 'exam.delete',
            'exam.grade',
            'student.view-assigned',
            'enrollment.view-assigned',
            'certificate.create', 'certificate.edit',
            'attendance.mark', 'attendance.edit',
            'progress.view-own-students',
            'announcement.create', 'announcement.edit',
        ];

        $studentPermissions = [
            'course.browse',
            'enrollment.create', 'enrollment.view-own',
            'topic.view-enrolled',
            'topic.mark-complete',
            'exam.view-available', 'exam.register', 'exam.take',
            'exam-result.view-own',
            'certificate.view-own', 'certificate.download',
            'payment.make', 'payment.view-own',
            'review.create', 'review.edit-own',
            'profile.view-own', 'profile.edit-own',
            'progress.view-own',
            'attendance.view-own',
        ];

        $allPermissions = array_unique(array_merge(
            $superAdminPermissions,
            $teacherPermissions,
            $studentPermissions,
        ));

        foreach ($allPermissions as $permission) {
            Permission::create(['guard_name' => $guard, 'name' => $permission]);
        }

        $superAdmin = Role::create(['guard_name' => $guard, 'name' => 'super-admin']);
        $teacher = Role::create(['guard_name' => $guard, 'name' => 'teacher']);
        $student = Role::create(['guard_name' => $guard, 'name' => 'student']);

        $superAdmin->givePermissionTo($superAdminPermissions);
        $teacher->givePermissionTo($teacherPermissions);
        $student->givePermissionTo($studentPermissions);
    }
}
