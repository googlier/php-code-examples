```php
<?php
class Animal {
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function makeSound() {
        echo "Some sound\n";
    }
}

class Dog extends Animal {
    public function makeSound() {
        echo "Woof!\n";
    }
}

class Cat extends Animal {
    public function makeSound() {
        echo "Meow!\n";
    }
}

class AnimalFactory {
    public static function getAnimal($type) {
        switch ($type) {
            case 'dog':
                return new Dog('Buddy');
            case 'cat':
                return new Cat('Whiskers');
            default:
                throw new Exception("Invalid animal type");
        }
    }
}

$animals = ['dog', 'cat'];
foreach ($animals as $animal) {
    $animalObj = AnimalFactory::getAnimal($animal);
    echo $animalObj->makeSound();
}
?>
```