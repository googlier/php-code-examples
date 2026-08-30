```php
<?php
class TextFormatter {
    public function format($text) {
        return strtoupper($text);
    }
}

class Decorator {
    protected $textFormatter;

    public function __construct(TextFormatter $textFormatter) {
        $this->textFormatter = $textFormatter;
    }

    public function decorate($text) {
        return $this->textFormatter->format($text);
    }
}

class StyleDecorator extends Decorator {
    public function decorate($text) {
        return '<strong>' . parent::decorate($text) . '</strong>';
    }
}

$text = "hello world";
$textFormatter = new TextFormatter();
$decorator = new StyleDecorator($textFormatter);
echo $decorator->decorate($text);
?>
```