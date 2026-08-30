```php
<?php
class Animal {
    public function makeSound() {
        throw new Exception("This method should be overridden.");
    }
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
            case 'dog':
                return new Dog();
            case 'cat':
                return new Cat();
            default:
                throw new Exception("Invalid animal type.");
        }
    }
}

try {
    $animal = AnimalFactory::getAnimal('dog');
    echo $animal->makeSound(); // Output: Woof!

    $animal = AnimalFactory::getAnimal('cat');
    echo $animal->makeSound(); // Output: Meow!
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
```