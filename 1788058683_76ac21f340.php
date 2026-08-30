```php
<?php
abstract class Strategy {
    abstract function execute($data);
}

class ConcreteStrategyA extends Strategy {
    public function execute($data) {
        return "Processing with Strategy A: " . $data;
    }
}

class ConcreteStrategyB extends Strategy {
    public function execute($data) {
        return "Processing with Strategy B: " . $data;
    }
}

class Context {
    private $strategy;

    public function __construct(Strategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(Strategy $strategy) {
        $this->strategy = $strategy;
    }

    public function executeStrategy($data) {
        return $this->strategy->execute($data);
    }
}

$context = new Context(new ConcreteStrategyA());
echo $context->executeStrategy("Input Data");

$context->setStrategy(new ConcreteStrategyB());
echo "<br>";
echo $context->executeStrategy("Input Data");
?>
```