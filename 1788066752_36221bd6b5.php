```php
<?php

// Generate a random programming problem
$problem = rand(1, 3);

// Define design patterns
$designPatterns = [
    'Singleton' => 'Ensure a class has only one instance, and provide a global point of access to it.',
    'Factory' => 'Define an interface for creating an object, but let subclasses decide which class to instantiate.',
    'Observer' => 'Define a one-to-many dependency between objects so that when one object changes state, all its dependents are notified and updated automatically.'
];

// Select a random design pattern
$pattern = array_rand($designPatterns);

// Create a PHP class based on the selected design pattern
switch ($pattern) {
    case 'Singleton':
        $code = '<?php
class Singleton {
    private static $instance = null;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }
}

$obj = Singleton::getInstance();
?>
';
        break;
    case 'Factory':
        $code = '<?php
interface Shape {
    public function draw();
}

class Circle implements Shape {
    public function draw() {
        echo "Drawing Circle";
    }
}

class Square implements Shape {
    public function draw() {
        echo "Drawing Square";
    }
}

class ShapeFactory {
    public static function getShape($shapeType) {
        if ($shapeType == "CIRCLE") {
            return new Circle();
        } elseif ($shapeType == "SQUARE") {
            return new Square();
        }
        return null;
    }
}

$shape = ShapeFactory::getShape("CIRCLE");
$shape->draw();
?>
';
        break;
    case 'Observer':
        $code = '<?php
class Subject {
    private $observers = [];

    public function attach($observer) {
        array_push($this->observers, $observer);
    }

    public function detach($observer) {
        $key = array_search($observer, $this->observers);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notify() {
        foreach ($this->observers as $observer) {
            $observer->update();
        }
    }
}

class Observer {
    public function update() {
        echo "Observer notified!";
    }
}

$subject = new Subject();
$observer = new Observer();
$subject->attach($observer);
$subject->notify();
?>
';
        break;
}

echo $code;
?>
```