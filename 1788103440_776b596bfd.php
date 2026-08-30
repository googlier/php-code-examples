```php
<?php

class Animal {
    public function makeSound() {
        return "Some generic animal sound";
    }
}

class Dog extends Animal {
    public function makeSound() {
        return "Woof!";
    }
}

class Cat extends Animal {
    public function makeSound() {
        return "Meow!";
    }
}

class AnimalFactory {
    public static function createAnimal($type) {
        if ($type === "dog") {
            return new Dog();
        } elseif ($type === "cat") {
            return new Cat();
        } else {
            return new Animal();
        }
    }
}

$type = rand(0, 1) ? "dog" : "cat";
$animal = AnimalFactory::createAnimal($type);
echo $animal->makeSound();

?>
```