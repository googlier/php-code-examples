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
    public static function createAnimal($type) {
        switch ($type) {
            case 'dog':
                return new Dog();
            case 'cat':
                return new Cat();
            default:
                throw new Exception("Unknown animal type.");
        }
    }
}

$factory = new AnimalFactory();
$dog = $factory->createAnimal('dog');
echo $dog->makeSound(); // Output: Woof!

$cat = $factory->createAnimal('cat');
echo $cat->makeSound(); // Output: Meow!
?>
```