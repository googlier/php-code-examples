```php
<?php
// Problem: Implement a simple caching mechanism using the Singleton design pattern.

// Singleton class for caching
class Cache {
    private static $instance = null;
    private $cache = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Cache();
        }
        return self::$instance;
    }

    public function get($key) {
        return isset($this->cache[$key]) ? $this->cache[$key] : null;
    }

    public function set($key, $value) {
        $this->cache[$key] = $value;
    }

    public function delete($key) {
        unset($this->cache[$key]);
    }
}

// Usage
$cache = Cache::getInstance();
$cache->set('data', 'some data');
echo $cache->get('data'); // Outputs: some data
$cache->delete('data');
echo $cache->get('data'); // Outputs: 
?>
```