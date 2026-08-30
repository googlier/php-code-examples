```php
<?php
class DataProcessor {
    public function process($data) {
        return strtoupper($data);
    }
}

class DataDecorator {
    protected $decorated;

    public function __construct(DataProcessor $decorated) {
        $this->decorated = $decorated;
    }

    public function process($data) {
        return $this->decorated->process($data);
    }
}

class UpperCaseDecorator extends DataDecorator {
    public function process($data) {
        return parent::process($data) . ' - Uppercase Decorator';
    }
}

$data = "hello world";
$processor = new DataProcessor();
$decoratedProcessor = new UpperCaseDecorator($processor);
echo $decoratedProcessor->process($data);
?>
```