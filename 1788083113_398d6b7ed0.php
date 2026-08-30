```php
<?php

interface Strategy {
    public function execute($data);
}

class StrategyA implements Strategy {
    public function execute($data) {
        return strtoupper($data);
    }
}

class StrategyB implements Strategy {
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
$rand = rand(0, 1);
if ($rand == 0) {
    $context->setStrategy(new StrategyA());
} else {
    $context->setStrategy(new StrategyB());
}

echo $context->executeStrategy("Hello World");

?>
```