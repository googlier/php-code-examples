```php
<?php
class Shape {
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function draw() {
        echo "Drawing {$this->name}\n";
    }
}

class Circle extends Shape {
    public function draw() {
        echo "Drawing Circle\n";
    }
}

class Square extends Shape {
    public function draw() {
        echo "Drawing Square\n";
    }
}

class ShapeFactory {
    public static function createShape($type) {
        switch ($type) {
            case 'circle':
                return new Circle('Circle');
            case 'square':
                return new Square('Square');
            default:
                throw new Exception("Unknown shape type");
        }
    }
}

$shapeType = rand(0, 1) ? 'circle' : 'square';
$shape = ShapeFactory::createShape($shapeType);
$shape->draw();
?>
```