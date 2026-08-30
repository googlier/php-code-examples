```php
<?php
class NumberGenerator {
    protected $start;
    protected $end;

    public function __construct($start, $end) {
        $this->start = $start;
        $this->end = $end;
    }

    public function generate() {
        return rand($this->start, $this->end);
    }
}

class Singleton {
    private static $instance = null;

    protected function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }

    public function doSomething() {
        return "Singleton instance is doing something.";
    }
}

$generator = new NumberGenerator(1, 100);
echo "Random Number: " . $generator->generate() . "\n";

$singleton = Singleton::getInstance();
echo $singleton->doSomething();
?>
```