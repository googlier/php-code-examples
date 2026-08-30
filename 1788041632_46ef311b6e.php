```php
<?php

// Generate random programming problem and design pattern
$problems = [
    'Create a function to calculate the nth Fibonacci number using recursion',
    'Design a Singleton pattern for a database connection class',
    'Implement a Factory pattern to create different types of vehicles'
];

$designPatterns = [
    'Recursion',
    'Singleton',
    'Factory'
];

$randomProblem = $problems[array_rand($problems)];
$randomPattern = $designPatterns[array_rand($designPatterns)];

// Problem: Implement a Factory pattern to create different types of vehicles
if ($randomProblem === $problems[2] && $randomPattern === $designPatterns[2]) {
    echo '<?php
    interface Vehicle {
        public function start();
        public function stop();
    }

    class Car implements Vehicle {
        public function start() {
            echo "Car started.\n";
        }

        public function stop() {
            echo "Car stopped.\n";
        }
    }

    class Bike implements Vehicle {
        public function start() {
            echo "Bike started.\n";
        }

        public function stop() {
            echo "Bike stopped.\n";
        }
    }

    class VehicleFactory {
        public static function createVehicle($type) {
            switch ($type) {
                case "car":
                    return new Car();
                case "bike":
                    return new Bike();
                default:
                    throw new Exception("Unknown vehicle type");
            }
        }
    }

    $vehicle = VehicleFactory::createVehicle("car");
    $vehicle->start();
    $vehicle->stop();

    $vehicle = VehicleFactory::createVehicle("bike");
    $vehicle->start();
    $vehicle->stop();
    ?>';
}
?>
```