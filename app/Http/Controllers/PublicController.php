<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Review;
use App\Models\Office;

class PublicController extends Controller
{
    public function home()
    {
        return view('public.pages.home');
    }

    public function about()
    {
        return view('public.pages.about');
    }

    public function contact()
    {
        return view('public.pages.contact');
    }

    public function offices()
    {
        return view('public.pages.offices');
    }

    public function teachers()
    {
        return view('public.pages.teachers');
    }

    public function teacherProfile($id)
    {
        return view('public.pages.teacher-profile');
    }

    public function courses()
    {
        return view('public.pages.courses');
    }

    public function courseDetail($id)
    {
        return view('public.pages.course-detail');
    }

    public function enroll()
    {
        return view('public.pages.enroll');
    }

    public function tutorials()
    {
        return view('public.pages.tutorials');
    }

    public function reviews()
    {
        return view('public.pages.reviews');
    }
}
