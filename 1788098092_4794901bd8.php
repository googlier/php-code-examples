```php
<?php

class Coffee {
    private $beverage;

    public function __construct($beverage) {
        $this->beverage = $beverage;
    }

    public function getBeverage() {
        return $this->beverage;
    }
}

class CoffeeDecorator {
    protected $coffee;

    public function __construct(Coffee $coffee) {
        $this->coffee = $coffee;
    }

    public function getBeverage() {
        return $this->coffee->getBeverage();
    }
}

class MilkDecorator extends CoffeeDecorator {
    public function getBeverage() {
        return $this->coffee->getBeverage() . " with Milk";
    }
}

class SugarDecorator extends CoffeeDecorator {
    public function getBeverage() {
        return $this->coffee->getBeverage() . " with Sugar";
    }
}

$coffee = new Coffee("Espresso");
$coffee = new MilkDecorator($coffee);
$coffee = new SugarDecorator($coffee);

echo $coffee->getBeverage(); // Espresso with Milk with Sugar

?>
```