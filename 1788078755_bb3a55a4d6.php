```php
<?php
// Define the problem: Create a function that takes an array of integers and returns a new array containing only the even numbers.

// Define the design pattern: Factory Pattern

// Define the factory class
class EvenNumberFactory {
    public static function createEvenNumbers(array $numbers): array {
        return array_filter($numbers, function($number) {
            return $number % 2 === 0;
        });
    }
}

// Use the factory class to solve the problem
$numbers = [1, 2, 3, 4, 5, 6];
$evenNumbers = EvenNumberFactory::createEvenNumbers($numbers);

// Print the result
print_r($evenNumbers);
?>
```