```php
<?php
class Animal {
    protected $name;
    protected $sound;

    public function __construct($name, $sound) {
        $this->name = $name;
        $this->sound = $sound;
    }

    public function makeSound() {
        echo $this->name . " makes " . $this->sound . " sound.\n";
    }
}

class Dog extends Animal {
    public function __construct($name) {
        parent::__construct($name, "bark");
    }
}

class Cat extends Animal {
    public function __construct($name) {
        parent::__construct($name, "meow");
    }
}

class AnimalFactory {
    public static function createAnimal($type, $name) {
        switch ($type) {
            case 'dog':
                return new Dog($name);
            case 'cat':
                return new Cat($name);
            default:
                throw new Exception("Unknown animal type");
        }
    }
}

try {
    $dog = AnimalFactory::createAnimal('dog', 'Buddy');
    $dog->makeSound();

    $cat = AnimalFactory::createAnimal('cat', 'Whiskers');
    $cat->makeSound();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
```