```php
<?php
// Problem: Implement a simple caching mechanism using the Singleton design pattern.

class Cache {
    private static $instance = null;
    private $data = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
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
}

// Usage
$cache = Cache::getInstance();
$cache->set('username', 'JohnDoe');
echo $cache->get('username'); // Outputs: JohnDoe
$cache->delete('username');
echo $cache->get('username'); // Outputs: 
?>
```