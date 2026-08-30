```php
<?php
// Random Programming Problem:
// Create a function that takes an array of integers as input and returns a new array with the elements in reverse order.

// Solution using the Strategy Design Pattern:
interface ReverseStrategy {
    public function reverse(array $arr);
}

class NormalReverse implements ReverseStrategy {
    public function reverse(array $arr) {
        return array_reverse($arr);
    }
}

class InPlaceReverse implements ReverseStrategy {
    public function reverse(array $arr) {
        $left = 0;
        $right = count($arr) - 1;
        while ($left < $right) {
            $temp = $arr[$left];
            $arr[$left] = $arr[$right];
            $arr[$right] = $temp;
            $left++;
            $right--;
        }
        return $arr;
    }
}

class ReverseArray {
    private $strategy;

    public function __construct(ReverseStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(ReverseStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function reverse(array $arr) {
        return $this->strategy->reverse($arr);
    }
}

// Usage
$arr = [1, 2, 3, 4, 5];
$reverseArray = new ReverseArray(new NormalReverse());
echo implode(", ", $reverseArray->reverse($arr)) . "\n"; // Output: 5, 4, 3, 2, 1

$reverseArray->setStrategy(new InPlaceReverse());
echo implode(", ", $reverseArray->reverse($arr)) . "\n"; // Output: 5, 4, 3, 2, 1
?>
```