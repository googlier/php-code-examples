```php
<?php
// Problem: Implement a simple caching system using the Singleton Design Pattern

// Singleton Design Pattern
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

    public function set($key, $value, $ttl = 3600) {
        $this->cache[$key] = ['value' => $value, 'timestamp' => time() + $ttl];
    }

    public function delete($key) {
        unset($this->cache[$key]);
    }
}

// Usage
$cache = Cache::getInstance();
$cache->set('data', 'This is a cached data', 60);
echo $cache->get('data'); // Output: This is a cached data
$cache->delete('data');
echo $cache->get('data'); // Output: 
?>
```