```php
<?php

// Generate a random number between 1 and 100
$number = rand(1, 100);

// Design pattern: Singleton
class NumberValidator
{
    private static $instance = null;
    private $number;

    private function __construct($number)
    {
        $this->number = $number;
    }

    public static function getInstance($number)
    {
        if (self::$instance === null) {
            self::$instance = new NumberValidator($number);
        }
        return self::$instance;
    }

    public function isValid()
    {
        return $this->number > 50;
    }
}

// Usage
$validator = NumberValidator::getInstance($number);
if ($validator->isValid()) {
    echo "The number is greater than 50.";
} else {
    echo "The number is 50 or less.";
}

?>
```