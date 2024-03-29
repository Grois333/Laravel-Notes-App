
# Laravel Notes App

## Description: CRUD App for notes

### Link to App: https://my-notes-app333.000webhostapp.com/

#### Developed with:
#### Frontend: Vue.js, Tailwind CSS
#### Backend: Laravel Jetstream with Inertia


### Register:

![Register](https://raw.githubusercontent.com/Grois333/Laravel-Notes-App/master/images/register.png)


### Login:

![Login](https://raw.githubusercontent.com/Grois333/Laravel-Notes-App/master/images/login.png)


### Dashboard:

![Dashboard](https://raw.githubusercontent.com/Grois333/Laravel-Notes-App/master/images/dashboard.png)


### Notes:

![Notes](https://raw.githubusercontent.com/Grois333/Laravel-Notes-App/master/images/notes.png)


### Create Note:

![Create Note](https://raw.githubusercontent.com/Grois333/Laravel-Notes-App/master/images/create%20note.png)


### View Note:

![View Note](https://raw.githubusercontent.com/Grois333/Laravel-Notes-App/master/images/virew%20notes.png)


### Edit or Delete Note:

![Edit or Delete Note](https://raw.githubusercontent.com/Grois333/Laravel-Notes-App/master/images/edit%20note.png)


### Search Note:

![Search Note](https://raw.githubusercontent.com/Grois333/Laravel-Notes-App/master/images/search.png)


### Profile:

![Profile](https://raw.githubusercontent.com/Grois333/Laravel-Notes-App/master/images/profile.png)


### Important concepts to keep in mind:

Model == Table (or Entity) in a database

Controller == to a File that is in charge of coordinating the different requests of the user.

Factories == a fake data structure that we are going to test the app with.

Migration == structure of a table that we are going to have inside Laravel, and then we create a table (or entity) in the database.

In order to use the Laravel new command you have to have the Laravel CLI installed on the computer. If this is not your case, and you install everything through the Linux or WSL console, use the standard installation with Composer.

Create Project
```composer create-project --prefer-dist laravel/laravel laravel-8 && cd laravel-8```

Then we install Jetstream
```composer requires laravel/jetstream```

And at the end, we use the artisan commands to download inertia.js
```php artisan jetstream:install inertia```

Models:
```php artisan make:model Note --help```
```php artisan make:model Note -rfm```

To finish we run the npm commands and we migrate to the database that we have created for the project and specified in the .env file

Generate Laravel Mix scaffolding
```npm install && npm run dev``` or ```npm run watch```

After creating the configuration for the Migrations, Seeders and Factories
```php artisan migrate --seed``` or
```php artisan migrate```

Run the development server
```php artisan serve```

<h3>To fix the migrate problem</h3>
For those who are using XAMPP which uses MariaDB, they will get an error

```SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long; max key length is 767 bytes (SQL: alter table `users` add unique `users_email_unique`(`email`))```

This is easy to solve, you need to locate the file app/Providers/AppServiceProvider.php, then include the namespace in it

```use Illuminate\Support\Facades\Schema;```

and in the boot() function you need to add the following:

```public function boot()```
    ```{```
         ```Schema::defaultStringLength(191);```
     ```}```

With this you can run the migration command again with php artisan migrate:fresh to delete all the tables and migrate them again and it should solve the problem.


Controllers:
```php artisan make:controller NoteController --resource``` ( create controller with methods: create, show, edit, update, destroy )
```php artisan make:controller PageController```

Running Commands for Deployment on env variables on production:
```NIXPACKS_BUILD_CMD=composer install && php artisan optimize && php artisan config:cache && php artisan view:cache && php artisan migrate --force```



<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
