```php
<?php
$pattern = rand(1, 3);

if($pattern == 1){
    // Singleton Pattern
    class Database {
        private static $instance = null;

        private function __construct() {}

        public static function getInstance() {
            if(self::$instance == null) {
                self::$instance = new Database();
            }
            return self::$instance;
        }
    }

    $db1 = Database::getInstance();
    $db2 = Database::getInstance();

    echo $db1 === $db2 ? 'Same Instance' : 'Different Instances';
} elseif($pattern == 2){
    // Factory Method Pattern
    interface Shape {
        public function draw();
    }

    class Circle implements Shape {
        public function draw() {
            echo 'Drawing Circle';
        }
    }

    class Square implements Shape {
        public function draw() {
            echo 'Drawing Square';
        }
    }

    class ShapeFactory {
        public static function getShape($shapeType) {
            if($shapeType == 'circle') {
                return new Circle();
            } elseif($shapeType == 'square') {
                return new Square();
            }
        }
    }

    $shape1 = ShapeFactory::getShape('circle');
    $shape2 = ShapeFactory::getShape('square');

    $shape1->draw();
    echo '<br>';
    $shape2->draw();
} else {
    // Observer Pattern
    class Subject {
        private $observers = [];
        private $state = null;

        public function attach($observer) {
            $this->observers[] = $observer;
        }

        public function detach($observer) {
            $key = array_search($observer, $this->observers);
            if($key !== false) {
                unset($this->observers[$key]);
            }
        }

        public function notify() {
            foreach($this->observers as $observer) {
                $observer->update($this->state);
            }
        }

        public function setState($state) {
            $this->state = $state;
            $this->notify();
        }

        public function getState() {
            return $this->state;
        }
    }

    class Observer {
        public function update($state) {
            echo 'State updated to: ' . $state;
        }
    }

    $subject = new Subject();
    $observer1 = new Observer();
    $observer2 = new Observer();

    $subject->attach($observer1);
    $subject->attach($observer2);

    $subject->setState('newState');
}
?>
```