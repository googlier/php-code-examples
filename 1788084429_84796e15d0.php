```php
<?php
class TextFormatter {
    private $text;

    public function __construct($text) {
        $this->text = $text;
    }

    public function format() {
        return htmlspecialchars($this->text);
    }
}

class TextSanitizer {
    private $text;

    public function __construct($text) {
        $this->text = $text;
    }

    public function sanitize() {
        return trim(strip_tags($this->text));
    }
}

class TextProcessor {
    private $textFormatter;
    private $textSanitizer;

    public function __construct($textFormatter, $textSanitizer) {
        $this->textFormatter = $textFormatter;
        $this->textSanitizer = $textSanitizer;
    }

    public function process($text) {
        return $this->textFormatter->format($this->textSanitizer->sanitize($text));
    }
}

$text = "<script>alert('xss');</script> Hello, World!";
$textFormatter = new TextFormatter($text);
$textSanitizer = new TextSanitizer($text);
$textProcessor = new TextProcessor($textFormatter, $textSanitizer);

echo $textProcessor->process($text);
?>
```