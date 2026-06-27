<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name')) - Picha Picasso University</title>
    <meta name="description" content="@yield('meta_description', 'Picha Picasso University - Excellence in Higher Education')">
    <style>[x-cloak] { display: none !important; }</style>
    @stack('head')
    @stack('styles')
    @vite('resources/css/public.css')
</head>
<body>
    <div x-data="{ mobileOpen: false }">
        <header data-header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300" x-bind:class="mobileOpen ? 'scrolled' : ''">
            <div class="container-custom">
                <div class="flex items-center justify-between h-20">
                    <a href="/" class="flex items-center gap-3 group">
                        <div class="w-10 h-10 rounded-xl bg-white/10 backdrop-blur-sm flex items-center justify-center border border-white/20 group-hover:bg-white/20 transition-all">
                            <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                            </svg>
                        </div>
                        <span class="text-white font-semibold text-lg">Picha Picasso</span>
                    </a>

                    <nav class="hidden lg:flex items-center gap-8">
                        <a href="/" class="text-white/80 hover:text-white transition-colors text-sm font-medium">Home</a>
                        <a href="/about" class="text-white/80 hover:text-white transition-colors text-sm font-medium">About</a>
                        <a href="/courses" class="text-white/80 hover:text-white transition-colors text-sm font-medium">Courses</a>
                        <a href="/teachers" class="text-white/80 hover:text-white transition-colors text-sm font-medium">Teachers</a>
                        <a href="/tutorials" class="text-white/80 hover:text-white transition-colors text-sm font-medium">Tutorials</a>
                        <a href="/reviews" class="text-white/80 hover:text-white transition-colors text-sm font-medium">Reviews</a>
                        <a href="/contact" class="text-white/80 hover:text-white transition-colors text-sm font-medium">Contact</a>
                    </nav>

                    <div class="hidden lg:flex items-center gap-4">
                        <a href="/admin/login" class="text-white/70 hover:text-white transition-colors text-sm font-medium">Login</a>
                        <a href="/enroll" class="btn-primary text-sm !px-6 !py-3">Enroll Now</a>
                    </div>

                    <button data-menu-toggle @click="mobileOpen = !mobileOpen" class="lg:hidden relative w-10 h-10 flex items-center justify-center text-white">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <template x-if="!mobileOpen">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            </template>
                            <template x-if="mobileOpen">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </template>
                        </svg>
                    </button>
                </div>
            </div>

            <div data-mobile-menu x-show="mobileOpen" x-cloak x-transition:enter="transition-all duration-300 ease-out" x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition-all duration-200 ease-in" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-4" class="lg:hidden border-t border-white/10 bg-university-900/95 backdrop-blur-xl">
                <div class="container-custom py-6 space-y-1">
                    <a href="/" class="block px-4 py-3 text-white/80 hover:text-white hover:bg-white/5 rounded-lg transition-all text-sm font-medium">Home</a>
                    <a href="/about" class="block px-4 py-3 text-white/80 hover:text-white hover:bg-white/5 rounded-lg transition-all text-sm font-medium">About</a>
                    <a href="/courses" class="block px-4 py-3 text-white/80 hover:text-white hover:bg-white/5 rounded-lg transition-all text-sm font-medium">Courses</a>
                    <a href="/teachers" class="block px-4 py-3 text-white/80 hover:text-white hover:bg-white/5 rounded-lg transition-all text-sm font-medium">Teachers</a>
                    <a href="/tutorials" class="block px-4 py-3 text-white/80 hover:text-white hover:bg-white/5 rounded-lg transition-all text-sm font-medium">Tutorials</a>
                    <a href="/reviews" class="block px-4 py-3 text-white/80 hover:text-white hover:bg-white/5 rounded-lg transition-all text-sm font-medium">Reviews</a>
                    <a href="/contact" class="block px-4 py-3 text-white/80 hover:text-white hover:bg-white/5 rounded-lg transition-all text-sm font-medium">Contact</a>
                    <div class="pt-4 px-4 space-y-2">
                        <a href="/enroll" class="btn-primary text-sm w-full text-center">Enroll Now</a>
                        <a href="/admin/login" class="block px-4 py-3 text-white/80 hover:text-white hover:bg-white/5 rounded-lg transition-all text-sm font-medium text-center">Login</a>
                    </div>
                </div>
            </div>
        </header>

        @yield('content')

        <footer class="bg-university-900 text-white">
            <div class="container-custom py-16 lg:py-24">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-8">
                    <div>
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-accent-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                                </svg>
                            </div>
                            <span class="font-semibold text-lg">Picha Picasso</span>
                        </div>
                        <p class="text-white/60 text-sm leading-relaxed mb-6">Shaping the future of learning through innovation, excellence, and a commitment to accessible education worldwide.</p>
                        <div class="flex gap-3">
                            <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-all">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                            </a>
                            <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-all">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/></svg>
                            </a>
                            <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-all">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.477 2 2 6.477 2 12c0 4.42 2.865 8.17 6.839 9.5.5.092.682-.217.682-.482 0-.237-.008-.866-.013-1.7-2.782.604-3.369-1.34-3.369-1.34-.454-1.156-1.11-1.463-1.11-1.463-.908-.62.069-.608.069-.608 1.003.07 1.531 1.03 1.531 1.03.892 1.529 2.341 1.087 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.27.098-2.647 0 0 .84-.269 2.75 1.025A9.578 9.578 0 0112 6.836c.85.004 1.705.115 2.504.337 1.909-1.294 2.747-1.025 2.747-1.025.546 1.377.203 2.394.1 2.647.64.699 1.028 1.592 1.028 2.683 0 3.842-2.339 4.687-4.566 4.935.359.309.678.919.678 1.852 0 1.336-.012 2.415-.012 2.743 0 .267.18.578.688.48C19.138 20.167 22 16.418 22 12c0-5.523-4.477-10-10-10z"/></svg>
                            </a>
                            <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-all">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                            </a>
                        </div>
                    </div>

                    <div>
                        <h3 class="font-semibold text-sm uppercase tracking-wider text-white/40 mb-6">Quick Links</h3>
                        <ul class="space-y-3">
                            <li><a href="/" class="text-white/60 hover:text-white transition-colors text-sm">Home</a></li>
                            <li><a href="/about" class="text-white/60 hover:text-white transition-colors text-sm">About Us</a></li>
                            <li><a href="/courses" class="text-white/60 hover:text-white transition-colors text-sm">Our Courses</a></li>
                            <li><a href="/teachers" class="text-white/60 hover:text-white transition-colors text-sm">Our Teachers</a></li>
                            <li><a href="/tutorials" class="text-white/60 hover:text-white transition-colors text-sm">Tutorials</a></li>
                            <li><a href="/reviews" class="text-white/60 hover:text-white transition-colors text-sm">Reviews</a></li>
                            <li><a href="/contact" class="text-white/60 hover:text-white transition-colors text-sm">Contact</a></li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="font-semibold text-sm uppercase tracking-wider text-white/40 mb-6">Resources</h3>
                        <ul class="space-y-3">
                            <li><a href="#" class="text-white/60 hover:text-white transition-colors text-sm">Student Portal</a></li>
                            <li><a href="#" class="text-white/60 hover:text-white transition-colors text-sm">Library</a></li>
                            <li><a href="#" class="text-white/60 hover:text-white transition-colors text-sm">Academic Calendar</a></li>
                            <li><a href="#" class="text-white/60 hover:text-white transition-colors text-sm">Scholarships</a></li>
                            <li><a href="#" class="text-white/60 hover:text-white transition-colors text-sm">FAQ</a></li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="font-semibold text-sm uppercase tracking-wider text-white/40 mb-6">Contact</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-accent-400 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span class="text-white/60 text-sm">123 University Ave, City, State</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-accent-400 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <span class="text-white/60 text-sm">info@pichapicasso.edu</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-accent-400 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                <span class="text-white/60 text-sm">+1 (555) 123-4567</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="border-t border-white/10">
                <div class="container-custom py-6 flex flex-col md:flex-row items-center justify-between gap-4">
                    <p class="text-white/40 text-sm">&copy; {{ date('Y') }} Picha Picasso University. All rights reserved.</p>
                    <div class="flex gap-6">
                        <a href="#" class="text-white/40 hover:text-white/60 transition-colors text-sm">Privacy Policy</a>
                        <a href="#" class="text-white/40 hover:text-white/60 transition-colors text-sm">Terms of Service</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    @stack('scripts')
    @vite('resources/js/public.js')
</body>
</html>
