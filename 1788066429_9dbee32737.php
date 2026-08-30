```php
<?php
// Problem: Implement a function that finds the longest palindrome in a given string.

// Design Pattern: Singleton

class PalindromeFinder {
    private static $instance = null;
    private $cache = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new PalindromeFinder();
        }
        return self::$instance;
    }

    public function findLongestPalindrome($string) {
        if (isset($this->cache[$string])) {
            return $this->cache[$string];
        }

        $longest = '';
        $length = strlen($string);

        for ($i = 0; $i < $length; $i++) {
            for ($j = $i + 1; $j <= $length; $j++) {
                $substring = substr($string, $i, $j);
                if ($this->isPalindrome($substring)) {
                    if (strlen($substring) > strlen($longest)) {
                        $longest = $substring;
                    }
                }
            }
        }

        $this->cache[$string] = $longest;
        return $longest;
    }

    private function isPalindrome($string) {
        return $string === strrev($string);
    }
}

// Usage
$finder = PalindromeFinder::getInstance();
echo $finder->findLongestPalindrome("babad");
?>
```