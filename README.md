# Pet Central

Tugas Besar PWL Kelompok:
1. Bernadus Indra Wijaya (2072003)
2. Stefanus (2072013)
3. Moses Marzuki Samosir (2072042)

## Project Info

This project uses Laravel 5.8

   Default from laravel, with changes:

   - route /starter -> to preview how the dashboard looks like (disable it when in productions)
   - disabled Auth route /verify & /reset and no blade template applied for them
   - change /home to /dashboard (the controller too)

Laravel template from [rpahlevy](https://github.com/rpahlevy/laravel-adminlte3)

## Setup

### 1. Clone Project

#### Using Git

You can clone this repository using this command:

````
git clone https://github.com/berwizlelanzy/tugas_besar_pwl
````

#### Without Git

Click that green button on right top corner (Code) -> Download ZIP
Extract it and rename to your project name

### 2. Install Dependencies

Install project dependencies by using this command in the project root:

````
composer install
````

### 3. Setup .env

Clone .env.example to .env then fill in the details & don't forget to setup your DB.

Then generate app key by running:

````
php artisan key:generate
````

### 4. Link storage

Link storage to public folder using this command:

````
php artisan storage:link
````

### 5. Migrate DB

Migrate the databases from Laravel. Still on the project root, run:

````
php artisan migrate
````

Or if you want dummy data inserts, then use this command instead:

````
php artisan migrate --seed
````

### 6. Serve Your Web

Serve locally using php built in and visit localhost:8000

````
php artisan serve
````

If you don't have dummy data inserts, to get into the dashboard go to /register first.

## List of dummy account emails (and their roles)
    doctor@dummy.com (doctor)
    admin@dummy.com (admin)
    owner@dummy.com (owner)
All dummy accounts use "password" as the password.
