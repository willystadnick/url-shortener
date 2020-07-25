# url-shortener

Solution to [challenge](challenge.md).

## Dependencies

Same as [Laravel 5.6](https://laravel.com/docs/5.6/installation#server-requirements):

- [PHP](https://php.net/) ^7.1
- [Composer](https://getcomposer.org/) ^1.9

## Installation

1. Clone this repository `git clone git@github.com:willystadnick/url-shortener.git`
1. Enter the project folder `cd url-shortener`
1. Install dependencies `composer install`
1. Copy environment file template `cp .env.example .env`
1. Generate application key `php artisan key:generate`
1. Edit database info on environment file `vi .env`
1. Run database migrations `php artisan migrate`
1. [Optional] Run database seeds `php artisan db:seed`
1. Serve application `php artisan serve`

## Testing

### PHPUnit

On project folder, run `phpunit` (or `vendor/bin/phpunit`).

### Postman

Use this [Postman Collecion](collection.json) to perform the requests, changing its data accordingly to your needs.

## Author

| [<img src="https://avatars2.githubusercontent.com/u/1824706?s=120&v=4" width=120><br><sub>@willystadnick</sub>](https://github.com/willystadnick) |
| :---: |
