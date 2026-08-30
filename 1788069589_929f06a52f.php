```php
<?php
// Define a simple interface for a Coffee
interface Coffee {
    public function cost();
}

// Implement a concrete coffee class
class SimpleCoffee implements Coffee {
    public function cost() {
        return 5;
    }
}

// Define a decorator interface
interface CoffeeDecorator implements Coffee {
    public function cost();
}

// Implement a concrete decorator
class MilkDecorator implements CoffeeDecorator {
    private $coffee;

    public function __construct(Coffee $coffee) {
        $this->coffee = $coffee;
    }

    public function cost() {
        return $this->coffee->cost() + 1;
    }
}

// Create a coffee object
$coffee = new SimpleCoffee();

// Decorate the coffee with milk
$coffeeWithMilk = new MilkDecorator($coffee);

// Output the cost of the coffee with milk
echo "Cost of coffee with milk: $" . $coffeeWithMilk->cost();
?>
```