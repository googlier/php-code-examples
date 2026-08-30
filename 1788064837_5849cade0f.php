```php
<?php
class Animal {
    abstract function makeSound();
}

class Dog extends Animal {
    function makeSound() {
        return "Bark";
    }
}

class Cat extends Animal {
    function makeSound() {
        return "Meow";
    }
}

class AnimalFactory {
    function getAnimal($type) {
        switch ($type) {
            case "dog":
                return new Dog();
            case "cat":
                return new Cat();
            default:
                return null;
        }
    }
}

$factory = new AnimalFactory();
$dog = $factory->getAnimal("dog");
$cat = $factory->getAnimal("cat");

echo "Dog says: " . $dog->makeSound() . "<br>";
echo "Cat says: " . $cat->makeSound();
?>
```