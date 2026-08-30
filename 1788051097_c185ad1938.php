```php
<?php
class Animal {
    public function makeSound() {
        return "Some generic sound";
    }
}

class Dog extends Animal {
    public function makeSound() {
        return "Woof";
    }
}

class Cat extends Animal {
    public function makeSound() {
        return "Meow";
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

$factory = new AnimalFactory();
$dog = $factory->createAnimal('dog');
echo $dog->makeSound(); // Outputs: Woof

$cat = $factory->createAnimal('cat');
echo $cat->makeSound(); // Outputs: Meow
?>
```