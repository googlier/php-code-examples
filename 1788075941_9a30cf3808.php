```php
<?php
$pattern = 'FactoryMethod';
$solution = '<?php class Product {
    public function useProduct() {
        echo "Using a product!";
    }
}

interface Creator {
    public function factoryMethod(): Product;
}

class ConcreteCreator implements Creator {
    public function factoryMethod(): Product {
        return new Product();
    }
}

$creator = new ConcreteCreator();
$product = $creator->factoryMethod();
$product->useProduct();
?>';
echo $solution;
?>
```