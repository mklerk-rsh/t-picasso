@extends('public.layout')

@section('title', 'Our Expert Faculty')

@push('head')
<meta name="description" content="Meet our distinguished faculty members at Picha Picasso University - industry experts and academic leaders.">
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
                Our Expert <span class="text-accent-300">Faculty</span>
            </h1>
            <p class="text-lg md:text-xl text-white/80 leading-relaxed max-w-2xl mx-auto">
                Learn from world-class educators, industry veterans, and passionate mentors dedicated to your success.
            </p>
        </div>
    </div>
</section>

<section class="section-padding gradient-bg-subtle">
    <div class="container-custom">
        <div class="mb-12" data-gsap="fade-up">
            <div class="glass rounded-2xl p-6" x-data="{ search: '', filter: 'all' }">
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="relative flex-1">
                        <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <input type="text" x-model="search" placeholder="Search teachers by name or specialization..."
                               data-course-search
                               class="w-full pl-12 pr-4 py-3.5 bg-white border border-gray-200 rounded-xl text-sm text-gray-900 placeholder:text-gray-400 focus:outline-none focus:border-university-400 focus:ring-2 focus:ring-university-500/20 transition-all">
                    </div>
                </div>
                <div class="flex flex-wrap gap-2 mt-4">
                    <template x-for="cat in ['all', 'Computer Science', 'Business', 'Arts', 'Engineering']" :key="cat">
                        <button @click="filter = cat"
                                x-bind:class="filter === cat ? 'bg-university-600 text-white shadow-lg shadow-university-500/25' : 'bg-white text-gray-600 hover:bg-university-50 hover:text-university-600 border border-gray-200'"
                                class="px-5 py-2 text-sm font-medium rounded-xl transition-all duration-200">
                            <span x-text="cat === 'all' ? 'All Departments' : cat"></span>
                        </button>
                    </template>
                </div>

                @php
                    $teachers = [
                        ['name' => 'Dr. Alan Turing', 'initials' => 'A.T.', 'specialization' => 'Computer Science', 'dept' => 'Computer Science', 'experience' => '30+ years', 'rating' => 4.9, 'bio' => 'Pioneer of theoretical computer science and artificial intelligence.'],
                        ['name' => 'Prof. Grace Hopper', 'initials' => 'G.H.', 'specialization' => 'Computer Science', 'dept' => 'Computer Science', 'experience' => '25+ years', 'rating' => 4.8, 'bio' => 'Computer programming pioneer and US Navy rear admiral.'],
                        ['name' => 'Mr. Philip Kotler', 'initials' => 'P.K.', 'specialization' => 'Marketing & Business', 'dept' => 'Business', 'experience' => '35+ years', 'rating' => 4.7, 'bio' => 'Father of modern marketing and distinguished author.'],
                        ['name' => 'Mrs. Jane Adams', 'initials' => 'J.A.', 'specialization' => 'Business Ethics', 'dept' => 'Business', 'experience' => '20+ years', 'rating' => 4.6, 'bio' => 'Award-winning professor specializing in business ethics and leadership.'],
                        ['name' => 'Mr. Robert Kiyosaki', 'initials' => 'R.K.', 'specialization' => 'Financial Education', 'dept' => 'Business', 'experience' => '25+ years', 'rating' => 4.8, 'bio' => 'Best-selling author and financial literacy advocate.'],
                        ['name' => 'Ms. Annie Leibovitz', 'initials' => 'A.L.', 'specialization' => 'Photography & Visual Arts', 'dept' => 'Arts', 'experience' => '30+ years', 'rating' => 4.9, 'bio' => 'World-renowned portrait photographer with Rolling Stone and Vanity Fair.'],
                        ['name' => 'Mr. David Carson', 'initials' => 'D.C.', 'specialization' => 'Graphic Design', 'dept' => 'Arts', 'experience' => '25+ years', 'rating' => 4.7, 'bio' => 'Legendary graphic designer and former art director of Ray Gun magazine.'],
                        ['name' => 'Eng. Nikola Tesla', 'initials' => 'N.T.', 'specialization' => 'Electrical Engineering', 'dept' => 'Engineering', 'experience' => '40+ years', 'rating' => 5.0, 'bio' => 'Inventor, electrical engineer, and visionary behind modern AC electricity.'],
                    ];
                @endphp

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-8"
                     x-data="{
                         filter: 'all',
                         teachers: {{ Js::from($teachers) }},
                         get filteredTeachers() {
                             if (this.filter === 'all') return this.teachers;
                             return this.teachers.filter(t => t.dept === this.filter);
                         }
                     }"
                     x-init="$watch('filter', () => {})">
                    <template x-for="(teacher, index) in filteredTeachers" :key="index">
                        <div class="card group p-6 text-center hover:shadow-2xl cursor-pointer" data-gsap="fade-up">
                            <div class="w-24 h-24 mx-auto mb-5 rounded-full bg-gradient-to-br from-university-500 to-accent-500 flex items-center justify-center shadow-lg shadow-university-500/20 group-hover:shadow-university-500/40 transition-all duration-300 group-hover:scale-110">
                                <span class="text-2xl font-bold text-white" x-text="teacher.initials"></span>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-1" x-text="teacher.name"></h3>
                            <p class="text-sm text-university-600 font-medium mb-2" x-text="teacher.specialization"></p>
                            <p class="text-xs text-gray-400 mb-1" x-text="teacher.bio"></p>
                            <p class="text-sm text-accent-600 font-semibold mb-3" x-text="teacher.experience"></p>
                            <div class="flex items-center justify-center gap-1 mb-4">
                                <template x-for="i in 5" :key="i">
                                    <svg class="w-4 h-4" x-bind:class="i <= Math.round(teacher.rating) ? 'text-yellow-400' : 'text-gray-200'" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                </template>
                                <span class="text-sm font-medium text-gray-500 ml-1" x-text="'(' + teacher.rating + ')'"></span>
                            </div>
                            <div class="flex items-center justify-center gap-3 mb-4">
                                <a href="#" class="flex items-center justify-center w-9 h-9 rounded-lg bg-gray-100 text-gray-500 hover:bg-university-100 hover:text-university-600 transition-all duration-200">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                                </a>
                                <a href="#" class="flex items-center justify-center w-9 h-9 rounded-lg bg-gray-100 text-gray-500 hover:bg-university-100 hover:text-university-600 transition-all duration-200">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                                </a>
                            </div>
                            <a href="#" class="inline-flex items-center gap-1 text-sm font-semibold text-university-600 hover:text-university-700 transition-colors group/link">
                                View Profile
                                <svg class="w-4 h-4 transition-transform group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </a>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding bg-white">
    <div class="container-custom">
        <div class="glass-dark rounded-3xl p-12 text-center" data-gsap="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Join Our Faculty</h2>
            <p class="text-lg text-white/70 max-w-2xl mx-auto mb-8">We are always looking for passionate educators and industry experts to join our growing team.</p>
            <a href="#" class="btn-white">
                Apply to Teach
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>

@endsection
