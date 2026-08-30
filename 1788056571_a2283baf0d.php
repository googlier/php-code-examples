```php
<?php

// Generate a random programming problem and solve it using a random design pattern

// Problem: Create a function that calculates the total cost of an order for a restaurant. 
// The function should take an array of menu items and their prices as input, and return the total cost including tax.

// Design Pattern: Strategy Pattern

// Define an interface for the strategy
interface TaxStrategy {
    public function calculateTax($price);
}

// Implement a tax calculation strategy
class GSTStrategy implements TaxStrategy {
    public function calculateTax($price) {
        return $price * 0.05; // 5% GST
    }
}

// Implement another tax calculation strategy
class VATStrategy implements TaxStrategy {
    public function calculateTax($price) {
        return $price * 0.15; // 15% VAT
    }
}

// Implement a context class that uses the strategy
class Order {
    private $taxStrategy;

    public function setTaxStrategy(TaxStrategy $taxStrategy) {
        $this->taxStrategy = $taxStrategy;
    }

    public function calculateTotalCost($menuItems) {
        $totalCost = 0;
        foreach ($menuItems as $item) {
            $totalCost += $item['price'];
        }
        return $totalCost + $this->taxStrategy->calculateTax($totalCost);
    }
}

// Usage
$restaurantMenu = [
    ['item' => 'Burger', 'price' => 10.00],
    ['item' => 'Fries', 'price' => 3.50],
    ['item' => 'Drink', 'price' => 2.00]
];

$order = new Order();
$order->setTaxStrategy(new GSTStrategy()); // Set GST strategy
$totalCost = $order->calculateTotalCost($restaurantMenu);
echo "Total cost with GST: $" . number_format($totalCost, 2);

$order->setTaxStrategy(new VATStrategy()); // Set VAT strategy
$totalCost = $order->calculateTotalCost($restaurantMenu);
echo "<br>Total cost with VAT: $" . number_format($totalCost, 2);

?>
```