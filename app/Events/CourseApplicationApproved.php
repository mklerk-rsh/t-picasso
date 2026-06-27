<?php

namespace App\Events;

use App\Models\CourseApplication;
use Illuminate\Foundation\Events\Dispatchable;

class CourseApplicationApproved
{
    use Dispatchable;

    public function __construct(
        public CourseApplication $courseApplication,
    ) {}
}
