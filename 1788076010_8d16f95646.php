```php
<?php
class Animal {
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function speak() {
        return $this->name . " makes a noise";
    }
}

class Dog extends Animal {
    public function speak() {
        return $this->name . " barks";
    }
}

class Cat extends Animal {
    public function speak() {
        return $this->name . " meows";
    }
}

class AnimalFactory {
    public static function getAnimal($type, $name) {
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
    $dog = AnimalFactory::getAnimal('dog', 'Buddy');
    echo $dog->speak() . "\n";

    $cat = AnimalFactory::getAnimal('cat', 'Whiskers');
    echo $cat->speak() . "\n";
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
```