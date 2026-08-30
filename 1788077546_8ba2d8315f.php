```php
<?php
// Problem: Implement a simple caching system that can store and retrieve data.

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

    public function set($key, $value, $ttl = 3600) {
        $this->cache[$key] = ['value' => $value, 'expiry' => time() + $ttl];
    }

    public function get($key) {
        if (isset($this->cache[$key])) {
            $item = $this->cache[$key];
            if ($item['expiry'] > time()) {
                return $item['value'];
            } else {
                unset($this->cache[$key]);
            }
        }
        return null;
    }
}

// Usage
$cache = Cache::getInstance();
$cache->set('data', 'Hello, World!', 60);
echo $cache->get('data'); // Output: Hello, World!
echo $cache->get('data'); // Output: Hello, World!
sleep(61);
echo $cache->get('data'); // Output: 
?>
```