@extends('public.layout')

@section('title', $teacher['name'] ?? 'Teacher Profile')

@push('head')
<meta name="description" content="Profile of {{ $teacher['name'] ?? 'our faculty member' }} at Picha Picasso University.">
@endpush

@section('content')

@php
    $teacher = $teacher ?? [
        'name' => 'Dr. Alan Turing',
        'initials' => 'A.T.',
        'title' => 'Professor of Computer Science',
        'department' => 'Computer Science',
        'rating' => 4.9,
        'reviews_count' => 128,
        'courses_taught' => 24,
        'students_taught' => 4500,
        'experience_years' => 30,
        'about' => 'Dr. Alan Turing is widely regarded as the father of theoretical computer science and artificial intelligence. With over three decades of groundbreaking contributions to the field, he has shaped the way we understand computation and intelligence. At Picha Picasso University, Dr. Turing leads the Advanced Computing Research Lab and teaches courses on algorithms, machine learning, and computational theory. His pioneering work during World War II on code-breaking machines laid the foundation for modern computing. Dr. Turing is passionate about mentoring the next generation of computer scientists and continues to push the boundaries of what machines can achieve.',
        'expertise' => ['Artificial Intelligence', 'Machine Learning', 'Cryptography', 'Algorithm Design', 'Computational Theory', 'Neural Networks'],
        'achievements' => [
            'Pioneer of the Turing Test (1950)',
            'Led code-breaking efforts at Bletchley Park',
            'Designed the Automatic Computing Engine (ACE)',
            'Fellow of the Royal Society (FRS)',
            'Turing Award (posthumously recognized)',
            'Published over 50 seminal research papers',
        ],
        'courses' => [
            ['title' => 'Introduction to Artificial Intelligence', 'students' => 1200, 'rating' => 4.9, 'level' => 'Beginner'],
            ['title' => 'Advanced Machine Learning', 'students' => 850, 'rating' => 4.8, 'level' => 'Advanced'],
            ['title' => 'Computational Theory & Cryptography', 'students' => 600, 'rating' => 4.9, 'level' => 'Intermediate'],
        ],
        'reviews' => [
            ['name' => 'Sarah M.', 'initials' => 'S.M.', 'rating' => 5, 'date' => 'March 2026', 'text' => 'Dr. Turing is an absolute genius. His lectures on AI are incredibly insightful and he has a unique ability to make complex topics accessible. Best professor I have ever had.'],
            ['name' => 'James K.', 'initials' => 'J.K.', 'rating' => 5, 'date' => 'January 2026', 'text' => 'Taking Advanced Machine Learning with Dr. Turing was a transformative experience. His depth of knowledge and passion for the subject is unmatched. Highly recommended.'],
            ['name' => 'Emily R.', 'initials' => 'E.R.', 'rating' => 4, 'date' => 'November 2025', 'text' => 'Challenging but incredibly rewarding course. Dr. Turing pushes you to think differently and approach problems from first principles. Absolutely worth the effort.'],
        ],
    ];
@endphp

