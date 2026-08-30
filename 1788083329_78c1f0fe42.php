```php
<?php

// Problem: Implement a caching mechanism for a function that fetches user data from a database.

// Design Pattern: Strategy Pattern

interface CacheStrategy {
    public function get($key);
    public function set($key, $value);
}

class DatabaseCache implements CacheStrategy {
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function get($key) {
        // Simulate database fetch
        return $this->database->fetch($key);
    }

    public function set($key, $value) {
        // Simulate database save
        $this->database->save($key, $value);
    }
}

class MemoryCache implements CacheStrategy {
    private $cache = [];

    public function get($key) {
        return isset($this->cache[$key]) ? $this->cache[$key] : null;
    }

    public function set($key, $value) {
        $this->cache[$key] = $value;
    }
}

class CacheService {
    private $strategy;

    public function __construct(CacheStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function getUserData($userId) {
        $userData = $this->strategy->get($userId);

        if ($userData === null) {
            // Simulate expensive database operation
            $userData = "Fetching user data for user $userId from database";
            $this->strategy->set($userId, $userData);
        }

        return $userData;
    }
}

// Usage
$database = new Database(); // Assume Database class is defined elsewhere
$cacheStrategy = new MemoryCache();
$cacheService = new CacheService($cacheStrategy);

echo $cacheService->getUserData(1);
echo $cacheService->getUserData(1); // Should be served from cache

?>
```