```php
<?php
// Problem: Implement a function that generates a random string of a specified length using a given set of characters.
// Design Pattern: Strategy

class StringGenerator {
    private $characters;
    private $length;

    public function __construct($characters, $length) {
        $this->characters = $characters;
        $this->length = $length;
    }

    public function generate() {
        $result = '';
        $max = strlen($this->characters) - 1;
        for ($i = 0; $i < $this->length; $i++) {
            $result .= $this->characters[rand(0, $max)];
        }
        return $result;
    }
}

$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
$length = 10;
$generator = new StringGenerator($characters, $length);
echo $generator->generate();
?>
```