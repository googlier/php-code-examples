```php
<?php
// Problem: Implement a simple caching mechanism that can store and retrieve data.

// Design Pattern: Factory Method

interface CacheInterface {
    public function store($key, $value);
    public function retrieve($key);
}

class FileCache implements CacheInterface {
    private $cacheDir;

    public function __construct($cacheDir) {
        $this->cacheDir = $cacheDir;
        if (!is_dir($this->cacheDir)) {
            mkdir($this->cacheDir, 0777, true);
        }
    }

    public function store($key, $value) {
        $filePath = $this->cacheDir . '/' . $key;
        file_put_contents($filePath, serialize($value));
    }

    public function retrieve($key) {
        $filePath = $this->cacheDir . '/' . $key;
        if (file_exists($filePath)) {
            return unserialize(file_get_contents($filePath));
        }
        return null;
    }
}

class CacheFactory {
    public static function createCache($type, $options = []) {
        switch ($type) {
            case 'file':
                return new FileCache($options['cacheDir']);
            default:
                throw new Exception('Unknown cache type');
        }
    }
}

// Usage
try {
    $cache = CacheFactory::createCache('file', ['cacheDir' => 'data/cache']);
    $cache->store('test_key', ['name' => 'John', 'age' => 30]);
    $data = $cache->retrieve('test_key');
    print_r($data);
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
```