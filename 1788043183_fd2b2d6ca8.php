```php
<?php

// Problem: Implement a simple caching mechanism using the Decorator pattern in PHP.

// Interface for caching
interface Cache {
    public function get($key);
    public function set($key, $value);
}

// Concrete implementation of Cache
class FileCache implements Cache {
    public function get($key) {
        $filename = "cache/{$key}.cache";
        if (file_exists($filename)) {
            return unserialize(file_get_contents($filename));
        }
        return null;
    }

    public function set($key, $value) {
        $filename = "cache/{$key}.cache";
        file_put_contents($filename, serialize($value));
    }
}

// Decorator to add additional functionality
class ExpiringCache implements Cache {
    protected $cache;
    protected $ttl;

    public function __construct(Cache $cache, $ttl) {
        $this->cache = $cache;
        $this->ttl = $ttl;
    }

    public function get($key) {
        $value = $this->cache->get($key);
        if ($value !== null && isset($value['time']) && time() - $value['time'] < $this->ttl) {
            return $value['data'];
        }
        return null;
    }

    public function set($key, $value) {
        $this->cache->set($key, ['data' => $value, 'time' => time()]);
    }
}

// Usage
$cache = new ExpiringCache(new FileCache(), 3600);
$cache->set('test', 'Hello, World!');
echo $cache->get('test');

?>
```