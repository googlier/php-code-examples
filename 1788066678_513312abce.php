```php
<?php
$pattern = array(
    'Strategy' => 'StrategyPattern',
    'Observer' => 'ObserverPattern',
    'Decorator' => 'DecoratorPattern',
    'Singleton' => 'SingletonPattern',
    'Factory' => 'FactoryPattern'
);

$random_pattern = $pattern[array_rand($pattern)];

class Context {
    private $strategy;

    public function __construct($strategy) {
        $this->strategy = $strategy;
    }

    public function executeStrategy() {
        $this->strategy->execute();
    }
}

abstract class Strategy {
    abstract public function execute();
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

if ($random_pattern === 'StrategyPattern') {
    $strategy = new ConcreteStrategyA();
} elseif ($random_pattern === 'ObserverPattern') {
    $observer1 = new ConcreteObserver();
    $observer2 = new ConcreteObserver();
    $subject = new ConcreteSubject();
    $subject->attach($observer1);
    $subject->attach($observer2);
    $subject->notify();
} elseif ($random_pattern === 'DecoratorPattern') {
    $component = new ConcreteComponent();
    $decoratorA = new ConcreteDecoratorA($component);
    $decoratorB = new ConcreteDecoratorB($decoratorA);
    $decoratorB->operation();
} elseif ($random_pattern === 'SingletonPattern') {
    Singleton::getInstance()->someOperation();
} elseif ($random_pattern === 'FactoryPattern') {
    $factory = new ConcreteFactory();
    $product = $factory->createProduct();
    $product->operation();
}

echo "Selected pattern: $random_pattern\n";
?>
```