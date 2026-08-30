```php
<?php

class Animal {
    public function makeSound() {
        echo "Some generic animal sound\n";
    }
}

class Dog extends Animal {
    public function makeSound() {
        echo "Woof!\n";
    }
}

class Cat extends Animal {
    public function makeSound() {
        echo "Meow!\n";
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
$dog->makeSound();

$cat = $factory->getAnimal('cat');
$cat->makeSound();

$generic = $factory->getAnimal('bird');
$generic->makeSound();
?>
```