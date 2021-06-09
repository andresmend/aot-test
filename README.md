# aot-test
 This is my solution for the AOT Test.
 
 # Requirements
 - XAMPP.
 - Composer.
 - Browser.
 
# Installation
 - In XAMPP, create a folder under htdocs and name it AOT.
 - Install Slim PHP Framework (https://www.slimframework.com). Can be installed via Composer (so install Composer before doing this):
 ```
 composer require slim/slim:"4.*"
```

- Install Slim components: PSR7 and PHP-View. PSR7 installed with:
```
composer require slim/psr7
```

PHP-View can be installed with:
 ```
 composer require slim/php-view
 ```

# Once installed
Navigate to http://localhost/oat/public/questions

You can change language with:
http://localhost/oat/public/questions?lang=es

The form to add new entries to JON and CSV files is in:
http://localhost/oat/public/addQuestions
