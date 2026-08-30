```php
<?php
// Problem: Implement a simple caching mechanism using the Strategy pattern to fetch data from a remote API.

// Define the CacheStrategy interface
interface CacheStrategy {
    public function fetch($url);
}

// Implement a MemoryCache class implementing CacheStrategy
class MemoryCache implements CacheStrategy {
    private $cache = [];

    public function fetch($url) {
        if (isset($this->cache[$url])) {
            return $this->cache[$url];
        }
        // Simulate fetching data from a remote API
        $data = file_get_contents($url);
        $this->cache[$url] = $data;
        return $data;
    }
}

// Implement a DiskCache class implementing CacheStrategy
class DiskCache implements CacheStrategy {
    private $cacheDir = __DIR__ . '/cache';

    public function fetch($url) {
        $cacheFile = $this->cacheDir . '/' . md5($url);
        if (file_exists($cacheFile)) {
            return file_get_contents($cacheFile);
        }
        // Simulate fetching data from a remote API
        $data = file_get_contents($url);
        file_put_contents($cacheFile, $data);
        return $data;
    }
}

// Usage
$url = 'https://api.example.com/data';
$memoryCache = new MemoryCache();
$diskCache = new DiskCache();

echo "Memory Cache: " . $memoryCache->fetch($url) . "\n";
echo "Disk Cache: " . $diskCache->fetch($url) . "\n";
?>
```