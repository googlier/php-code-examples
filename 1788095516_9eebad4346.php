```php
<?php
// Problem: Implement a simple queue system using the Singleton design pattern in PHP

class Queue {
    private static $instance = null;
    private $queue = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Queue();
        }
        return self::$instance;
    }

    public function enqueue($item) {
        array_push($this->queue, $item);
    }

    public function dequeue() {
        if (empty($this->queue)) {
            return null;
        }
        return array_shift($this->queue);
    }

    public function isEmpty() {
        return empty($this->queue);
    }

    public function size() {
        return count($this->queue);
    }
}

// Usage
$queue = Queue::getInstance();
$queue->enqueue('Item 1');
$queue->enqueue('Item 2');
echo $queue->dequeue(); // Output: Item 1
echo $queue->size(); // Output: 1
?>
```