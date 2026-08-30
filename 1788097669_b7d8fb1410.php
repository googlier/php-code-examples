```php
<?php

class TextFormatter {
    public function format($text) {
        return strtoupper($text);
    }
}

class TextDecorator {
    protected $decorated;

    public function __construct(TextFormatter $decorated) {
        $this->decorated = $decorated;
    }

    public function format($text) {
        return $this->decorated->format($text);
    }
}

class BoldDecorator extends TextDecorator {
    public function format($text) {
        return "<strong>" . parent::format($text) . "</strong>";
    }
}

class ItalicDecorator extends TextDecorator {
    public function format($text) {
        return "<em>" . parent::format($text) . "</em>";
    }
}

$text = "Hello, World!";
$textFormatter = new TextFormatter();
$boldDecorator = new BoldDecorator($textFormatter);
$italicDecorator = new ItalicDecorator($boldDecorator);

echo $italicDecorator->format($text);

?>
```