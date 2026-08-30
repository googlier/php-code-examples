```php
<?php

// Problem: Implement a simple cache system using the Singleton design pattern to ensure only one instance of the cache is created.

// Solution:
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

    public function set($key, $value) {
        $this->data[$key] = $value;
    }

    public function get($key) {
        return isset($this->data[$key]) ? $this->data[$key] : null;
    }
}

// Usage
$cache = Cache::getInstance();
$cache->set('key1', 'value1');
echo $cache->get('key1'); // Outputs: value1
?>
```