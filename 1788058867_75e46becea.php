```php
<?php

class Shape {
    abstract function area();
}

class Circle extends Shape {
    private $radius;

    function __construct($radius) {
        $this->radius = $radius;
    }

    function area() {
        return M_PI * pow($this->radius, 2);
    }
}

class Square extends Shape {
    private $side;

    function __construct($side) {
        $this->side = $side;
    }

    function area() {
        return pow($this->side, 2);
    }
}

function calculateArea($shapes) {
    $totalArea = 0;
    foreach ($shapes as $shape) {
        $totalArea += $shape->area();
    }
    return $totalArea;
}

$shapes = array(new Circle(3), new Square(4));
echo calculateArea($shapes);

?>
```