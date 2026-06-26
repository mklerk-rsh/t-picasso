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
            'exam.approve', 'exam.publish', 'exam.grade',
            'exam.scorecard.release', 'exam.scorecard.download',
            'certificate.list', 'certificate.create', 'certificate.edit', 'certificate.delete',
            'certificate.verify', 'certificate.issue', 'certificate.revoke',
            'payment.list', 'payment.create', 'payment.edit', 'payment.delete',
            'payment.verify', 'payment.refund', 'payment.process',
            'course_payment.list', 'course_payment.create', 'course_payment.edit', 'course_payment.delete',
            'topic_payment.list', 'topic_payment.create', 'topic_payment.edit', 'topic_payment.delete',
            'certificate_payment.list', 'certificate_payment.create', 'certificate_payment.edit', 'certificate_payment.delete',
            'payment_method.list', 'payment_method.create', 'payment_method.edit', 'payment_method.delete',
            'transaction_log.list', 'transaction_log.create', 'transaction_log.edit', 'transaction_log.delete',
            'payment_attempt.list', 'payment_attempt.create', 'payment_attempt.edit', 'payment_attempt.delete',
            'payment_webhook.list', 'payment_webhook.create', 'payment_webhook.edit', 'payment_webhook.delete',
            'payment_reconciliation.list', 'payment_reconciliation.create', 'payment_reconciliation.edit', 'payment_reconciliation.delete',
            'mpesa_transaction.list', 'mpesa_transaction.create', 'mpesa_transaction.edit', 'mpesa_transaction.delete',
            'paypal_transaction.list', 'paypal_transaction.create', 'paypal_transaction.edit', 'paypal_transaction.delete',
            'paypal_webhook.list', 'paypal_webhook.create', 'paypal_webhook.edit', 'paypal_webhook.delete',
            'bank_account.list', 'bank_account.create', 'bank_account.edit', 'bank_account.delete',
            'bank_transfer_payment.list', 'bank_transfer_payment.create', 'bank_transfer_payment.edit', 'bank_transfer_payment.delete',
            'bank_transaction.list', 'bank_transaction.create', 'bank_transaction.edit', 'bank_transaction.delete',
            'bank_statement.list', 'bank_statement.create', 'bank_statement.edit', 'bank_statement.delete',
            'bank_reconciliation.list', 'bank_reconciliation.create', 'bank_reconciliation.edit', 'bank_reconciliation.delete',
            'certificate_template.list', 'certificate_template.create', 'certificate_template.edit', 'certificate_template.delete',
            'certificate_verification.list', 'certificate_verification.create', 'certificate_verification.edit', 'certificate_verification.delete',
            'graduation_record.list', 'graduation_record.create', 'graduation_record.edit', 'graduation_record.delete',
            'enrollment.list', 'enrollment.create', 'enrollment.edit', 'enrollment.delete',
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
            'exam.publish', 'exam.grade',
            'exam.scorecard.release',
            'student.view-assigned',
            'enrollment.view-assigned',
            'certificate.create', 'certificate.edit', 'certificate.list',
            'certificate_verification.list', 'certificate_verification.create',
            'graduation_record.list',
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
            'exam.scorecard.download',
            'certificate.view-own', 'certificate.download',
            'payment.make', 'payment.view-own',
            'payment_method.list', 'payment_method.create', 'payment_method.edit',
            'mpesa_transaction.list',
            'paypal_transaction.list',
            'bank_account.list', 'bank_account.create', 'bank_account.edit',
            'bank_transfer_payment.create', 'bank_transfer_payment.list',
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
