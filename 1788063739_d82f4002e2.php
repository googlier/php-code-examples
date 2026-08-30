```php
<?php
// Problem: Implement a simple caching mechanism using the Singleton design pattern to store and retrieve data.

// Singleton class for caching
class Cache {
    private static $instance = null;
    private $data = array();

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Cache();
        }
        return self::$instance;
    }

    public function set($key, $value) {
        $this->data[$key] = $value;
    }

    public function get($key) {
        return isset($this->data[$key]) ? $this->data[$key] : null;
    }
}

// Usage example
$cache = Cache::getInstance();
$cache->set('name', 'John Doe');
$name = $cache->get('name');

echo "Cached Name: " . $name;
?>
```