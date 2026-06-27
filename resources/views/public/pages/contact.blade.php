@extends('public.layout')

@section('title', 'Contact Us')

@section('content')
    {{-- Hero --}}
    <section class="relative min-h-[60vh] flex items-center overflow-hidden gradient-bg">
        <div class="hero-glow bg-white top-[-10%] right-[-5%]"></div>
        <div class="hero-glow bg-accent-400 bottom-[-10%] left-[-5%]"></div>
        <div data-parallax class="absolute inset-0 opacity-10">
            <div class="absolute top-20 right-10 w-72 h-72 border border-white/20 rounded-full"></div>
            <div class="absolute bottom-20 left-10 w-96 h-96 border border-white/10 rounded-full"></div>
        </div>
        <div class="container-custom relative z-10 pt-32 pb-20">
            <div data-hero-content class="text-center max-w-3xl mx-auto">
                <div data-animate class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-white/90 text-sm font-medium mb-8">
                    <svg class="w-4 h-4 text-accent-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
                    </svg>
                    Get in Touch
                </div>
                <h1 data-animate class="text-5xl md:text-6xl lg:text-7xl font-bold text-white leading-tight mb-6">
                    Get in <span class="text-transparent bg-clip-text bg-gradient-to-r from-accent-300 to-accent-400">Touch</span>
                </h1>
                <p data-animate class="text-xl text-white/70 max-w-2xl mx-auto leading-relaxed">
                    Have a question? We'd love to hear from you. Send us a message and we'll respond as soon as possible.
                </p>
            </div>
        </div>
    </section>

    {{-- Contact Info Cards --}}
    <section class="section-padding bg-white -mt-20 relative z-20">
        <div class="container-custom">
            <div data-gsap="stagger" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="card p-8 text-center group">
                    <div class="w-14 h-14 rounded-2xl bg-university-100 flex items-center justify-center mx-auto mb-5 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-university-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Email Us</h3>
                    <p class="text-gray-500 text-sm">info@pichapicasso.edu</p>
                    <p class="text-gray-400 text-xs mt-1">We reply within 24 hours</p>
                </div>
                <div class="card p-8 text-center group">
                    <div class="w-14 h-14 rounded-2xl bg-accent-100 flex items-center justify-center mx-auto mb-5 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-accent-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Call Us</h3>
                    <p class="text-gray-500 text-sm">+1 (555) 123-4567</p>
                    <p class="text-gray-400 text-xs mt-1">Mon-Fri 8AM-6PM</p>
                </div>
                <div class="card p-8 text-center group">
                    <div class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center mx-auto mb-5 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Visit Us</h3>
                    <p class="text-gray-500 text-sm">123 University Ave, City</p>
                    <p class="text-gray-400 text-xs mt-1">Main Campus</p>
                </div>
                <div class="card p-8 text-center group">
                    <div class="w-14 h-14 rounded-2xl bg-purple-100 flex items-center justify-center mx-auto mb-5 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Hours</h3>
                    <p class="text-gray-500 text-sm">Mon-Fri 8AM-6PM</p>
                    <p class="text-gray-400 text-xs mt-1">Weekends by appointment</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Contact Form + Map --}}
    <section class="section-padding gradient-bg-subtle">
        <div class="container-custom">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24">
                <div data-gsap="fade-left">
                    <span class="text-university-600 text-sm font-semibold uppercase tracking-wider">Send a Message</span>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-3 mb-6 leading-tight">Let's Start a <span class="gradient-text">Conversation</span></h2>
                    <p class="text-gray-600 mb-8">Fill out the form below and our team will get back to you shortly.</p>

                    <form x-data="{ name: '', email: '', phone: '', subject: '', message: '', submitted: false, errors: {} }" @submit.prevent="errors = {}; submitted = false; if(!name) errors.name = 'Name is required'; if(!email) errors.email = 'Email is required'; if(!message) errors.message = 'Message is required'; if(Object.keys(errors).length === 0) submitted = true" class="space-y-6">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="relative">
                                <input x-model="name" type="text" id="name" class="peer w-full px-4 pt-6 pb-2 rounded-xl border-2 bg-white transition-all duration-200" x-bind:class="errors.name ? 'border-red-400 focus:border-red-500' : 'border-gray-200 focus:border-university-500'" placeholder=" ">
                                <label for="name" class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm transition-all duration-200 peer-focus:text-xs peer-focus:-translate-y-4 peer-focus:top-4 peer-[:not(:placeholder-shown)]:text-xs peer-[:not(:placeholder-shown)]:-translate-y-4 peer-[:not(:placeholder-shown)]:top-4">Full Name</label>
                                <template x-if="errors.name">
                                    <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
                                        <span x-text="errors.name"></span>
                                    </p>
                                </template>
                            </div>
                            <div class="relative">
                                <input x-model="email" type="email" id="email" class="peer w-full px-4 pt-6 pb-2 rounded-xl border-2 bg-white transition-all duration-200" x-bind:class="errors.email ? 'border-red-400 focus:border-red-500' : 'border-gray-200 focus:border-university-500'" placeholder=" ">
                                <label for="email" class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm transition-all duration-200 peer-focus:text-xs peer-focus:-translate-y-4 peer-focus:top-4 peer-[:not(:placeholder-shown)]:text-xs peer-[:not(:placeholder-shown)]:-translate-y-4 peer-[:not(:placeholder-shown)]:top-4">Email Address</label>
                                <template x-if="errors.email">
                                    <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
                                        <span x-text="errors.email"></span>
                                    </p>
                                </template>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="relative">
                                <input x-model="phone" type="tel" id="phone" class="peer w-full px-4 pt-6 pb-2 rounded-xl border-2 border-gray-200 bg-white focus:border-university-500 transition-all duration-200" placeholder=" ">
                                <label for="phone" class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm transition-all duration-200 peer-focus:text-xs peer-focus:-translate-y-4 peer-focus:top-4 peer-[:not(:placeholder-shown)]:text-xs peer-[:not(:placeholder-shown)]:-translate-y-4 peer-[:not(:placeholder-shown)]:top-4">Phone Number</label>
                            </div>
                            <div class="relative">
                                <select x-model="subject" id="subject" class="peer w-full px-4 pt-6 pb-2 rounded-xl border-2 border-gray-200 bg-white focus:border-university-500 transition-all duration-200 appearance-none cursor-pointer">
                                    <option value="" disabled selected></option>
                                    <option value="admissions">Admissions</option>
                                    <option value="courses">Course Inquiry</option>
                                    <option value="support">Student Support</option>
                                    <option value="partnership">Partnerships</option>
                                    <option value="other">Other</option>
                                </select>
                                <label for="subject" class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm transition-all duration-200 peer-focus:text-xs peer-focus:-translate-y-4 peer-focus:top-4 peer-[.has-value]:text-xs peer-[.has-value]:-translate-y-4 peer-[.has-value]:top-4" x-bind:class="subject ? '!text-xs !-translate-y-4 !top-4' : ''">Subject</label>
                                <svg class="absolute right-4 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                            </div>
                        </div>
                        <div class="relative">
                            <textarea x-model="message" id="message" rows="5" class="peer w-full px-4 pt-6 pb-2 rounded-xl border-2 bg-white transition-all duration-200 resize-none" x-bind:class="errors.message ? 'border-red-400 focus:border-red-500' : 'border-gray-200 focus:border-university-500'" placeholder=" "></textarea>
                            <label for="message" class="absolute left-4 top-5 text-gray-400 text-sm transition-all duration-200 peer-focus:text-xs peer-focus:-translate-y-3 peer-[:not(:placeholder-shown)]:text-xs peer-[:not(:placeholder-shown)]:-translate-y-3">Your Message</label>
                            <template x-if="errors.message">
                                <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
                                    <span x-text="errors.message"></span>
                                </p>
                            </template>
                        </div>
                        <button type="submit" class="btn-primary w-full">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z"/>
                            </svg>
                            Send Message
                        </button>
                        <template x-if="submitted">
                            <div class="p-4 bg-green-50 border border-green-200 rounded-xl text-green-700 text-sm flex items-center gap-3">
                                <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Thank you! Your message has been sent successfully. We'll get back to you soon.
                            </div>
                        </template>
                    </form>
                </div>

                <div data-gsap="fade-right" class="space-y-8">
                    <div class="aspect-[4/3] rounded-3xl gradient-bg flex items-center justify-center relative overflow-hidden">
                        <div class="hero-glow bg-white/20 top-[-20%] left-[-20%]"></div>
                        <div class="hero-glow bg-accent-400/20 bottom-[-20%] right-[-20%]"></div>
                        <div class="text-center relative z-10">
                            <svg class="w-16 h-16 text-white/40 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z"/>
                            </svg>
                            <div class="text-white text-2xl font-semibold">Interactive Map</div>
                            <p class="text-white/60 text-sm mt-2">Find us on campus</p>
                        </div>
                    </div>

                    <div class="card p-8">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Office Hours</h3>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between pb-3 border-b border-gray-100">
                                <span class="text-gray-600 text-sm">Monday - Friday</span>
                                <span class="text-gray-900 font-semibold text-sm">8:00 AM - 6:00 PM</span>
                            </div>
                            <div class="flex items-center justify-between pb-3 border-b border-gray-100">
                                <span class="text-gray-600 text-sm">Saturday</span>
                                <span class="text-gray-900 font-semibold text-sm">9:00 AM - 2:00 PM</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600 text-sm">Sunday</span>
                                <span class="text-gray-400 font-semibold text-sm">Closed</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ Section --}}
    <section class="section-padding bg-white">
        <div class="container-custom">
            <div class="text-center max-w-3xl mx-auto mb-16" data-gsap="fade-up">
                <span class="text-university-600 text-sm font-semibold uppercase tracking-wider">FAQ</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-3 mb-6">Frequently Asked Questions</h2>
                <p class="text-gray-600 text-lg">Find answers to common questions about our university.</p>
            </div>
            <div data-gsap="fade-up" class="max-w-3xl mx-auto space-y-4" x-data="{ open: null }">
                <div class="card overflow-hidden">
                    <button @click="open = open === 1 ? null : 1" class="w-full flex items-center justify-between p-6 text-left transition-colors hover:bg-gray-50">
                        <span class="font-semibold text-gray-900">How do I apply for admission?</span>
                        <svg class="w-5 h-5 text-gray-400 transition-transform duration-300 shrink-0" x-bind:class="open === 1 ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open === 1" x-collapse.duration.300ms>
                        <div class="px-6 pb-6 text-gray-500 text-sm leading-relaxed">
                            You can apply online through our admissions portal. Simply create an account, fill out the application form, upload the required documents (transcripts, ID, and personal statement), and pay the application fee. Our admissions team will review your application and get back to you within 2-3 weeks.
                        </div>
                    </div>
                </div>
                <div class="card overflow-hidden">
                    <button @click="open = open === 2 ? null : 2" class="w-full flex items-center justify-between p-6 text-left transition-colors hover:bg-gray-50">
                        <span class="font-semibold text-gray-900">What are the tuition fees?</span>
                        <svg class="w-5 h-5 text-gray-400 transition-transform duration-300 shrink-0" x-bind:class="open === 2 ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open === 2" x-collapse.duration.300ms>
                        <div class="px-6 pb-6 text-gray-500 text-sm leading-relaxed">
                            Tuition fees vary depending on the program and study mode. Undergraduate programs start at $12,000 per year, while graduate programs start at $15,000 per year. We offer various scholarships and financial aid options. Visit our admissions page for detailed fee structures.
                        </div>
                    </div>
                </div>
                <div class="card overflow-hidden">
                    <button @click="open = open === 3 ? null : 3" class="w-full flex items-center justify-between p-6 text-left transition-colors hover:bg-gray-50">
                        <span class="font-semibold text-gray-900">Do you offer online programs?</span>
                        <svg class="w-5 h-5 text-gray-400 transition-transform duration-300 shrink-0" x-bind:class="open === 3 ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open === 3" x-collapse.duration.300ms>
                        <div class="px-6 pb-6 text-gray-500 text-sm leading-relaxed">
                            Yes! We offer fully online, on-campus, and hybrid learning options across all our programs. Our state-of-the-art online learning platform provides an interactive experience with live lectures, recorded sessions, discussion forums, and 24/7 access to course materials.
                        </div>
                    </div>
                </div>
                <div class="card overflow-hidden">
                    <button @click="open = open === 4 ? null : 4" class="w-full flex items-center justify-between p-6 text-left transition-colors hover:bg-gray-50">
                        <span class="font-semibold text-gray-900">What support services are available?</span>
                        <svg class="w-5 h-5 text-gray-400 transition-transform duration-300 shrink-0" x-bind:class="open === 4 ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open === 4" x-collapse.duration.300ms>
                        <div class="px-6 pb-6 text-gray-500 text-sm leading-relaxed">
                            We offer comprehensive support including academic advising, career counseling, mental health services, tutoring centers, library resources, IT support, and international student services. Our dedicated student support team is available Monday through Saturday to assist you.
                        </div>
                    </div>
                </div>
                <div class="card overflow-hidden">
                    <button @click="open = open === 5 ? null : 5" class="w-full flex items-center justify-between p-6 text-left transition-colors hover:bg-gray-50">
                        <span class="font-semibold text-gray-900">How can I schedule a campus tour?</span>
                        <svg class="w-5 h-5 text-gray-400 transition-transform duration-300 shrink-0" x-bind:class="open === 5 ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open === 5" x-collapse.duration.300ms>
                        <div class="px-6 pb-6 text-gray-500 text-sm leading-relaxed">
                            You can schedule a campus tour by contacting our admissions office via phone or email, or by filling out the contact form on this page. We offer guided tours Monday through Friday at 10 AM and 2 PM. Virtual tours are also available for international students.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Social Section --}}
    <section class="section-padding gradient-bg-subtle">
        <div class="container-custom">
            <div class="text-center max-w-3xl mx-auto" data-gsap="fade-up">
                <span class="text-university-600 text-sm font-semibold uppercase tracking-wider">Stay Connected</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-3 mb-6">Follow Us on Social Media</h2>
                <p class="text-gray-600 text-lg mb-12">Join our community and stay updated with the latest news, events, and announcements.</p>
                <div class="flex justify-center gap-4">
                    <a href="#" class="w-16 h-16 rounded-2xl bg-white card flex items-center justify-center group hover:bg-university-600 hover:text-white hover:border-university-600 transition-all duration-300">
                        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                    </a>
                    <a href="#" class="w-16 h-16 rounded-2xl bg-white card flex items-center justify-center group hover:bg-university-600 hover:text-white hover:border-university-600 transition-all duration-300">
                        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/></svg>
                    </a>
                    <a href="#" class="w-16 h-16 rounded-2xl bg-white card flex items-center justify-center group hover:bg-university-600 hover:text-white hover:border-university-600 transition-all duration-300">
                        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.477 2 2 6.477 2 12c0 4.42 2.865 8.17 6.839 9.5.5.092.682-.217.682-.482 0-.237-.008-.866-.013-1.7-2.782.604-3.369-1.34-3.369-1.34-.454-1.156-1.11-1.463-1.11-1.463-.908-.62.069-.608.069-.608 1.003.07 1.531 1.03 1.531 1.03.892 1.529 2.341 1.087 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.27.098-2.647 0 0 .84-.269 2.75 1.025A9.578 9.578 0 0112 6.836c.85.004 1.705.115 2.504.337 1.909-1.294 2.747-1.025 2.747-1.025.546 1.377.203 2.394.1 2.647.64.699 1.028 1.592 1.028 2.683 0 3.842-2.339 4.687-4.566 4.935.359.309.678.919.678 1.852 0 1.336-.012 2.415-.012 2.743 0 .267.18.578.688.48C19.138 20.167 22 16.418 22 12c0-5.523-4.477-10-10-10z"/></svg>
                    </a>
                    <a href="#" class="w-16 h-16 rounded-2xl bg-white card flex items-center justify-center group hover:bg-university-600 hover:text-white hover:border-university-600 transition-all duration-300">
                        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    </a>
                    <a href="#" class="w-16 h-16 rounded-2xl bg-white card flex items-center justify-center group hover:bg-university-600 hover:text-white hover:border-university-600 transition-all duration-300">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.16a15.53 15.53 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- WhatsApp Floating Button --}}
    <a href="https://wa.me/15551234567" target="_blank" class="fixed bottom-6 right-6 z-50 w-16 h-16 rounded-full bg-green-500 text-white flex items-center justify-center shadow-2xl hover:bg-green-600 hover:scale-110 transition-all duration-300 floating">
        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </svg>
    </a>
@endsection

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('contactForm', () => ({
            name: '',
            email: '',
            phone: '',
            subject: '',
            message: '',
            submitted: false,
            errors: {}
        }));
    });
</script>
@endpush
