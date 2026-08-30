```php
<?php
// Generate a random programming problem and solve it using a random design pattern

// Problem: Implement a function to calculate the area of a rectangle given its length and width. 
// The function should use the Singleton design pattern to ensure that only one instance of the area calculator is created.

// Solution: Implement a Singleton design pattern to create a class that calculates the area of a rectangle.

class AreaCalculator {
    private static $instance = null;
    private $length;
    private $width;

    private function __construct($length, $width) {
        $this->length = $length;
        $this->width = $width;
    }

    public static function getInstance($length, $width) {
        if (self::$instance == null) {
            self::$instance = new AreaCalculator($length, $width);
        }
        return self::$instance;
    }

    public function getArea() {
        return $this->length * $this->width;
    }
}

// Test the Singleton design pattern
$areaCalculator1 = AreaCalculator::getInstance(5, 10);
$areaCalculator2 = AreaCalculator::getInstance(5, 10);

echo $areaCalculator1->getArea(); // Output: 50
echo $areaCalculator2->getArea(); // Output: 50

// Check if both instances are the same
if ($areaCalculator1 === $areaCalculator2) {
    echo "Singleton pattern is working.";
} else {
    echo "Singleton pattern is not working.";
}
?>
```