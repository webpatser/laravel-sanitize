# Laravel Sanitize [![Build Status](https://travis-ci.org/webpatser/laravel-sanitize.png?branch=master)](https://travis-ci.org/webpatser/laravel-sanitize)
Laravel package to sanitize a string for use in URL's

## Installation

Add `webpatser/laravel-sanitize` to `composer.json`.

    "webpatser/laravel-sanitize": "dev-master"
    
Run `composer update` to get the latest version of Sanitize.

Edit `app/config/app.php` and add the `alias`

    'aliases' => array(
        'Sanitize' => 'Webpatser\Sanitize\Sanitize',
    )

## Usage

    Sanitize::string('Sanitize me please!'); // sanitize-me-please

## Notes

It uses the PHP Normalizer class and does some extra magic, and wraps it in the Laravel 4 grand scheme of things.