```php
<?php
// Generate a random number between 1 and 100
$number = rand(1, 100);

// Design pattern: Singleton
class NumberGenerator {
    private static $instance = null;
    private $number;

    private function __construct($number) {
        $this->number = $number;
    }

    public static function getInstance($number) {
        if (self::$instance === null) {
            self::$instance = new NumberGenerator($number);
        }
        return self::$instance;
    }

    public function getNumber() {
        return $this->number;
    }
}

// Use Singleton to get the number generator
$numberGenerator = NumberGenerator::getInstance($number);

// Output the generated number
echo "Generated number: " . $numberGenerator->getNumber();
?>
```