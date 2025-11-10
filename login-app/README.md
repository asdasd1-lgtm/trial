## Login Demo

This project is a compact Laravel 12 application that demonstrates a fully functional email + password login flow. It includes:

- a custom-styled login page
- session-based authentication with remember-me support
- a protected dashboard screen
- feature tests covering the happy-path and failure-path login scenarios

Use it as a reference implementation or expand it into your own application.

## Requirements

- PHP 8.2 or newer with the SQLite extension
- Composer
- (Optional) Node + NPM if you plan to compile front-end assets with Vite

## Getting Started

```bash
composer install
cp .env.example .env  # already done for you, but keep handy
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

The seeded user credentials are:

- Email: `test@example.com`
- Password: `password`

Visit `http://127.0.0.1:8000/login` to sign in. Successful authentication redirects you to the simple dashboard. Submit the logout form on the dashboard to end the session.

## Running the Test Suite

```bash
php artisan test
```

The feature tests (`tests/Feature/LoginTest.php`) assert that the login screen renders, accepts valid credentials, and rejects invalid passwords while preserving guest state.

## Next Steps

- Swap SQLite for your preferred database by updating `.env` and running the migrations.
- Replace the static dashboard view with your domain logic while keeping the `auth` middleware group.
- Extend the authentication layer to support registration, password resets, or social login providers as needed.
