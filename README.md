# aot-test
 This is my solution for the AOT Test.
 
 # Requirements to install
 I used the following software:
 - Local development with XAMPP. Create a folder named AOT under htdocs.
 - Slim PHP Framework (https://www.slimframework.com). Can be installes via composer:
 ```
 composer require slim/slim:"4.*"
```

- Slim components: PSR7 and PHP-View. The fist one can be installed with:
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
