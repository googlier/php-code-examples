```php
<?php

class Animal {
    public function makeSound() {
        echo "Some generic animal sound";
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
    public function createAnimal($type) {
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
$dog = $factory->createAnimal('dog');
$cat = $factory->createAnimal('cat');
$unknown = $factory->createAnimal('bird');

$dog->makeSound(); // Bark
$cat->makeSound(); // Meow
$unknown->makeSound(); // Some generic animal sound

?>
```