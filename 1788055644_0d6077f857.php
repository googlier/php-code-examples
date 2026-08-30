```php
<?php

// Define a class for a generic item with properties and methods
class Item {
    public $name;
    public $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }
}

// Define an interface for a discount strategy
interface DiscountStrategy {
    public function applyDiscount($price);
}

// Implement a concrete discount strategy for a percentage discount
class PercentageDiscount implements DiscountStrategy {
    private $discountPercentage;

    public function __construct($discountPercentage) {
        $this->discountPercentage = $discountPercentage;
    }

    public function applyDiscount($price) {
        return $price * (1 - $this->discountPercentage / 100);
    }
}

// Implement a concrete discount strategy for a fixed amount discount
class FixedAmountDiscount implements DiscountStrategy {
    private $discountAmount;

    public function __construct($discountAmount) {
        $this->discountAmount = $discountAmount;
    }

    public function applyDiscount($price) {
        return $price - $this->discountAmount;
    }
}

// Implement a strategy pattern to apply different discount strategies to items
class DiscountContext {
    private $discountStrategy;

    public function __construct(DiscountStrategy $discountStrategy) {
        $this->discountStrategy = $discountStrategy;
    }

    public function setDiscountStrategy(DiscountStrategy $discountStrategy) {
        $this->discountStrategy = $discountStrategy;
    }

    public function applyDiscountToItem(Item $item) {
        return $this->discountStrategy->applyDiscount($item->getPrice());
    }
}

// Example usage
$item = new Item("Laptop", 999.99);
$percentageDiscount = new PercentageDiscount(10);
$fixedAmountDiscount = new FixedAmountDiscount(100);

$discountContext = new DiscountContext($percentageDiscount);
echo "Item: " . $item->getName() . " Price: $" . $discountContext->applyDiscountToItem($item) . "\n";

$discountContext->setDiscountStrategy($fixedAmountDiscount);
echo "Item: " . $item->getName() . " Price: $" . $discountContext->applyDiscountToItem($item) . "\n";

?>
```