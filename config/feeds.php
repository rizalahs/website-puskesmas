<?php

return [

    'feeds' => [
        // bisa dikosongkan atau ditambah feed default
    ],

    'cache' => [
        'disabled' => false, // ✅ WAJIB ADA
        'location' => storage_path('framework/cache'), // ✅ WAJIB ADA
        'duration' => 3600, // ✅ WAJIB ADA
    ],

];
