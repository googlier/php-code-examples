```php
<?php

// Generate a random array of integers
$numbers = range(1, 100);

// Shuffle the array
shuffle($numbers);

// Define the design pattern to use
$designPattern = rand(1, 2);
if ($designPattern == 1) {
    $pattern = 'Strategy';
} else {
    $pattern = 'Singleton';
}

// Implement the selected design pattern
if ($pattern == 'Strategy') {
    // Strategy Pattern
    interface SortStrategy {
        public function sort($array);
    }

    class BubbleSort implements SortStrategy {
        public function sort($array) {
            $n = count($array);
            for ($i = 0; $i < $n - 1; $i++) {
                for ($j = 0; $j < $n - $i - 1; $j++) {
                    if ($array[$j] > $array[$j + 1]) {
                        $temp = $array[$j];
                        $array[$j] = $array[$j + 1];
                        $array[$j + 1] = $temp;
                    }
                }
            }
            return $array;
        }
    }

    class SortContext {
        private $strategy;

        public function __construct(SortStrategy $strategy) {
            $this->strategy = $strategy;
        }

        public function setStrategy(SortStrategy $strategy) {
            $this->strategy = $strategy;
        }

        public function sort($array) {
            return $this->strategy->sort($array);
        }
    }

    $sortContext = new SortContext(new BubbleSort());
    $sortedNumbers = $sortContext->sort($numbers);
} else {
    // Singleton Pattern
    class NumberHolder {
        private static $instance = null;
        private $numbers;

        private function __construct($numbers) {
            $this->numbers = $numbers;
        }

        public static function getInstance($numbers) {
            if (self::$instance == null) {
                self::$instance = new NumberHolder($numbers);
            }
            return self::$instance;
        }

        public function getNumbers() {
            return $this->numbers;
        }
    }

    $numberHolder = NumberHolder::getInstance($numbers);
    $sortedNumbers = $numberHolder->getNumbers();
}

// Output the sorted array
echo '<pre>';
print_r($sortedNumbers);
echo '</pre>';

?>
```