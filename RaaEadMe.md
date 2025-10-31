# run
composer run dev

Here’s a short, clear summary you can use for your project **`laravel_12_jetstream_Livewire_volt`** 👇

---

### 🧩 **Project Summary — laravel_12_jetstream_Livewire_volt**

**`laravel_12_jetstream_Livewire_volt`** is a Laravel 12 application built using **Jetstream**, **Livewire**, and **Volt** for a modern, dynamic, and component-driven user experience.
It provides secure authentication, user management, and real-time interactivity without the need for a full frontend framework.

**🔧 Key Features:**

* **Authentication System:** Built with Laravel Jetstream (login, registration, password reset, 2FA).
* **Livewire Components:** Real-time, reactive UI components for CRUD operations.
* **Volt Integration:** Simplified Livewire syntax for building modular, declarative pages.
* **Post Management:** Create, view, edit, and delete posts dynamically using Livewire.
* **Database Seeding:** Includes factories and seeders for generating test users and posts.
* **Vite Build System:** Fast asset bundling and hot reloading for frontend development.
* **SQLite/MySQL Compatible:** Works seamlessly with common local development databases.

**💡 Ideal For:**
Developers looking to learn or prototype **full-stack Laravel applications** with real-time interactivity using Livewire + Volt + Jetstream authentication.



# install
laravel new laravel_12_jetstream_Livewire_volt

   _                               _
  | |                             | |
  | |     __ _ _ __ __ ___   _____| |
  | |    / _` |  __/ _` \ \ / / _ \ |
  | |___| (_| | | | (_| |\ V /  __/ |
  |______\__,_|_|  \__,_| \_/ \___|_|


 ┌ Which starter kit would you like to install? ────────────────┐
 │ Livewire                                                     │
 └──────────────────────────────────────────────────────────────┘

 ┌ Which authentication provider do you prefer? ────────────────┐
 │ Laravel's built-in authentication                            │
 └──────────────────────────────────────────────────────────────┘

 ┌ Would you like to use Laravel Volt? ─────────────────────────┐
 │ Yes                                                          │
 └──────────────────────────────────────────────────────────────┘

 ┌ Which testing framework do you prefer? ──────────────────────┐
 │ Pest                                                         │
 └──────────────────────────────────────────────────────────────┘

➜ npm install && npm run build
➜ composer run dev

php artisan make:volt posts.index

php artisan make:livewire posts/index
php artisan make:livewire posts/create
php artisan make:livewire posts/edit
php artisan make:livewire Posts/Show


app/Livewire/Posts/
    Index.php
    Create.php
    Edit.php
    Show.php

resources/views/livewire/posts/
    index.blade.php
    create.blade.php
    edit.blade.php
    

php artisan serve
Then visit:
/posts → list of posts
/posts/create → create new
/posts/{id}/edit → edit existing

# clean
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan event:clear
php artisan cache:clear

or
php artisan optimize:clear

# seeder
php artisan make:seeder PostSeeder
php artisan db:seed --class=PostSeeder
php artisan db:seed


# faker
composer require fakerphp/faker

php artisan make:factory PostFactory --model=Post

php artisan db:seed --class=PostSeeder
php artisan db:seed


# sqlite3 cli
sqlite3 database/database.sqlite
sqlite> .schema
sqlite> .exit


# user
- raa@gmail.com Smit#12345

# templates
- https://themewagon.com/theme-category/admin-dashboard/
- https://themewagon.github.io/materially-free-react-admin-template/
- https://themewagon.github.io/tailadmin-vuejs/

# TailAdmin Free Tailwind CSS React Admin Dashboard Template
To integrate the TailAdmin Free Tailwind CSS React Admin Dashboard Template into your Laravel app, follow these key steps:

### 1. Set Up Laravel Project & Install Dependencies
- Ensure you have a Laravel project ready.
- Install Node.js dependencies needed for React and Tailwind CSS:
  ```
  npm install react react-dom tailwindcss postcss autoprefixer
  npx tailwindcss init
  ```

### 2. Configure Tailwind CSS in Laravel
- In `tailwind.config.js`, set the `content` paths to include Laravel Blade views and React components:
  ```js
  module.exports = {
    content: [
      './resources/views/**/*.blade.php',
      './resources/js/**/*.{js,jsx,ts,tsx}',
    ],
    theme: { extend: {} },
    plugins: [],
  }
  ```
- Add Tailwind directives to your CSS (e.g., `resources/css/app.css`):
  ```
  @tailwind base;
  @tailwind components;
  @tailwind utilities;
  ```

### 3. Integrate TailAdmin React Template
- Copy TailAdmin React source files (components, pages, assets) into `resources/js` in your Laravel project.
- Create an entry React component, e.g., `resources/js/AdminApp.jsx`, that imports and renders TailAdmin's main layout.
- Setup your `resources/js/app.js` to load this React component:
  ```js
  import React from 'react';
  import ReactDOM from 'react-dom/client';
  import AdminApp from './AdminApp';

  const root = ReactDOM.createRoot(document.getElementById('admin-app'));
  root.render(<AdminApp />);
  ```

### 4. Configure Laravel Mix or Vite
- If using Laravel Mix (`webpack.mix.js`):
  ```js
  const mix = require('laravel-mix');
  mix.js('resources/js/app.js', 'public/js').react()
     .postCss('resources/css/app.css', 'public/css', [
       require('tailwindcss'),
     ]);
  ```
- If using Vite (`vite.config.js`), configure Vite to process React and Tailwind CSS as per Laravel's docs.

### 5. Add Blade Layout with React Mount Point
- Create or modify a Blade layout (`resources/views/layouts/admin.blade.php`):
  ```html
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title>Admin Dashboard</title>
      @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body>
      <div id="admin-app"></div>
  </body>
  </html>
  ```
- Use this layout for your admin routes in Laravel.

### 6. Serve and Build Assets
- Run asset compilation:
  ```
  npm run dev
  ```
- Start Laravel server and navigate to your admin route where the React dashboard renders.

### 7. Connect Laravel Backend APIs if Needed
- Use Axios or fetch inside React components to call Laravel API endpoints.
- Define your API routes in `routes/api.php` with any authentication middleware like Sanctum.

***

This integration allows Laravel to serve APIs and Blade views while React (TailAdmin template) handles the UI as a Single Page Application embedded in a Blade layout.


# Mantis layout
- public/templates/Mantis-Bootstrap-1.0.0/dist/dashboard/index.html
- /Users/raa/raa-imp/php_projects/laravel_12_jetstream_Livewire_volt/public/templates/Mantis-Bootstrap-1.0.0/dist/dashboard/index.html


- resources/views/layouts/app_mantis.blade.php
- resources/views/partials/mantis_layout/sidebar.blade.php


# refresh
php artisan view:clear
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan event:clear
php artisan cache:clear

composer dump-autoload

composer run dev
