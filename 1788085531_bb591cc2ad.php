```php
<?php
class Vehicle {
    private $speed;

    public function __construct($speed) {
        $this->speed = $speed;
    }

    public function getSpeed() {
        return $this->speed;
    }

    public function accelerate($amount) {
        $this->speed += $amount;
    }

    public function brake($amount) {
        $this->speed -= $amount;
    }
}

interface Strategy {
    public function execute($vehicle);
}

class SpeedUpStrategy implements Strategy {
    public function execute($vehicle) {
        $vehicle->accelerate(rand(10, 30));
    }
}

class SlowDownStrategy implements Strategy {
    public function execute($vehicle) {
        $vehicle->brake(rand(5, 20));
    }
}

class Context {
    private $strategy;

    public function setStrategy(Strategy $strategy) {
        $this->strategy = $strategy;
    }

    public function executeStrategy($vehicle) {
        $this->strategy->execute($vehicle);
    }
}

$vehicle = new Vehicle(0);
$context = new Context();

$randomStrategy = rand(1, 2) === 1 ? new SpeedUpStrategy() : new SlowDownStrategy();
$context->setStrategy($randomStrategy);
$context->executeStrategy($vehicle);

echo "Current speed: " . $vehicle->getSpeed();
?>
```