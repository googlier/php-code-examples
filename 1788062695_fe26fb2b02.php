```php
<?php
class Animal {
    public function makeSound() {
        echo "Some generic animal sound";
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
    public static function createAnimal($type) {
        switch($type) {
            case 'dog':
                return new Dog();
            case 'cat':
                return new Cat();
            default:
                return new Animal();
        }
    }
}

$factory = new AnimalFactory();
$dog = $factory->createAnimal('dog');
$dog->makeSound(); // Outputs: Woof!

$cat = $factory->createAnimal('cat');
$cat->makeSound(); // Outputs: Meow!

$genericAnimal = $factory->createAnimal('bird');
$genericAnimal->makeSound(); // Outputs: Some generic animal sound
?>
```