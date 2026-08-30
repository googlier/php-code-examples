```php
<?php
class Strategy {
    abstract function execute();
}

class ConcreteStrategyA extends Strategy {
    public function execute() {
        echo "Executing strategy A\n";
    }
}

class ConcreteStrategyB extends Strategy {
    public function execute() {
        echo "Executing strategy B\n";
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

    public function executeStrategy() {
        $this->strategy->execute();
    }
}

$context = new Context(new ConcreteStrategyA());
$context->executeStrategy();

$context->setStrategy(new ConcreteStrategyB());
$context->executeStrategy();
?>
```