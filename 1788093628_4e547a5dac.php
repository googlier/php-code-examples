```php
<?php
class Shape {
    protected $color;

    public function __construct($color) {
        $this->color = $color;
    }

    public function getColor() {
        return $this->color;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public abstract function getArea();
}

class Square extends Shape {
    protected $side;

    public function __construct($color, $side) {
        parent::__construct($color);
        $this->side = $side;
    }

    public function getArea() {
        return pow($this->side, 2);
    }
}

class Circle extends Shape {
    protected $radius;

    public function __construct($color, $radius) {
        parent::__construct($color);
        $this->radius = $radius;
    }

    public function getArea() {
        return M_PI * pow($this->radius, 2);
    }
}

$shapes = [
    new Square('red', 5),
    new Circle('blue', 3)
];

foreach ($shapes as $shape) {
    echo "Shape: " . get_class($shape) . ", Color: " . $shape->getColor() . ", Area: " . $shape->getArea() . "<br>";
}
?>
```