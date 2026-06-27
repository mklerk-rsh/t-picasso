<header data-header
        class="fixed top-0 left-0 right-0 z-50 transition-all duration-500"
        x-bind:class="{ 'scrolled': window.scrollY > 50 }"
        x-init="window.addEventListener('scroll', () => { window.scrollY > 50 ? $el.classList.add('scrolled') : $el.classList.remove('scrolled') })">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <a href="#" class="flex items-center gap-2 text-2xl font-semibold tracking-tight no-underline">
                <span class="gradient-text">Picha Picasso</span>
            </a>

            <nav class="hidden lg:flex items-center gap-1">
                <a href="#" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-university-600 rounded-lg hover:bg-university-50 transition-all duration-200">Home</a>
                <a href="#" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-university-600 rounded-lg hover:bg-university-50 transition-all duration-200">About</a>

                <div x-data="{ open: false }" class="relative"
                     @mouseenter="open = true"
                     @mouseleave="open = false">
                    <button class="flex items-center gap-1 px-4 py-2 text-sm font-medium text-gray-700 hover:text-university-600 rounded-lg hover:bg-university-50 transition-all duration-200">
                        Courses
                        <svg x-bind:class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <div x-show="open"
                         x-cloak
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-2"
                         @click.outside="open = false"
                         class="absolute top-full left-0 mt-2 w-[600px] p-6 glass rounded-2xl shadow-2xl">
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <h3 class="text-xs font-semibold text-university-600 uppercase tracking-wider mb-3">Programs</h3>
                                <ul class="space-y-2">
                                    <li><a href="#" class="block text-sm text-gray-600 hover:text-university-600 transition-colors">Fine Arts</a></li>
                                    <li><a href="#" class="block text-sm text-gray-600 hover:text-university-600 transition-colors">Digital Design</a></li>
                                    <li><a href="#" class="block text-sm text-gray-600 hover:text-university-600 transition-colors">Photography</a></li>
                                    <li><a href="#" class="block text-sm text-gray-600 hover:text-university-600 transition-colors">Illustration</a></li>
                                </ul>
                            </div>
                            <div>
                                <h3 class="text-xs font-semibold text-university-600 uppercase tracking-wider mb-3">Short Courses</h3>
                                <ul class="space-y-2">
                                    <li><a href="#" class="block text-sm text-gray-600 hover:text-university-600 transition-colors">Watercolor Basics</a></li>
                                    <li><a href="#" class="block text-sm text-gray-600 hover:text-university-600 transition-colors">Digital Painting</a></li>
                                    <li><a href="#" class="block text-sm text-gray-600 hover:text-university-600 transition-colors">Portrait Drawing</a></li>
                                    <li><a href="#" class="block text-sm text-gray-600 hover:text-university-600 transition-colors">Graphic Design</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="mt-6 pt-4 border-t border-gray-100">
                            <a href="#" class="text-sm font-semibold text-university-600 hover:text-university-700 transition-colors">View all courses &rarr;</a>
                        </div>
                    </div>
                </div>

                <a href="#" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-university-600 rounded-lg hover:bg-university-50 transition-all duration-200">Teachers</a>
                <a href="#" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-university-600 rounded-lg hover:bg-university-50 transition-all duration-200">Tutorials</a>
                <a href="#" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-university-600 rounded-lg hover:bg-university-50 transition-all duration-200">Reviews</a>
                <a href="#" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-university-600 rounded-lg hover:bg-university-50 transition-all duration-200">Contact</a>
            </nav>

            <div class="hidden lg:flex items-center gap-3">
                <a href="/admin/login"
                   class="px-5 py-2.5 text-sm font-medium text-gray-700 hover:text-university-600 border border-gray-200 hover:border-university-300 rounded-xl transition-all duration-200">
                    Login
                </a>
                <a href="#" class="btn-primary !px-6 !py-2.5 !text-sm">
                    Enroll Now
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>

            <button data-menu-toggle
                    @click="mobileOpen = !mobileOpen"
                    class="lg:hidden relative w-10 h-10 flex items-center justify-center rounded-xl hover:bg-gray-100 transition-colors"
                    aria-label="Toggle menu">
                <div class="w-5 h-4 relative flex flex-col justify-between">
                    <span class="block h-0.5 w-full bg-gray-700 rounded-full transition-all duration-300"
                          x-bind:class="mobileOpen ? 'rotate-45 translate-y-[7px]' : ''"></span>
                    <span class="block h-0.5 w-full bg-gray-700 rounded-full transition-all duration-300"
                          x-bind:class="mobileOpen ? 'opacity-0' : ''"></span>
                    <span class="block h-0.5 w-full bg-gray-700 rounded-full transition-all duration-300"
                          x-bind:class="mobileOpen ? '-rotate-45 -translate-y-[7px]' : ''"></span>
                </div>
            </button>
        </div>
    </div>

    <div x-show="mobileOpen"
         x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         class="lg:hidden border-t border-gray-100 glass">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 pb-6 pt-4">
            <div class="space-y-1">
                <a href="#" @click="mobileOpen = false" class="block px-4 py-3 text-sm font-medium text-gray-700 hover:text-university-600 hover:bg-university-50 rounded-xl transition-all">Home</a>
                <a href="#" @click="mobileOpen = false" class="block px-4 py-3 text-sm font-medium text-gray-700 hover:text-university-600 hover:bg-university-50 rounded-xl transition-all">About</a>

                <div x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center justify-between w-full px-4 py-3 text-sm font-medium text-gray-700 hover:text-university-600 hover:bg-university-50 rounded-xl transition-all">
                        Courses
                        <svg x-bind:class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0"
                         x-transition:enter-end="opacity-100"
                         class="ml-4 mt-1 space-y-1">
                        <a href="#" @click="mobileOpen = false" class="block px-4 py-2 text-sm text-gray-600 hover:text-university-600 rounded-lg transition-colors">Fine Arts</a>
                        <a href="#" @click="mobileOpen = false" class="block px-4 py-2 text-sm text-gray-600 hover:text-university-600 rounded-lg transition-colors">Digital Design</a>
                        <a href="#" @click="mobileOpen = false" class="block px-4 py-2 text-sm text-gray-600 hover:text-university-600 rounded-lg transition-colors">Photography</a>
                        <a href="#" @click="mobileOpen = false" class="block px-4 py-2 text-sm text-gray-600 hover:text-university-600 rounded-lg transition-colors">Illustration</a>
                        <a href="#" @click="mobileOpen = false" class="block px-4 py-2 text-sm font-semibold text-university-600 rounded-lg transition-colors">View all &rarr;</a>
                    </div>
                </div>

                <a href="#" @click="mobileOpen = false" class="block px-4 py-3 text-sm font-medium text-gray-700 hover:text-university-600 hover:bg-university-50 rounded-xl transition-all">Teachers</a>
                <a href="#" @click="mobileOpen = false" class="block px-4 py-3 text-sm font-medium text-gray-700 hover:text-university-600 hover:bg-university-50 rounded-xl transition-all">Tutorials</a>
                <a href="#" @click="mobileOpen = false" class="block px-4 py-3 text-sm font-medium text-gray-700 hover:text-university-600 hover:bg-university-50 rounded-xl transition-all">Reviews</a>
                <a href="#" @click="mobileOpen = false" class="block px-4 py-3 text-sm font-medium text-gray-700 hover:text-university-600 hover:bg-university-50 rounded-xl transition-all">Contact</a>
            </div>

            <div class="mt-6 pt-6 border-t border-gray-100 space-y-3">
                <a href="/admin/login" class="flex items-center justify-center w-full px-5 py-3 text-sm font-medium text-gray-700 border border-gray-200 rounded-xl hover:border-university-300 hover:text-university-600 transition-all duration-200">
                    Login
                </a>
                <a href="#" class="btn-primary w-full !px-6 !py-3 !text-sm">
                    Enroll Now
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </nav>
    </div>
</header>
