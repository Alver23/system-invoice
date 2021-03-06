<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => SystemInvoices\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'github' => [
        'client_id' => env('CLIENT_GITHUB_ID'),
        'client_secret' => env('CLIENT_GITHUB_SECRET'),
        'redirect' => env('REDIRECT_GITHUB'),
    ],

    'facebook' => [
        'client_id' => env('CLIENT_FACEBOOK_ID'),
        'client_secret' => env('CLIENT_FACEBOOK_SECRET'),
        'redirect' => env('REDIRECT_FACEBOOK'),
    ],

    'twitter' => [
        'client_id' => env('CLIENT_TWITTER_ID'),
        'client_secret' => env('CLIENT_TWITTER_SECRET'),
        'redirect' => env('REDIRECT_TWITTER'),
    ],

];
