# Stori8 Project - Installation Guide

Welcome to **Stori8**. This is a Laravel-based web application. Follow the steps below to set up and run the project on your local machine.

## Prerequisites

Before starting, ensure you have the following installed:

1.  **XAMPP** (or any PHP/MySQL local server environment).
    *   PHP >= 8.2
    *   MySQL
2.  **Composer** (PHP Dependency Manager).
3.  **Node.js & NPM** (Optional, for compiling assets if needed).

---

## 🚀 Installation Steps

### 1. Download/Clone the Project
Place the project folder inside your web server directory (e.g., `C:\xampp\htdocs\stori8`).

### 2. Install Dependencies
Open a terminal in the project directory and run:

```bash
composer install
```

### 3. Environment Configuration
Duplicate the example environment file and rename it to `.env`:

```bash
cp .env.example .env
```
*(On Windows, you can just manually copy and rename the file)*

Open the `.env` file and configure your database settings:

```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=stori8_db  <-- Change this to your database name
DB_USERNAME=root       <-- Your database username
DB_PASSWORD=           <-- Your database password (leave empty for default XAMPP)
```

### 4. Generate Application Key
Run the following command to generate the app key:

```bash
php artisan key:generate
```

### 5. Create Database
1.  Open **phpMyAdmin** (usually `http://localhost/phpmyadmin`).
2.  Create a new database named `stori8_db` (or whatever name you set in `.env`).

### 6. Run Migrations
Import the database tables by running:

```bash
php artisan migrate
```

### 7. Link Storage
To ensure images uploaded in the Admin panel are visible on the frontend, link the public storage:

```bash
php artisan storage:link
```

---

## 🏁 Running the Application

You can run the application using Laravel's built-in server:

```bash
php artisan serve
```

Access the site at: [http://127.0.0.1:8000](http://127.0.0.1:8000)

**OR** if you are using XAMPP and the folder is in `htdocs`:
Access via: [http://localhost/stori8/public/](http://localhost/stori8/public/)

---

## 🔑 Admin Panel Access

To access the admin panel, navigate to:
`/login`

*Note: If no user exists, verify if there is a registration route or use `php artisan tinker` to create a user manually.*
