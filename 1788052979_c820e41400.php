```php
<?php
class Vehicle {
    public $type;

    public function __construct($type) {
        $this->type = $type;
    }

    public function drive() {
        echo "The " . $this->type . " is driving.\n";
    }
}

class CarDecorator {
    protected $vehicle;

    public function __construct(Vehicle $vehicle) {
        $this->vehicle = $vehicle;
    }

    public function drive() {
        $this->vehicle->drive();
    }
}

class SportsCarDecorator extends CarDecorator {
    public function drive() {
        $this->vehicle->drive();
        echo "The sports car is speeding.\n";
    }
}

$car = new Vehicle("sedan");
$decoratedCar = new SportsCarDecorator($car);
$decoratedCar->drive();
?>
```