```php
<?php
class Animal {
    public function makeSound() {
        echo "Some generic sound";
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

$animalType = rand(1, 3);
if ($animalType == 1) {
    $animal = AnimalFactory::getAnimal('dog');
} elseif ($animalType == 2) {
    $animal = AnimalFactory::getAnimal('cat');
} else {
    $animal = AnimalFactory::getAnimal('unknown');
}

$animal->makeSound();
?>
```