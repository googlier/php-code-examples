```php
<?php

// Problem: Implement a simple caching mechanism using the Singleton design pattern to store and retrieve data.

// Design Pattern: Singleton

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

    public function store($key, $value) {
        $this->cache[$key] = $value;
    }

    public function retrieve($key) {
        return isset($this->cache[$key]) ? $this->cache[$key] : null;
    }
}

// Usage
$cache = Cache::getInstance();
$cache->store('user_name', 'John Doe');
echo $cache->retrieve('user_name'); // Output: John Doe
?>
```