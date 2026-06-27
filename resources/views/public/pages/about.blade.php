@extends('public.layout')

@section('title', 'About Us')

@section('content')
    {{-- Hero --}}
    <section class="relative min-h-[80vh] flex items-center overflow-hidden gradient-bg">
        <div class="hero-glow bg-white top-[-10%] left-[-5%]"></div>
        <div class="hero-glow bg-accent-400 bottom-[-10%] right-[-5%]"></div>
        <div data-parallax class="absolute inset-0 opacity-10">
            <div class="absolute top-20 left-10 w-72 h-72 border border-white/20 rounded-full"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 border border-white/10 rounded-full"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] border border-white/5 rounded-full"></div>
        </div>
        <div class="container-custom relative z-10 pt-32 pb-20">
            <div data-hero-content class="text-center max-w-4xl mx-auto">
                <div data-animate class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-white/90 text-sm font-medium mb-8">
                    <svg class="w-4 h-4 text-accent-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Discover Our Story
                </div>
                <h1 data-animate class="text-5xl md:text-6xl lg:text-7xl font-bold text-white leading-tight mb-6">
                    About <span class="text-transparent bg-clip-text bg-gradient-to-r from-accent-300 to-accent-400">Picha Picasso</span> University
                </h1>
                <p data-animate class="text-xl text-white/70 max-w-2xl mx-auto mb-12 leading-relaxed">
                    Empowering minds, transforming lives through innovative education since 2010.
                </p>
                <div data-animate class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto">
                    <div class="glass-dark rounded-2xl p-6 text-center">
                        <div class="text-3xl md:text-4xl font-bold text-white mb-1"><span data-counter data-target="15">0</span>+</div>
                        <div class="text-white/60 text-sm">Years of Excellence</div>
                    </div>
                    <div class="glass-dark rounded-2xl p-6 text-center">
                        <div class="text-3xl md:text-4xl font-bold text-white mb-1"><span data-counter data-target="10000">0</span>+</div>
                        <div class="text-white/60 text-sm">Students Worldwide</div>
                    </div>
                    <div class="glass-dark rounded-2xl p-6 text-center">
                        <div class="text-3xl md:text-4xl font-bold text-white mb-1"><span data-counter data-target="200">0</span>+</div>
                        <div class="text-white/60 text-sm">Expert Teachers</div>
                    </div>
                    <div class="glass-dark rounded-2xl p-6 text-center">
                        <div class="text-3xl md:text-4xl font-bold text-white mb-1"><span data-counter data-target="500">0</span>+</div>
                        <div class="text-white/60 text-sm">Courses Offered</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Our Story --}}
    <section class="section-padding gradient-bg-subtle">
        <div class="container-custom">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-center">
                <div data-gsap="fade-left">
                    <span class="text-university-600 text-sm font-semibold uppercase tracking-wider">Our Story</span>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-3 mb-6 leading-tight">The Journey of <span class="gradient-text">Picha Picasso</span></h2>
                    <p class="text-gray-600 leading-relaxed mb-6">
                        Founded in 2010 by a group of visionary educators, Picha Picasso University began as a small institution with a big dream: to make quality education accessible to everyone. What started with just 50 students in a single building has grown into a globally recognized university spanning multiple campuses worldwide.
                    </p>
                    <p class="text-gray-600 leading-relaxed mb-8">
                        Our name, "Picha Picasso," reflects our belief that education is both an art and a science. We combine the creativity of artistic expression with the rigor of academic excellence, creating a unique learning environment where students don't just learn — they create, innovate, and inspire.
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="flex -space-x-2">
                            <div class="w-10 h-10 rounded-full bg-university-500 border-2 border-white flex items-center justify-center text-white text-xs font-bold">JD</div>
                            <div class="w-10 h-10 rounded-full bg-accent-500 border-2 border-white flex items-center justify-center text-white text-xs font-bold">MK</div>
                            <div class="w-10 h-10 rounded-full bg-university-700 border-2 border-white flex items-center justify-center text-white text-xs font-bold">AL</div>
                        </div>
                        <div>
                            <div class="font-semibold text-gray-900 text-sm">Founded by Visionaries</div>
                            <div class="text-gray-500 text-sm">A team of dedicated educators</div>
                        </div>
                    </div>
                </div>
                <div data-gsap="fade-right" class="relative">
                    <div class="aspect-[4/3] rounded-3xl gradient-bg flex items-center justify-center overflow-hidden relative">
                        <div class="hero-glow bg-white/20 top-[-20%] right-[-20%]"></div>
                        <div class="hero-glow bg-accent-400/20 bottom-[-20%] left-[-20%]"></div>
                        <svg class="w-24 h-24 text-white/40 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                        <div class="absolute bottom-0 left-0 right-0 p-8 bg-gradient-to-t from-black/40 to-transparent">
                            <div class="text-white font-semibold text-lg">Main Campus</div>
                            <div class="text-white/70 text-sm">Est. 2010</div>
                        </div>
                    </div>
                    <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-university-100 rounded-full flex items-center justify-center card shadow-xl">
                        <div class="text-center">
                            <div class="text-2xl font-bold gradient-text">15+</div>
                            <div class="text-xs text-gray-500">Years</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Mission & Vision --}}
    <section class="section-padding bg-white">
        <div class="container-custom">
            <div class="text-center max-w-3xl mx-auto mb-16" data-gsap="fade-up">
                <span class="text-university-600 text-sm font-semibold uppercase tracking-wider">Our Purpose</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-3 mb-6">Mission &amp; Vision</h2>
                <p class="text-gray-600 text-lg">Guided by our core purpose, we strive to make a lasting impact on education worldwide.</p>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div data-gsap="fade-left" class="card p-10 lg:p-12 group">
                    <div class="w-16 h-16 rounded-2xl bg-university-100 flex items-center justify-center mb-8 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-university-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Our Mission</h3>
                    <p class="text-gray-600 leading-relaxed text-lg">To provide accessible, quality education that empowers individuals to achieve their full potential and make meaningful contributions to society.</p>
                    <div class="mt-8 pt-8 border-t border-gray-100">
                        <div class="flex items-center gap-2 text-university-600 text-sm font-semibold">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Empowering learners worldwide
                        </div>
                    </div>
                </div>
                <div data-gsap="fade-right" class="card-gradient p-10 lg:p-12 group">
                    <div class="w-16 h-16 rounded-2xl bg-white/20 flex items-center justify-center mb-8 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">Our Vision</h3>
                    <p class="text-white/80 leading-relaxed text-lg">To be a global leader in innovative education, shaping the future of learning through technology, creativity, and a commitment to excellence.</p>
                    <div class="mt-8 pt-8 border-t border-white/20">
                        <div class="flex items-center gap-2 text-white/90 text-sm font-semibold">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                            Shaping tomorrow's leaders
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Core Values --}}
    <section class="section-padding gradient-bg-subtle">
        <div class="container-custom">
            <div class="text-center max-w-3xl mx-auto mb-16" data-gsap="fade-up">
                <span class="text-university-600 text-sm font-semibold uppercase tracking-wider">What We Stand For</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-3 mb-6">Our Core Values</h2>
                <p class="text-gray-600 text-lg">The principles that guide everything we do at Picha Picasso University.</p>
            </div>
            <div data-gsap="stagger" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="card p-8 text-center group">
                    <div class="w-16 h-16 rounded-2xl bg-university-100 flex items-center justify-center mx-auto mb-6 group-hover:scale-110 group-hover:bg-university-200 transition-all duration-300">
                        <svg class="w-8 h-8 text-university-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Excellence</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">We pursue the highest standards in education, research, and service to our community.</p>
                </div>
                <div class="card p-8 text-center group">
                    <div class="w-16 h-16 rounded-2xl bg-accent-100 flex items-center justify-center mx-auto mb-6 group-hover:scale-110 group-hover:bg-accent-200 transition-all duration-300">
                        <svg class="w-8 h-8 text-accent-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.53 16.122a3 3 0 00-5.78 1.128 2.25 2.25 0 01-2.4 2.245 4.5 4.5 0 008.4-2.245c0-.399-.078-.78-.22-1.128zm0 0a15.998 15.998 0 003.388-1.62m-5.043-.025a15.994 15.994 0 011.622-3.395m3.42 3.42a15.995 15.995 0 004.764-4.648l3.876-5.814a1.151 1.151 0 00-1.597-1.597L14.146 6.32a15.996 15.996 0 00-4.649 4.763m3.42 3.42a6.776 6.776 0 00-3.42-3.42"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Innovation</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">We embrace creative thinking and cutting-edge technology to transform the learning experience.</p>
                </div>
                <div class="card p-8 text-center group">
                    <div class="w-16 h-16 rounded-2xl bg-green-100 flex items-center justify-center mx-auto mb-6 group-hover:scale-110 group-hover:bg-green-200 transition-all duration-300">
                        <svg class="w-8 h-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Integrity</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">We uphold the highest ethical standards in everything we do, fostering trust and accountability.</p>
                </div>
                <div class="card p-8 text-center group">
                    <div class="w-16 h-16 rounded-2xl bg-purple-100 flex items-center justify-center mx-auto mb-6 group-hover:scale-110 group-hover:bg-purple-200 transition-all duration-300">
                        <svg class="w-8 h-8 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Community</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">We build inclusive communities where diverse perspectives are valued and collaboration thrives.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- University Timeline --}}
    <section class="section-padding bg-white">
        <div class="container-custom">
            <div class="text-center max-w-3xl mx-auto mb-16" data-gsap="fade-up">
                <span class="text-university-600 text-sm font-semibold uppercase tracking-wider">Our Journey</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-3 mb-6">University Timeline</h2>
                <p class="text-gray-600 text-lg">Key milestones that have shaped Picha Picasso University into what it is today.</p>
            </div>
            <div class="relative max-w-4xl mx-auto">
                <div class="absolute left-8 md:left-1/2 top-0 bottom-0 w-px bg-gradient-to-b from-university-500 via-accent-500 to-university-500 md:-translate-x-px"></div>
                <div class="space-y-12">
                    <div data-gsap="fade-left" class="relative md:text-right md:pr-[calc(50%+3rem)] pl-20 md:pl-0">
                        <div class="absolute left-6 md:left-auto md:right-[calc(50%-1.5rem)] top-0 w-5 h-5 rounded-full bg-university-500 border-4 border-white shadow-lg"></div>
                        <div class="card p-8">
                            <span class="text-university-600 font-bold text-lg">2010</span>
                            <h3 class="text-xl font-bold text-gray-900 mt-2 mb-3">Founded</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">Picha Picasso University was established with a vision to revolutionize higher education, starting with just 50 students and a handful of dedicated faculty members.</p>
                        </div>
                    </div>
                    <div data-gsap="fade-right" class="relative md:text-left md:pl-[calc(50%+3rem)] pl-20 md:pr-0">
                        <div class="absolute left-6 md:left-[calc(50%-1.5rem)] top-0 w-5 h-5 rounded-full bg-accent-500 border-4 border-white shadow-lg"></div>
                        <div class="card p-8">
                            <span class="text-accent-600 font-bold text-lg">2013</span>
                            <h3 class="text-xl font-bold text-gray-900 mt-2 mb-3">First 100 Students</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">Reached our first major milestone of 100 enrolled students, validating our innovative approach to education and expanding our program offerings.</p>
                        </div>
                    </div>
                    <div data-gsap="fade-left" class="relative md:text-right md:pr-[calc(50%+3rem)] pl-20 md:pl-0">
                        <div class="absolute left-6 md:left-auto md:right-[calc(50%-1.5rem)] top-0 w-5 h-5 rounded-full bg-university-500 border-4 border-white shadow-lg"></div>
                        <div class="card p-8">
                            <span class="text-university-600 font-bold text-lg">2017</span>
                            <h3 class="text-xl font-bold text-gray-900 mt-2 mb-3">International Expansion</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">Opened our first international campus and established global partnerships, welcoming students from over 30 countries.</p>
                        </div>
                    </div>
                    <div data-gsap="fade-right" class="relative md:text-left md:pl-[calc(50%+3rem)] pl-20 md:pr-0">
                        <div class="absolute left-6 md:left-[calc(50%-1.5rem)] top-0 w-5 h-5 rounded-full bg-accent-500 border-4 border-white shadow-lg"></div>
                        <div class="card p-8">
                            <span class="text-accent-600 font-bold text-lg">2020</span>
                            <h3 class="text-xl font-bold text-gray-900 mt-2 mb-3">Online Learning Platform</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">Launched our state-of-the-art online learning platform, making quality education accessible to students anywhere in the world.</p>
                        </div>
                    </div>
                    <div data-gsap="fade-left" class="relative md:text-right md:pr-[calc(50%+3rem)] pl-20 md:pl-0">
                        <div class="absolute left-6 md:left-auto md:right-[calc(50%-1.5rem)] top-0 w-5 h-5 rounded-full bg-university-500 border-4 border-white shadow-lg"></div>
                        <div class="card-gradient p-8">
                            <span class="text-white/80 font-bold text-lg">2025</span>
                            <h3 class="text-xl font-bold text-white mt-2 mb-3">10,000+ Students Worldwide</h3>
                            <p class="text-white/70 text-sm leading-relaxed">A testament to our growth and impact, with over 10,000 students across 50+ countries, 200+ faculty members, and 500+ courses.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Leadership Team --}}
    <section class="section-padding gradient-bg-subtle">
        <div class="container-custom">
            <div class="text-center max-w-3xl mx-auto mb-16" data-gsap="fade-up">
                <span class="text-university-600 text-sm font-semibold uppercase tracking-wider">Leadership</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-3 mb-6">Meet Our Leadership Team</h2>
                <p class="text-gray-600 text-lg">Dedicated leaders guiding Picha Picasso University towards academic excellence and innovation.</p>
            </div>
            <div data-gsap="stagger" class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <div class="card overflow-hidden group">
                    <div class="aspect-[4/5] gradient-bg flex items-center justify-center relative overflow-hidden">
                        <div class="hero-glow bg-white/20 top-[-30%] right-[-30%]"></div>
                        <svg class="w-20 h-20 text-white/30 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div class="p-8">
                        <h3 class="text-xl font-bold text-gray-900">Dr. Jane Mitchell</h3>
                        <p class="text-university-600 text-sm font-semibold mt-1">Dean of Academic Affairs</p>
                        <p class="text-gray-500 text-sm mt-4 leading-relaxed">Leading academic excellence with over 20 years of experience in higher education and research.</p>
                        <div class="flex gap-3 mt-6 pt-6 border-t border-gray-100">
                            <a href="#" class="text-gray-400 hover:text-university-600 transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-university-600 transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/></svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-university-600 transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card overflow-hidden group">
                    <div class="aspect-[4/5] gradient-bg flex items-center justify-center relative overflow-hidden">
                        <div class="hero-glow bg-white/20 top-[-30%] right-[-30%]"></div>
                        <svg class="w-20 h-20 text-white/30 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div class="p-8">
                        <h3 class="text-xl font-bold text-gray-900">Prof. Michael Kingsley</h3>
                        <p class="text-university-600 text-sm font-semibold mt-1">Vice Chancellor</p>
                        <p class="text-gray-500 text-sm mt-4 leading-relaxed">Visionary leader driving institutional growth, strategic partnerships, and global outreach initiatives.</p>
                        <div class="flex gap-3 mt-6 pt-6 border-t border-gray-100">
                            <a href="#" class="text-gray-400 hover:text-university-600 transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-university-600 transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/></svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-university-600 transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card overflow-hidden group">
                    <div class="aspect-[4/5] gradient-bg flex items-center justify-center relative overflow-hidden">
                        <div class="hero-glow bg-white/20 top-[-30%] right-[-30%]"></div>
                        <svg class="w-20 h-20 text-white/30 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div class="p-8">
                        <h3 class="text-xl font-bold text-gray-900">Dr. Amanda Lee</h3>
                        <p class="text-university-600 text-sm font-semibold mt-1">Director of Innovation</p>
                        <p class="text-gray-500 text-sm mt-4 leading-relaxed">Pioneering digital transformation and innovative teaching methodologies across the university.</p>
                        <div class="flex gap-3 mt-6 pt-6 border-t border-gray-100">
                            <a href="#" class="text-gray-400 hover:text-university-600 transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-university-600 transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/></svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-university-600 transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Why Choose Us --}}
    <section class="section-padding bg-white">
        <div class="container-custom">
            <div class="text-center max-w-3xl mx-auto mb-16" data-gsap="fade-up">
                <span class="text-university-600 text-sm font-semibold uppercase tracking-wider">Why Choose Us</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-3 mb-6">What Sets Us Apart</h2>
                <p class="text-gray-600 text-lg">Discover why thousands of students choose Picha Picasso University for their education.</p>
            </div>
            <div data-gsap="stagger" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="card p-8 group relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-university-100 rounded-full -translate-y-1/2 translate-x-1/2 opacity-50"></div>
                    <div class="w-14 h-14 rounded-xl bg-university-100 flex items-center justify-center mb-6 relative group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-university-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0-.029 4e13C5.84 16.19 9.178 19.5 12 19.5c2.738 0 5.968-3.146 7.604-6.643 1.2-2.574 1.025-4.99.582-6.598 0 0 0 0 0 0l-3.175 3.175a3 3 0 0 1-4.242 0l-3.175-3.175c0 0 0 0 0 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 19.5V9m0 0L8.25 4.5M12 9l3.75-4.5"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 relative">Accredited Programs</h3>
                    <p class="text-gray-500 text-sm leading-relaxed relative">All our programs are internationally accredited, ensuring your degree is recognized worldwide.</p>
                </div>
                <div class="card p-8 group relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-accent-100 rounded-full -translate-y-1/2 translate-x-1/2 opacity-50"></div>
                    <div class="w-14 h-14 rounded-xl bg-accent-100 flex items-center justify-center mb-6 relative group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-accent-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 relative">Flexible Learning</h3>
                    <p class="text-gray-500 text-sm leading-relaxed relative">Choose from online, on-campus, or hybrid learning modes that fit your schedule and lifestyle.</p>
                </div>
                <div class="card p-8 group relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-green-100 rounded-full -translate-y-1/2 translate-x-1/2 opacity-50"></div>
                    <div class="w-14 h-14 rounded-xl bg-green-100 flex items-center justify-center mb-6 relative group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 relative">Expert Faculty</h3>
                    <p class="text-gray-500 text-sm leading-relaxed relative">Learn from industry experts and renowned academics who bring real-world experience to the classroom.</p>
                </div>
                <div class="card p-8 group relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-purple-100 rounded-full -translate-y-1/2 translate-x-1/2 opacity-50"></div>
                    <div class="w-14 h-14 rounded-xl bg-purple-100 flex items-center justify-center mb-6 relative group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.715-6.06M12 21a9.004 9.004 0 01-8.715-6.06M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 relative">Global Community</h3>
                    <p class="text-gray-500 text-sm leading-relaxed relative">Join a diverse community of learners from over 50 countries, building a global network.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Stats Section --}}
    <section class="relative py-24 overflow-hidden gradient-bg">
        <div class="hero-glow bg-white top-[-20%] left-[-10%]"></div>
        <div class="hero-glow bg-accent-400 bottom-[-20%] right-[-10%]"></div>
        <div class="container-custom relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16" data-gsap="fade-up">
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">Picha Picasso by the Numbers</h2>
                <p class="text-xl text-white/70">Our impact in numbers that reflect our commitment to education.</p>
            </div>
            <div data-gsap="stagger" class="grid grid-cols-2 md:grid-cols-4 gap-8 max-w-5xl mx-auto">
                <div class="text-center">
                    <div class="text-5xl md:text-6xl font-bold text-white mb-2"><span data-counter data-target="15">0</span>+</div>
                    <div class="text-white/70 text-sm uppercase tracking-wider font-medium">Years</div>
                </div>
                <div class="text-center">
                    <div class="text-5xl md:text-6xl font-bold text-white mb-2"><span data-counter data-target="10000">0</span>+</div>
                    <div class="text-white/70 text-sm uppercase tracking-wider font-medium">Students</div>
                </div>
                <div class="text-center">
                    <div class="text-5xl md:text-6xl font-bold text-white mb-2"><span data-counter data-target="200">0</span>+</div>
                    <div class="text-white/70 text-sm uppercase tracking-wider font-medium">Teachers</div>
                </div>
                <div class="text-center">
                    <div class="text-5xl md:text-6xl font-bold text-white mb-2"><span data-counter data-target="50">0</span>+</div>
                    <div class="text-white/70 text-sm uppercase tracking-wider font-medium">Countries</div>
                </div>
            </div>
        </div>
    </section>
@endsection
