```php
<?php

// Problem: Implement a simple caching system in PHP using the Singleton design pattern.

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
        if (array_key_exists($key, $this->cache)) {
            return $this->cache[$key];
        }
        return null;
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
$cache->set('data', 'Hello, World!');
echo $cache->get('data'); // Output: Hello, World!
$cache->delete('data');
echo $cache->get('data'); // Output: 
?>
```