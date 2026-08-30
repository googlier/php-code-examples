```php
<?php

// Problem: Implement a simple caching mechanism using the Factory design pattern

interface Cache {
    public function get($key);
    public function set($key, $value, $ttl);
}

class FileCache implements Cache {
    public function get($key) {
        if (file_exists($key)) {
            return file_get_contents($key);
        }
        return null;
    }

    public function set($key, $value, $ttl) {
        file_put_contents($key, $value);
        touch($key, time() + $ttl);
    }
}

class MemoryCache implements Cache {
    private $cache = [];

    public function get($key) {
        if (isset($this->cache[$key])) {
            return $this->cache[$key];
        }
        return null;
    }

    public function set($key, $value, $ttl) {
        $this->cache[$key] = $value;
        if ($ttl > 0) {
            register_shutdown_function(function() use ($key, $ttl) {
                if (isset($this->cache[$key]) && time() - $ttl > time()) {
                    unset($this->cache[$key]);
                }
            });
        }
    }
}

class CacheFactory {
    public static function createCache($type) {
        if ($type === 'file') {
            return new FileCache();
        } elseif ($type === 'memory') {
            return new MemoryCache();
        }
        throw new Exception("Invalid cache type");
    }
}

// Usage
$cache = CacheFactory::createCache('file');
$cache->set('test_key', 'test_value', 60);
echo $cache->get('test_key');

?>
```