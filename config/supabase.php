<?php

return [
    'url' => env('SUPABASE_URL'),
    'key' => env('SUPABASE_KEY'),
    'storage' => [
        'bucket' => 'Stories',
        'public_base_url' => env('SUPABASE_URL') . '/storage/v1/object/public/Stories/',
    ],
];