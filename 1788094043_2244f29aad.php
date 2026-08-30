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

$animalType = rand(0, 2) == 0 ? 'dog' : 'cat';
$animal = AnimalFactory::createAnimal($animalType);
$animal->makeSound();
?>
```