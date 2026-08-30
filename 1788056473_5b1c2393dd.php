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

    public abstract function area();
}

class Circle extends Shape {
    protected $radius;

    public function __construct($color, $radius) {
        parent::__construct($color);
        $this->radius = $radius;
    }

    public function area() {
        return M_PI * pow($this->radius, 2);
    }
}

class Square extends Shape {
    protected $side;

    public function __construct($color, $side) {
        parent::__construct($color);
        $this->side = $side;
    }

    public function area() {
        return pow($this->side, 2);
    }
}

$shapes = [
    new Circle('red', 5),
    new Square('blue', 4)
];

foreach ($shapes as $shape) {
    echo "Shape color: " . $shape->getColor() . ", Area: " . $shape->area() . "<br>";
}
?>
```