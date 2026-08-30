```php
<?php
class Animal {
    public function speak() {
        throw new Exception("This method should be overridden");
    }
}

class Dog extends Animal {
    public function speak() {
        return "Woof!";
    }
}

class Cat extends Animal {
    public function speak() {
        return "Meow!";
    }
}

class AnimalFactory {
    public static function getAnimal($type) {
        $class = ucfirst($type);
        if (class_exists($class)) {
            return new $class();
        } else {
            throw new Exception("Invalid animal type");
        }
    }
}

try {
    $dog = AnimalFactory::getAnimal("Dog");
    echo $dog->speak() . "\n";

    $cat = AnimalFactory::getAnimal("Cat");
    echo $cat->speak() . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
```