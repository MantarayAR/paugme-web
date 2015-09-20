<?php

return [
  'title'                => env( 'BLOG_TITLE', 'Paugme Blog' ),
  'posts_per_page'       => env( 'BLOG_POSTS_PER_PAGE', 5 ),
  'short_summary_length' => env( 'BLOG_SHORT_SUMMARY_LENGTH', 150 ),
  'uploads'              => [
    'storage' => env('BLOG_UPLOADS_STORAGE', 'local'),
    'webpath' => env('BLOG_UPLOADS_PATH', '/uploads'),
  ]
];