# Task Result

## Started

* If you want to run task result, try with composer install, composer should inform about missing extension / PHP version
* I've used PHP 7.4
* Prepared autoload from composer instead of src/Lpp/SplClassLoader.php
* Started from code cleanup, change encapsulation
* Using composer, added VarDumper (symfony/var-dumper) for better debugging variables

## First Task

* I've implemented Filesystem class for working with data/ directory
* Added implementation of Serializer and Normalizer for better working with data
* Normalizer got additional feature with parsing DateTime and assign to variable
* I've added DataMapper for issue with wrong field naming which maps object instance of src/Lpp/Model to dedicated entities

## Second Task

* First I've added src/Lpp/Validator/Validator class
* After read again task added src/Lpp/Validator/ObjectValidator class which accept ValidableInterface instances
* ValidableInterface require getValidationRules() which contains list of fields to be validated (use to extend)

## Third Task

* I've add src/Lpp/Service/NameOrderedBrandService which is ordering Brands by their name
* I'm not sure is it okay, today is Sunday so it's hard to ask. In normal work I should ask for details

## Tests

* Added some tests, stored in test/ directory
* If you want to run tests, call in CLI "./vendor/bin/phpunit test/"


# Info

You need at least:

* PHP 5.3 or higher
* A text editor or IDE of your choice
* composer or autoloader of your choice (or provided spl autoloader)

# Knowledge

You will be tested within the following areas of PHP development:

* Basic understanding of PHP's OOP implementation, including interfaces and design patterns.
* Namespaces, Closures/Anonymous functions
* Reading resources from a local file system location
* Coping with JSON as data format

# The tasks

Listed below you will find a number of tasks to resolve. Each task should not take more than 45 to 60 minutes pure working time.
Please read all task before you start.
Please remember about the 'Boy Scout rule'.

## Implement a basic ItemService

Implement the interface for the Item Service. Please use the JSON file in the data directory as your datasource.
Your implementation must read the resultset from the datasource and pass the values from the json file into the corresponding classes from the Entity namespace.

The entities encapsulate each other:

(Brand) -[hasMany]-> (Items) -[hasMany] -> (Price)

The JSON file has a similar but not equal structure. Please take a deep look at both structures.

## Build a basic validator for the Item Entity

Your tasks is to build a validation mechanism for the Item Entity's url property.
Place the validation class in a proper position within the given architecture and ensure the value is valid.
It is up to you how you implement it and when to call it within the application's flow.

## Implement a way to get different implementations of the BrandServiceInterface

You can accomplish this in a few ways.
Please choose the variant you feel most comfortable with or you find most suitable, not the one that you think might be the fanciest of all.
You might want to write a second implementation for the BrandServiceInterface, but you don't have to.
If you need one, you can think of a "PriceOrderedBrandService" or an "ItemNameOrderedBrandService", which sort their results after receiving it from the item service.

Good luck!
