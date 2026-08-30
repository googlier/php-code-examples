```php
<?php

class Singleton {
    private static $instance = null;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }

    public function doSomething() {
        echo "Doing something in a singleton instance.";
    }
}

class Context {
    private $strategy;

    public function setStrategy($strategy) {
        $this->strategy = $strategy;
    }

    public function executeStrategy() {
        $this->strategy->execute();
    }
}

interface Strategy {
    public function execute();
}

class ConcreteStrategyA implements Strategy {
    public function execute() {
        echo "Executing strategy A.";
    }
}

class ConcreteStrategyB implements Strategy {
    public function execute() {
        echo "Executing strategy B.";
    }
}

class ContextStrategy {
    private $context;
    private $strategy;

    public function __construct(Context $context, Strategy $strategy) {
        $this->context = $context;
        $this->strategy = $strategy;
    }

    public function execute() {
        $this->context->setStrategy($this->strategy);
        $this->context->executeStrategy();
    }
}

$singleton = Singleton::getInstance();
$singleton->doSomething();

$context = new Context();
$strategyA = new ConcreteStrategyA();
$contextStrategy = new ContextStrategy($context, $strategyA);
$contextStrategy->execute();

$strategyB = new ConcreteStrategyB();
$contextStrategy->setStrategy($strategyB);
$contextStrategy->execute();

?>
```