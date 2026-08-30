```php
<?php
$items = array("apple", "banana", "cherry", "date", "elderberry");
$designPattern = "Strategy";

function getDiscount($item) {
    switch ($item) {
        case "apple":
            return 0.1;
        case "banana":
            return 0.2;
        case "cherry":
            return 0.3;
        case "date":
            return 0.4;
        case "elderberry":
            return 0.5;
        default:
            return 0;
    }
}

interface DiscountStrategy {
    function calculateDiscount($price);
}

class FixedDiscountStrategy implements DiscountStrategy {
    public function calculateDiscount($price) {
        return $price * 0.9;
    }
}

class PercentageDiscountStrategy implements DiscountStrategy {
    public function calculateDiscount($price) {
        return $price - ($price * getDiscount($this->item));
    }
}

class DiscountContext {
    private $strategy;

    public function __construct($strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy($strategy) {
        $this->strategy = $strategy;
    }

    public function executeStrategy($price) {
        return $this->strategy->calculateDiscount($price);
    }
}

if ($designPattern == "Strategy") {
    $item = $items[array_rand($items)];
    $discountStrategy = new PercentageDiscountStrategy();
    $discountContext = new DiscountContext($discountStrategy);
    $price = 100;
    $discountedPrice = $discountContext->executeStrategy($price);
    echo "Item: $item, Original Price: $price, Discounted Price: $discountedPrice";
}
?>
```