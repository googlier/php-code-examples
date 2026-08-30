```php
<?php

class Animal {
    public function makeSound() {
        throw new Exception("Method 'makeSound' must be implemented.");
    }
}

class Dog extends Animal {
    public function makeSound() {
        echo "Bark";
    }
}

class Cat extends Animal {
    public function makeSound() {
        echo "Meow";
    }
}

class AnimalFactory {
    public static function createAnimal($type) {
        if ($type === "dog") {
            return new Dog();
        } elseif ($type === "cat") {
            return new Cat();
        } else {
            throw new Exception("Invalid animal type.");
        }
    }
}

$animalType = rand(0, 1) ? "dog" : "cat";
$animal = AnimalFactory::createAnimal($animalType);
$animal->makeSound();

?>
```