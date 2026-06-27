@extends('public.layout')

@section('title', 'Our Offices')

@section('content')
    {{-- Hero --}}
    <section class="relative min-h-[60vh] flex items-center overflow-hidden gradient-bg">
        <div class="hero-glow bg-white top-[-10%] left-[-5%]"></div>
        <div class="hero-glow bg-accent-400 bottom-[-10%] right-[-5%]"></div>
        <div data-parallax class="absolute inset-0 opacity-10">
            <div class="absolute top-20 left-10 w-72 h-72 border border-white/20 rounded-full"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 border border-white/10 rounded-full"></div>
            <div class="absolute top-1/3 right-1/4 w-48 h-48 border border-white/5 rounded-full"></div>
        </div>
        <div class="container-custom relative z-10 pt-32 pb-20">
            <div data-hero-content class="text-center max-w-3xl mx-auto">
                <div data-animate class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-white/90 text-sm font-medium mb-8">
                    <svg class="w-4 h-4 text-accent-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21"/>
                    </svg>
                    Our Locations
                </div>
                <h1 data-animate class="text-5xl md:text-6xl lg:text-7xl font-bold text-white leading-tight mb-6">
                    Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-accent-300 to-accent-400">Offices</span>
                </h1>
                <p data-animate class="text-xl text-white/70 max-w-2xl mx-auto leading-relaxed">
                    Visit us at any of our campuses and offices worldwide. We're here to help you.
                </p>
            </div>
        </div>
    </section>

    {{-- Headquarters --}}
    <section class="section-padding bg-white -mt-20 relative z-20">
        <div class="container-custom">
            <div class="text-center max-w-3xl mx-auto mb-12" data-gsap="fade-up">
                <span class="text-university-600 text-sm font-semibold uppercase tracking-wider">Main Campus</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-3 mb-6">World Headquarters</h2>
            </div>
            <div data-gsap="fade-up" class="card-gradient overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2">
                    <div class="p-10 lg:p-14 flex flex-col justify-center">
                        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/20 text-white text-xs font-semibold uppercase tracking-wider mb-6 w-fit">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 14.25h13.5m-13.5 0a3 3 0 01-3-3m3 3a3 3 0 100 6h13.5a3 3 0 100-6m-16.5-3a3 3 0 013-3h13.5a3 3 0 013 3m-19.5 0a4.5 4.5 0 01.9-2.75L4.5 6.5m17.25 4.75a4.5 4.5 0 00-.9-2.75L19.5 6.5M9 6.5V3.75a.75.75 0 01.75-.75h4.5a.75.75 0 01.75.75V6.5"/>
                            </svg>
                            Headquarters
                        </div>
                        <h3 class="text-3xl lg:text-4xl font-bold text-white mb-4">Main Campus</h3>
                        <p class="text-white/80 text-lg mb-8 leading-relaxed">The heart of Picha Picasso University, our main campus features state-of-the-art facilities, research centers, and a vibrant student community.</p>
                        <div class="space-y-4 mb-8">
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-white font-medium">Address</p>
                                    <p class="text-white/70 text-sm">123 University Avenue, City, State 10001</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-white font-medium">Phone</p>
                                    <p class="text-white/70 text-sm">+1 (555) 123-4567</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-white font-medium">Email</p>
                                    <p class="text-white/70 text-sm">info@pichapicasso.edu</p>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="inline-flex items-center gap-2 text-white font-semibold bg-white/20 hover:bg-white/30 backdrop-blur-sm px-6 py-3 rounded-xl transition-all w-fit">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z"/>
                            </svg>
                            Get Directions
                        </a>
                    </div>
                    <div class="aspect-[4/3] lg:aspect-auto bg-university-800 flex items-center justify-center relative overflow-hidden">
                        <div class="hero-glow bg-white/10 top-[-20%] left-[-20%]"></div>
                        <div class="hero-glow bg-accent-400/10 bottom-[-20%] right-[-20%]"></div>
                        <div class="text-center relative z-10">
                            <svg class="w-24 h-24 text-white/20 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21"/>
                            </svg>
                            <div class="text-white/40 text-lg font-medium">Main Campus</div>
                            <div class="text-white/20 text-sm">Est. 2010</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Branch Offices --}}
    <section class="section-padding gradient-bg-subtle">
        <div class="container-custom">
            <div class="text-center max-w-3xl mx-auto mb-16" data-gsap="fade-up">
                <span class="text-university-600 text-sm font-semibold uppercase tracking-wider">Global Presence</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-3 mb-6">Branch Offices</h2>
                <p class="text-gray-600 text-lg">Our campuses and offices across the globe, bringing quality education closer to you.</p>
            </div>
            <div data-gsap="stagger" class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="card overflow-hidden group">
                    <div class="aspect-[16/10] bg-gradient-to-br from-university-500 to-university-700 flex items-center justify-center relative overflow-hidden">
                        <div class="hero-glow bg-white/20 top-[-30%] right-[-30%]"></div>
                        <div class="text-center relative z-10">
                            <svg class="w-16 h-16 text-white/30 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21"/>
                            </svg>
                            <div class="text-white/50 text-lg font-medium">New York</div>
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center gap-2 mb-4">
                            <div class="w-2 h-2 rounded-full bg-green-500"></div>
                            <span class="text-green-600 text-xs font-semibold">Open Now</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">New York Campus</h3>
                        <div class="space-y-3 mb-6">
                            <div class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-gray-400 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                                </svg>
                                <span class="text-gray-500 text-sm">456 Broadway, New York, NY 10013</span>
                            </div>
                            <div class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-gray-400 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
                                </svg>
                                <span class="text-gray-500 text-sm">+1 (555) 234-5678</span>
                            </div>
                        </div>
                        <a href="#" class="inline-flex items-center gap-2 text-university-600 font-semibold text-sm hover:text-university-700 transition-colors">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z"/>
                            </svg>
                            View on Map
                        </a>
                    </div>
                </div>
                <div class="card overflow-hidden group">
                    <div class="aspect-[16/10] bg-gradient-to-br from-accent-500 to-accent-700 flex items-center justify-center relative overflow-hidden">
                        <div class="hero-glow bg-white/20 top-[-30%] right-[-30%]"></div>
                        <div class="text-center relative z-10">
                            <svg class="w-16 h-16 text-white/30 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21"/>
                            </svg>
                            <div class="text-white/50 text-lg font-medium">London</div>
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center gap-2 mb-4">
                            <div class="w-2 h-2 rounded-full bg-green-500"></div>
                            <span class="text-green-600 text-xs font-semibold">Open Now</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">London Campus</h3>
                        <div class="space-y-3 mb-6">
                            <div class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-gray-400 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                                </svg>
                                <span class="text-gray-500 text-sm">789 Oxford Street, London W1D 1AS</span>
                            </div>
                            <div class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-gray-400 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
                                </svg>
                                <span class="text-gray-500 text-sm">+44 20 1234 5678</span>
                            </div>
                        </div>
                        <a href="#" class="inline-flex items-center gap-2 text-university-600 font-semibold text-sm hover:text-university-700 transition-colors">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z"/>
                            </svg>
                            View on Map
                        </a>
                    </div>
                </div>
                <div class="card overflow-hidden group">
                    <div class="aspect-[16/10] bg-gradient-to-br from-teal-500 to-teal-700 flex items-center justify-center relative overflow-hidden">
                        <div class="hero-glow bg-white/20 top-[-30%] right-[-30%]"></div>
                        <div class="text-center relative z-10">
                            <svg class="w-16 h-16 text-white/30 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21"/>
                            </svg>
                            <div class="text-white/50 text-lg font-medium">Tokyo</div>
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center gap-2 mb-4">
                            <div class="w-2 h-2 rounded-full bg-green-500"></div>
                            <span class="text-green-600 text-xs font-semibold">Open Now</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Tokyo Campus</h3>
                        <div class="space-y-3 mb-6">
                            <div class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-gray-400 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                                </svg>
                                <span class="text-gray-500 text-sm">2-1-1 Nishi-Shinjuku, Shinjuku City, Tokyo</span>
                            </div>
                            <div class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-gray-400 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
                                </svg>
                                <span class="text-gray-500 text-sm">+81 3-1234-5678</span>
                            </div>
                        </div>
                        <a href="#" class="inline-flex items-center gap-2 text-university-600 font-semibold text-sm hover:text-university-700 transition-colors">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z"/>
                            </svg>
                            View on Map
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Map Section --}}
    <section class="section-padding bg-white">
        <div class="container-custom">
            <div class="text-center max-w-3xl mx-auto mb-12" data-gsap="fade-up">
                <span class="text-university-600 text-sm font-semibold uppercase tracking-wider">Find Us</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-3 mb-6">Interactive Campus Map</h2>
                <p class="text-gray-600 text-lg">Explore our campuses around the world with our interactive map.</p>
            </div>
            <div data-gsap="fade-up" class="aspect-[21/9] rounded-3xl gradient-bg flex items-center justify-center relative overflow-hidden">
                <div class="hero-glow bg-white/20 top-[-10%] left-[-10%]"></div>
                <div class="hero-glow bg-accent-400/20 bottom-[-10%] right-[-10%]"></div>
                <div class="text-center relative z-10">
                    <svg class="w-20 h-20 text-white/30 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z"/>
                    </svg>
                    <div class="text-white/60 text-xl font-medium mb-2">Interactive Map</div>
                    <p class="text-white/40 text-sm">Explore our global campuses</p>
                    <button class="mt-6 btn-white text-sm !px-6 !py-3">View Full Map</button>
                </div>
            </div>
        </div>
    </section>

    {{-- Visit Us CTA --}}
    <section class="relative py-24 overflow-hidden gradient-bg">
        <div class="hero-glow bg-white top-[-30%] right-[-20%]"></div>
        <div class="hero-glow bg-accent-400 bottom-[-30%] left-[-20%]"></div>
        <div class="container-custom relative z-10">
            <div class="max-w-4xl mx-auto text-center" data-gsap="fade-up">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-white/90 text-sm font-medium mb-8">
                    <svg class="w-4 h-4 text-accent-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                    </svg>
                    Schedule Your Visit
                </div>
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                    Ready to Visit Us?
                </h2>
                <p class="text-xl text-white/70 max-w-2xl mx-auto mb-10 leading-relaxed">
                    We'd love to welcome you to our campus. Schedule a personal tour, attend an open day, or book a virtual meeting with our admissions team.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="/contact" class="btn-white text-base !px-10 !py-5">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/>
                        </svg>
                        Schedule a Tour
                    </a>
                    <a href="tel:+15551234567" class="btn-secondary !border-white !text-white hover:!bg-white hover:!text-university-700 text-base !px-10 !py-5">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
                        </svg>
                        Call Us Now
                    </a>
                </div>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-white/20 to-transparent"></div>
    </section>
@endsection
