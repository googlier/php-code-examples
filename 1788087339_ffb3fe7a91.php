```php
<?php

class CoffeeMaker {
    public function brew($type) {
        return "Brewing a $type coffee";
    }
}

class TeaMaker {
    public function steep($type) {
        return "Steeping a $type tea";
    }
}

interface BeverageMaker {
    public function prepare($type);
}

class CoffeeDecorator implements BeverageMaker {
    private $beverageMaker;

    public function __construct(BeverageMaker $beverageMaker) {
        $this->beverageMaker = $beverageMaker;
    }

    public function prepare($type) {
        return $this->beverageMaker->prepare($type) . " and adding sugar and cream";
    }
}

$coffeeMaker = new CoffeeMaker();
$teaMaker = new TeaMaker();

$coffeeDecorator = new CoffeeDecorator($coffeeMaker);

echo $coffeeDecorator->prepare("Espresso");
echo "\n";
echo $teaMaker->steep("Green");
?>
```