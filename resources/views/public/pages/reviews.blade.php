@extends('public.layout')

@section('title', 'Reviews | Picha Picasso University')

@section('content')
    @php
        $ratingDistribution = [
            ['stars' => 5, 'percentage' => 75, 'count' => 1125],
            ['stars' => 4, 'percentage' => 15, 'count' => 225],
            ['stars' => 3, 'percentage' => 7, 'count' => 105],
            ['stars' => 2, 'percentage' => 2, 'count' => 30],
            ['stars' => 1, 'percentage' => 1, 'count' => 15],
        ];

        $filterTabs = [
            ['key' => 'all', 'label' => 'All Reviews'],
            ['key' => 'course', 'label' => 'Course Reviews'],
            ['key' => 'teacher', 'label' => 'Teacher Reviews'],
            ['key' => 'success', 'label' => 'Success Stories'],
        ];

        $reviews = [
            [
                'initials' => 'AK', 'name' => 'Amara Kiprop', 'course' => 'Fine Arts Program', 'date' => 'March 2026',
                'rating' => 5, 'likes' => 48,
                'text' => 'Enrolling at Picha Picasso University was the best decision I\'ve ever made for my artistic career. The Fine Arts program exceeded my expectations with its comprehensive curriculum covering both classical techniques and contemporary practices. The instructors are not just teachers but practicing artists who bring real-world experience into the classroom. The studio facilities are world-class, and the regular exhibitions give students invaluable exposure. I\'ve grown more in the past six months than I have in years of self-study. The critique sessions, while challenging, have been instrumental in helping me refine my artistic voice. I particularly appreciated the mentorship program that paired me with a professional artist who guided my capstone project. The sense of community here is unlike anything I\'ve experienced — everyone is genuinely invested in each other\'s success. If you\'re serious about pursuing art at the highest level, this is the place to be.',
                'filter' => 'course'
            ],
            [
                'initials' => 'JM', 'name' => 'James Mwangi', 'course' => 'Digital Design Course', 'date' => 'February 2026',
                'rating' => 5, 'likes' => 36,
                'text' => 'The Digital Design course completely transformed my career trajectory. Coming from a non-design background, I was nervous about keeping up, but the instructors broke down complex concepts into digestible modules. The hands-on projects were directly applicable to real-world scenarios, and by the end of the course, I had a portfolio that landed me my dream job. The curriculum is constantly updated to reflect industry trends, and we had access to the latest design tools and software. What truly set this program apart was the emphasis on design thinking and problem-solving rather than just tool proficiency. The career services team helped me refine my resume and portfolio, and the industry connections through guest lectures were invaluable. I went from knowing nothing about design to working as a UX designer at a top tech company within six months of graduating. Absolutely worth every penny.',
                'filter' => 'course'
            ],
            [
                'initials' => 'SN', 'name' => 'Sarah Nyambura', 'course' => 'Photography Masterclass', 'date' => 'January 2026',
                'rating' => 4, 'likes' => 29,
                'text' => 'Excellent photography masterclass that covers both technical and artistic aspects. The equipment provided was top-notch and the field trips to various locations gave us practical experience in different shooting conditions. The instructors were knowledgeable and always willing to provide additional feedback. My only suggestion would be to include more post-processing workshops, but overall it was a fantastic learning experience. The darkroom facilities are well-maintained and the digital lab has the latest Adobe Creative Cloud suite. I especially enjoyed the guest sessions with professional photographers who shared their portfolio-building strategies. The final exhibition was a great way to showcase our work to industry professionals. I\'ve already recommended this course to several friends who are interested in photography.',
                'filter' => 'course'
            ],
            [
                'initials' => 'DM', 'name' => 'David Mwangi', 'course' => 'Prof. Sarah Mitchell — Advanced Design', 'date' => 'March 2026',
                'rating' => 5, 'likes' => 52,
                'text' => 'Prof. Sarah Mitchell is an absolute gem of an educator. Her Advanced Design course was rigorous, inspiring, and incredibly rewarding. She has a unique ability to identify each student\'s strengths and areas for growth, providing personalized guidance that pushed me beyond what I thought I was capable of. Her feedback on projects is always constructive and detailed, and she goes above and beyond to ensure every student grasps the concepts. She brings in real client briefs and walks us through her professional workflow, which demystifies the design process. The way she connects design theory to practical application is masterful. Beyond the curriculum, she genuinely cares about her students\' success and well-being. She writes recommendation letters, connects students with industry contacts, and celebrates every achievement. She\'s the kind of teacher who changes the course of your life, and I\'m eternally grateful to have been her student.',
                'filter' => 'teacher'
            ],
            [
                'initials' => 'GW', 'name' => 'Grace Wanjiku', 'course' => 'Dr. James Okonkwo — Programming Fundamentals', 'date' => 'February 2026',
                'rating' => 4, 'likes' => 31,
                'text' => 'Dr. Okonkwo has a gift for making programming accessible and even enjoyable for beginners. His patience and clarity in explaining complex concepts like recursion and data structures is remarkable. He uses real-world analogies that make abstract concepts concrete and memorable. The weekly coding challenges were challenging but fair, and his code reviews were thorough and educational. He emphasizes clean code practices and industry standards from day one, which has been invaluable in my internships. My only feedback would be to include more advanced topics toward the end of the course, but I understand the constraints of an introductory program. The Slack community he maintains is incredibly active and supportive, with former students often dropping in to answer questions. He genuinely cares about his students\' progress and stays after class to help anyone struggling. I went from never having written a line of code to building my own web application by the end of the semester.',
                'filter' => 'teacher'
            ],
            [
                'initials' => 'KO', 'name' => 'Kevin Ochieng', 'course' => 'Graphic Design', 'date' => 'January 2026',
                'rating' => 5, 'likes' => 43,
                'text' => 'I joined Picha Picasso University with a passion for art but no clear direction. The Graphic Design program gave me structure, skills, and a clear career path. Within three months of graduating, I landed a position at a leading creative agency, and I credit the university\'s holistic approach to design education. The curriculum covers everything from typography and color theory to UX research and brand strategy. The faculty are practicing designers who bring current industry perspectives into the classroom. The collaborative projects taught me how to work in a team environment, present my work confidently, and receive and implement feedback professionally. The portfolio review sessions with industry professionals were nerve-wracking but incredibly helpful. The career placement office worked tirelessly to connect me with potential employers. I\'m now earning a stable income doing what I love, and I couldn\'t be more grateful for the foundation this university provided.',
                'filter' => 'success'
            ],
        ];

        $successStories = [
            [
                'name' => 'Amina Hassan', 'graduated' => '2025', 'position' => 'Senior UX Designer at Google',
                'image' => 'AH',
                'story' => 'From a small-town artist to designing products used by millions at Google — my journey started in a Picha Picasso classroom. The Digital Design program gave me the technical skills, but more importantly, it taught me how to think like a designer. The mentorship I received was transformative, and the career services team helped me navigate interviews at top tech companies. I still look back at my capstone project as the foundation of my professional portfolio. Picha Picasso didn\'t just teach me design; it taught me how to turn my passion into a purpose-driven career that makes an impact every single day.'
            ],
            [
                'name' => 'Carlos Mendez', 'graduated' => '2024', 'position' => 'Founder & Creative Director at Artistry Studio',
                'image' => 'CM',
                'story' => 'I came to Picha Picasso with a dream of starting my own creative studio and left with everything I needed to make it happen. The entrepreneurship-focused curriculum, combined with world-class art education, gave me a unique edge. The faculty encouraged me to take risks and think beyond traditional career paths. My final project became the blueprint for my business, and several of my classmates became my first clients and collaborators. Today, Artistry Studio employs 15 people and works with clients across four continents. The confidence and skills I gained at this university were the catalysts for everything I\'ve built. Picha Picasso is more than a school — it\'s a launchpad for creative entrepreneurs.'
            ],
            [
                'name' => 'Priya Patel', 'graduated' => '2025', 'position' => 'Art Director at Vogue',
                'image' => 'PP',
                'story' => 'Working at Vogue was a dream I barely dared to voice, but Picha Picasso made it my reality. The Photography and Visual Arts program pushed me to develop a distinctive visual language that sets my work apart. The faculty\'s industry connections opened doors I never could have accessed on my own. The highlight was the New York exhibition where my photo series caught the attention of Vogue\'s creative team. The rigorous critique process at the university taught me to handle pressure with grace and to see feedback as a gift. I carry the lessons from Picha Picasso into every photoshoot and editorial meeting. This university doesn\'t just prepare you for a career — it prepares you to make your mark on the world.'
            ],
        ];
    @endphp

    <div class="min-h-screen pt-20">
        <section class="gradient-bg relative overflow-hidden py-20 lg:py-28">
            <div class="absolute inset-0">
                <div class="absolute top-20 right-20 w-80 h-80 bg-white/5 rounded-full blur-3xl"></div>
                <div class="absolute bottom-10 left-10 w-64 h-64 bg-white/5 rounded-full blur-3xl"></div>
            </div>
            <div class="container-custom relative">
                <div class="max-w-2xl" data-gsap="fade-up">
                    <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 text-white/80 text-sm font-medium mb-6 border border-white/10">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                        Testimonials
                    </span>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight">Student <span class="text-white/80">Reviews</span></h1>
                    <p class="text-lg text-white/70 mt-4 max-w-lg leading-relaxed">Hear from our community of learners, creators, and success stories.</p>
                </div>
            </div>
        </section>

        <div class="container-custom -mt-10 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12" data-gsap="stagger">
                <div class="lg:col-span-2 card p-8">
                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-6">
                        <div class="text-center">
                            <span class="text-6xl font-bold gradient-text">4.8</span>
                            <div class="flex items-center justify-center gap-0.5 mt-2">
                                @for ($i = 1; $i <= 5; $i++)
                                <svg class="w-5 h-5 {{ $i <= 4 ? 'text-amber-400' : 'text-amber-200' }}" fill="currentColor" viewBox="0 0 24 24"><path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                                @endfor
                            </div>
                            <p class="text-sm text-gray-500 mt-1">Based on <strong class="text-gray-900">{{ number_format(1500) }}</strong> reviews</p>
                        </div>
                        <div class="flex-1 w-full space-y-2">
                            @foreach ($ratingDistribution as $dist)
                            <div class="flex items-center gap-3">
                                <span class="text-sm font-medium text-gray-600 w-12 shrink-0">{{ $dist['stars'] }} Star</span>
                                <div class="flex-1 h-3 bg-gray-100 rounded-full overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-amber-400 to-amber-500 rounded-full transition-all duration-1000"
                                         style="width: {{ $dist['percentage'] }}%"></div>
                                </div>
                                <span class="text-xs text-gray-500 w-16 text-right">{{ $dist['percentage'] }}%</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card p-6 flex flex-col items-center justify-center text-center">
                    <div class="w-16 h-16 rounded-full gradient-bg flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/></svg>
                    </div>
                    <h3 class="text-base font-semibold text-gray-900">Share Your Experience</h3>
                    <p class="text-sm text-gray-500 mt-1">Your feedback helps others make informed decisions.</p>
                    <button class="btn-primary !px-6 !py-2.5 text-sm mt-4">
                        Write a Review
                    </button>
                </div>
            </div>

            <div x-data="{ filter: 'all' }">
                <div class="flex flex-wrap items-center gap-2 mb-8" data-gsap="fade-up">
                    @foreach ($filterTabs as $tab)
                    <button @click="filter = '{{ $tab['key'] }}'"
                            class="px-5 py-2.5 rounded-xl text-sm font-medium transition-all duration-300 border"
                            :class="filter === '{{ $tab['key'] }}'
                                ? 'bg-university-600 text-white border-university-600 shadow-lg shadow-university-500/20'
                                : 'bg-white text-gray-600 border-gray-200 hover:border-university-300 hover:text-university-600'">
                        {{ $tab['label'] }}
                    </button>
                    @endforeach
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-16" data-gsap="stagger">
                    @foreach ($reviews as $review)
                    <div x-show="filter === 'all' || filter === '{{ $review['filter'] }}'"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         class="card p-6 group hover:-translate-y-1 transition-all duration-300">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 rounded-full gradient-bg-subtle flex items-center justify-center text-white text-sm font-bold shrink-0">
                                    {{ $review['initials'] }}
                                </div>
                                <div>
                                    <h4 class="text-sm font-semibold text-gray-900">{{ $review['name'] }}</h4>
                                    <p class="text-xs text-gray-500">{{ $review['course'] }}</p>
                                </div>
                            </div>
                            <span class="text-xs text-gray-400 shrink-0">{{ $review['date'] }}</span>
                        </div>

                        <div class="flex items-center gap-0.5 mb-3">
                            @for ($i = 1; $i <= 5; $i++)
                            <svg class="w-4 h-4 {{ $i <= $review['rating'] ? 'text-amber-400' : 'text-gray-200' }}" fill="currentColor" viewBox="0 0 24 24"><path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                            @endfor
                        </div>

                        <p class="text-sm text-gray-600 leading-relaxed line-clamp-5 group-hover:line-clamp-none transition-all duration-300">
                            {{ $review['text'] }}
                        </p>

                        <div class="flex items-center gap-4 mt-4 pt-4 border-t border-gray-100">
                            <button class="flex items-center gap-1.5 text-gray-400 hover:text-university-600 transition-colors text-xs">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/></svg>
                                {{ $review['likes'] }}
                            </button>
                            <button class="flex items-center gap-1.5 text-gray-400 hover:text-university-600 transition-colors text-xs">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                                Reply
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div data-gsap="fade-up" class="mb-16">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Success Stories</h2>
                        <p class="text-gray-500 mt-1">Real graduates, real achievements.</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($successStories as $story)
                    <div class="card group overflow-hidden hover:-translate-y-1 transition-all duration-300">
                        <div class="relative h-48 gradient-bg-subtle overflow-hidden">
                            <div class="absolute inset-0 flex flex-col items-center justify-center text-white">
                                <div class="w-16 h-16 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center text-2xl font-bold border-2 border-white/30">
                                    {{ $story['image'] }}
                                </div>
                                <p class="text-sm font-semibold mt-3">{{ $story['position'] }}</p>
                            </div>
                            <div class="absolute top-3 left-3">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold bg-emerald-400/20 text-emerald-100 backdrop-blur-sm border border-white/20">Class of {{ $story['graduated'] }}</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-base font-semibold text-gray-900">{{ $story['name'] }}</h3>
                            <p class="text-sm text-gray-600 mt-3 leading-relaxed line-clamp-4">{{ $story['story'] }}</p>
                            <a href="#" class="inline-flex items-center gap-1.5 text-sm font-semibold text-university-600 hover:text-university-700 mt-4 transition-colors">
                                Read Full Story
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <section class="card-gradient rounded-3xl p-10 lg:p-16 text-center mb-16" data-gsap="fade-up">
                <div class="max-w-xl mx-auto">
                    <div class="w-16 h-16 rounded-full bg-white/10 flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    </div>
                    <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">Share Your Story</h2>
                    <p class="text-white/70 mb-8">Have you taken a course or program at Picha Picasso University? We'd love to hear about your experience. Your review helps future students find their path.</p>
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                        <button class="btn-white inline-flex items-center gap-2 !px-8 !py-3.5 text-sm font-semibold">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            Write a Review
                        </button>
                        <a href="#" class="inline-flex items-center gap-2 px-8 py-3.5 text-sm font-semibold text-white border-2 border-white/20 rounded-xl hover:bg-white/10 transition-all duration-200">
                            View All Testimonials
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection
