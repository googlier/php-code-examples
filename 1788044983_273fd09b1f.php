```php
<?php
// Generate a random programming problem
$problem = rand(1, 3);

// Define design patterns
$patterns = [
    'singleton' => function($class) {
        $instance = null;
        return function() use ($class, &$instance) {
            if (is_null($instance)) {
                $instance = new $class();
            }
            return $instance;
        };
    },
    'observer' => function($subject, $observer) {
        $subject->attach($observer);
        $subject->notify();
    },
    'factory' => function($class, $params = []) {
        return new $class(...$params);
    }
];

// Select a random pattern
$pattern = $patterns[array_rand($patterns)];

// Define classes for the pattern
switch ($problem) {
    case 1:
        class Singleton {
            private static $instance = null;
            private function __construct() {}
            public static function getInstance() {
                if (is_null(self::$instance)) {
                    self::$instance = new Singleton();
                }
                return self::$instance;
            }
        }
        $solution = $pattern(Singleton::class);
        break;
    case 2:
        class Subject {
            private $observers = [];
            public function attach($observer) {
                $this->observers[] = $observer;
            }
            public function notify() {
                foreach ($this->observers as $observer) {
                    $observer();
                }
            }
        }
        $observer = function() { echo "Observer notified!\n"; };
        $subject = new Subject();
        $solution = $pattern($subject, $observer);
        break;
    case 3:
        class Product {
            public function __construct($name) {
                $this->name = $name;
            }
        }
        $factory = $pattern(Product::class, ['Laptop']);
        $solution = $factory();
        break;
}

// Execute the solution
$solution();
?>
```