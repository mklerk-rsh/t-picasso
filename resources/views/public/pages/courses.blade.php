@extends('public.layout')

@section('title', 'Our Courses')

@push('head')
<meta name="description" content="Browse our comprehensive course catalog at Picha Picasso University. Find the perfect course for your career growth.">
@endpush

@section('content')

<section class="gradient-bg relative overflow-hidden min-h-[50vh] flex items-center">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 w-64 h-64 bg-white rounded-full blur-3xl floating"></div>
        <div class="absolute bottom-10 right-10 w-48 h-48 bg-white rounded-full blur-3xl floating-delay-1"></div>
    </div>
    <div class="container-custom relative z-10 pt-32 pb-20">
        <div class="max-w-3xl mx-auto text-center" data-gsap="fade-up">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                Our <span class="text-accent-300">Courses</span>
            </h1>
            <p class="text-lg md:text-xl text-white/80 leading-relaxed max-w-2xl mx-auto">
                Discover a world of knowledge with industry-driven courses designed to accelerate your career and expand your horizons.
            </p>
        </div>
    </div>
</section>

@php
    $courses = [
        ['title' => 'Introduction to Computer Science', 'category' => 'Computer Science', 'teacher' => 'Dr. Alan Turing', 'rating' => 4.9, 'enrolled' => 3200, 'duration' => '12 weeks', 'level' => 'Beginner', 'price' => 149, 'image_gradient' => 'from-blue-600 to-indigo-600'],
        ['title' => 'Advanced Machine Learning & AI', 'category' => 'Computer Science', 'teacher' => 'Dr. Alan Turing', 'rating' => 4.8, 'enrolled' => 1800, 'duration' => '16 weeks', 'level' => 'Advanced', 'price' => 299, 'image_gradient' => 'from-purple-600 to-pink-600'],
        ['title' => 'Data Structures & Algorithms', 'category' => 'Computer Science', 'teacher' => 'Prof. Grace Hopper', 'rating' => 4.7, 'enrolled' => 2500, 'duration' => '14 weeks', 'level' => 'Intermediate', 'price' => 199, 'image_gradient' => 'from-teal-500 to-cyan-600'],
        ['title' => 'Modern Marketing Strategies', 'category' => 'Business', 'teacher' => 'Mr. Philip Kotler', 'rating' => 4.8, 'enrolled' => 4200, 'duration' => '10 weeks', 'level' => 'Beginner', 'price' => 99, 'image_gradient' => 'from-emerald-500 to-green-600'],
        ['title' => 'Business Ethics & Leadership', 'category' => 'Business', 'teacher' => 'Mrs. Jane Adams', 'rating' => 4.6, 'enrolled' => 1500, 'duration' => '8 weeks', 'level' => 'Beginner', 'price' => 79, 'image_gradient' => 'from-amber-500 to-orange-600'],
        ['title' => 'Financial Intelligence & Wealth', 'category' => 'Business', 'teacher' => 'Mr. Robert Kiyosaki', 'rating' => 4.9, 'enrolled' => 5000, 'duration' => '12 weeks', 'level' => 'Intermediate', 'price' => 149, 'image_gradient' => 'from-yellow-500 to-red-500'],
        ['title' => 'Digital Photography Masterclass', 'category' => 'Arts & Design', 'teacher' => 'Ms. Annie Leibovitz', 'rating' => 4.9, 'enrolled' => 2800, 'duration' => '16 weeks', 'level' => 'Intermediate', 'price' => 249, 'image_gradient' => 'from-rose-500 to-pink-600'],
        ['title' => 'Experimental Typography & Layout', 'category' => 'Arts & Design', 'teacher' => 'Mr. David Carson', 'rating' => 4.7, 'enrolled' => 1200, 'duration' => '10 weeks', 'level' => 'Advanced', 'price' => 199, 'image_gradient' => 'from-violet-600 to-purple-600'],
        ['title' => 'Portrait & Fine Art Photography', 'category' => 'Arts & Design', 'teacher' => 'Ms. Annie Leibovitz', 'rating' => 4.8, 'enrolled' => 1900, 'duration' => '14 weeks', 'level' => 'Advanced', 'price' => 279, 'image_gradient' => 'from-fuchsia-500 to-rose-600'],
        ['title' => 'Electrical Engineering Fundamentals', 'category' => 'Engineering', 'teacher' => 'Eng. Nikola Tesla', 'rating' => 5.0, 'enrolled' => 3500, 'duration' => '20 weeks', 'level' => 'Beginner', 'price' => 199, 'image_gradient' => 'from-sky-600 to-blue-700'],
        ['title' => 'Renewable Energy Systems', 'category' => 'Engineering', 'teacher' => 'Eng. Nikola Tesla', 'rating' => 4.9, 'enrolled' => 2100, 'duration' => '16 weeks', 'level' => 'Intermediate', 'price' => 249, 'image_gradient' => 'from-green-600 to-emerald-700'],
        ['title' => 'Creative Coding & Generative Art', 'category' => 'Computer Science', 'teacher' => 'Prof. Grace Hopper', 'rating' => 4.6, 'enrolled' => 1600, 'duration' => '12 weeks', 'level' => 'Intermediate', 'price' => 179, 'image_gradient' => 'from-indigo-500 to-purple-600'],
    ];
@endphp

