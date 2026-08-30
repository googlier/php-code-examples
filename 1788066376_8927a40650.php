```php
<?php
// Define a random design pattern
class Singleton {
    private static $instance = null;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }

    public function showMessage() {
        return "Hello, I am a Singleton!";
    }
}

// Define a random programming problem
// Create a class that uses the Singleton pattern to manage a global counter

class Counter {
    private static $instance = null;
    private $count = 0;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Counter();
        }
        return self::$instance;
    }

    public function increment() {
        $this->count++;
        return $this->count;
    }

    public function getCount() {
        return $this->count;
    }
}

// Test the Counter class
$counter1 = Counter::getInstance();
$counter2 = Counter::getInstance();

echo $counter1->increment(); // Output: 1
echo $counter2->increment(); // Output: 2
echo $counter1->getCount();  // Output: 2
?>
```