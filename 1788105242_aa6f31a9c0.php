```php
<?php

class TextFormatter {
    public function format($text) {
        return strtoupper($text);
    }
}

class MarkdownDecorator {
    private $textFormatter;

    public function __construct(TextFormatter $textFormatter) {
        $this->textFormatter = $textFormatter;
    }

    public function format($text) {
        return $this->textFormatter->format($text) . "\n\n";
    }
}

$text = "Hello, World!";
$textFormatter = new TextFormatter();
$markdownDecorator = new MarkdownDecorator($textFormatter);
$formattedText = $markdownDecorator->format($text);
echo $formattedText;
?>
```