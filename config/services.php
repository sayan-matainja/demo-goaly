<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'firebase'=>[
        'api_key' =>'AIzaSyAomKICBn4ylLWe662hZf6b93BFVES79MI',
        'auth_domain' =>'lravelpushnotif.firebaseapp.com',
        'database_url' =>'https://lravelpushnotif-default-rtdb.firebaseio.com/',
        'project_id' =>'lravelpushnotif',
        'storage_bucket' =>'lravelpushnotif.appspot.com',
        'messaging_sender_id' =>'153977875047',
        'app_id' =>'1:153977875047:web:795aeef5d2f5cfca9242c2',
        'measurement_id'=>'G-WZ15M8JMR7',

    ],



];
