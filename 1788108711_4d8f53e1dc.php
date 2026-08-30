```php
<?php
// Random Programming Problem:
// Implement a simple cache system that can store and retrieve data using a design pattern.
// Design Pattern: Singleton
// The cache should have a maximum capacity and evict the least recently used item when the capacity is exceeded.

class Cache {
    private static $instance = null;
    private $data = [];
    private $capacity = 10;
    private $lastAccessed = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Cache();
        }
        return self::$instance;
    }

    public function set($key, $value) {
        if (count($this->data) >= $this->capacity) {
            $this->evict();
        }
        $this->data[$key] = $value;
        $this->lastAccessed[$key] = time();
    }

    public function get($key) {
        if (isset($this->data[$key])) {
            $this->lastAccessed[$key] = time();
            return $this->data[$key];
        }
        return null;
    }

    private function evict() {
        $min = PHP_INT_MAX;
        $key = null;
        foreach ($this->lastAccessed as $k => $t) {
            if ($t < $min) {
                $min = $t;
                $key = $k;
            }
        }
        unset($this->data[$key]);
        unset($this->lastAccessed[$key]);
    }
}

// Usage
$cache = Cache::getInstance();
$cache->set('name', 'John Doe');
echo $cache->get('name'); // Output: John Doe
?>
```