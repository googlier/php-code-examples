```php
<?php
// Problem: Implement a simple caching mechanism for a given API endpoint using the Singleton design pattern.

// Class to handle the caching mechanism
class CacheManager {
    private static $instance = null;
    private $cache = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new CacheManager();
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

// Function to fetch data from the API
function fetchDataFromAPI() {
    // Simulate fetching data from an API
    return "Data from API";
}

// Main function to demonstrate the caching mechanism
function getData($key) {
    $cacheManager = CacheManager::getInstance();

    // Check if data is in cache
    $data = $cacheManager->get($key);
    if ($data !== null) {
        return $data;
    }

    // If data is not in cache, fetch it from API and store in cache
    $data = fetchDataFromAPI();
    $cacheManager->set($key, $data);

    return $data;
}

// Example usage
echo getData("api_key");
?>
```