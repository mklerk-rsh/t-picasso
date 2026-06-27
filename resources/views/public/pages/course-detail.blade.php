@extends('public.layout')

@section('title', $course['title'] ?? 'Course Details')

@push('head')
<meta name="description" content="{{ $course['short_description'] ?? 'Course details at Picha Picasso University' }}">
@endpush

@section('content')

@php
    $course = $course ?? [
        'title' => 'Advanced Machine Learning & AI',
        'category' => 'Computer Science',
        'teacher' => [
            'name' => 'Dr. Alan Turing',
            'initials' => 'A.T.',
            'title' => 'Professor of Computer Science',
            'bio' => 'Dr. Alan Turing is a pioneer of theoretical computer science and artificial intelligence. With over 30 years of experience, he leads cutting-edge research in machine learning and computational theory.',
            'rating' => 4.9,
        ],
        'rating' => 4.8,
        'reviews_count' => 256,
        'students' => 1800,
        'duration' => '16 weeks',
        'last_updated' => 'March 2026',
        'level' => 'Advanced',
        'price' => 299,
        'original_price' => 399,
        'short_description' => 'Master advanced machine learning techniques including deep learning, neural networks, reinforcement learning, and natural language processing.',
        'description' => 'This comprehensive advanced course delves deep into the theoretical foundations and practical applications of machine learning and artificial intelligence. Designed for experienced programmers and data scientists, the curriculum covers state-of-the-art techniques including deep neural networks, convolutional networks, recurrent architectures, transformers, reinforcement learning, generative adversarial networks, and large language models. Students will work on real-world projects using industry-standard tools and frameworks, gaining hands-on experience with model deployment, optimization, and scaling. By the end of this course, you will have the skills to design, implement, and deploy sophisticated AI systems that solve complex problems.',
        'learning_points' => [
            'Build and train deep neural networks using TensorFlow and PyTorch',
            'Master convolutional and recurrent neural network architectures',
            'Implement reinforcement learning algorithms for game playing and robotics',
            'Understand attention mechanisms and transformer architectures',
            'Deploy machine learning models to production environments',
            'Design and optimize large language model applications',
        ],
        'requirements' => [
            'Proficiency in Python programming',
            'Understanding of basic machine learning concepts',
            'Familiarity with linear algebra and calculus',
            'Experience with data analysis and NumPy',
            'A computer with at least 8GB RAM and a modern GPU recommended',
        ],
        'target_audience' => [
            'Data scientists looking to advance their ML skills',
            'Software engineers transitioning into AI/ML roles',
            'Researchers interested in deep learning techniques',
            'Graduate students in computer science or related fields',
        ],
        'curriculum' => [
            ['module' => 'Module 1: Deep Learning Foundations', 'topics' => ['Neural Network Architecture & Design', 'Backpropagation & Gradient Descent', 'Regularization & Dropout Techniques', 'Advanced Optimization Algorithms', 'Transfer Learning & Fine-tuning']],
            ['module' => 'Module 2: Advanced Neural Architectures', 'topics' => ['Convolutional Neural Networks (CNNs)', 'Recurrent Neural Networks (RNNs) & LSTMs', 'Attention Mechanisms & Transformers', 'Generative Adversarial Networks (GANs)', 'Autoencoders & Variational Methods']],
            ['module' => 'Module 3: Reinforcement Learning & Decision Making', 'topics' => ['Markov Decision Processes (MDPs)', 'Q-Learning & Deep Q-Networks', 'Policy Gradient Methods', 'Monte Carlo Tree Search', 'Multi-agent Reinforcement Learning']],
            ['module' => 'Module 4: Production ML & Ethics', 'topics' => ['Model Deployment & Serving (TensorFlow Serving, TorchServe)', 'MLOps & Continuous Training Pipelines', 'Model Interpretability & Explainable AI', 'Fairness, Accountability & Ethics in AI', 'Capstone Project: End-to-end ML System']],
        ],
        'reviews' => [
            ['name' => 'Michael Chen', 'initials' => 'M.C.', 'rating' => 5, 'date' => 'March 2026', 'text' => 'This course completely transformed my understanding of deep learning. The hands-on projects and real-world applications were incredibly valuable. Dr. Turing is a phenomenal instructor.'],
            ['name' => 'Priya Sharma', 'initials' => 'P.S.', 'rating' => 5, 'date' => 'February 2026', 'text' => 'By far the most comprehensive ML course I have taken. The curriculum is well-structured and the pace is perfect for advanced learners. Highly recommended for anyone serious about AI.'],
            ['name' => 'Alex Rodriguez', 'initials' => 'A.R.', 'rating' => 4, 'date' => 'January 2026', 'text' => 'Challenging but incredibly rewarding. The transformer section alone was worth the price. Would love to see more on reinforcement learning in future iterations.'],
        ],
        'faqs' => [
            ['q' => 'What background do I need for this course?', 'a' => 'You should have solid Python programming skills and a basic understanding of machine learning concepts. Familiarity with linear algebra, calculus, and probability theory is strongly recommended.'],
            ['q' => 'Will I get a certificate upon completion?', 'a' => 'Yes, you will receive a verified certificate from Picha Picasso University that you can share on LinkedIn and your resume. The certificate confirms you have successfully completed all coursework and projects.'],
            ['q' => 'How long do I have access to the course materials?', 'a' => 'You get lifetime access to all course materials, including future updates. You can learn at your own pace and revisit any module whenever you need.'],
            ['q' => 'Is there a money-back guarantee?', 'a' => 'Absolutely. We offer a 30-day money-back guarantee if you are not satisfied with the course. No questions asked.'],
        ],
        'related_courses' => [
            ['title' => 'Introduction to Computer Science', 'teacher' => 'Dr. Alan Turing', 'rating' => 4.9, 'price' => 149, 'duration' => '12 weeks', 'level' => 'Beginner', 'image_gradient' => 'from-blue-600 to-indigo-600'],
            ['title' => 'Data Structures & Algorithms', 'teacher' => 'Prof. Grace Hopper', 'rating' => 4.7, 'price' => 199, 'duration' => '14 weeks', 'level' => 'Intermediate', 'image_gradient' => 'from-teal-500 to-cyan-600'],
            ['title' => 'Creative Coding & Generative Art', 'teacher' => 'Prof. Grace Hopper', 'rating' => 4.6, 'price' => 179, 'duration' => '12 weeks', 'level' => 'Intermediate', 'image_gradient' => 'from-indigo-500 to-purple-600'],
        ],
    ];
