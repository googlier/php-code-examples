```php
<?php
// Problem: Implement a caching mechanism for a set of expensive function calls using the Singleton design pattern.

// Singleton Class
class Cache {
    private static $instance = null;
    private $cache = array();

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
}

// Expensive function
function expensiveFunction($data) {
    // Simulate expensive computation
    sleep(2);
    return "Result for: " . $data;
}

// Usage of Singleton and caching mechanism
$cache = Cache::getInstance();
$data = "exampleData";

if ($result = $cache->get($data)) {
    echo $result;
} else {
    $result = expensiveFunction($data);
    $cache->set($data, $result);
    echo $result;
}
?>
```