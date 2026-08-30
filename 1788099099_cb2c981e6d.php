```php
<?php
class Strategy {
    public function execute($data) {
        throw new Exception("Strategy not implemented");
    }
}

class ConcreteStrategyA extends Strategy {
    public function execute($data) {
        return strtoupper($data);
    }
}

class ConcreteStrategyB extends Strategy {
    public function execute($data) {
        return strtolower($data);
    }
}

class Context {
    private $strategy;

    public function setStrategy(Strategy $strategy) {
        $this->strategy = $strategy;
    }

    public function executeStrategy($data) {
        return $this->strategy->execute($data);
    }
}

$context = new Context();
$data = "Hello, World!";

$randomStrategy = rand(0, 1) ? new ConcreteStrategyA() : new ConcreteStrategyB();

$context->setStrategy($randomStrategy);
$result = $context->executeStrategy($data);

echo $result;
?>
```