```php
<?php
class Singleton {
    private static $instance = null;
    private $data = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }

    public function setData($key, $value) {
        $this->data[$key] = $value;
    }

    public function getData($key) {
        return $this->data[$key];
    }
}

class DataProcessor {
    public function processData($data) {
        return strtoupper($data);
    }
}

$singletonInstance = Singleton::getInstance();
$singletonInstance->setData('key', 'value');

$processor = new DataProcessor();
$processedData = $processor->processData($singletonInstance->getData('key'));

echo $processedData;
?>
```