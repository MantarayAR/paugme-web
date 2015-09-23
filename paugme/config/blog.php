<?php

return [
    'posts_per_page' => env('BLOG_POSTS_PER_PAGE', 5),
    'short_summary_length' => env('BLOG_SHORT_SUMMARY_LENGTH', 150),
    'title' => env('BLOG_TITLE', 'Paugme Blog'),
    'subtitle' => env('BLOG_SUBTITLE', null),
    'description' => env('BLOG_DESCRIPTION', 'Paugme News and Updates'),
    'author' => env('BLOG_AUTHOR', 'Ivan Montiel'),
    'page_image' => env('BLOG_PAGE_IMAGE', null),
    'uploads' => [
        'storage' => env('BLOG_UPLOADS_STORAGE', 'local'),
        'webpath' => env('BLOG_UPLOADS_PATH', '/uploads'),
    ]
];