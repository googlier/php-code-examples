```php
<?php
class Animal {
    public function speak() {
        return "Some sound";
    }
}

class Dog extends Animal {
    public function speak() {
        return "Woof!";
    }
}

class Cat extends Animal {
    public function speak() {
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
                return new Animal();
        }
    }
}

$animals = ['dog', 'cat', 'bird', 'fish'];

foreach ($animals as $animal) {
    $animalInstance = AnimalFactory::getAnimal($animal);
    echo $animalInstance->speak() . "\n";
}
?>
```