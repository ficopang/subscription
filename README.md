# Subscription Platform

This project is a simple subscription platform built with Laravel 10, Eloquent ORM, and MySQL. It includes features for subscribing to websites and receiving email notifications when new posts are published.

Postman documentation: [https://documenter.getpostman.com/view/15528369/2sAXjF9F9A](https://documenter.getpostman.com/view/15528369/2sAXjF9F9A)

## Prerequisites

Ensure you have the following installed:

-   PHP 8.1 or higher
-   Composer
-   MySQL

## Getting Started

### Clone the Repository

Clone the repository to your local machine:

```bash
git clone https://github.com/ficopang/subscription.git
cd subscription
```

### Install Dependencies

Install PHP dependencies using Composer:

```bash
composer install
```

### Set Up Environment Configuration

1. **Create a `.env` file** by copying the `.env.example` file:

    ```bash
    cp .env.example .env
    ```

2. **Update the `.env` file** with your environment-specific configuration:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password

    QUEUE_CONNECTION=database

    MAIL_MAILER=smtp
    MAIL_HOST=your_smtp_host
    MAIL_PORT=your_smtp_port
    MAIL_USERNAME=your_smtp_username
    MAIL_PASSWORD=your_smtp_password
    MAIL_ENCRYPTION=null
    MAIL_FROM_ADDRESS="hello@example.com"
    MAIL_FROM_NAME="${APP_NAME}"
    ```

    Replace `your_database_name`, `your_database_user`, and `your_database_password` with your actual database credentials.

    Replace `your_smtp_host`, `your_smtp_port`, `your_smtp_username`, and `your_smtp_password` with your smtp credentials.

### Generate Application Key

Generate the application key:

```bash
php artisan key:generate
```

### Run Migrations and Seeders

Run migrations and seed the database:

```bash
php artisan migrate:fresh --seed
```

### Run the Queue Worker

Start the queue worker to process background jobs:

```bash
php artisan queue:work
```

### Serve the Application

Serve the application using the built-in Laravel server:

```bash
php artisan serve
```

Access the application at `http://localhost:8000`.
