# secret001-test

Solution to [secret001-test](challenge.md).

## Dependencies

Same as [Laravel 5.6](https://laravel.com/docs/5.6/installation#server-requirements):

- PHP >= 7.1.3
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- [Composer](https://getcomposer.org/)

## Installation

1. Clone this repository `git clone git@github.com:willystadnick/secret001-test.git`
1. Enter the project folder `cd secret001-test`
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
