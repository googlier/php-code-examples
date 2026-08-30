```php
<?php
// Problem: Generate a function that takes an array of integers and returns the largest number that can be formed by concatenating the integers.

// Design Pattern: Factory Method

abstract class NumberFormatter {
    abstract public function format(array $numbers): string;
}

class AscendingFormatter extends NumberFormatter {
    public function format(array $numbers): string {
        sort($numbers, SORT_STRING);
        return implode('', $numbers);
    }
}

class DescendingFormatter extends NumberFormatter {
    public function format(array $numbers): string {
        rsort($numbers, SORT_STRING);
        return implode('', $numbers);
    }
}

class NumberFormatterFactory {
    public static function createFormatter($type): NumberFormatter {
        switch ($type) {
            case 'ascending':
                return new AscendingFormatter();
            case 'descending':
                return new DescendingFormatter();
            default:
                throw new Exception('Invalid formatter type');
        }
    }
}

function largestNumber(array $numbers, $type = 'descending'): string {
    $formatter = NumberFormatterFactory::createFormatter($type);
    return $formatter->format($numbers);
}

// Example usage:
$numbers = [3, 30, 34, 5, 9];
echo largestNumber($numbers); // Outputs: 9534330
?>
```