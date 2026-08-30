```php
<?php
class Animal {
    public function makeSound() {
        echo "Some sound";
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

$dog = AnimalFactory::createAnimal('dog');
$dog->makeSound(); // Output: Bark

$cat = AnimalFactory::createAnimal('cat');
$cat->makeSound(); // Output: Meow

$genericAnimal = AnimalFactory::createAnimal('bird');
$genericAnimal->makeSound(); // Output: Some sound
?>
```