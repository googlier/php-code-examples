```php
<?php

// Define an interface for a storage system
interface StorageInterface {
    public function save($data);
    public function load();
}

// Implement the interface using the Singleton design pattern
class FileStorage implements StorageInterface {
    private static $instance = null;
    private $filePath;

    private function __construct($filePath) {
        $this->filePath = $filePath;
    }

    public static function getInstance($filePath) {
        if (self::$instance === null) {
            self::$instance = new FileStorage($filePath);
        }
        return self::$instance;
    }

    public function save($data) {
        file_put_contents($this->filePath, serialize($data));
    }

    public function load() {
        if (file_exists($this->filePath)) {
            return unserialize(file_get_contents($this->filePath));
        }
        return null;
    }
}

// Usage
$storage = FileStorage::getInstance('data.txt');
$storage->save(['name' => 'John', 'age' => 30]);
$data = $storage->load();
print_r($data);

?>
```