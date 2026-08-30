```php
<?php
// Problem: Implement a caching mechanism for a product list using the Singleton design pattern.

// Singleton Pattern
class ProductCache {
    private static $instance = null;
    private $cache = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new ProductCache();
        }
        return self::$instance;
    }

    public function getProduct($id) {
        if (!isset($this->cache[$id])) {
            // Simulate fetching product from database
            $this->cache[$id] = "Product $id";
        }
        return $this->cache[$id];
    }
}

// Usage
$cache = ProductCache::getInstance();
echo $cache->getProduct(1); // Output: Product 1
echo $cache->getProduct(1); // Output: Product 1 (from cache)
?>
```