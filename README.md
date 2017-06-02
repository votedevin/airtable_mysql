# laravel-admin [![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

[![Selenium Test Status](https://saucelabs.com/browser-matrix/bootstrap.svg)](https://saucelabs.com/u/bootstrap)

A [Laravel](http://laravel.com/) 5.2.x, [Bootstrap](http://getbootstrap.com) 3.5.x, and [AdminLTE](https://almsaeedstudio.com/themes/AdminLTE/documentation/index.html) 2.3.x. project.

| Laravel-Admin Features  |
| :------------ |
|Built on [Laravel](http://laravel.com/) 5.2|
|Admin is built on [AdminLTE](https://almsaeedstudio.com/themes/AdminLTE/documentation/index.html) 2.3|
|Uses [MySQL](https://github.com/mysql) Database|
|Uses [Artisan](http://laravel.com/docs/5.1/artisan) to manage database migration, schema creations, and create/publish page controller templates|
|Dependencies are managed with [COMPOSER](https://getcomposer.org/)|
|Assets are managed with [BOWER](http://bower.io/)|
|Assets are organized and processed with [GULPJS](http://gulpjs.com/)|
|Laravel Scaffolding **User** and **Administrator Authentication**.|
|Dynamic Breadcrumbs|
|User Registration|
|User Registration IP Capture|
|User Login|
|User Dashboard|
|User Profile|
|User Forgot Password|
|User email address based Gravatar|
|User Management - admin access|
|User List - admin access|
|404 Page for public|
|404 Page for users|

### Quick Project Setup
1. Run `git clone https://github.com/loveisbluenova/airtable_mysql.git`
2. Create a MySQL database for the project
    * ```mysql -u root -p```, if using Vagrant: ```mysql -u homestead -psecret```
    * ```create database airtable1;```
    * ```\q```
3. From the projects root run `sudo cp env.file .env`
4. Configure your `.env` file
5. From the projects root folder run `sudo chmod -R 777 ../airable_mysql`
6. Run `sudo composer update` from the projects root folder
7. Run `sudo npm install` from the projects root folder
8. From the projects root folder run `sudo chmod -R 777 ../airable_mysql`
9. Run `bower update` from the projects root folder
10. Run `sudo gulp copyfiles` from the projects root folder
11. Run `sudo gulp` from the projects root folder
  * NOTE: In production run `sudo gulp --production`
12. From the projects root folder run `sudo chmod -R 755 ../airable_mysql`
13. From the projects root folder run `php artisan key:generate`
14. From the projects root folder run `php artisan migrate`
15. From the projects root folder run `composer dump-autoload`
16. From the projects root folder run `php artisan db:seed`

###### Seeds
1. Seeded Roles
   * user
   * editor
   * administrator

### airtable_mysql Front end URL's (routes)
* ```/home```
* ```/agencies```
* ```/projects```
* ```/commitments```

### airtable_mysql Admin URL's (routes)
* ```/admin```


Example `.env` file:
```
APP_ENV=local
APP_DEBUG=true
APP_KEY=SomeRandomString

DB_HOST=localhost
DB_DATABASE=laravelAdmin
DB_USERNAME=homestead
DB_PASSWORD=secret

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

MAIL_DRIVER=smtp
MAIL_HOST=mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
```

### Database
```
airtable1.sql


