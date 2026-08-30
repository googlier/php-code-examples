```php
<?php
// Problem: Implement a function to find the longest common prefix among an array of strings.

// Design Pattern: Strategy Pattern

interface PrefixStrategy {
    public function findPrefix(array $strings): string;
}

class HorizontalScanStrategy implements PrefixStrategy {
    public function findPrefix(array $strings): string {
        if (empty($strings)) return '';

        $prefix = $strings[0];
        for ($i = 1; $i < count($strings); $i++) {
            while (strpos($strings[$i], $prefix) !== 0) {
                $prefix = substr($prefix, 0, -1);
                if (empty($prefix)) return '';
            }
        }
        return $prefix;
    }
}

class VerticalScanStrategy implements PrefixStrategy {
    public function findPrefix(array $strings): string {
        if (empty($strings)) return '';

        $prefix = '';
        $length = strlen($strings[0]);
        for ($i = 0; $i < $length; $i++) {
            $char = $strings[0][$i];
            for ($j = 1; $j < count($strings); $j++) {
                if ($i == strlen($strings[$j]) || $strings[$j][$i] != $char) {
                    return $prefix;
                }
            }
            $prefix .= $char;
        }
        return $prefix;
    }
}

class PrefixFinder {
    private $strategy;

    public function __construct(PrefixStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(PrefixStrategy $strategy): void {
        $this->strategy = $strategy;
    }

    public function findPrefix(array $strings): string {
        return $this->strategy->findPrefix($strings);
    }
}

// Usage
$finder = new PrefixFinder(new HorizontalScanStrategy());
echo $finder->findPrefix(["flower", "flow", "flight"]); // Output: fl

$finder->setStrategy(new VerticalScanStrategy());
echo $finder->findPrefix(["dog", "racecar", "car"]); // Output: 
?>
```