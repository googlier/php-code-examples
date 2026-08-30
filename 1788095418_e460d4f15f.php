```php
<?php

// Define a class for a simple data storage system
class Storage {
    private $data = [];

    public function store($key, $value) {
        $this->data[$key] = $value;
    }

    public function retrieve($key) {
        return isset($this->data[$key]) ? $this->data[$key] : null;
    }
}

// Use the Factory Method pattern to create instances of Storage
interface StorageFactory {
    public function createStorage();
}

class LocalStorageFactory implements StorageFactory {
    public function createStorage() {
        return new Storage();
    }
}

class CloudStorageFactory implements StorageFactory {
    public function createStorage() {
        return new Storage();
    }
}

// Usage example
$factory = new LocalStorageFactory();
$storage = $factory->createStorage();

$storage->store('name', 'John Doe');
echo $storage->retrieve('name'); // Output: John Doe
?>
```