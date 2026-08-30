```php
<?php

// Define a Product interface
interface Product {
    public function useProduct();
}

// Implement a ConcreteProductA class
class ConcreteProductA implements Product {
    public function useProduct() {
        return "Using Product A";
    }
}

// Implement a ConcreteProductB class
class ConcreteProductB implements Product {
    public function useProduct() {
        return "Using Product B";
    }
}

// Define a Creator abstract class
abstract class Creator {
    abstract protected function factoryMethod(): Product;

    public function operation(): string {
        $product = $this->factoryMethod();
        return "Creator: The same creator's code has just worked with {$product->useProduct()}";
    }
}

// Implement a ConcreteCreatorA class
class ConcreteCreatorA extends Creator {
    protected function factoryMethod(): Product {
        return new ConcreteProductA();
    }
}

// Implement a ConcreteCreatorB class
class ConcreteCreatorB extends Creator {
    protected function factoryMethod(): Product {
        return new ConcreteProductB();
    }
}

// Usage
$creatorA = new ConcreteCreatorA();
echo $creatorA->operation();

$creatorB = new ConcreteCreatorB();
echo $creatorB->operation();

?>
```