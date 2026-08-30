```php
<?php

class Animal {
    public function makeSound() {
        echo "Some sound";
    }
}

class Dog extends Animal {
    public function makeSound() {
        echo "Woof";
    }
}

class Cat extends Animal {
    public function makeSound() {
        echo "Meow";
    }
}

class AnimalFactory {
    public static function getAnimal($type) {
        switch ($type) {
            case 'dog':
                return new Dog();
            case 'cat':
                return new Cat();
            default:
                return new Animal();
        }
    }
}

$animals = ['dog', 'cat', 'bird'];

foreach ($animals as $animal) {
    $animalInstance = AnimalFactory::getAnimal($animal);
    $animalInstance->makeSound();
    echo "\n";
}

?>
```