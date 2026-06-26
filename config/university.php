<?php

return [
    'name' => 'Picha Picasso University',
    'website' => env('UNIVERSITY_WEBSITE', 'https://pichapicasso.edu'),

    'exam' => [
        'thresholds' => [
            'exam_1' => 30,
            'exam_2' => 60,
            'exam_3' => 90,
            'final_graduation' => 100,
        ],
        'default_pass_percentage' => 50,
        'auto_grade_types' => ['multiple_choice', 'true_false'],
    ],

    'certificate' => [
        'prefix' => 'PPU',
        'verification_url' => env('APP_URL') . '/certificates/verify',
        'templates' => ['default' => 'Default Template'],
    ],

    'payment' => [
        'currency' => 'USD',
        'methods' => ['bank_transfer', 'mobile_money', 'credit_card'],
        'auto_verify' => false,
    ],

    'media' => [
        'max_avatar_size' => 2048,
        'max_certificate_size' => 5120,
        'allowed_mime_types' => ['image/jpeg', 'image/png', 'image/webp', 'application/pdf'],
    ],

    'analytics' => [
        'cache_ttl' => 3600,
        'aggregation_schedule' => 'daily',
    ],
];
