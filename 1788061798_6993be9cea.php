```php
<?php
// Random Programming Problem: Implement a simple caching mechanism using the Singleton design pattern.

class Cache {
    private static $instance = null;
    private $data = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Cache();
        }
        return self::$instance;
    }

    public function get($key) {
        return isset($this->data[$key]) ? $this->data[$key] : null;
    }

    public function set($key, $value) {
        $this->data[$key] = $value;
    }

    public function delete($key) {
        unset($this->data[$key]);
    }

    public function clear() {
        $this->data = [];
    }
}

// Example usage
$cache = Cache::getInstance();
$cache->set('user_id', 123);
echo $cache->get('user_id'); // Output: 123
$cache->delete('user_id');
echo $cache->get('user_id'); // Output: null
$cache->set('user_id', 456);
$cache->clear();
echo $cache->get('user_id'); // Output: null
?>
```