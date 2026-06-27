@extends('public.layout')

@section('title', 'Picha Picasso University')
@section('meta_description', 'Shape Your Future with Excellence - Join thousands of students worldwide at Picha Picasso University.')

@section('content')
    {{-- Section 1: Hero --}}
    <section class="relative min-h-screen flex items-center overflow-hidden gradient-bg" data-parallax>
        <div class="absolute inset-0 overflow-hidden">
            <div class="hero-glow bg-accent-500 top-[-100px] right-[-100px] floating"></div>
            <div class="hero-glow bg-university-300 bottom-[-150px] left-[-150px] floating-delay-1"></div>
            <div class="hero-glow bg-pink-500 top-1/2 left-1/3 floating-delay-2"></div>
            <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wMyI+PGNpcmNsZSBjeD0iMzAiIGN5PSIzMCIgcj0iMiIvPjwvZz48L2c+PC9zdmc+')] opacity-40"></div>
        </div>
        <div class="container-custom relative z-10 pt-32 pb-20">
            <div data-hero-content class="max-w-4xl mx-auto text-center">
                <div data-animate class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-white/90 text-sm font-medium mb-8">
                    <svg class="w-4 h-4 text-accent-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>Ranked #1 Online University 2024</span>
                </div>
                <h1 data-animate class="text-5xl sm:text-6xl lg:text-7xl xl:text-8xl font-bold text-white leading-[1.1] mb-6">
                    Shape Your Future<br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-accent-300 via-accent-400 to-accent-500">with Excellence</span>
                </h1>
                <p data-animate class="text-lg sm:text-xl text-white/70 max-w-2xl mx-auto mb-10 leading-relaxed">
                    Join thousands of students worldwide and transform your career with industry-recognized certifications
                </p>
                <div data-animate class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-16">
                    <a href="#courses" class="btn-primary text-base">
                        Explore Courses
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                    <a href="#" class="btn-white text-base">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/>
                        </svg>
                        Watch Video
                    </a>
                </div>
                <div data-animate class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-6">
                    <div class="text-center p-4 rounded-xl bg-white/5 backdrop-blur-sm border border-white/10">
                        <div class="text-3xl sm:text-4xl font-bold text-white mb-1"><span data-counter data-target="10000">0</span>+</div>
                        <div class="text-white/60 text-sm">Students</div>
                    </div>
                    <div class="text-center p-4 rounded-xl bg-white/5 backdrop-blur-sm border border-white/10">
                        <div class="text-3xl sm:text-4xl font-bold text-white mb-1"><span data-counter data-target="95">0</span>%</div>
                        <div class="text-white/60 text-sm">Graduation Rate</div>
                    </div>
                    <div class="text-center p-4 rounded-xl bg-white/5 backdrop-blur-sm border border-white/10">
                        <div class="text-3xl sm:text-4xl font-bold text-white mb-1"><span data-counter data-target="92">0</span>%</div>
                        <div class="text-white/60 text-sm">Employment Rate</div>
                    </div>
                    <div class="text-center p-4 rounded-xl bg-white/5 backdrop-blur-sm border border-white/10">
                        <div class="text-3xl sm:text-4xl font-bold text-white mb-1"><span data-counter data-target="200">0</span>+</div>
                        <div class="text-white/60 text-sm">Expert Teachers</div>
                    </div>
                    <div class="text-center p-4 rounded-xl bg-white/5 backdrop-blur-sm border border-white/10 sm:col-span-3 lg:col-span-1">
                        <div class="text-3xl sm:text-4xl font-bold text-white mb-1"><span data-counter data-target="500">0</span>+</div>
                        <div class="text-white/60 text-sm">Courses</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Section 2: Why Picha Picasso --}}
    <section class="section-padding gradient-bg-subtle relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-university-100/50 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-accent-100/50 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
        <div class="container-custom relative z-10">
            <div data-gsap="fade-up" class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-4xl sm:text-5xl font-bold gradient-text mb-4">Why Picha Picasso Secures Your Future</h2>
                <p class="text-lg text-gray-600">We provide everything you need to succeed in your career</p>
            </div>
            <div data-gsap="stagger" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                <div class="card p-8 group">
                    <div class="w-14 h-14 rounded-xl bg-university-100 text-university-600 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Career Opportunities</h3>
                    <p class="text-gray-500 leading-relaxed">Industry-aligned curriculum designed with top employers</p>
                </div>
                <div class="card p-8 group">
                    <div class="w-14 h-14 rounded-xl bg-university-100 text-university-600 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Skills Development</h3>
                    <p class="text-gray-500 leading-relaxed">Hands-on learning with real-world projects</p>
                </div>
                <div class="card p-8 group">
                    <div class="w-14 h-14 rounded-xl bg-university-100 text-university-600 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Certification</h3>
                    <p class="text-gray-500 leading-relaxed">Globally recognized certificates upon completion</p>
                </div>
                <div class="card p-8 group">
                    <div class="w-14 h-14 rounded-xl bg-university-100 text-university-600 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Expert Mentorship</h3>
                    <p class="text-gray-500 leading-relaxed">Learn from industry leaders with years of experience</p>
                </div>
                <div class="card p-8 group">
                    <div class="w-14 h-14 rounded-xl bg-university-100 text-university-600 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Flexible Learning</h3>
                    <p class="text-gray-500 leading-relaxed">Study at your own pace with 24/7 access</p>
                </div>
                <div class="card p-8 group">
                    <div class="w-14 h-14 rounded-xl bg-university-100 text-university-600 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">High Employability</h3>
                    <p class="text-gray-500 leading-relaxed">90%+ employment rate within 6 months</p>
                </div>
            </div>
        </div>
    </section>
    {{-- Section 3: Featured Courses --}}
    <section id="courses" class="section-padding bg-white relative overflow-hidden">
        <div class="container-custom">
            <div data-gsap="fade-up" class="text-center max-w-3xl mx-auto mb-16">
                <span class="inline-block px-4 py-1.5 rounded-full bg-university-100 text-university-700 text-sm font-medium mb-4">Our Programs</span>
                <h2 class="text-4xl sm:text-5xl font-bold gradient-text mb-4">Featured Courses</h2>
                <p class="text-lg text-gray-600">Explore our most popular courses</p>
            </div>
            <div class="relative" data-gsap="fade-up">
                <div data-swiper="courses" class="overflow-hidden pb-14">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div data-course-card data-title="Web Development Bootcamp" class="card overflow-hidden group cursor-pointer h-full">
                                <div class="h-48 bg-gradient-to-br from-university-500 to-university-700 relative flex items-center justify-center overflow-hidden">
                                    <svg class="w-16 h-16 text-white/30 group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                                    </svg>
                                    <span class="absolute top-4 left-4 px-3 py-1 rounded-full bg-white/20 backdrop-blur-sm text-white text-xs font-medium">Development</span>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Web Development Bootcamp</h3>
                                    <p class="text-sm text-gray-500 mb-1">by <span class="text-university-600 font-medium">Dr. Sarah Chen</span></p>
                                    <div class="flex items-center gap-1 mb-3">
                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        <span class="text-sm text-gray-500 ml-1">(4.9)</span>
                                        <span class="text-sm text-gray-400 ml-auto">2,847 enrolled</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-gray-500 mb-4">
                                        <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>24 Weeks</span>
                                        <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>All Levels</span>
                                    </div>
                                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                        <span class="text-2xl font-bold text-university-600"></span>
                                        <a href="#" class="text-sm font-semibold text-university-600 hover:text-university-700 flex items-center gap-1 group/link">
                                            View Course
                                            <svg class="w-4 h-4 transition-transform group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div data-course-card data-title="Data Science & Machine Learning" class="card overflow-hidden group cursor-pointer h-full">
                                <div class="h-48 bg-gradient-to-br from-accent-500 to-accent-700 relative flex items-center justify-center overflow-hidden">
                                    <svg class="w-16 h-16 text-white/30 group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                    </svg>
                                    <span class="absolute top-4 left-4 px-3 py-1 rounded-full bg-white/20 backdrop-blur-sm text-white text-xs font-medium">Data Science</span>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Data Science & Machine Learning</h3>
                                    <p class="text-sm text-gray-500 mb-1">by <span class="text-university-600 font-medium">Prof. James Wilson</span></p>
                                    <div class="flex items-center gap-1 mb-3">
                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        <svg class="w-4 h-4 text-yellow-400/50" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        <span class="text-sm text-gray-500 ml-1">(4.7)</span>
                                        <span class="text-sm text-gray-400 ml-auto">3,124 enrolled</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-gray-500 mb-4">
                                        <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>32 Weeks</span>
                                        <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>Advanced</span>
                                    </div>
                                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                        <span class="text-2xl font-bold text-university-600"></span>
                                        <a href="#" class="text-sm font-semibold text-university-600 hover:text-university-700 flex items-center gap-1 group/link">
                                            View Course
                                            <svg class="w-4 h-4 transition-transform group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div data-course-card data-title="UI/UX Design Masterclass" class="card overflow-hidden group cursor-pointer h-full">
                                <div class="h-48 bg-gradient-to-br from-pink-500 to-rose-600 relative flex items-center justify-center overflow-hidden">
                                    <svg class="w-16 h-16 text-white/30 group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                                    </svg>
                                    <span class="absolute top-4 left-4 px-3 py-1 rounded-full bg-white/20 backdrop-blur-sm text-white text-xs font-medium">Design</span>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">UI/UX Design Masterclass</h3>
                                    <p class="text-sm text-gray-500 mb-1">by <span class="text-university-600 font-medium">Emily Rodriguez</span></p>
                                    <div class="flex items-center gap-1 mb-3">
                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        <span class="text-sm text-gray-500 ml-1">(4.8)</span>
                                        <span class="text-sm text-gray-400 ml-auto">1,956 enrolled</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-gray-500 mb-4">
                                        <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>16 Weeks</span>
                                        <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>Beginner</span>
                                    </div>
                                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                        <span class="text-2xl font-bold text-university-600"></span>
                                        <a href="#" class="text-sm font-semibold text-university-600 hover:text-university-700 flex items-center gap-1 group/link">
                                            View Course
                                            <svg class="w-4 h-4 transition-transform group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div data-course-card data-title="Mobile App Development with React Native" class="card overflow-hidden group cursor-pointer h-full">
                                <div class="h-48 bg-gradient-to-br from-emerald-500 to-teal-600 relative flex items-center justify-center overflow-hidden">
                                    <svg class="w-16 h-16 text-white/30 group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 18h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                    </svg>
                                    <span class="absolute top-4 left-4 px-3 py-1 rounded-full bg-white/20 backdrop-blur-sm text-white text-xs font-medium">Mobile</span>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Mobile App Development</h3>
                                    <p class="text-sm text-gray-500 mb-1">by <span class="text-university-600 font-medium">Alex Kim</span></p>
                                    <div class="flex items-center gap-1 mb-3">
                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        <span class="text-sm text-gray-500 ml-1">(4.6)</span>
                                        <span class="text-sm text-gray-400 ml-auto">2,301 enrolled</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-gray-500 mb-4">
                                        <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>20 Weeks</span>
                                        <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>Intermediate</span>
                                    </div>
                                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                        <span class="text-2xl font-bold text-green-600">Free</span>
                                        <a href="#" class="text-sm font-semibold text-university-600 hover:text-university-700 flex items-center gap-1 group/link">
                                            View Course
                                            <svg class="w-4 h-4 transition-transform group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div data-course-card data-title="Cybersecurity Fundamentals" class="card overflow-hidden group cursor-pointer h-full">
                                <div class="h-48 bg-gradient-to-br from-red-500 to-red-700 relative flex items-center justify-center overflow-hidden">
                                    <svg class="w-16 h-16 text-white/30 group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
                                    <span class="absolute top-4 left-4 px-3 py-1 rounded-full bg-white/20 backdrop-blur-sm text-white text-xs font-medium">Security</span>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Cybersecurity Fundamentals</h3>
                                    <p class="text-sm text-gray-500 mb-1">by <span class="text-university-600 font-medium">Dr. Maria Santos</span></p>
                                    <div class="flex items-center gap-1 mb-3">
                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        <svg class="w-4 h-4 text-yellow-400/50" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        <span class="text-sm text-gray-500 ml-1">(4.5)</span>
                                        <span class="text-sm text-gray-400 ml-auto">1,678 enrolled</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-gray-500 mb-4">
                                        <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>12 Weeks</span>
                                        <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>Beginner</span>
                                    </div>
                                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                        <span class="text-2xl font-bold text-university-600"></span>
                                        <a href="#" class="text-sm font-semibold text-university-600 hover:text-university-700 flex items-center gap-1 group/link">
                                            View Course
                                            <svg class="w-4 h-4 transition-transform group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-swiper-pagination="courses" class="flex justify-center gap-2 mt-8"></div>
                    <button data-swiper-prev="courses" class="absolute top-1/2 -left-4 -translate-y-1/2 w-12 h-12 rounded-full bg-white shadow-lg border border-gray-100 flex items-center justify-center text-gray-600 hover:text-university-600 transition-colors z-10 hidden lg:flex">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    </button>
                    <button data-swiper-next="courses" class="absolute top-1/2 -right-4 -translate-y-1/2 w-12 h-12 rounded-full bg-white shadow-lg border border-gray-100 flex items-center justify-center text-gray-600 hover:text-university-600 transition-colors z-10 hidden lg:flex">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </section>
    {{-- Section 4: Meet Our Teachers --}}
    <section id="teachers" class="section-padding gradient-bg-subtle relative overflow-hidden">
        <div class="container-custom">
            <div data-gsap="fade-up" class="text-center max-w-3xl mx-auto mb-16">
                <span class="inline-block px-4 py-1.5 rounded-full bg-university-100 text-university-700 text-sm font-medium mb-4">Our Team</span>
                <h2 class="text-4xl sm:text-5xl font-bold gradient-text mb-4">Expert Instructors</h2>
                <p class="text-lg text-gray-600">Learn from the best in the industry</p>
            </div>
            <div class="relative" data-gsap="fade-up">
                <div data-swiper="teachers" class="overflow-hidden pb-14">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="card p-8 text-center group h-full">
                                <div class="w-28 h-28 rounded-full bg-gradient-to-br from-university-400 to-university-600 mx-auto mb-6 flex items-center justify-center text-white text-3xl font-bold group-hover:scale-105 transition-transform duration-300">SC</div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-1">Dr. Sarah Chen</h3>
                                <p class="text-university-600 font-medium text-sm mb-1">Web Development</p>
                                <p class="text-gray-400 text-sm mb-4">12 years experience</p>
                                <div class="flex items-center justify-center gap-3 mb-6">
                                    <a href="#" class="w-9 h-9 rounded-full bg-gray-100 text-gray-500 hover:bg-university-100 hover:text-university-600 flex items-center justify-center transition-colors">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                                    </a>
                                    <a href="#" class="w-9 h-9 rounded-full bg-gray-100 text-gray-500 hover:bg-university-100 hover:text-university-600 flex items-center justify-center transition-colors">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/></svg>
                                    </a>
                                    <a href="#" class="w-9 h-9 rounded-full bg-gray-100 text-gray-500 hover:bg-university-100 hover:text-university-600 flex items-center justify-center transition-colors">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                    </a>
                                </div>
                                <a href="#" class="text-sm font-semibold text-university-600 hover:text-university-700 flex items-center justify-center gap-1 group/link">
                                    View Profile
                                    <svg class="w-4 h-4 transition-transform group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                                </a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card p-8 text-center group h-full">
                                <div class="w-28 h-28 rounded-full bg-gradient-to-br from-accent-400 to-accent-600 mx-auto mb-6 flex items-center justify-center text-white text-3xl font-bold group-hover:scale-105 transition-transform duration-300">JW</div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-1">Prof. James Wilson</h3>
                                <p class="text-university-600 font-medium text-sm mb-1">Data Science</p>
                                <p class="text-gray-400 text-sm mb-4">15 years experience</p>
                                <div class="flex items-center justify-center gap-3 mb-6">
                                    <a href="#" class="w-9 h-9 rounded-full bg-gray-100 text-gray-500 hover:bg-university-100 hover:text-university-600 flex items-center justify-center transition-colors">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                                    </a>
                                    <a href="#" class="w-9 h-9 rounded-full bg-gray-100 text-gray-500 hover:bg-university-100 hover:text-university-600 flex items-center justify-center transition-colors">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/></svg>
                                    </a>
                                    <a href="#" class="w-9 h-9 rounded-full bg-gray-100 text-gray-500 hover:bg-university-100 hover:text-university-600 flex items-center justify-center transition-colors">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                    </a>
                                </div>
                                <a href="#" class="text-sm font-semibold text-university-600 hover:text-university-700 flex items-center justify-center gap-1 group/link">
                                    View Profile
                                    <svg class="w-4 h-4 transition-transform group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                                </a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card p-8 text-center group h-full">
                                <div class="w-28 h-28 rounded-full bg-gradient-to-br from-pink-400 to-rose-500 mx-auto mb-6 flex items-center justify-center text-white text-3xl font-bold group-hover:scale-105 transition-transform duration-300">ER</div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-1">Emily Rodriguez</h3>
                                <p class="text-university-600 font-medium text-sm mb-1">UI/UX Design</p>
                                <p class="text-gray-400 text-sm mb-4">9 years experience</p>
                                <div class="flex items-center justify-center gap-3 mb-6">
                                    <a href="#" class="w-9 h-9 rounded-full bg-gray-100 text-gray-500 hover:bg-university-100 hover:text-university-600 flex items-center justify-center transition-colors">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                                    </a>
                                    <a href="#" class="w-9 h-9 rounded-full bg-gray-100 text-gray-500 hover:bg-university-100 hover:text-university-600 flex items-center justify-center transition-colors">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/></svg>
                                    </a>
                                </div>
                                <a href="#" class="text-sm font-semibold text-university-600 hover:text-university-700 flex items-center justify-center gap-1 group/link">
                                    View Profile
                                    <svg class="w-4 h-4 transition-transform group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                                </a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card p-8 text-center group h-full">
                                <div class="w-28 h-28 rounded-full bg-gradient-to-br from-emerald-400 to-teal-500 mx-auto mb-6 flex items-center justify-center text-white text-3xl font-bold group-hover:scale-105 transition-transform duration-300">AK</div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-1">Alex Kim</h3>
                                <p class="text-university-600 font-medium text-sm mb-1">Mobile Development</p>
                                <p class="text-gray-400 text-sm mb-4">10 years experience</p>
                                <div class="flex items-center justify-center gap-3 mb-6">
                                    <a href="#" class="w-9 h-9 rounded-full bg-gray-100 text-gray-500 hover:bg-university-100 hover:text-university-600 flex items-center justify-center transition-colors">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                                    </a>
                                    <a href="#" class="w-9 h-9 rounded-full bg-gray-100 text-gray-500 hover:bg-university-100 hover:text-university-600 flex items-center justify-center transition-colors">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                    </a>
                                </div>
                                <a href="#" class="text-sm font-semibold text-university-600 hover:text-university-700 flex items-center justify-center gap-1 group/link">
                                    View Profile
                                    <svg class="w-4 h-4 transition-transform group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div data-swiper-pagination="teachers" class="flex justify-center gap-2 mt-8"></div>
                    <button data-swiper-prev="teachers" class="absolute top-1/2 -left-4 -translate-y-1/2 w-12 h-12 rounded-full bg-white shadow-lg border border-gray-100 flex items-center justify-center text-gray-600 hover:text-university-600 transition-colors z-10 hidden lg:flex">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    </button>
                    <button data-swiper-next="teachers" class="absolute top-1/2 -right-4 -translate-y-1/2 w-12 h-12 rounded-full bg-white shadow-lg border border-gray-100 flex items-center justify-center text-gray-600 hover:text-university-600 transition-colors z-10 hidden lg:flex">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </section>
    {{-- Section 5: Student Testimonials --}}
    <section id="testimonials" class="section-padding bg-white relative overflow-hidden">
        <div class="container-custom">
            <div data-gsap="fade-up" class="text-center max-w-3xl mx-auto mb-16">
                <span class="inline-block px-4 py-1.5 rounded-full bg-university-100 text-university-700 text-sm font-medium mb-4">Testimonials</span>
                <h2 class="text-4xl sm:text-5xl font-bold gradient-text mb-4">What Our Students Say</h2>
                <p class="text-lg text-gray-600">Hear from our graduates</p>
            </div>
            <div class="max-w-4xl mx-auto relative" data-gsap="fade-up">
                <div data-swiper="testimonials" class="overflow-hidden pb-14">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="card p-8 sm:p-12 text-center">
                                <div class="w-20 h-20 rounded-full bg-gradient-to-br from-university-400 to-accent-500 mx-auto mb-6 flex items-center justify-center text-white text-xl font-bold">JD</div>
                                <div class="flex items-center justify-center gap-1 mb-4">
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                </div>
                                <blockquote class="text-lg sm:text-xl text-gray-700 leading-relaxed mb-6 italic">"The Web Development Bootcamp completely transformed my career. Within three months of graduating, I landed my dream job as a full-stack developer at Google. The hands-on projects and mentorship were invaluable."</blockquote>
                                <h4 class="font-semibold text-gray-900">John Doe</h4>
                                <p class="text-gray-500 text-sm">Web Development Bootcamp Graduate</p>
                                <div class="mt-4 inline-flex items-center gap-2 px-4 py-2 rounded-full bg-green-50 text-green-700 text-sm font-medium">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                    Got hired at Google
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card p-8 sm:p-12 text-center">
                                <div class="w-20 h-20 rounded-full bg-gradient-to-br from-accent-400 to-accent-600 mx-auto mb-6 flex items-center justify-center text-white text-xl font-bold">SM</div>
                                <div class="flex items-center justify-center gap-1 mb-4">
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                </div>
                                <blockquote class="text-lg sm:text-xl text-gray-700 leading-relaxed mb-6 italic">"The Data Science program at Picha Picasso gave me the skills I needed to transition from finance to tech. The curriculum is incredibly well-structured and the mentors are world-class. Best decision I ever made."</blockquote>
                                <h4 class="font-semibold text-gray-900">Sarah Mitchell</h4>
                                <p class="text-gray-500 text-sm">Data Science Graduate</p>
                                <div class="mt-4 inline-flex items-center gap-2 px-4 py-2 rounded-full bg-green-50 text-green-700 text-sm font-medium">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                    Senior Analyst at Amazon
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card p-8 sm:p-12 text-center">
                                <div class="w-20 h-20 rounded-full bg-gradient-to-br from-pink-400 to-rose-500 mx-auto mb-6 flex items-center justify-center text-white text-xl font-bold">MK</div>
                                <div class="flex items-center justify-center gap-1 mb-4">
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                </div>
                                <blockquote class="text-lg sm:text-xl text-gray-700 leading-relaxed mb-6 italic">"As a self-taught designer, the UI/UX Masterclass filled all the gaps in my knowledge. The portfolio projects were incredibly helpful for landing freelance clients. I have doubled my income since completing the course."</blockquote>
                                <h4 class="font-semibold text-gray-900">Maria Khan</h4>
                                <p class="text-gray-500 text-sm">UI/UX Design Graduate</p>
                                <div class="mt-4 inline-flex items-center gap-2 px-4 py-2 rounded-full bg-green-50 text-green-700 text-sm font-medium">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                    Lead Designer at Airbnb
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card p-8 sm:p-12 text-center">
                                <div class="w-20 h-20 rounded-full bg-gradient-to-br from-emerald-400 to-teal-500 mx-auto mb-6 flex items-center justify-center text-white text-xl font-bold">DP</div>
                                <div class="flex items-center justify-center gap-1 mb-4">
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <svg class="w-5 h-5 text-yellow-400/50" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                </div>
                                <blockquote class="text-lg sm:text-xl text-gray-700 leading-relaxed mb-6 italic">"The Cybersecurity program was intense but incredibly rewarding. The hands-on labs and real-world scenarios prepared me for the challenges of the field. I passed my CISSP certification on the first try after graduating."</blockquote>
                                <h4 class="font-semibold text-gray-900">David Park</h4>
                                <p class="text-gray-500 text-sm">Cybersecurity Graduate</p>
                                <div class="mt-4 inline-flex items-center gap-2 px-4 py-2 rounded-full bg-green-50 text-green-700 text-sm font-medium">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                    Security Engineer at Microsoft
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-swiper-pagination="testimonials" class="flex justify-center gap-2 mt-8"></div>
                </div>
            </div>
        </div>
    </section>
    {{-- Section 6: Statistics --}}
    <section class="section-padding gradient-bg relative overflow-hidden">
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-white/5 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 right-0 w-[400px] h-[400px] bg-accent-500/10 rounded-full blur-3xl translate-x-1/3 translate-y-1/3"></div>
        </div>
        <div class="container-custom relative z-10">
            <div data-gsap="fade-up" class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-4xl sm:text-5xl font-bold text-white mb-4">Our Impact in Numbers</h2>
                <p class="text-lg text-white/70">Building a global community of learners and leaders</p>
            </div>
            <div data-gsap="stagger" class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-6 lg:gap-8">
                <div class="text-center p-6 sm:p-8 rounded-2xl bg-white/10 backdrop-blur-sm border border-white/10">
                    <div class="w-12 h-12 rounded-xl bg-accent-500/20 text-accent-300 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
                        </svg>
                    </div>
                    <div class="text-4xl sm:text-5xl font-bold text-white mb-1"><span data-counter data-target="10000">0</span>+</div>
                    <div class="text-white/60 text-sm">Total Students</div>
                </div>
                <div class="text-center p-6 sm:p-8 rounded-2xl bg-white/10 backdrop-blur-sm border border-white/10">
                    <div class="w-12 h-12 rounded-xl bg-accent-500/20 text-accent-300 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                    </div>
                    <div class="text-4xl sm:text-5xl font-bold text-white mb-1"><span data-counter data-target="8500">0</span>+</div>
                    <div class="text-white/60 text-sm">Graduates</div>
                </div>
                <div class="text-center p-6 sm:p-8 rounded-2xl bg-white/10 backdrop-blur-sm border border-white/10">
                    <div class="w-12 h-12 rounded-xl bg-accent-500/20 text-accent-300 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <div class="text-4xl sm:text-5xl font-bold text-white mb-1"><span data-counter data-target="200">0</span>+</div>
                    <div class="text-white/60 text-sm">Expert Teachers</div>
                </div>
                <div class="text-center p-6 sm:p-8 rounded-2xl bg-white/10 backdrop-blur-sm border border-white/10">
                    <div class="w-12 h-12 rounded-xl bg-accent-500/20 text-accent-300 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <div class="text-4xl sm:text-5xl font-bold text-white mb-1"><span data-counter data-target="500">0</span>+</div>
                    <div class="text-white/60 text-sm">Courses</div>
                </div>
                <div class="text-center p-6 sm:p-8 rounded-2xl bg-white/10 backdrop-blur-sm border border-white/10 sm:col-span-3 lg:col-span-1">
                    <div class="w-12 h-12 rounded-xl bg-accent-500/20 text-accent-300 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="text-4xl sm:text-5xl font-bold text-white mb-1"><span data-counter data-target="50">0</span>+</div>
                    <div class="text-white/60 text-sm">Countries</div>
                </div>
            </div>
        </div>
    </section>
    {{-- Section 7: YouTube Tutorials --}}
    <section id="tutorials" class="section-padding bg-white relative overflow-hidden">
        <div class="container-custom">
            <div data-gsap="fade-up" class="text-center max-w-3xl mx-auto mb-16">
                <span class="inline-block px-4 py-1.5 rounded-full bg-university-100 text-university-700 text-sm font-medium mb-4">Free Content</span>
                <h2 class="text-4xl sm:text-5xl font-bold gradient-text mb-4">Free Tutorials</h2>
                <p class="text-lg text-gray-600">Learn from our YouTube channel</p>
            </div>
            <div data-gsap="stagger" class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                <div class="card overflow-hidden group cursor-pointer">
                    <div class="relative h-56 bg-gradient-to-br from-university-500 to-university-700 flex items-center justify-center overflow-hidden">
                        <svg class="w-20 h-20 text-white/20 group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-16 h-16 rounded-full bg-white/90 flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-university-700 ml-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </div>
                        <span class="absolute bottom-4 right-4 px-3 py-1 rounded-lg bg-black/60 text-white text-xs font-medium backdrop-blur-sm">24:15</span>
                        <span class="absolute top-4 left-4 px-3 py-1 rounded-full bg-white/20 backdrop-blur-sm text-white text-xs font-medium">Development</span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2 group-hover:text-university-600 transition-colors">Getting Started with React in 2024</h3>
                        <div class="flex items-center gap-3 text-sm text-gray-500">
                            <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>45K views</span>
                            <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/></svg>2.3K likes</span>
                        </div>
                    </div>
                </div>
                <div class="card overflow-hidden group cursor-pointer">
                    <div class="relative h-56 bg-gradient-to-br from-accent-500 to-accent-700 flex items-center justify-center overflow-hidden">
                        <svg class="w-20 h-20 text-white/20 group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-16 h-16 rounded-full bg-white/90 flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-accent-700 ml-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </div>
                        <span class="absolute bottom-4 right-4 px-3 py-1 rounded-lg bg-black/60 text-white text-xs font-medium backdrop-blur-sm">18:42</span>
                        <span class="absolute top-4 left-4 px-3 py-1 rounded-full bg-white/20 backdrop-blur-sm text-white text-xs font-medium">Data Science</span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2 group-hover:text-university-600 transition-colors">Python for Data Science - Full Course</h3>
                        <div class="flex items-center gap-3 text-sm text-gray-500">
                            <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>32K views</span>
                            <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/></svg>1.8K likes</span>
                        </div>
                    </div>
                </div>
                <div class="card overflow-hidden group cursor-pointer">
                    <div class="relative h-56 bg-gradient-to-br from-pink-500 to-rose-600 flex items-center justify-center overflow-hidden">
                        <svg class="w-20 h-20 text-white/20 group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                        </svg>
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-16 h-16 rounded-full bg-white/90 flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-rose-700 ml-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </div>
                        <span class="absolute bottom-4 right-4 px-3 py-1 rounded-lg bg-black/60 text-white text-xs font-medium backdrop-blur-sm">32:08</span>
                        <span class="absolute top-4 left-4 px-3 py-1 rounded-full bg-white/20 backdrop-blur-sm text-white text-xs font-medium">Design</span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2 group-hover:text-university-600 transition-colors">Figma UI Design Tutorial for Beginners</h3>
                        <div class="flex items-center gap-3 text-sm text-gray-500">
                            <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>28K views</span>
                            <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/></svg>1.5K likes</span>
                        </div>
                    </div>
                </div>
                <div class="card overflow-hidden group cursor-pointer">
                    <div class="relative h-56 bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center overflow-hidden">
                        <svg class="w-20 h-20 text-white/20 group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 18h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-16 h-16 rounded-full bg-white/90 flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-teal-700 ml-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </div>
                        <span class="absolute bottom-4 right-4 px-3 py-1 rounded-lg bg-black/60 text-white text-xs font-medium backdrop-blur-sm">15:30</span>
                        <span class="absolute top-4 left-4 px-3 py-1 rounded-full bg-white/20 backdrop-blur-sm text-white text-xs font-medium">Mobile</span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2 group-hover:text-university-600 transition-colors">Build Your First React Native App</h3>
                        <div class="flex items-center gap-3 text-sm text-gray-500">
                            <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>19K views</span>
                            <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/></svg>1.2K likes</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Section 8: CTA --}}
    <section class="section-padding gradient-bg relative overflow-hidden">
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-[-200px] right-[-200px] w-[500px] h-[500px] bg-white/5 rounded-full blur-3xl floating"></div>
            <div class="absolute bottom-[-150px] left-[-150px] w-[400px] h-[400px] bg-accent-500/20 rounded-full blur-3xl floating-delay-1"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[300px] h-[300px] bg-university-400/10 rounded-full blur-3xl floating-delay-2"></div>
        </div>
        <div class="container-custom relative z-10">
            <div data-gsap="fade-up" class="text-center max-w-3xl mx-auto">
                <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-4">Ready to Start Your Journey?</h2>
                <p class="text-xl text-white/70 mb-10">Join thousands of successful students today</p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="#" class="btn-primary text-base">
                        Enroll Now
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                    <a href="#" class="btn-white text-base">
                        Contact Us
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
