```php
<?php

class NumberCruncher {
    private $number;

    public function __construct($number) {
        $this->number = $number;
    }

    public function doubleNumber() {
        return $this->number * 2;
    }
}

class NumberProcessor {
    public function process(NumberCruncher $numberCruncher) {
        return $numberCruncher->doubleNumber();
    }
}

$number = rand(1, 100);
$numberCruncher = new NumberCruncher($number);
$numberProcessor = new NumberProcessor();
$result = $numberProcessor->process($numberCruncher);

echo "Original Number: $number\n";
echo "Processed Number: $result\n";

?>
```