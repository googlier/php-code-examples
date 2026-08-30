```php
<?php
// Generate a random programming problem
$problem = [
    'task' => 'Create a function that takes an array of integers as input and returns the sum of all even numbers in the array.',
    'constraint' => 'The function should handle arrays with a maximum of 100 elements.',
    'example' => [
        'input' => [1, 2, 3, 4, 5, 6],
        'output' => 12
    ]
];

// Generate a random design pattern
$designPatterns = [
    'Singleton',
    'Factory',
    'Observer',
    'Strategy'
];
$pattern = $designPatterns[array_rand($designPatterns)];

// Implement the problem using the selected design pattern
class NumberProcessor {
    private static $instance;
    private $numbers = [];

    private function __construct() {}

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new NumberProcessor();
        }
        return self::$instance;
    }

    public function addNumber($number) {
        $this->numbers[] = $number;
    }

    public function getSumOfEvens() {
        return array_sum(array_filter($this->numbers, function($num) {
            return $num % 2 === 0;
        }));
    }
}

// Usage
$processor = NumberProcessor::getInstance();
$processor->addNumber($problem['example']['input'][0]);
$processor->addNumber($problem['example']['input'][1]);
$processor->addNumber($problem['example']['input'][2]);
$processor->addNumber($problem['example']['input'][3]);
$processor->addNumber($problem['example']['input'][4]);
$processor->addNumber($problem['example']['input'][5]);

echo $processor->getSumOfEvens(); // Output: 12
?>
```