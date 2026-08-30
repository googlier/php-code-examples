```php
<?php
// Define a class to represent a Product
class Product {
    private $name;
    private $price;

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

// Define a class to represent a ShoppingCart
class ShoppingCart {
    private $products = [];

    public function addItem(Product $product) {
        $this->products[] = $product;
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getPrice();
        }
        return $total;
    }
}

// Define a class to represent a DiscountStrategy
interface DiscountStrategy {
    public function applyDiscount($price);
}

// Define a class to represent a FixedDiscountStrategy
class FixedDiscountStrategy implements DiscountStrategy {
    private $discount;

    public function __construct($discount) {
        $this->discount = $discount;
    }

    public function applyDiscount($price) {
        return $price - $this->discount;
    }
}

// Define a class to represent a PercentageDiscountStrategy
class PercentageDiscountStrategy implements DiscountStrategy {
    private $percentage;

    public function __construct($percentage) {
        $this->percentage = $percentage;
    }

    public function applyDiscount($price) {
        return $price * (1 - $this->percentage / 100);
    }
}

// Define a class to represent a ShoppingCart with a DiscountStrategy
class DiscountedShoppingCart extends ShoppingCart {
    private $discountStrategy;

    public function __construct(DiscountStrategy $discountStrategy) {
        $this->discountStrategy = $discountStrategy;
    }

    public function getTotal() {
        $total = parent::getTotal();
        return $this->discountStrategy->applyDiscount($total);
    }
}

// Create some products
$product1 = new Product("Laptop", 1200);
$product2 = new Product("Mouse", 50);
$product3 = new Product("Keyboard", 100);

// Create a ShoppingCart with a fixed discount
$cart = new DiscountedShoppingCart(new FixedDiscountStrategy(50));

// Add products to the cart
$cart->addItem($product1);
$cart->addItem($product2);
$cart->addItem($product3);

// Get the total with discount
$total = $cart->getTotal();

// Output the total
echo "Total with discount: $" . $total;
?>
```