<?php

namespace App\Providers;

use App\Events\CourseApplicationApproved;
use App\Listeners\Enrollment\ProcessEnrollmentOnApproval;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        CourseApplicationApproved::class => [
            ProcessEnrollmentOnApproval::class,
        ],
    ];

    public function boot(): void
    {
        parent::boot();
    }
}
