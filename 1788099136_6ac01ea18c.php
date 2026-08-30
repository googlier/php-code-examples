```php
<?php

class Animal {
    abstract function makeSound();
}

class Dog extends Animal {
    function makeSound() {
        echo "Bark";
    }
}

class Cat extends Animal {
    function makeSound() {
        echo "Meow";
    }
}

class AnimalFactory {
    static function getAnimal($type) {
        switch($type) {
            case 'dog':
                return new Dog();
            case 'cat':
                return new Cat();
            default:
                throw new Exception("Unknown animal type");
        }
    }
}

$factory = new AnimalFactory();
$dog = $factory->getAnimal('dog');
$dog->makeSound();

$cat = $factory->getAnimal('cat');
$cat->makeSound();

?>
```