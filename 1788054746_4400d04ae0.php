```php
<?php

// Define a simple interface for a vehicle
interface Vehicle {
    public function drive();
}

// Implement the interface with different vehicle types
class Car implements Vehicle {
    public function drive() {
        return "Driving a car";
    }
}

class Bicycle implements Vehicle {
    public function drive() {
        return "Riding a bicycle";
    }
}

// Use the Factory Method pattern to create vehicle instances
class VehicleFactory {
    public static function createVehicle($type) {
        switch ($type) {
            case 'car':
                return new Car();
            case 'bicycle':
                return new Bicycle();
            default:
                throw new Exception("Unknown vehicle type");
        }
    }
}

// Usage
$vehicle = VehicleFactory::createVehicle('car');
echo $vehicle->drive(); // Output: Driving a car

$vehicle = VehicleFactory::createVehicle('bicycle');
echo $vehicle->drive(); // Output: Riding a bicycle

?>
```