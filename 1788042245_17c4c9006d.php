```php
<?php

interface Strategy {
    public function execute($data);
}

class UpperCaseStrategy implements Strategy {
    public function execute($data) {
        return strtoupper($data);
    }
}

class LowerCaseStrategy implements Strategy {
    public function execute($data) {
        return strtolower($data);
    }
}

class StringTransformer {
    protected $strategy;

    public function setStrategy(Strategy $strategy) {
        $this->strategy = $strategy;
    }

    public function transform($data) {
        return $this->strategy->execute($data);
    }
}

// Generate a random string
$randomString = substr(str_shuffle(str_repeat('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789', 5)), 0, 10);

// Randomly choose a strategy
$randomNumber = rand(0, 1);
$strategy = ($randomNumber == 0) ? new UpperCaseStrategy() : new LowerCaseStrategy();

// Create transformer and apply strategy
$transformer = new StringTransformer();
$transformer->setStrategy($strategy);
$transformedString = $transformer->transform($randomString);

echo $transformedString;

?>
```