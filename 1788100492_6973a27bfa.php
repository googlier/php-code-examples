```php
<?php

class Shape {
    abstract public function area();
}

class Rectangle extends Shape {
    protected $width;
    protected $height;

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function area() {
        return $this->width * $this->height;
    }
}

class Circle extends Shape {
    protected $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function area() {
        return pi() * pow($this->radius, 2);
    }
}

class AreaCalculator {
    protected $shapes;

    public function __construct($shapes = []) {
        $this->shapes = $shapes;
    }

    public function addShape(Shape $shape) {
        $this->shapes[] = $shape;
    }

    public function getTotalArea() {
        $total = 0;
        foreach ($this->shapes as $shape) {
            $total += $shape->area();
        }
        return $total;
    }
}

$shapes = [
    new Rectangle(5, 10),
    new Circle(7)
];

$calculator = new AreaCalculator($shapes);
echo "Total Area: " . $calculator->getTotalArea();

?>
```