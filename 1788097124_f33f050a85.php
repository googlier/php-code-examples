```php
<?php
// Problem: Create a function that generates a random string of a given length containing uppercase, lowercase, and digits

class RandomStringGenerator {
    private $length;

    public function __construct($length) {
        $this->length = $length;
    }

    public function generate() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $this->length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
}

$length = 10;
$generator = new RandomStringGenerator($length);
echo $generator->generate();
?>
```