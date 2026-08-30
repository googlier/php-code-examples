```php
<?php
// Define a function to generate a random number between 1 and 100
function getRandomNumber() {
    return rand(1, 100);
}

// Define a class to represent a Product
class Product {
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

// Define a class to represent a ShoppingCart using the Singleton design pattern
class ShoppingCart {
    private static $instance = null;
    private $items = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new ShoppingCart();
        }
        return self::$instance;
    }

    public function addItem(Product $product) {
        $this->items[] = $product;
    }

    public function getTotalPrice() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getPrice();
        }
        return $total;
    }
}

// Create a random product
$product = new Product('Random Product', getRandomNumber());

// Add the product to the shopping cart
$cart = ShoppingCart::getInstance();
$cart->addItem($product);

// Output the total price of the shopping cart
echo 'Total Price: ' . $cart->getTotalPrice();
?>
```