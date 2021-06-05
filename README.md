# LinkedIn OAuth
## Links
 -  [Introduction](#Introduction)
 -  [Architecture](#Architecture)
 -  [Project Set Up](#Project-Set-Up)
 -  [Run Tests](#Run-Tests)

## Introduction
The project is a simple implementation of LinkedIn authentication.

We as a user have the opportunity to:
- Log in via LinkedIn
- Log out of the account
- View a list of all users

## Architecture
The project is built using Lucid architecture. 
> You can read more about Lucid at the link: [Lucid Docs](https://docs.lucidarch.dev/concept/)

### Basic Technologies Used
- Laravel 8
- PHP 8
- MariaDB 10.5

#### Lucid (Micro)
The Lucid Architecture is a software architecture that consolidates code-base maintenance as the application scales, from becoming overwhelming to handle.


We use Lucid Micro.
> You can read more about Lucid Micro at the link: [Lucid Docs - Micro](https://docs.lucidarch.dev/micro-vs-monolith/#micro)

#### Laravel Sail
Laravel Sail is a light-weight command-line interface for interacting with Laravel's default Docker development environment. Sail provides a great starting point for building a Laravel application.

> You can read more about Laravel Sail at the link: [Laravel Sail](https://laravel.com/docs/8.x/sail)

#### Laravel Socialite
Laravel Socialite provides an expressive, fluent interface to OAuth authentication with Facebook, Twitter, Google, LinkedIn, GitHub, GitLab and Bitbucket.

> You can read more about Laravel Socialite at the link: [Laravel Socialite](https://laravel.com/docs/8.x/socialite)

#### Clockwork
Clockwork is a development tool for PHP available right in your browser. Clockwork gives you an insight into your application runtime - including request data, performance metrics, log entries, database queries, cache queries, redis commands, dispatched events, queued jobs, rendered views and more - for HTTP requests, commands, queue jobs and tests.

> You can read more about Clockwork at the link: [Clockwork](https://underground.works/clockwork/)

#### Laravel Enum
Simple, extensible and powerful enumeration implementation for Laravel.

> You can read more about Laravel Enum at the link: [Laravel Enum](https://github.com/BenSampo/laravel-enum)

### Requirements
- Docker

## Project Set Up

#### Step 1. Clone from the GitHub
```bash
git clone https://github.com/khariv2907/linkedin-auth.git
```

#### Step 2. Go to the project directory.
```bash
cd linkedin-auth
```

#### Step 3. Copy .env
```bash
cp .env.example .env
```

#### Step 4. Install Composer packages
```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php80-composer:latest \
    composer install --ignore-platform-reqs
```

#### Step 5. Create alias for the Sail
Add alias for the current session
```bash
alias sail='bash vendor/bin/sail'
```

#### Step 6. Build and Start Docker Containers
```bash
sail build
sail up -d
```

#### Step 7. Install node modules and build assets
```bash
sail npm install
sail npm run prod
```

#### Step 8. Generate key and run migrations
```bash
sail shell
php artisan key:generate
php artisan migrate
```

#### Step 9. Done
You can now go to [http://localhost](http://localhost)

## Run Tests

#### Step 1. Connect to application's container
```bash
sail shell
```

#### Step 2. Run tests
```bash
./vendor/bin/phpunit
```
