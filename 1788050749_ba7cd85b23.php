```php
<?php
// Define a random problem: Create a function that takes an array of integers and returns a new array containing only the even numbers, sorted in descending order.

// Random design pattern: Factory Method Pattern

// Define an interface for the factory
interface ArrayFilterFactory {
    public function createFilter();
}

// Define a concrete class that implements the factory interface
class EvenNumberFilterFactory implements ArrayFilterFactory {
    public function createFilter() {
        return new EvenNumberFilter();
    }
}

// Define an abstract class for the filter
abstract class ArrayFilter {
    public abstract function filter($array);
}

// Define a concrete class that implements the filter
class EvenNumberFilter extends ArrayFilter {
    public function filter($array) {
        $evenNumbers = array_filter($array, function($number) {
            return $number % 2 == 0;
        });
        rsort($evenNumbers);
        return $evenNumbers;
    }
}

// Usage
$factory = new EvenNumberFilterFactory();
$filter = $factory->createFilter();
$inputArray = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$result = $filter->filter($inputArray);
print_r($result);
?>
```