```php
<?php
class Animal {
    abstract function makeSound();
}

class Dog extends Animal {
    function makeSound() {
        return "Woof!";
    }
}

class Cat extends Animal {
    function makeSound() {
        return "Meow!";
    }
}

class AnimalFactory {
    static function getAnimal($type) {
        if ($type == "dog") {
            return new Dog();
        } else if ($type == "cat") {
            return new Cat();
        } else {
            return null;
        }
    }
}

$animalType = rand(0, 1) == 0 ? "dog" : "cat";
$animal = AnimalFactory::getAnimal($animalType);
echo $animal->makeSound();
?>
```