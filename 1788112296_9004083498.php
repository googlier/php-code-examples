```php
<?php
class Shape {
    abstract public function area();
}

interface Drawable {
    public function draw();
}

class Circle extends Shape implements Drawable {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function area() {
        return M_PI * pow($this->radius, 2);
    }

    public function draw() {
        echo "Drawing a Circle with radius: " . $this->radius;
    }
}

class Rectangle extends Shape implements Drawable {
    private $width;
    private $height;

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function area() {
        return $this->width * $this->height;
    }

    public function draw() {
        echo "Drawing a Rectangle with width: " . $this->width . " and height: " . $this->height;
    }
}

$shapes = [
    new Circle(5),
    new Rectangle(3, 4)
];

foreach ($shapes as $shape) {
    echo "Area: " . $shape->area() . "\n";
    $shape->draw();
    echo "\n";
}
?>
```