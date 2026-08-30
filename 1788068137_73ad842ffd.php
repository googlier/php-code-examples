```php
<?php
// Define a trait to handle logging
trait LoggerTrait {
    public function log($message) {
        echo "Log: " . $message . "\n";
    }
}

// Define an interface for operations
interface Operation {
    public function execute();
}

// Implement the interface with a concrete class
class AddOperation implements Operation {
    private $a;
    private $b;

    public function __construct($a, $b) {
        $this->a = $a;
        $this->b = $b;
    }

    public function execute() {
        $result = $this->a + $this->b;
        $this->log("Added $this->a and $this->b to get $result");
        return $result;
    }
}

// Create a class to manage operations
class OperationManager {
    use LoggerTrait;

    public function performOperation(Operation $operation) {
        return $operation->execute();
    }
}

// Usage
$manager = new OperationManager();
$result = $manager->performOperation(new AddOperation(5, 3));
echo "Result: $result\n";
?>
```