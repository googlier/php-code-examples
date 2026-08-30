```php
<?php
// Define a function that takes an array of integers and returns the sum of all even numbers in the array
function sumEvenNumbers($numbers) {
    return array_sum(array_filter($numbers, function($number) {
        return $number % 2 === 0;
    }));
}

// Define a class that implements the Singleton design pattern to ensure only one instance of the class is created
class Singleton {
    private static $instance = null;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }

    public function doSomething() {
        return "Doing something...";
    }
}

// Create an instance of the Singleton class and call its method
$instance = Singleton::getInstance();
echo $instance->doSomething();
?>
```