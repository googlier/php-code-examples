```php
<?php

// Define an interface for vehicles
interface Vehicle {
    public function drive();
}

// Implement the interface with a Car class
class Car implements Vehicle {
    public function drive() {
        return "The car is driving!";
    }
}

// Implement the interface with a Bicycle class
class Bicycle implements Vehicle {
    public function drive() {
        return "The bicycle is pedaling!";
    }
}

// Factory pattern to create vehicle instances
class VehicleFactory {
    public static function getVehicle($type) {
        if ($type === 'car') {
            return new Car();
        } elseif ($type === 'bicycle') {
            return new Bicycle();
        } else {
            throw new InvalidArgumentException("Invalid vehicle type");
        }
    }
}

// Usage
$car = VehicleFactory::getVehicle('car');
echo $car->drive() . "\n";

$bicycle = VehicleFactory::getVehicle('bicycle');
echo $bicycle->drive() . "\n";

?>
```