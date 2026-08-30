```php
<?php

// Problem: Implement a caching mechanism for expensive database queries using the Singleton design pattern.

class DatabaseCache {
    private static $instance = null;
    private $cache = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new DatabaseCache();
        }
        return self::$instance;
    }

    public function get($key, $callback) {
        if (!isset($this->cache[$key])) {
            $this->cache[$key] = $callback();
        }
        return $this->cache[$key];
    }
}

// Usage
function getExpensiveData() {
    // Simulate an expensive query
    sleep(2);
    return "Expensive Data";
}

$cache = DatabaseCache::getInstance();
$data = $cache->get('expensive_data_key', 'getExpensiveData');

echo $data; // Output: Expensive Data
?>
```