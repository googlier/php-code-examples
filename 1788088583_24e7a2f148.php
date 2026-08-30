```php
<?php
// Generate a random string
$randomString = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789', 5)), 1, 10);

// Define a class for a simple Singleton pattern
class Singleton {
    private static $instance = null;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }
}

// Create an instance of the Singleton class
$singletonInstance = Singleton::getInstance();

// Define a function to process the random string
function processString($string) {
    $result = '';
    for ($i = 0; $i < strlen($string); $i++) {
        $ascii = ord($string[$i]);
        if ($ascii >= 65 && $ascii <= 90) {
            $result .= chr($ascii + 32);
        } elseif ($ascii >= 97 && $ascii <= 122) {
            $result .= chr($ascii - 32);
        } else {
            $result .= $string[$i];
        }
    }
    return $result;
}

// Process the random string using the Singleton instance
$processedString = processString($singletonInstance->randomString);

// Output the result
echo $processedString;
?>
```