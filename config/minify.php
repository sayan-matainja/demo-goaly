<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Enable Minification
    |--------------------------------------------------------------------------
    | Set this to true to enable HTML, CSS, and JS minification.
    | You can also control it via the .env file with MINIFY_ENABLE=true.
    */
    'enable' => env('MINIFY_ENABLED', true),

    /*
    |--------------------------------------------------------------------------
    | Ignore Routes
    |--------------------------------------------------------------------------
    | Add route URIs that you don't want to be minified.
    */
    'ignore' => [
        // example: 'api/*', 'admin/*'
    ],

    /*
    |--------------------------------------------------------------------------
    | Minify Inline CSS and JS
    |--------------------------------------------------------------------------
    | If true, minifies inline <style> and <script> blocks in HTML.
    */
    'minify_inline' => true,

    /*
    |--------------------------------------------------------------------------
    | Remove Comments
    |--------------------------------------------------------------------------
    | If true, removes HTML comments.
    */
    'remove_comments' => true,
];
