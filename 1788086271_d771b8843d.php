```php
<?php

class Shape {
    public function draw() {
        echo "Drawing a shape\n";
    }
}

class Circle extends Shape {
    public function draw() {
        echo "Drawing a circle\n";
    }
}

class Square extends Shape {
    public function draw() {
        echo "Drawing a square\n";
    }
}

class ShapeFactory {
    public static function getShape($shapeType) {
        switch ($shapeType) {
            case 'circle':
                return new Circle();
            case 'square':
                return new Square();
            default:
                return new Shape();
        }
    }
}

class Context {
    private $factory;

    public function __construct(ShapeFactory $factory) {
        $this->factory = $factory;
    }

    public function execute($shapeType) {
        $shape = $this->factory->getShape($shapeType);
        $shape->draw();
    }
}

$factory = new ShapeFactory();
$context = new Context($factory);

$context->execute('circle');
$context->execute('square');
$context->execute('rectangle');

?>
```