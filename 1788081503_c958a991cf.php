```php
<?php
class Animal {
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function speak() {
        return "I speak";
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
    public static function create($type, $name) {
        switch ($type) {
            case 'dog':
                return new Dog($name);
            case 'cat':
                return new Cat($name);
            default:
                return new Animal($name);
        }
    }
}

$dog = AnimalFactory::create('dog', 'Buddy');
$cat = AnimalFactory::create('cat', 'Whiskers');

echo $dog->name . " says " . $dog->speak() . "\n";
echo $cat->name . " says " . $cat->speak() . "\n";
?>
```