```php
<?php
class Shape {
    protected $color;

    public function __construct($color) {
        $this->color = $color;
    }

    public function draw() {
        echo "Drawing a shape with color: " . $this->color . "<br>";
    }
}

class Circle extends Shape {
    protected $radius;

    public function __construct($color, $radius) {
        parent::__construct($color);
        $this->radius = $radius;
    }

    public function draw() {
        echo "Drawing a circle with color: " . $this->color . " and radius: " . $this->radius . "<br>";
    }
}

class Square extends Shape {
    protected $side;

    public function __construct($color, $side) {
        parent::__construct($color);
        $this->side = $side;
    }

    public function draw() {
        echo "Drawing a square with color: " . $this->color . " and side: " . $this->side . "<br>";
    }
}

$factory = function($shape, $color, $params) {
    switch ($shape) {
        case 'circle':
            return new Circle($color, $params['radius']);
        case 'square':
            return new Square($color, $params['side']);
        default:
            throw new Exception("Unknown shape");
    }
};

$shapes = [
    $factory('circle', 'red', ['radius' => 5]),
    $factory('square', 'blue', ['side' => 10])
];

foreach ($shapes as $shape) {
    $shape->draw();
}
?>
```