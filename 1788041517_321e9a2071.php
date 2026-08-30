```php
<?php
class DataProcessor {
    private $data = [];

    public function addData($item) {
        $this->data[] = $item;
    }

    public function processData() {
        foreach ($this->data as $item) {
            echo $item . "\n";
        }
    }
}

class Logger {
    public function log($message) {
        echo "Log: " . $message . "\n";
    }
}

class Decorator {
    private $processor;
    private $logger;

    public function __construct(DataProcessor $processor, Logger $logger) {
        $this->processor = $processor;
        $this->logger = $logger;
    }

    public function addData($item) {
        $this->processor->addData($item);
        $this->logger->log("Data added: " . $item);
    }

    public function processData() {
        $this->processor->processData();
        $this->logger->log("Data processing complete");
    }
}

$processor = new DataProcessor();
$logger = new Logger();
$decorator = new Decorator($processor, $logger);

$decorator->addData("Item 1");
$decorator->addData("Item 2");
$decorator->processData();
?>
```