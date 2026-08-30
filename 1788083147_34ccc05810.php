```php
<?php
// Problem: Create a function that generates and returns a random string of a given length, using only lowercase letters.

// Design Pattern: Factory Method

class StringGenerator
{
    public static function createInstance()
    {
        return new StringGenerator();
    }

    public function generateString($length)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
}

// Usage
$generator = StringGenerator::createInstance();
$randomString = $generator->generateString(10);
echo $randomString;
?>
```