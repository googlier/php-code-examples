```php
<?php

class NumberGenerator {
    public function generateRandomNumber($min, $max) {
        return mt_rand($min, $max);
    }
}

class NumberModifier {
    public function modifyNumber($number, $factor) {
        return $number * $factor;
    }
}

class NumberProcessor {
    private $numberGenerator;
    private $numberModifier;

    public function __construct(NumberGenerator $numberGenerator, NumberModifier $numberModifier) {
        $this->numberGenerator = $numberGenerator;
        $this->numberModifier = $numberModifier;
    }

    public function processNumber() {
        $number = $this->numberGenerator->generateRandomNumber(1, 100);
        $modifiedNumber = $this->numberModifier->modifyNumber($number, 2);
        return $modifiedNumber;
    }
}

$numberGenerator = new NumberGenerator();
$numberModifier = new NumberModifier();
$numberProcessor = new NumberProcessor($numberGenerator, $numberModifier);

echo $numberProcessor->processNumber();

?>
```