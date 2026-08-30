```php
<?php
class Shape {
    abstract function area();
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

class Square extends Shape {
    private $side;
    public function __construct($side) {
        $this->side = $side;
    }
    public function area() {
        return pow($this->side, 2);
    }
}

$shapes = [new Circle(5), new Square(4)];
$totalArea = array_reduce($shapes, function($carry, $shape) {
    return $carry + $shape->area();
}, 0);

echo "Total Area: " . $totalArea;
?>
```