<section class="gradient-bg relative overflow-hidden min-h-[50vh] flex items-center">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 right-10 w-72 h-72 bg-white rounded-full blur-3xl floating"></div>
        <div class="absolute bottom-10 left-10 w-48 h-48 bg-white rounded-full blur-3xl floating-delay-1"></div>
    </div>
    <div class="container-custom relative z-10 pt-32 pb-20">
        <div class="flex flex-col lg:flex-row items-center gap-10" data-gsap="fade-up">
            <div class="w-40 h-40 lg:w-52 lg:h-52 rounded-full bg-gradient-to-br from-university-300 to-accent-400 flex items-center justify-center shadow-2xl shadow-black/20 shrink-0 border-4 border-white/20">
                <span class="text-4xl lg:text-5xl font-bold text-white">{{ $teacher['initials'] }}</span>
            </div>
            <div class="text-center lg:text-left">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-2">{{ $teacher['name'] }}</h1>
                <p class="text-xl text-accent-200 font-medium mb-1">{{ $teacher['title'] }}</p>
                <p class="text-white/60 text-sm mb-4">{{ $teacher['department'] }} Department</p>
                <div class="flex items-center justify-center lg:justify-start gap-2">
                    <div class="flex items-center">
                        @for ($i = 1; $i <= 5; $i++)
                            <svg class="w-5 h-5 {{ $i <= round($teacher['rating']) ? 'text-yellow-400' : 'text-white/20' }}" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        @endfor
                    </div>
                    <span class="text-white/80 font-semibold">{{ $teacher['rating'] }}</span>
                    <span class="text-white/40">({{ $teacher['reviews_count'] }} reviews)</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding gradient-bg-subtle">
    <div class="container-custom">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-16" data-gsap="fade-up">
            <div class="card p-6 text-center hover:shadow-xl">
                <p class="text-3xl font-bold gradient-text mb-1"><span data-counter data-target="{{ $teacher['courses_taught'] }}">0</span></p>
                <p class="text-sm text-gray-500 font-medium">Courses Taught</p>
            </div>
            <div class="card p-6 text-center hover:shadow-xl">
                <p class="text-3xl font-bold gradient-text mb-1"><span data-counter data-target="{{ $teacher['students_taught'] }}">0</span></p>
                <p class="text-sm text-gray-500 font-medium">Students Taught</p>
            </div>
            <div class="card p-6 text-center hover:shadow-xl">
                <p class="text-3xl font-bold gradient-text mb-1"><span data-counter data-target="{{ $teacher['experience_years'] }}">0</span>+</p>
                <p class="text-sm text-gray-500 font-medium">Years Experience</p>
            </div>
            <div class="card p-6 text-center hover:shadow-xl">
                <p class="text-3xl font-bold gradient-text mb-1">{{ $teacher['rating'] }}</p>
                <p class="text-sm text-gray-500 font-medium">Rating</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12" data-gsap="fade-up">
            <div class="lg:col-span-2 space-y-12">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">About</h2>
                    <div class="prose prose-gray max-w-none">
                        <p class="text-gray-600 leading-relaxed">{{ $teacher['about'] }}</p>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Expertise Areas</h2>
                    <div class="flex flex-wrap gap-2">
                        @foreach ($teacher['expertise'] as $area)
                            <span class="px-4 py-2 text-sm font-medium bg-university-100 text-university-700 rounded-xl hover:bg-university-200 transition-colors">{{ $area }}</span>
                        @endforeach
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Courses Taught</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach ($teacher['courses'] as $course)
                            <div class="card p-6 hover:shadow-xl group">
                                <div class="w-full h-32 rounded-xl bg-gradient-to-br from-university-500 to-accent-500 mb-4 flex items-center justify-center">
                                    <svg class="w-10 h-10 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                </div>
                                <h3 class="font-semibold text-gray-900 mb-2 group-hover:text-university-600 transition-colors">{{ $course['title'] }}</h3>
                                <div class="flex items-center gap-3 text-sm text-gray-500">
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                        </svg>
                                        {{ $course['students'] }}
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                        {{ $course['rating'] }}
                                    </span>
                                    <span class="px-2 py-0.5 text-xs font-medium bg-university-100 text-university-700 rounded-lg">{{ $course['level'] }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Student Reviews</h2>
                    <div class="space-y-6">
                        @foreach ($teacher['reviews'] as $review)
                            <div class="card p-6 hover:shadow-xl">
                                <div class="flex items-center gap-4 mb-4">
                                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-university-400 to-accent-400 flex items-center justify-center text-white font-semibold text-sm">{{ $review['initials'] }}</div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900">{{ $review['name'] }}</h4>
                                        <div class="flex items-center gap-2">
                                            <div class="flex items-center">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <svg class="w-4 h-4 {{ $i <= $review['rating'] ? 'text-yellow-400' : 'text-gray-200' }}" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                    </svg>
                                                @endfor
                                            </div>
                                            <span class="text-xs text-gray-400">{{ $review['date'] }}</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-600 text-sm leading-relaxed">{{ $review['text'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Achievements & Certifications</h2>
                    <div class="space-y-3">
                        @foreach ($teacher['achievements'] as $achievement)
                            <div class="flex items-start gap-3 p-4 rounded-xl bg-white border border-gray-100 hover:border-university-200 hover:shadow-md transition-all">
                                <svg class="w-5 h-5 text-university-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="text-gray-700 text-sm">{{ $achievement }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="sticky top-28 space-y-6">
                    <div class="card p-6 hover:shadow-xl">
                        <h3 class="font-semibold text-gray-900 mb-4">Quick Info</h3>
                        <ul class="space-y-3 text-sm">
                            <li class="flex items-center justify-between">
                                <span class="text-gray-500">Department</span>
                                <span class="font-medium text-gray-900">{{ $teacher['department'] }}</span>
                            </li>
                            <li class="flex items-center justify-between">
                                <span class="text-gray-500">Experience</span>
                                <span class="font-medium text-gray-900">{{ $teacher['experience_years'] }}+ years</span>
                            </li>
                            <li class="flex items-center justify-between">
                                <span class="text-gray-500">Total Students</span>
                                <span class="font-medium text-gray-900">{{ number_format($teacher['students_taught']) }}+</span>
                            </li>
                            <li class="flex items-center justify-between">
                                <span class="text-gray-500">Courses</span>
                                <span class="font-medium text-gray-900">{{ count($teacher['courses']) }}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="card p-6 hover:shadow-xl">
                        <h3 class="font-semibold text-gray-900 mb-4">Connect</h3>
                        <div class="flex flex-wrap gap-2">
                            <a href="#" class="flex items-center justify-center w-10 h-10 rounded-xl bg-university-100 text-university-600 hover:bg-university-600 hover:text-white transition-all">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                            </a>
                            <a href="#" class="flex items-center justify-center w-10 h-10 rounded-xl bg-university-100 text-university-600 hover:bg-university-600 hover:text-white transition-all">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            </a>
                            <a href="#" class="flex items-center justify-center w-10 h-10 rounded-xl bg-university-100 text-university-600 hover:bg-university-600 hover:text-white transition-all">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22.162 5.656a8.384 8.384 0 01-2.402.658A4.196 4.196 0 0021.6 4c-.82.488-1.719.83-2.656 1.015a4.182 4.182 0 00-7.126 3.814 11.874 11.874 0 01-8.62-4.37 4.168 4.168 0 00-.566 2.103c0 1.45.738 2.731 1.86 3.481a4.168 4.168 0 01-1.894-.523v.052a4.185 4.185 0 003.355 4.101 4.21 4.21 0 01-1.89.072A4.185 4.185 0 007.97 16.65a8.394 8.394 0 01-6.191 1.732 11.83 11.83 0 006.41 1.88c7.693 0 11.9-6.373 11.9-11.9 0-.18-.005-.362-.013-.54a8.496 8.496 0 002.087-2.165z"/></svg>
                            </a>
                        </div>
                    </div>
                    <a href="{{ route('courses') }}" class="btn-primary w-full">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                        View Courses
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
