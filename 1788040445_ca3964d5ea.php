```php
<?php
// Problem: Implement a function to find the first non-repeating character in a string.

// Design Pattern: Singleton

class FirstNonRepeatingCharacter {
    private static $instance = null;
    private $characterCount = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new FirstNonRepeatingCharacter();
        }
        return self::$instance;
    }

    public function findCharacter($string) {
        for ($i = 0; $i < strlen($string); $i++) {
            $char = $string[$i];
            if (isset($this->characterCount[$char])) {
                $this->characterCount[$char]++;
            } else {
                $this->characterCount[$char] = 1;
            }
        }

        for ($i = 0; $i < strlen($string); $i++) {
            if ($this->characterCount[$string[$i]] == 1) {
                return $string[$i];
            }
        }

        return null;
    }
}

// Usage
$fnrc = FirstNonRepeatingCharacter::getInstance();
echo $fnrc->findCharacter("programming"); // Should return 'p'
?>
```