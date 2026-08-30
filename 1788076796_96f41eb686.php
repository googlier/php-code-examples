```php
<?php
// Problem: Implement a caching mechanism for a website to improve load times

// Design Pattern: Factory Method

// Interface for Cache
interface Cache {
    public function get($key);
    public function set($key, $value, $ttl);
}

// Concrete class for File-based Cache
class FileCache implements Cache {
    public function get($key) {
        $file = __DIR__ . '/' . $key . '.cache';
        if (file_exists($file)) {
            return unserialize(file_get_contents($file));
        }
        return null;
    }

    public function set($key, $value, $ttl) {
        $file = __DIR__ . '/' . $key . '.cache';
        file_put_contents($file, serialize($value));
    }
}

// Concrete class for Memory-based Cache
class MemoryCache implements Cache {
    private $cache = [];

    public function get($key) {
        return $this->cache[$key] ?? null;
    }

    public function set($key, $value, $ttl) {
        $this->cache[$key] = $value;
    }
}

// Factory class for Cache
class CacheFactory {
    public static function getCache($type) {
        switch ($type) {
            case 'file':
                return new FileCache();
            case 'memory':
                return new MemoryCache();
            default:
                throw new Exception("Unknown cache type");
        }
    }
}

// Usage
$cache = CacheFactory::getCache('memory');
$cache->set('data', ['name' => 'John', 'age' => 30], 3600);
$user = $cache->get('data');
print_r($user);
?>
```