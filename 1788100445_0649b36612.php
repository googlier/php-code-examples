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

class NumberFormatter {
    private $format;

    public function __construct($format) {
        $this->format = $format;
    }

    public function formatNumber($number) {
        return sprintf($this->format, $number);
    }
}

class NumberFacade {
    private $numberGenerator;
    private $numberFormatter;

    public function __construct($min, $max, $format) {
        $this->numberGenerator = new NumberGenerator($min, $max);
        $this->numberFormatter = new NumberFormatter($format);
    }

    public function generateFormattedNumber() {
        $number = $this->numberGenerator->generate();
        return $this->numberFormatter->formatNumber($number);
    }
}

echo NumberFacade::generateFormattedNumber(1, 100, '%d');
?>
```