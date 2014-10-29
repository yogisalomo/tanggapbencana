# SuitCommerce
Platform for standard web e-commerce system, developed by Suitmedia

### Main Components:
* Laravel 4.2.*
* Bootstrap 3.0.1
* jQuery 1.11.0
* TinyMCE 4.0.28 with Justboil.me 2.3
* DataTables 1.10.0 with TableTools 2.2.1
* Highcharts 4.0.1

### Features:

1. Management

    - User management
    - Supply management
    - Product management
    - Brand management
    - Order management
    - Courier management
    - Shipping management
    - Article management
    - Voucher management
    - Banner images management
    - Bank account management

2. User

    - User management
    - User payment confirmation
    - User banning
    - Flag user as spam
    - Private message between user
3. Taxonomy: category, parent category
4. Authentication: built-in auth with reCaptcha
5. WYSIWYG editor (TinyMCE) + file uploader (Justboil.me)
6. Simple ads (banner images) management: image/url and description
7. Reports with charts using highcharts with current day/week/year view

### How to use:
1. Copy all files from project **suitcommerce**
2. Edit some config files: **database.php**, **app.php**
3. Modify **status.json** as needed (app/config/status.json)

    - status.json is a list of data for table statuses.
4. Create database **suitcommerce** and migrate database with:

        $ php artisan migrate
5. Seed the database for dummy data

        $ php artisan db:seed
6. Update/add new models
7. Develop some project-specific modules
8. Work on frontend integration

### Changelog:

#### Version 0.1 (2012-03-05)

* First release
