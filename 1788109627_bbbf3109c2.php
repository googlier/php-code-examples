```php
<?php
// Generate a random programming problem and solve it using a random design pattern

// Problem: Create a function to calculate the area of a circle given its radius. Use the Singleton design pattern to ensure that only one instance of the calculation class is created.

class CircleAreaCalculator {
    private static $instance = null;
    private $radius;

    private function __construct($radius) {
        $this->radius = $radius;
    }

    public static function getInstance($radius) {
        if (self::$instance == null) {
            self::$instance = new CircleAreaCalculator($radius);
        }
        return self::$instance;
    }

    public function calculateArea() {
        return M_PI * pow($this->radius, 2);
    }
}

$radius = 5;
$calculator = CircleAreaCalculator::getInstance($radius);
$area = $calculator->calculateArea();
echo "The area of the circle with radius $radius is: " . $area;
?>
```