@endphp

<section class="gradient-bg relative overflow-hidden min-h-[60vh] flex items-center">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 w-72 h-72 bg-white rounded-full blur-3xl floating"></div>
        <div class="absolute bottom-10 right-10 w-56 h-56 bg-white rounded-full blur-3xl floating-delay-2"></div>
    </div>
    <div class="container-custom relative z-10 pt-32 pb-20">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-center" data-gsap="fade-up">
            <div class="lg:col-span-2">
                <div class="flex items-center gap-3 mb-4">
                    <span class="px-3 py-1 text-xs font-semibold text-white bg-white/20 rounded-lg backdrop-blur-md border border-white/20">{{ $course['category'] }}</span>
                    <span class="px-3 py-1 text-xs font-semibold rounded-lg
                        @if($course['level'] === 'Beginner') bg-green-100 text-green-700
                        @elseif($course['level'] === 'Intermediate') bg-yellow-100 text-yellow-700
                        @else bg-red-100 text-red-700 @endif">{{ $course['level'] }}</span>
                </div>
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4 leading-tight">{{ $course['title'] }}</h1>
                <p class="text-lg text-white/70 mb-6 max-w-2xl">{{ $course['short_description'] }}</p>
                <div class="flex flex-wrap items-center gap-6 text-sm">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-university-300 to-accent-400 flex items-center justify-center text-white font-bold text-sm shadow-lg">{{ $course['teacher']['initials'] }}</div>
                        <div>
                            <p class="text-white font-medium">{{ $course['teacher']['name'] }}</p>
                            <p class="text-white/60 text-xs">{{ $course['teacher']['title'] }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 text-white/80">
                        <div class="flex items-center">
                            @for ($i = 1; $i <= 5; $i++)
                                <svg class="w-4 h-4 {{ $i <= round($course['rating']) ? 'text-yellow-400' : 'text-white/20' }}" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            @endfor
                        </div>
                        <span>{{ $course['rating'] }}</span>
                        <span class="text-white/50">({{ $course['reviews_count'] }} reviews)</span>
                    </div>
                </div>
                <div class="flex flex-wrap items-center gap-6 mt-6 text-sm text-white/60">
                    <span class="flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                        {{ number_format($course['students']) }} students
                    </span>
                    <span class="flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $course['duration'] }}
                    </span>
                    <span class="flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                        </svg>
                        Updated {{ $course['last_updated'] }}
                    </span>
                </div>
            </div>
            <div class="lg:col-span-1">
                <div class="glass-dark rounded-2xl p-8 text-center">
                    <div class="mb-4">
                        <span class="text-4xl font-bold text-white">${{ $course['price'] }}</span>
                        @if(isset($course['original_price']))
                            <span class="text-lg text-white/50 line-through ml-2">${{ $course['original_price'] }}</span>
                            <span class="block text-sm text-green-400 mt-1">Save ${{ $course['original_price'] - $course['price'] }}!</span>
                        @endif
                    </div>
                    <a href="/enroll" class="btn-primary w-full mb-3">
                        Enroll Now
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                    <p class="text-xs text-white/50">30-day money-back guarantee</p>
                    <div class="mt-6 pt-6 border-t border-white/10 space-y-3 text-left">
                        <div class="flex items-center gap-2 text-sm text-white/70">
                            <svg class="w-4 h-4 text-green-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Lifetime access
                        </div>
                        <div class="flex items-center gap-2 text-sm text-white/70">
                            <svg class="w-4 h-4 text-green-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Certificate of completion
                        </div>
                        <div class="flex items-center gap-2 text-sm text-white/70">
                            <svg class="w-4 h-4 text-green-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Downloadable resources
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding gradient-bg-subtle">
    <div class="container-custom">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <div class="lg:col-span-2 space-y-12">

                <div id="description" data-gsap="fade-up">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Course Description</h2>
                    <div class="prose prose-gray max-w-none">
                        <p class="text-gray-600 leading-relaxed">{{ $course['description'] }}</p>
                    </div>
                </div>

                <div id="what-you-learn" data-gsap="fade-up">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">What You'll Learn</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        @foreach ($course['learning_points'] as $point)
                            <div class="flex items-start gap-3 p-4 rounded-xl bg-white border border-gray-100 hover:border-university-200 hover:shadow-md transition-all">
                                <svg class="w-5 h-5 text-green-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="text-sm text-gray-700">{{ $point }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div id="requirements" data-gsap="fade-up">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Requirements</h2>
                    <ul class="space-y-3">
                        @foreach ($course['requirements'] as $req)
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-university-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="text-gray-600 text-sm">{{ $req }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div id="target-audience" data-gsap="fade-up">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Target Audience</h2>
                    <ul class="space-y-3">
                        @foreach ($course['target_audience'] as $audience)
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-university-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                                <span class="text-gray-600 text-sm">{{ $audience }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div id="curriculum" x-data="{ openModule: null }" data-gsap="fade-up">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Course Curriculum</h2>
                    <div class="space-y-3">
                        @foreach ($course['curriculum'] as $moduleIndex => $module)
                            <div class="card overflow-hidden hover:shadow-xl">
                                <button @click="openModule = openModule === {{ $moduleIndex }} ? null : {{ $moduleIndex }}"
                                        class="w-full flex items-center justify-between p-5 text-left transition-colors hover:bg-gray-50">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-xl bg-university-100 text-university-600 flex items-center justify-center font-bold text-sm">{{ $moduleIndex + 1 }}</div>
                                        <div>
                                            <h3 class="font-semibold text-gray-900">{{ $module['module'] }}</h3>
                                            <p class="text-xs text-gray-400">{{ count($module['topics']) }} topics</p>
                                        </div>
                                    </div>
                                    <svg x-bind:class="openModule === {{ $moduleIndex }} ? 'rotate-180' : ''" class="w-5 h-5 text-gray-400 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </button>
                                <div x-show="openModule === {{ $moduleIndex }}"
                                     x-cloak
                                     x-transition:enter="transition ease-out duration-200"
                                     x-transition:enter-start="opacity-0 max-h-0"
                                     x-transition:enter-end="opacity-100 max-h-96"
                                     x-transition:leave="transition ease-in duration-150"
                                     x-transition:leave-start="opacity-100 max-h-96"
                                     x-transition:leave-end="opacity-0 max-h-0"
                                     class="overflow-hidden">
                                    <div class="px-5 pb-5 pt-2 border-t border-gray-100">
                                        <ul class="space-y-2">
                                            @foreach ($module['topics'] as $topic)
                                                <li class="flex items-center gap-3 text-sm text-gray-600">
                                                    <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                                    </svg>
                                                    {{ $topic }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div id="teacher" data-gsap="fade-up">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Your Instructor</h2>
                    <div class="card p-8 hover:shadow-xl">
                        <div class="flex flex-col sm:flex-row items-start gap-6">
                            <div class="w-24 h-24 rounded-full bg-gradient-to-br from-university-500 to-accent-500 flex items-center justify-center text-white text-2xl font-bold shrink-0 shadow-lg">{{ $course['teacher']['initials'] }}</div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-gray-900 mb-1">{{ $course['teacher']['name'] }}</h3>
                                <p class="text-sm text-university-600 font-medium mb-3">{{ $course['teacher']['title'] }}</p>
                                <p class="text-gray-600 text-sm leading-relaxed mb-4">{{ $course['teacher']['bio'] }}</p>
                                <div class="flex items-center gap-3">
                                    <div class="flex items-center">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <svg class="w-4 h-4 {{ $i <= round($course['teacher']['rating']) ? 'text-yellow-400' : 'text-gray-200' }}" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                        @endfor
                                    </div>
                                    <span class="text-sm text-gray-500">{{ $course['teacher']['rating'] }} instructor rating</span>
                                </div>
                                <a href="#" class="inline-flex items-center gap-1 mt-4 text-sm font-semibold text-university-600 hover:text-university-700 transition-colors">
                                    View Full Profile
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="reviews" data-gsap="fade-up">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Student Reviews</h2>
                    <div class="space-y-6">
                        @foreach ($course['reviews'] as $review)
                            <div class="card p-6 hover:shadow-xl">
                                <div class="flex items-center gap-4 mb-4">
                                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-university-400 to-accent-400 flex items-center justify-center text-white font-semibold text-sm">{{ $review['initials'] }}</div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900">{{ $review['name'] }}</h4>
                                        <div class="flex items-center gap-2">
                                            <div class="flex items-center">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <svg class="w-4 h-4 {{ $i <= $review['rating'] ? 'text-yellow-400' : 'text-gray-200' }}" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                    </svg>
                                                @endfor
                                            </div>
                                            <span class="text-xs text-gray-400">{{ $review['date'] }}</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-600 text-sm leading-relaxed">{{ $review['text'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div id="faq" x-data="{ openFaq: null }" data-gsap="fade-up">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Frequently Asked Questions</h2>
                    <div class="space-y-3">
                        @foreach ($course['faqs'] as $faqIndex => $faq)
                            <div class="card overflow-hidden hover:shadow-xl">
                                <button @click="openFaq = openFaq === {{ $faqIndex }} ? null : {{ $faqIndex }}"
                                        class="w-full flex items-center justify-between p-5 text-left transition-colors hover:bg-gray-50">
                                    <span class="font-medium text-gray-900 text-sm pr-4">{{ $faq['q'] }}</span>
                                    <svg x-bind:class="openFaq === {{ $faqIndex }} ? 'rotate-180' : ''" class="w-5 h-5 text-gray-400 shrink-0 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </button>
                                <div x-show="openFaq === {{ $faqIndex }}"
                                     x-cloak
                                     x-transition:enter="transition ease-out duration-200"
                                     x-transition:enter-start="opacity-0 max-h-0"
                                     x-transition:enter-end="opacity-100 max-h-96"
                                     x-transition:leave="transition ease-in duration-150"
                                     x-transition:leave-start="opacity-100 max-h-96"
                                     x-transition:leave-end="opacity-0 max-h-0"
                                     class="overflow-hidden">
                                    <div class="px-5 pb-5 pt-2 border-t border-gray-100">
                                        <p class="text-sm text-gray-600 leading-relaxed">{{ $faq['a'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="sticky top-28 space-y-6">
                    <div class="card p-6" x-data="{ openModule: null }">
                        <h3 class="font-semibold text-gray-900 mb-4">Course Includes</h3>
                        <ul class="space-y-3 text-sm">
                            <li class="flex items-center gap-3 text-gray-600">
                                <svg class="w-5 h-5 text-university-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ $course['duration'] }} of video content
                            </li>
                            <li class="flex items-center gap-3 text-gray-600">
                                <svg class="w-5 h-5 text-university-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ count($course['curriculum']) }} modules
                            </li>
                            <li class="flex items-center gap-3 text-gray-600">
                                <svg class="w-5 h-5 text-university-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                </svg>
                                {{ count($course['learning_points']) }} downloadable resources
                            </li>
                            <li class="flex items-center gap-3 text-gray-600">
                                <svg class="w-5 h-5 text-university-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                                Certificate of completion
                            </li>
                            <li class="flex items-center gap-3 text-gray-600">
                                <svg class="w-5 h-5 text-university-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Lifetime access
                            </li>
                            <li class="flex items-center gap-3 text-gray-600">
                                <svg class="w-5 h-5 text-university-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Access on mobile & TV
                            </li>
                        </ul>
                        <a href="/enroll" class="btn-primary w-full mt-6">
                            Enroll Now - ${{ $course['price'] }}
                        </a>
                    </div>

                    <div class="card p-6">
                        <h3 class="font-semibold text-gray-900 mb-4">Share This Course</h3>
                        <div class="flex gap-2">
                            <a href="#" class="flex items-center justify-center w-10 h-10 rounded-xl bg-blue-100 text-blue-600 hover:bg-blue-600 hover:text-white transition-all">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            </a>
                            <a href="#" class="flex items-center justify-center w-10 h-10 rounded-xl bg-sky-100 text-sky-600 hover:bg-sky-600 hover:text-white transition-all">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            </a>
                            <a href="#" class="flex items-center justify-center w-10 h-10 rounded-xl bg-blue-100 text-blue-700 hover:bg-blue-700 hover:text-white transition-all">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                            </a>
                            <a href="#" class="flex items-center justify-center w-10 h-10 rounded-xl bg-gray-100 text-gray-600 hover:bg-gray-600 hover:text-white transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding bg-white">
    <div class="container-custom" data-gsap="fade-up">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-10 text-center">Related Courses</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach ($course['related_courses'] as $rc)
                <div class="card group overflow-hidden hover:shadow-2xl">
                    <div class="h-40 bg-gradient-to-br {{ $rc['image_gradient'] }} flex items-center justify-center group-hover:scale-105 transition-transform duration-500">
                        <svg class="w-14 h-14 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <div class="p-5">
                        <h3 class="font-semibold text-gray-900 mb-1 group-hover:text-university-600 transition-colors">{{ $rc['title'] }}</h3>
                        <p class="text-xs text-gray-500 mb-2">by {{ $rc['teacher'] }}</p>
                        <div class="flex items-center gap-1 mb-2">
                            @for ($i = 1; $i <= 5; $i++)
                                <svg class="w-3.5 h-3.5 {{ $i <= round($rc['rating']) ? 'text-yellow-400' : 'text-gray-200' }}" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            @endfor
                            <span class="text-xs text-gray-400 ml-1">{{ $rc['rating'] }}</span>
                        </div>
                        <div class="flex items-center justify-between pt-2 border-t border-gray-100">
                            <span class="text-xs text-gray-500 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ $rc['duration'] }}
                            </span>
                            <span class="font-bold text-sm gradient-text">${{ $rc['price'] }}</span>
                        </div>
                    </div>
                    <a href="#" class="block w-full text-center py-2.5 text-xs font-semibold text-university-600 bg-university-50 hover:bg-university-600 hover:text-white transition-all duration-200 rounded-b-2xl">
                        View Details
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section-padding gradient-bg">
    <div class="container-custom text-center" data-gsap="fade-up">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Start Learning Today</h2>
        <p class="text-lg text-white/70 max-w-2xl mx-auto mb-8">Join {{ number_format($course['students']) }}+ students already enrolled in this course and take the next step in your career.</p>
        <a href="/enroll" class="btn-white">
            Enroll Now - ${{ $course['price'] }}
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
        </a>
    </div>
</section>

@endsection
