```php
<?php
// Problem: Implement a caching mechanism for a set of user data using the Singleton design pattern.

// Solution: Using the Singleton design pattern to ensure only one instance of the CacheManager is created.

class CacheManager {
    private static $instance = null;
    private $cache = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new CacheManager();
        }
        return self::$instance;
    }

    public function getData($key) {
        if (isset($this->cache[$key])) {
            return $this->cache[$key];
        }
        return null;
    }

    public function setData($key, $value) {
        $this->cache[$key] = $value;
    }
}

// Usage
$cacheManager = CacheManager::getInstance();
$cacheManager->setData('user_123', ['name' => 'John Doe', 'email' => 'john@example.com']);
$userData = $cacheManager->getData('user_123');

echo json_encode($userData);
?>
```