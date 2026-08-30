```php
<?php

class Animal {
    public function makeSound() {
        echo "Animal sound";
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

$factory = new AnimalFactory();
$dog = $factory->getAnimal('dog');
$dog->makeSound(); // Outputs: Bark

$cat = $factory->getAnimal('cat');
$cat->makeSound(); // Outputs: Meow

$generic = $factory->getAnimal('bird');
$generic->makeSound(); // Outputs: Animal sound

?>
```