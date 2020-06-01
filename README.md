# Unlimited Categories

## Installation

### Check The Server Requirements below and make sure all required PHP extensions are intalled and enabled then:

1. Just `composer install`
2. Copy `env` to `.env`
3. Edit DB config in the `.env` or leave the default `sqlite` DB config
4. Run `php spark migrate`
5. Run `php spark db:seed` then enter `SimpleSeeder`

## Run Application
run `php spark serve`

## Server Requirements

PHP version 7.2 or higher is required, with the following extensions installed: 

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
- sqlite - if you use the default DB config (env)

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)
- sqlite - if you use the default DB config (env)
