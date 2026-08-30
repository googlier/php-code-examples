```php
<?php
class DataProcessor {
    private $data;

    public function __construct($data) {
        $this->data = $data;
    }

    public function process() {
        $processedData = array_map(function($item) {
            return $item * 2;
        }, $this->data);
        return $processedData;
    }
}

$data = [1, 2, 3, 4, 5];
$processor = new DataProcessor($data);
$result = $processor->process();
print_r($result);
?>
```