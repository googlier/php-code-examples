```php
<?php

class NumberGenerator {
    private $min;
    private $max;

    public function __construct($min, $max) {
        $this->min = $min;
        $this->max = $max;
    }

    public function generate() {
        return rand($this->min, $this->max);
    }
}

class NumberConsumer {
    public function consume($number) {
        if ($number % 2 == 0) {
            echo "The number is even\n";
        } else {
            echo "The number is odd\n";
        }
    }
}

class NumberProcessor {
    private $generator;
    private $consumer;

    public function __construct(NumberGenerator $generator, NumberConsumer $consumer) {
        $this->generator = $generator;
        $this->consumer = $consumer;
    }

    public function process() {
        $number = $this->generator->generate();
        $this->consumer->consume($number);
    }
}

$generator = new NumberGenerator(1, 100);
$consumer = new NumberConsumer();
$processor = new NumberProcessor($generator, $consumer);
$processor->process();

?>
```