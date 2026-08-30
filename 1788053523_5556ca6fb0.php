```php
<?php
// Problem: Implement a caching mechanism for a simple web application using the Singleton design pattern.

// Singleton class for caching
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

    public function set($key, $value, $ttl = 3600) {
        $this->data[$key] = ['value' => $value, 'expiry' => time() + $ttl];
    }

    public function get($key) {
        if (isset($this->data[$key]) && $this->data[$key]['expiry'] > time()) {
            return $this->data[$key]['value'];
        }
        return null;
    }
}

// Usage of Cache class
$cache = Cache::getInstance();
$cache->set('user_data', ['name' => 'John', 'age' => 30]);
$userData = $cache->get('user_data');

print_r($userData);
?>
```