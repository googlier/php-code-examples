```php
<?php

class Animal {
    public function makeSound() {
        echo "Animal makes a sound";
    }
}

class Dog extends Animal {
    public function makeSound() {
        echo "Woof!";
    }
}

class Cat extends Animal {
    public function makeSound() {
        echo "Meow!";
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
$cat = $factory->getAnimal('cat');

$dog->makeSound(); // Outputs: Woof!
$cat->makeSound(); // Outputs: Meow!
?>
```