```php
<?php
// Generate a random programming problem
$problem = [
    'function' => 'calculateArea',
    'params' => ['width' => rand(1, 100), 'height' => rand(1, 100)],
    'pattern' => 'Strategy'
];

// Solve the problem using the Strategy design pattern
$context = new Context();
$context->setStrategy(new AreaCalculator($problem['params']['width'], $problem['params']['height']));
echo $context->executeStrategy();

class Context {
    private $strategy;

    public function setStrategy(Strategy $strategy) {
        $this->strategy = $strategy;
    }

    public function executeStrategy() {
        return $this->strategy->calculate();
    }
}

interface Strategy {
    public function calculate();
}

class AreaCalculator implements Strategy {
    private $width;
    private $height;

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function calculate() {
        return $this->width * $this->height;
    }
}
?>
```