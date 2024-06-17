# Restaurant-Menu-Dish App Laravel-API-part

## Description

This App was created as a final assignment while learning in Baltic institute of Technology. This is backend part: API, Models, Authentication, Connection with database, Model Relations, Database Seeders and so on.

## Launch procedure

-   Install by cloning: < $ git clone https://github.com/alinapak/RestaurantExam.git > in htdocs folder;
-   Open MySQL workbench and choose root connection;
-   Create database named `your-chosen-database-name`, but dont forget to add this name as DATABASE value into .env file.
-   Open project and launch composer command (if globally: `php composer install`, if localy: `php <path to composer.phar> install`);
-   Create .env file by copying .env.example content with command line `cp .env.example .env`;
-   In .env. file replace DATABASE=laravel to DATABASE=`your-chosen-database-name`';
-   Type in command line `php artisan key:generate` to generate app key;
-   Migrate into database by typing in command line `php artisan migrate`;
-   Seed some data into database by typing command `php artisan db:seed`;
-   Launch by typing `php artisan serve`.

## How to use

-   You can access API only if you will remove authentication construct in all API controllers.

## Author

This App was created by me [Alina Pakamorytė](https://www.linkedin.com/in/alina-pakamoryt%C4%97-73a66377/).
