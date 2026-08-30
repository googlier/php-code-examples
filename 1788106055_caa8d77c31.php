```php
<?php
$fruits = ["apple", "banana", "cherry", "date", "elderberry"];
$designPattern = "Singleton";

if ($designPattern == "Singleton") {
    class FruitSingleton {
        private static $instance = null;
        private $fruit;

        private function __construct($fruit) {
            $this->fruit = $fruit;
        }

        public static function getInstance($fruit) {
            if (self::$instance === null) {
                self::$instance = new FruitSingleton($fruit);
            }
            return self::$instance;
        }

        public function getFruit() {
            return $this->fruit;
        }
    }

    $fruit1 = FruitSingleton::getInstance($fruits[array_rand($fruits)]);
    $fruit2 = FruitSingleton::getInstance($fruits[array_rand($fruits)]);

    echo "Fruit 1: " . $fruit1->getFruit() . "<br>";
    echo "Fruit 2: " . $fruit2->getFruit() . "<br>";
    if ($fruit1->getFruit() == $fruit2->getFruit()) {
        echo "Both fruits are the same.";
    } else {
        echo "Fruits are different.";
    }
}
?>
```