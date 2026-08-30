```php
<?php
class Animal {
    public function makeSound() {
        echo "The animal makes a sound";
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
            case "dog":
                return new Dog();
            case "cat":
                return new Cat();
            default:
                return new Animal();
        }
    }
}

$animal = AnimalFactory::createAnimal($_GET['type']);
$animal->makeSound();
?>
```