<section class="section-padding gradient-bg-subtle">
    <div class="container-custom">
        <div x-data="{ search: '', category: 'all', difficulty: 'all', sort: 'popular' }" class="space-y-8">
            <div class="glass rounded-2xl p-6" data-gsap="fade-up">
                <div class="relative mb-4">
                    <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="text" x-model="search" placeholder="Search courses..."
                           data-course-search
                           class="w-full pl-12 pr-4 py-3.5 bg-white border border-gray-200 rounded-xl text-sm text-gray-900 placeholder:text-gray-400 focus:outline-none focus:border-university-400 focus:ring-2 focus:ring-university-500/20 transition-all">
                </div>
                <div class="flex flex-col lg:flex-row lg:items-center gap-4">
                    <div class="flex flex-wrap gap-2 flex-1">
                        <template x-for="cat in ['all', 'Computer Science', 'Business', 'Arts & Design', 'Engineering']" :key="cat">
                            <button @click="category = cat"
                                    x-bind:class="category === cat ? 'bg-university-600 text-white shadow-lg shadow-university-500/25' : 'bg-white text-gray-600 hover:bg-university-50 hover:text-university-600 border border-gray-200'"
                                    class="px-4 py-2 text-sm font-medium rounded-xl transition-all duration-200">
                                <span x-text="cat === 'all' ? 'All Categories' : cat"></span>
                            </button>
                        </template>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <select x-model="difficulty"
                                class="px-4 py-2 text-sm bg-white border border-gray-200 rounded-xl text-gray-600 focus:outline-none focus:border-university-400 focus:ring-2 focus:ring-university-500/20">
                            <template x-for="opt in [{v:'all',l:'All Levels'},{v:'Beginner',l:'Beginner'},{v:'Intermediate',l:'Intermediate'},{v:'Advanced',l:'Advanced'}]" :key="opt.v">
                                <option x-bind:value="opt.v" x-text="opt.l"></option>
                            </template>
                        </select>
                        <select x-model="sort"
                                class="px-4 py-2 text-sm bg-white border border-gray-200 rounded-xl text-gray-600 focus:outline-none focus:border-university-400 focus:ring-2 focus:ring-university-500/20">
                            <option value="popular">Popular</option>
                            <option value="newest">Newest</option>
                            <option value="price_asc">Price: Low to High</option>
                            <option value="price_desc">Price: High to Low</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"
                 x-data="{
                     courses: {{ Js::from($courses) }},
                     get filtered() {
                         let result = this.courses;
                         if (this.search) {
                             const q = this.search.toLowerCase();
                             result = result.filter(c => c.title.toLowerCase().includes(q) || c.teacher.toLowerCase().includes(q));
                         }
                         if (this.category !== 'all') result = result.filter(c => c.category === this.category);
                         if (this.difficulty !== 'all') result = result.filter(c => c.level === this.difficulty);
                         if (this.sort === 'newest') result = [...result].reverse();
                         if (this.sort === 'price_asc') result = [...result].sort((a, b) => a.price - b.price);
                         if (this.sort === 'price_desc') result = [...result].sort((a, b) => b.price - a.price);
                         return result;
                     }
                 }">
                <template x-for="(course, index) in filtered" :key="index">
                    <div class="card group overflow-hidden hover:shadow-2xl" data-course-card x-bind:data-title="course.title" data-gsap="fade-up">
                        <div class="relative h-48 overflow-hidden">
                            <div x-bind:class="'w-full h-full bg-gradient-to-br ' + course.image_gradient + ' flex items-center justify-center group-hover:scale-110 transition-transform duration-500'">
                                <svg class="w-16 h-16 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 text-xs font-semibold text-white rounded-lg bg-white/20 backdrop-blur-md border border-white/20" x-text="course.category"></span>
                            </div>
                            <div class="absolute top-4 right-4">
                                <span class="px-3 py-1 text-xs font-semibold rounded-lg" x-bind:class="course.level === 'Beginner' ? 'bg-green-100 text-green-700' : course.level === 'Intermediate' ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700'" x-text="course.level"></span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2 group-hover:text-university-600 transition-colors line-clamp-2" x-text="course.title"></h3>
                            <p class="text-sm text-gray-500 mb-3" x-text="'by ' + course.teacher"></p>
                            <div class="flex items-center gap-2 mb-3">
                                <div class="flex items-center">
                                    <template x-for="i in 5" :key="i">
                                        <svg class="w-4 h-4" x-bind:class="i <= Math.round(course.rating) ? 'text-yellow-400' : 'text-gray-200'" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                    </template>
                                </div>
                                <span class="text-sm font-medium text-gray-500" x-text="course.rating"></span>
                                <span class="text-sm text-gray-400" x-text="'(' + course.enrolled.toLocaleString() + ' enrolled)'"></span>
                            </div>
                            <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                                <div class="flex items-center gap-3 text-sm text-gray-500">
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <span x-text="course.duration"></span>
                                    </span>
                                </div>
                                <span class="text-lg font-bold gradient-text" x-text="course.price === 0 ? 'Free' : '$' + course.price"></span>
                            </div>
                        </div>
                        <a href="#" class="block w-full text-center py-3 text-sm font-semibold text-university-600 bg-university-50 hover:bg-university-600 hover:text-white transition-all duration-200 rounded-b-2xl">
                            View Details
                        </a>
                    </div>
                </template>
            </div>

            <div x-show="filtered.length === 0" x-cloak class="text-center py-20">
                <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">No courses found</h3>
                <p class="text-gray-500">Try adjusting your search or filter criteria.</p>
            </div>
        </div>
    </div>
</section>

<section class="section-padding bg-white">
    <div class="container-custom">
        <div class="glass-dark rounded-3xl p-12 text-center" data-gsap="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Ready to Start Learning?</h2>
            <p class="text-lg text-white/70 max-w-2xl mx-auto mb-8">Join thousands of students and take the first step toward mastering new skills today.</p>
            <a href="#" class="btn-white">
                Browse All Courses
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>

@endsection
