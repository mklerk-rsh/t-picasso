@extends('public.layout')

@section('title', 'Tutorials | Picha Picasso University')

@section('content')
    @php
        $categories = ['All', 'Programming', 'Design', 'Business', 'Photography', 'Engineering'];

        $featured = [
            'title' => 'Getting Started with Your Career',
            'teacher' => 'Prof. Sarah Mitchell',
            'duration' => '18:24',
            'views' => '245K',
            'category' => 'Career',
            'description' => 'In this comprehensive guide, learn the essential strategies to launch and grow your creative career. From building your portfolio to networking effectively, this video covers everything you need to know to stand out in today\'s competitive landscape.'
        ];

        $videos = [
            ['title' => 'Mastering Color Theory in Design', 'teacher' => 'James Okonkwo', 'duration' => '12:45', 'views' => '89K', 'category' => 'Design', 'date' => 'Mar 15, 2026'],
            ['title' => 'Python for Absolute Beginners', 'teacher' => 'Dr. Amina Hassan', 'duration' => '45:20', 'views' => '342K', 'category' => 'Programming', 'date' => 'Mar 12, 2026'],
            ['title' => 'Business Model Canvas Explained', 'teacher' => 'Michael Chen', 'duration' => '22:10', 'views' => '67K', 'category' => 'Business', 'date' => 'Mar 10, 2026'],
            ['title' => 'Portrait Photography Tips & Tricks', 'teacher' => 'Emily Wanjiku', 'duration' => '15:30', 'views' => '156K', 'category' => 'Photography', 'date' => 'Mar 8, 2026'],
            ['title' => 'UI/UX Design Principles for 2026', 'teacher' => 'Sarah Mitchell', 'duration' => '28:15', 'views' => '198K', 'category' => 'Design', 'date' => 'Mar 5, 2026'],
            ['title' => 'Structural Engineering Fundamentals', 'teacher' => 'Prof. David Kim', 'duration' => '35:40', 'views' => '45K', 'category' => 'Engineering', 'date' => 'Mar 3, 2026'],
        ];
    @endphp

    <div class="min-h-screen pt-20">
        <section class="gradient-bg relative overflow-hidden py-20 lg:py-28">
            <div class="absolute inset-0">
                <div class="absolute top-10 left-10 w-72 h-72 bg-white/5 rounded-full blur-3xl"></div>
                <div class="absolute bottom-10 right-10 w-96 h-96 bg-white/5 rounded-full blur-3xl"></div>
            </div>
            <div class="container-custom relative">
                <div class="max-w-2xl" data-gsap="fade-up">
                    <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 text-white/80 text-sm font-medium mb-6 border border-white/10">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        Free Learning
                    </span>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight">Free <span class="text-white/80">Tutorials</span></h1>
                    <p class="text-lg text-white/70 mt-4 max-w-lg leading-relaxed">Learn from our expert-led video tutorials and advance your skills at your own pace.</p>
                </div>
            </div>
        </section>

        <div class="container-custom -mt-10 relative z-10">
            <div class="card p-6 lg:p-8 mb-12" data-gsap="fade-up">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                    <div class="relative aspect-video rounded-2xl overflow-hidden gradient-bg group cursor-pointer">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-20 h-20 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center group-hover:scale-110 transition-transform duration-300 border border-white/30">
                                <svg class="w-8 h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            </div>
                        </div>
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-white/20 text-white backdrop-blur-sm border border-white/20">{{ $featured['category'] }}</span>
                        </div>
                        <div class="absolute bottom-4 left-4 right-4 flex items-center justify-between text-white/80 text-xs">
                            <span class="flex items-center gap-1.5 bg-black/30 backdrop-blur-sm px-3 py-1.5 rounded-lg">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                {{ $featured['duration'] }}
                            </span>
                            <span class="flex items-center gap-1.5 bg-black/30 backdrop-blur-sm px-3 py-1.5 rounded-lg">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                {{ $featured['views'] }} views
                            </span>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-3">{{ $featured['title'] }}</h2>
                        <p class="text-gray-500 text-sm leading-relaxed mb-4">{{ $featured['description'] }}</p>
                        <div class="flex items-center gap-3 mb-5">
                            <div class="w-10 h-10 rounded-full gradient-bg flex items-center justify-center text-white text-sm font-semibold">SM</div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">{{ $featured['teacher'] }}</p>
                                <p class="text-xs text-gray-500">Lead Instructor</p>
                            </div>
                        </div>
                        <a href="#" class="btn-primary inline-flex items-center gap-2 !px-6 !py-3 text-sm">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                            Watch on YouTube
                        </a>
                    </div>
                </div>
            </div>

            <div x-data="{ category: 'all' }" class="mb-12">
                <div class="flex flex-wrap items-center gap-2 mb-8" data-gsap="fade-up">
                    @foreach ($categories as $cat)
                    <button @click="category = '{{ strtolower($cat) }}'"
                            class="px-5 py-2.5 rounded-xl text-sm font-medium transition-all duration-300 border"
                            :class="category === '{{ strtolower($cat) }}'
                                ? 'bg-university-600 text-white border-university-600 shadow-lg shadow-university-500/20'
                                : 'bg-white text-gray-600 border-gray-200 hover:border-university-300 hover:text-university-600'">
                        {{ $cat }}
                    </button>
                    @endforeach
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" data-gsap="stagger">
                    @foreach ($videos as $video)
                    <div x-show="category === 'all' || category === '{{ strtolower($video['category']) }}'"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         class="card group overflow-hidden hover:-translate-y-1 transition-all duration-300">
                        <div class="relative aspect-video bg-gradient-to-br from-university-400 to-university-700 overflow-hidden">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-14 h-14 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center group-hover:scale-110 transition-transform duration-300 border border-white/30 group-hover:bg-white/30">
                                    <svg class="w-6 h-6 text-white ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                </div>
                            </div>
                            <div class="absolute top-3 left-3">
                                <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-white/20 text-white backdrop-blur-sm border border-white/20">{{ $video['category'] }}</span>
                            </div>
                            <div class="absolute bottom-3 left-3 px-2.5 py-1 rounded-lg text-xs font-medium bg-black/40 backdrop-blur-sm text-white flex items-center gap-1.5">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                {{ $video['duration'] }}
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-sm font-semibold text-gray-900 group-hover:text-university-600 transition-colors line-clamp-2 leading-snug">{{ $video['title'] }}</h3>
                            <div class="flex items-center gap-2 mt-3">
                                <div class="w-7 h-7 rounded-full gradient-bg-subtle flex items-center justify-center text-white text-[10px] font-bold">
                                    {{ implode('', array_map(fn($w) => $w[0], explode(' ', $video['teacher']))) }}
                                </div>
                                <span class="text-xs text-gray-500">{{ $video['teacher'] }}</span>
                            </div>
                            <div class="flex items-center justify-between mt-3 pt-3 border-t border-gray-100">
                                <span class="text-xs text-gray-400 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    {{ $video['views'] }} views
                                </span>
                                <span class="text-xs text-gray-400">{{ $video['date'] }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <section class="section-padding">
            <div class="container-custom">
                <div class="card-gradient rounded-3xl p-10 lg:p-16 text-center" data-gsap="fade-up">
                    <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">Want More?</h2>
                    <p class="text-white/70 max-w-xl mx-auto mb-8">Subscribe to our YouTube channel for new tutorials every week. Join over 1 million learners worldwide.</p>
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                        <a href="#" class="btn-white inline-flex items-center gap-2 !px-8 !py-3.5 text-sm font-semibold">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                            Subscribe on YouTube
                        </a>
                        <a href="#" class="inline-flex items-center gap-2 px-8 py-3.5 text-sm font-semibold text-white border-2 border-white/20 rounded-xl hover:bg-white/10 transition-all duration-200">
                            Browse All Videos
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
