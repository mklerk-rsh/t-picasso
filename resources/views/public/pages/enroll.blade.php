@extends('public.layout')

@section('title', 'Enroll | Picha Picasso University')

@section('content')
    @php
        $benefits = [
            ['icon' => 'M12 6v6l4 2m6-2a10 10 0 11-18 0 10 10 0 0118 0z', 'title' => 'Flexible Schedule', 'desc' => 'Learn at your own pace with lifetime access to all course materials.'],
            ['icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => 'Certified Courses', 'desc' => 'Earn recognized certificates upon successful completion of any program.'],
            ['icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z', 'title' => 'Expert Mentors', 'desc' => 'Get guidance from industry professionals with years of experience.'],
            ['icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z', 'title' => 'Community Access', 'desc' => 'Join a vibrant community of artists, designers, and creative thinkers.'],
        ];

        $courses = [
            ['id' => 'fine-arts', 'title' => 'Fine Arts', 'desc' => 'Master traditional painting, drawing, and sculpting techniques.', 'duration' => '12 weeks', 'price' => '$1,200'],
            ['id' => 'digital-design', 'title' => 'Digital Design', 'desc' => 'Learn UI/UX, graphic design, and modern digital tools.', 'duration' => '10 weeks', 'price' => '$950'],
            ['id' => 'photography', 'title' => 'Photography', 'desc' => 'From composition to post-processing, master the art of photography.', 'duration' => '8 weeks', 'price' => '$800'],
        ];

        $paymentMethods = [
            ['id' => 'bank-transfer', 'name' => 'Bank Transfer', 'icon' => 'M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3', 'desc' => 'Direct bank transfer to our institutional account. Processing takes 1-2 business days.'],
            ['id' => 'mpesa', 'name' => 'M-Pesa', 'icon' => 'M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z', 'desc' => 'Pay quickly using M-Pesa mobile money. Instant confirmation.'],
            ['id' => 'paypal', 'name' => 'PayPal', 'icon' => 'M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z', 'desc' => 'Secure payment via PayPal. All major credit and debit cards accepted.'],
        ];
    @endphp

    <div class="min-h-screen pt-20">
        <section class="gradient-bg relative overflow-hidden py-20">
            <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSI+PGNpcmNsZSBjeD0iMzAiIGN5PSIzMCIgcj0iMiIvPjwvZz48L2c+PC9zdmc+')] opacity-30"></div>
            <div class="container-custom relative">
                <div class="max-w-2xl" data-gsap="fade-up">
                    <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 text-white/80 text-sm font-medium mb-6 border border-white/10">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                        Start Your Journey
                    </span>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight">Begin Your<br><span class="text-white/80">Journey</span></h1>
                    <p class="text-lg text-white/70 mt-4 max-w-lg leading-relaxed">Take the first step toward a creative career. Complete your enrollment in minutes.</p>
                </div>
            </div>
            <div class="absolute -bottom-6 left-1/2 -translate-x-1/2 w-full max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="h-6 bg-white dark:bg-gray-950 rounded-t-3xl shadow-2xl"></div>
            </div>
        </section>

        <div class="container-custom -mt-6 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                <div class="lg:col-span-2">
                    <div x-data="enrollmentWizard()" x-init="init()" class="card p-8" data-gsap="fade-up">
                        <div data-stepper class="mb-10">
                            <div class="flex items-center justify-between relative">
                                <template x-for="(step, index) in steps" :key="index">
                                    <div class="flex items-center flex-1 relative">
                                        <button @click="goTo(index)"
                                                class="relative z-10 flex flex-col items-center group cursor-pointer"
                                                :class="{'pointer-events-none': index > currentStep && !completed[index-1]}">
                                            <div class="w-10 h-10 rounded-full flex items-center justify-center text-sm font-semibold transition-all duration-500 border-2"
                                                :class="{
                                                    'bg-university-600 border-university-600 text-white scale-110': currentStep === index,
                                                    'bg-emerald-500 border-emerald-500 text-white': completed[index],
                                                    'bg-white border-gray-200 text-gray-400': currentStep !== index && !completed[index]
                                                }">
                                                <span x-show="!completed[index]" x-text="index + 1"></span>
                                                <svg x-show="completed[index]" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                                </svg>
                                            </div>
                                            <span class="mt-2 text-xs font-medium text-center transition-colors duration-300 hidden sm:block"
                                                  :class="{
                                                      'text-university-600': currentStep === index,
                                                      'text-emerald-600': completed[index],
                                                      'text-gray-400': currentStep !== index && !completed[index]
                                                  }"
                                                  x-text="step.label">
                                            </span>
                                        </button>
                                        <div x-show="index < steps.length - 1" class="absolute top-5 left-[calc(50%+1.25rem)] right-[calc(-50%+1.25rem)] h-0.5 -translate-y-1/2 bg-gray-100">
                                            <div class="h-full bg-emerald-500 transition-all duration-500"
                                                 :style="'width: ' + (completed[index] ? '100%' : '0%')"></div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <form @submit.prevent="submitForm">
                            <div data-step="0" x-show="currentStep === 0" x-cloak
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0 translate-x-8"
                                 x-transition:enter-end="opacity-100 translate-x-0"
                                 x-transition:leave="transition ease-in duration-200"
                                 x-transition:leave-start="opacity-100 translate-x-0"
                                 x-transition:leave-end="opacity-0 -translate-x-8">
                                <div class="space-y-6">
                                    <div>
                                        <h2 class="text-2xl font-bold text-gray-900">Personal Information</h2>
                                        <p class="text-gray-500 mt-1">Tell us about yourself so we can get started.</p>
                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                        <div class="group">
                                            <label class="block text-sm font-medium text-gray-700 mb-1.5">First Name</label>
                                            <div class="relative">
                                                <input type="text" x-model="form.first" required
                                                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl text-sm focus:border-university-500 focus:ring-2 focus:ring-university-500/20 outline-none transition-all duration-200 peer"
                                                       :class="{'border-emerald-500': form.first && form.first.length > 0}">
                                                <span x-show="form.first && form.first.length > 0" class="absolute right-3 top-1/2 -translate-y-1/2 text-emerald-500">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="group">
                                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Last Name</label>
                                            <div class="relative">
                                                <input type="text" x-model="form.last" required
                                                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl text-sm focus:border-university-500 focus:ring-2 focus:ring-university-500/20 outline-none transition-all duration-200"
                                                       :class="{'border-emerald-500': form.last && form.last.length > 0}">
                                                <span x-show="form.last && form.last.length > 0" class="absolute right-3 top-1/2 -translate-y-1/2 text-emerald-500">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Email Address</label>
                                        <div class="relative">
                                            <input type="email" x-model="form.email" required
                                                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl text-sm focus:border-university-500 focus:ring-2 focus:ring-university-500/20 outline-none transition-all duration-200 pl-11"
                                                   :class="{'border-emerald-500': form.email && form.email.includes('@')}">
                                            <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Phone Number</label>
                                        <div class="relative">
                                            <input type="tel" x-model="form.phone" required
                                                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl text-sm focus:border-university-500 focus:ring-2 focus:ring-university-500/20 outline-none transition-all duration-200 pl-11"
                                                   :class="{'border-emerald-500': form.phone && form.phone.length > 6}">
                                            <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Date of Birth</label>
                                            <div class="relative">
                                                <input type="date" x-model="form.dob" required
                                                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl text-sm focus:border-university-500 focus:ring-2 focus:ring-university-500/20 outline-none transition-all duration-200">
                                            </div>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Country</label>
                                            <select x-model="form.country" required
                                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl text-sm focus:border-university-500 focus:ring-2 focus:ring-university-500/20 outline-none transition-all duration-200 bg-white">
                                                <option value="">Select country</option>
                                                <option value="US">United States</option>
                                                <option value="UK">United Kingdom</option>
                                                <option value="KE">Kenya</option>
                                                <option value="NG">Nigeria</option>
                                                <option value="ZA">South Africa</option>
                                                <option value="GH">Ghana</option>
                                                <option value="TZ">Tanzania</option>
                                                <option value="UG">Uganda</option>
                                                <option value="RW">Rwanda</option>
                                                <option value="ET">Ethiopia</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Address</label>
                                        <textarea x-model="form.address" rows="2" required
                                                  class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl text-sm focus:border-university-500 focus:ring-2 focus:ring-university-500/20 outline-none transition-all duration-200 resize-none"></textarea>
                                    </div>
                                </div>
                                <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end">
                                    <button type="button" data-next @click="nextStep"
                                            class="btn-primary !px-8 !py-3 text-sm gap-2">
                                        Next Step
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                                    </button>
                                </div>
                            </div>

                            <div data-step="1" x-show="currentStep === 1" x-cloak
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0 translate-x-8"
                                 x-transition:enter-end="opacity-100 translate-x-0"
                                 x-transition:leave="transition ease-in duration-200"
                                 x-transition:leave-start="opacity-100 translate-x-0"
                                 x-transition:leave-end="opacity-0 -translate-x-8">
                                <div class="space-y-6">
                                    <div>
                                        <h2 class="text-2xl font-bold text-gray-900">Course Selection</h2>
                                        <p class="text-gray-500 mt-1">Choose the program that fits your goals.</p>
                                    </div>
                                    <div class="space-y-4">
                                        @foreach ($courses as $course)
                                        <label class="block cursor-pointer group">
                                            <input type="radio" name="course" value="{{ $course['id'] }}" x-model="form.course"
                                                   class="sr-only peer">
                                            <div class="relative p-5 border-2 border-gray-200 rounded-2xl transition-all duration-300 group-hover:border-university-300 peer-checked:border-university-500 peer-checked:bg-university-50/50 peer-checked:shadow-lg peer-checked:shadow-university-500/10">
                                                <div class="flex items-start justify-between">
                                                    <div class="flex-1">
                                                        <div class="flex items-center gap-3">
                                                            <h3 class="text-base font-semibold text-gray-900">{{ $course['title'] }}</h3>
                                                            <span class="px-2.5 py-1 rounded-full text-xs font-medium bg-university-100 text-university-700">{{ $course['duration'] }}</span>
                                                        </div>
                                                        <p class="text-sm text-gray-500 mt-1.5">{{ $course['desc'] }}</p>
                                                    </div>
                                                    <div class="ml-4 text-right">
                                                        <span class="text-lg font-bold text-university-600">{{ $course['price'] }}</span>
                                                    </div>
                                                </div>
                                                <div class="absolute top-5 right-5 w-6 h-6 rounded-full border-2 border-gray-300 flex items-center justify-center transition-all duration-300 peer-checked:border-university-500 peer-checked:bg-university-500">
                                                    <svg class="w-3.5 h-3.5 text-white opacity-0 transition-opacity duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="form.course === '{{ $course['id'] }}'">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                                    </svg>
                                                </div>
                                            </div>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="mt-8 pt-6 border-t border-gray-100 flex items-center justify-between">
                                    <button type="button" @click="prevStep"
                                            class="btn-secondary !px-8 !py-3 text-sm gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
                                        Previous
                                    </button>
                                    <button type="button" data-next @click="nextStep"
                                            class="btn-primary !px-8 !py-3 text-sm gap-2"
                                            x-bind:disabled="!form.course"
                                            :class="{'opacity-50 cursor-not-allowed': !form.course}">
                                        Next Step
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                                    </button>
                                </div>
                            </div>

                            <div data-step="2" x-show="currentStep === 2" x-cloak
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0 translate-x-8"
                                 x-transition:enter-end="opacity-100 translate-x-0"
                                 x-transition:leave="transition ease-in duration-200"
                                 x-transition:leave-start="opacity-100 translate-x-0"
                                 x-transition:leave-end="opacity-0 -translate-x-8">
                                <div class="space-y-6">
                                    <div>
                                        <h2 class="text-2xl font-bold text-gray-900">Payment Method</h2>
                                        <p class="text-gray-500 mt-1">Select your preferred payment option.</p>
                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                        @foreach ($paymentMethods as $pm)
                                        <label class="block cursor-pointer group">
                                            <input type="radio" name="payment" value="{{ $pm['id'] }}" x-model="form.payment"
                                                   class="sr-only peer">
                                            <div class="relative p-5 border-2 border-gray-200 rounded-2xl text-center transition-all duration-300 group-hover:border-university-300 peer-checked:border-university-500 peer-checked:bg-university-50/50 peer-checked:shadow-lg peer-checked:shadow-university-500/10 h-full flex flex-col items-center justify-center">
                                                <svg class="w-10 h-10 mb-3 text-gray-400 peer-checked:text-university-600 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $pm['icon'] }}"/>
                                                </svg>
                                                <h3 class="text-sm font-semibold text-gray-900">{{ $pm['name'] }}</h3>
                                                <p class="text-xs text-gray-500 mt-1">{{ $pm['desc'] }}</p>
                                                <div class="mt-3 w-5 h-5 rounded-full border-2 border-gray-300 flex items-center justify-center transition-all duration-300 peer-checked:border-university-500 peer-checked:bg-university-500">
                                                    <svg class="w-3 h-3 text-white opacity-0 transition-opacity duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="form.payment === '{{ $pm['id'] }}'">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                                    </svg>
                                                </div>
                                            </div>
                                        </label>
                                        @endforeach
                                    </div>
                                    <div x-show="form.payment === 'bank-transfer'" x-cloak
                                         x-transition:enter="transition ease-out duration-200"
                                         x-transition:enter-start="opacity-0"
                                         x-transition:enter-end="opacity-100"
                                         class="p-5 bg-gray-50 rounded-2xl border border-gray-200">
                                        <h4 class="text-sm font-semibold text-gray-900 mb-3">Bank Transfer Details</h4>
                                        <div class="space-y-2 text-sm text-gray-600">
                                            <p><span class="font-medium">Bank:</span> First National Bank</p>
                                            <p><span class="font-medium">Account Name:</span> Picha Picasso University</p>
                                            <p><span class="font-medium">Account Number:</span> 1234567890</p>
                                            <p><span class="font-medium">Routing Number:</span> 021000021</p>
                                            <p><span class="font-medium">Reference:</span> <span class="font-mono text-university-600">YOUR-NAME-COURSE</span></p>
                                        </div>
                                    </div>
                                    <div x-show="form.payment === 'mpesa'" x-cloak
                                         x-transition:enter="transition ease-out duration-200"
                                         x-transition:enter-start="opacity-0"
                                         x-transition:enter-end="opacity-100"
                                         class="p-5 bg-gray-50 rounded-2xl border border-gray-200">
                                        <h4 class="text-sm font-semibold text-gray-900 mb-3">M-Pesa Payment</h4>
                                        <div class="space-y-2 text-sm text-gray-600">
                                            <p>Paybill: <span class="font-mono font-semibold text-university-600">247247</span></p>
                                            <p>Account: <span class="font-mono text-university-600">YOUR-NAME-COURSE</span></p>
                                            <p class="text-xs text-gray-400 mt-2">You will receive an M-Pesa confirmation message immediately after payment.</p>
                                        </div>
                                    </div>
                                    <div x-show="form.payment === 'paypal'" x-cloak
                                         x-transition:enter="transition ease-out duration-200"
                                         x-transition:enter-start="opacity-0"
                                         x-transition:enter-end="opacity-100"
                                         class="p-5 bg-gray-50 rounded-2xl border border-gray-200">
                                        <h4 class="text-sm font-semibold text-gray-900 mb-3">PayPal Payment</h4>
                                        <div class="space-y-2 text-sm text-gray-600">
                                            <p>You will be redirected to PayPal to complete your payment securely.</p>
                                            <p>Email: <span class="font-mono text-university-600">payments@pichapicasso.edu</span></p>
                                            <p class="text-xs text-gray-400 mt-2">All major credit and debit cards are accepted via PayPal.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-8 pt-6 border-t border-gray-100 flex items-center justify-between">
                                    <button type="button" @click="prevStep"
                                            class="btn-secondary !px-8 !py-3 text-sm gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
                                        Previous
                                    </button>
                                    <button type="button" data-next @click="nextStep"
                                            class="btn-primary !px-8 !py-3 text-sm gap-2"
                                            x-bind:disabled="!form.payment"
                                            :class="{'opacity-50 cursor-not-allowed': !form.payment}">
                                        Next Step
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                                    </button>
                                </div>
                            </div>

                            <div data-step="3" x-show="currentStep === 3" x-cloak
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0 scale-95"
                                 x-transition:enter-end="opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-200"
                                 x-transition:leave-start="opacity-100 scale-100"
                                 x-transition:leave-end="opacity-0 scale-95">
                                <div class="text-center mb-8">
                                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-emerald-100 mb-5">
                                        <svg class="w-10 h-10 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <h2 class="text-2xl font-bold text-gray-900">Review & Confirm</h2>
                                    <p class="text-gray-500 mt-1">Please review your information before submitting.</p>
                                </div>
                                <div class="space-y-4">
                                    <div class="p-5 bg-gray-50 rounded-2xl border border-gray-200">
                                        <h3 class="text-xs font-semibold uppercase tracking-wider text-gray-500 mb-3">Personal Information</h3>
                                        <div class="grid grid-cols-2 gap-3 text-sm">
                                            <div><span class="text-gray-500">Name:</span> <span class="font-medium text-gray-900" x-text="form.first + ' ' + form.last"></span></div>
                                            <div><span class="text-gray-500">Email:</span> <span class="font-medium text-gray-900" x-text="form.email"></span></div>
                                            <div><span class="text-gray-500">Phone:</span> <span class="font-medium text-gray-900" x-text="form.phone"></span></div>
                                            <div><span class="text-gray-500">DOB:</span> <span class="font-medium text-gray-900" x-text="form.dob"></span></div>
                                        </div>
                                    </div>
                                    <div class="p-5 bg-gray-50 rounded-2xl border border-gray-200">
                                        <h3 class="text-xs font-semibold uppercase tracking-wider text-gray-500 mb-3">Course</h3>
                                        <p class="text-sm font-medium text-gray-900" x-text="getCourseName()"></p>
                                    </div>
                                    <div class="p-5 bg-gray-50 rounded-2xl border border-gray-200">
                                        <h3 class="text-xs font-semibold uppercase tracking-wider text-gray-500 mb-3">Payment Method</h3>
                                        <p class="text-sm font-medium text-gray-900" x-text="getPaymentName()"></p>
                                    </div>
                                </div>
                                <div class="mt-8 pt-6 border-t border-gray-100 flex items-center justify-between">
                                    <button type="button" @click="prevStep"
                                            class="btn-secondary !px-8 !py-3 text-sm gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
                                        Previous
                                    </button>
                                    <button type="submit"
                                            class="btn-primary !px-8 !py-3 text-sm gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        Complete Enrollment
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div x-show="submitted" x-cloak
                         x-transition:enter="transition ease-out duration-500"
                         x-transition:enter-start="opacity-0 scale-90"
                         x-transition:enter-end="opacity-100 scale-100"
                         class="card p-12 text-center">
                        <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-emerald-100 mb-6 floating">
                            <svg class="w-12 h-12 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-3">Enrollment Submitted!</h2>
                        <p class="text-gray-500 max-w-md mx-auto">Thank you for enrolling at Picha Picasso University. We've sent a confirmation email with next steps.</p>
                        <a href="#" class="btn-primary inline-flex items-center gap-2 mt-8 !px-8 !py-3">
                            Return Home
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        </a>
                    </div>
                </div>

                <div class="space-y-6" data-gsap="fade-left">
                    <div class="card p-6">
                        <h3 class="text-sm font-semibold uppercase tracking-wider text-gray-500 mb-4">Why Enroll With Us?</h3>
                        <div class="space-y-5">
                            @foreach ($benefits as $benefit)
                            <div class="flex gap-4 group">
                                <div class="shrink-0 w-10 h-10 rounded-xl bg-university-100 flex items-center justify-center group-hover:bg-university-200 transition-colors duration-300">
                                    <svg class="w-5 h-5 text-university-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $benefit['icon'] }}"/></svg>
                                </div>
                                <div>
                                    <h4 class="text-sm font-semibold text-gray-900">{{ $benefit['title'] }}</h4>
                                    <p class="text-xs text-gray-500 mt-0.5 leading-relaxed">{{ $benefit['desc'] }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-gradient p-6">
                        <h3 class="text-sm font-semibold uppercase tracking-wider text-white/80 mb-3">Need Help?</h3>
                        <p class="text-sm text-white/70 mb-4">Our admissions team is ready to assist you with any questions.</p>
                        <a href="#" class="btn-white inline-flex items-center gap-2 !px-5 !py-2.5 !text-sm w-full justify-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                            Contact Admissions
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function enrollmentWizard() {
            return {
                currentStep: 0,
                completed: [false, false, false, false],
                submitted: false,
                steps: [
                    { label: 'Personal Info' },
                    { label: 'Course Selection' },
                    { label: 'Payment Method' },
                    { label: 'Confirmation' }
                ],
                form: {
                    first: '',
                    last: '',
                    email: '',
                    phone: '',
                    dob: '',
                    country: '',
                    address: '',
                    course: '',
                    payment: ''
                },
                init() {
                    if (typeof gsap !== 'undefined') {
                        gsap.from('[data-step="' + this.currentStep + '"]', { opacity: 0, y: 20, duration: 0.5 });
                    }
                },
                nextStep() {
                    if (this.currentStep < this.steps.length - 1) {
                        this.completed[this.currentStep] = true;
                        this.currentStep++;
                    }
                },
                prevStep() {
                    if (this.currentStep > 0) {
                        this.currentStep--;
                    }
                },
                goTo(index) {
                    if (index <= this.currentStep || this.completed[index - 1]) {
                        this.currentStep = index;
                    }
                },
                getCourseName() {
                    const courses = @json($courses);
                    const found = courses.find(c => c.id === this.form.course);
                    return found ? found.title : '';
                },
                getPaymentName() {
                    const methods = @json($paymentMethods);
                    const found = methods.find(m => m.id === this.form.payment);
                    return found ? found.name : '';
                },
                submitForm() {
                    if (this.form.first && this.form.last && this.form.email && this.form.course && this.form.payment) {
                        this.submitted = true;
                    }
                }
            }
        }
    </script>
@endsection
