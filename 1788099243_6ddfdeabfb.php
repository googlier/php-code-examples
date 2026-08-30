```php
<?php
// Problem: Implement a function to find the first non-repeated character in a string.

// Design Pattern: Factory Method

class CharacterFinderFactory {
    public static function getFinder($method) {
        switch ($method) {
            case 'array_count_values':
                return new ArrayCountValuesFinder();
            default:
                throw new Exception("Unsupported method");
        }
    }
}

interface CharacterFinder {
    public function findNonRepeatedCharacter($string);
}

class ArrayCountValuesFinder implements CharacterFinder {
    public function findNonRepeatedCharacter($string) {
        $counts = array_count_values(str_split($string));
        foreach ($counts as $char => $count) {
            if ($count === 1) {
                return $char;
            }
        }
        return null;
    }
}

$string = "programming";
$finder = CharacterFinderFactory::getFinder('array_count_values');
$nonRepeatedChar = $finder->findNonRepeatedCharacter($string);
echo "First non-repeated character: " . $nonRepeatedChar;
?>
```