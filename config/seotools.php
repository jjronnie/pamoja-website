
<?php
return [
    'meta' => [
        'defaults' => [
            'title' => 'Pamoja Chambers - Professional Debt Collection & Legal Services',
            'titleBefore' => false,
            'description' => 'Leading debt collection, court bailiffs, property sales, and legal consultancy services in Uganda. Professional, ethical, and results-driven.',
            'separator' => ' | ',
            'keywords' => ['debt collection Uganda', 'court bailiffs', 'property sales', 'legal consultants', 'auctioneering Kampala'],
            'canonical' => null,
            'robots' => 'index,follow',
        ],
        'webmaster_tags' => [
            'google' => null, // Add Google Search Console verification
            'bing' => null,   // Add Bing Webmaster verification
            'alexa' => null,
            'pinterest' => null,
            'yandex' => null,
            'norton' => null,
        ],
        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        'defaults' => [
            'title' => 'Pamoja Chambers - Professional Legal Services',
            'description' => 'Leading debt collection and legal services in Uganda',
            'url' => null,
            'type' => 'website',
            'site_name' => 'Pamoja Chambers',
            'images' => ['/assets/img/scale1.webp'], 
        ],
    ],
    'twitter' => [
        'defaults' => [
            'card' => 'summary_large_image',
            'site' => '@pamojachambers', 
        ],
    ],
    'json-ld' => [
        'defaults' => [
            'title' => 'Pamoja Chambers',
            'description' => 'Professional Legal Services in Uganda',
            'type' => 'Organization',
        ],
    ],
];