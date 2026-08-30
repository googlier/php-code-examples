```php
<?php
// Define an interface for a Shape
interface Shape {
    public function draw();
}

// Implement the Shape interface using the Singleton design pattern
class Circle implements Shape {
    private static $instance = null;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Circle();
        }
        return self::$instance;
    }

    public function draw() {
        echo "Drawing Circle";
    }
}

// Use the Singleton Circle instance to draw a circle
$circle = Circle::getInstance();
$circle->draw();
?>
```