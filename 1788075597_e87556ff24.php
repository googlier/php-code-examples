```php
<?php

// Define an interface for calculating areas
interface AreaCalculator {
    public function calculate();
}

// Create a class for a rectangle that implements the AreaCalculator interface
class Rectangle implements AreaCalculator {
    private $width;
    private $height;

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function calculate() {
        return $this->width * $this->height;
    }
}

// Create a class for a circle that implements the AreaCalculator interface
class Circle implements AreaCalculator {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function calculate() {
        return pi() * pow($this->radius, 2);
    }
}

// Create a class for a factory that can create instances of AreaCalculator
class AreaCalculatorFactory {
    public static function create($shape, $params) {
        switch ($shape) {
            case 'rectangle':
                return new Rectangle($params['width'], $params['height']);
            case 'circle':
                return new Circle($params['radius']);
            default:
                throw new Exception("Unknown shape");
        }
    }
}

// Test the factory
try {
    $rectangle = AreaCalculatorFactory::create('rectangle', ['width' => 10, 'height' => 5]);
    $circle = AreaCalculatorFactory::create('circle', ['radius' => 7]);

    echo "Rectangle area: " . $rectangle->calculate() . "\n";
    echo "Circle area: " . $circle->calculate() . "\n";
} catch (Exception $e) {
    echo $e->getMessage();
}

?>
```