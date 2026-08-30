```php
<?php
// Define a trait for calculating area
trait AreaCalculator {
    public function calculateArea() {
        return $this->width * $this->height;
    }
}

// Define a class for rectangle using the AreaCalculator trait
class Rectangle {
    use AreaCalculator;
    public $width;
    public $height;

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }
}

// Create an instance of Rectangle and calculate its area
$rectangle = new Rectangle(5, 10);
echo $rectangle->calculateArea();
?>
```