```php
<?php

class Animal {
    abstract public function makeSound();
}

class Dog extends Animal {
    public function makeSound() {
        return "Bark";
    }
}

class Cat extends Animal {
    public function makeSound() {
        return "Meow";
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
                throw new Exception("Invalid animal type");
        }
    }
}

try {
    $dog = AnimalFactory::getAnimal('dog');
    $cat = AnimalFactory::getAnimal('cat');
    echo $dog->makeSound() . "<br>";
    echo $cat->makeSound() . "<br>";
} catch (Exception $e) {
    echo $e->getMessage();
}

?>
```