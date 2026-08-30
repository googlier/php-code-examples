```php
<?php

// Define a design pattern
class Singleton
{
    private static $instance = null;

    private function __construct() {}

    public static function getInstance()
    {
        if (self::$instance == null)
        {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }

    public function showMessage()
    {
        echo "Hello, World!";
    }
}

// Create a problem using the design pattern
$pattern = Singleton::getInstance();
$pattern->showMessage();

?>
```