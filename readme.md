# Laravel Sanitize
Laravel package to sanitize a string for use in URL's

## Installation

Add `webpatser/laravel-sanitize` to `composer.json`.

    "webpatser/laravel-sanitize": "dev-master"
    
Run `composer update` to get the latest version of Sanitize.

Edit `app/config/app.php` and add the `alias`

    'aliases' => array(
        'Sanitize' => 'Webpatser\Sanitize\Sanitize',
    )


## Notes

It uses mostly functions from the Wordpress repository. Sligthly altered to better fit the Laravel 4 grand scheme of things.