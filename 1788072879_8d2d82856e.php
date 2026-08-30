```php
<?php

// Define a random class
class RandomClass {
    private $value;

    public function __construct($value) {
        $this->value = $value;
    }

    public function getValue() {
        return $this->value;
    }

    public function setValue($value) {
        $this->value = $value;
    }
}

// Implement a Factory pattern to create instances of RandomClass
interface RandomFactory {
    public function create($value);
}

class ConcreteFactory implements RandomFactory {
    public function create($value) {
        return new RandomClass($value);
    }
}

// Use the Factory pattern to create instances of RandomClass
$factory = new ConcreteFactory();
$randomObject = $factory->create(42);

// Print the value of the object
echo $randomObject->getValue();

?>
```