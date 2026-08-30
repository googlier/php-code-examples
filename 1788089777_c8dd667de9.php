```php
<?php
class Animal {
    abstract public function makeSound();
}

class Dog extends Animal {
    public function makeSound() {
        return "Woof!";
    }
}

class Cat extends Animal {
    public function makeSound() {
        return "Meow!";
    }
}

class AnimalFactory {
    public static function getAnimal($type) {
        switch ($type) {
            case "dog":
                return new Dog();
            case "cat":
                return new Cat();
            default:
                throw new Exception("Invalid animal type");
        }
    }
}

$animal = AnimalFactory::getAnimal("dog");
echo $animal->makeSound();

$animal = AnimalFactory::getAnimal("cat");
echo $animal->makeSound();
?>
```