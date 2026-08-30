```php
<?php
// Define an interface for a product
interface Product {
    public function useProduct();
}

// Concrete product class
class ConcreteProductA implements Product {
    public function useProduct() {
        echo "Using Product A\n";
    }
}

class ConcreteProductB implements Product {
    public function useProduct() {
        echo "Using Product B\n";
    }
}

// Factory pattern to create products
class ProductFactory {
    public static function createProduct($type) {
        switch ($type) {
            case 'A':
                return new ConcreteProductA();
            case 'B':
                return new ConcreteProductB();
            default:
                throw new Exception("Invalid product type");
        }
    }
}

// Strategy pattern to define a family of algorithms
interface UseStrategy {
    public function useProduct(Product $product);
}

class UseStrategyA implements UseStrategy {
    public function useProduct(Product $product) {
        echo "Using Strategy A: ";
        $product->useProduct();
    }
}

class UseStrategyB implements UseStrategy {
    public function useProduct(Product $product) {
        echo "Using Strategy B: ";
        $product->useProduct();
    }
}

// Context class that uses a strategy
class Context {
    private $strategy;

    public function __construct(UseStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function executeStrategy(Product $product) {
        $this->strategy->useProduct($product);
    }
}

// Client code to demonstrate the pattern
$productType = rand(1, 2);
$product = ProductFactory::createProduct($productType == 1 ? 'A' : 'B');

$useStrategyType = rand(1, 2);
$useStrategy = $useStrategyType == 1 ? new UseStrategyA() : new UseStrategyB();

$context = new Context($useStrategy);
$context->executeStrategy($product);
?>
```