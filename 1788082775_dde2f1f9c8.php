```php
<?php
class Shape {
    public function area() {
        return "Area method is abstract";
    }
}

class Circle extends Shape {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function area() {
        return M_PI * pow($this->radius, 2);
    }
}

class Rectangle extends Shape {
    private $length;
    private $width;

    public function __construct($length, $width) {
        $this->length = $length;
        $this->width = $width;
    }

    public function area() {
        return $this->length * $this->width;
    }
}

function calculateArea(Shape $shape) {
    return $shape->area();
}

$circle = new Circle(5);
$rectangle = new Rectangle(4, 6);

echo "Circle Area: " . calculateArea($circle) . "\n";
echo "Rectangle Area: " . calculateArea($rectangle) . "\n";
?>
```