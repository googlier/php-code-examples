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
        if ($type == "dog") {
            return new Dog();
        } elseif ($type == "cat") {
            return new Cat();
        }
        throw new Exception("Unknown animal type");
    }
}

$factory = new AnimalFactory();
$dog = $factory->getAnimal("dog");
$cat = $factory->getAnimal("cat");

echo $dog->makeSound(); // Outputs: Woof!
echo $cat->makeSound(); // Outputs: Meow!
?>
```