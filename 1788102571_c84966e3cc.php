```php
<?php
// Generate a random programming problem
$randomNumber = rand(1, 100);
$problem = "Create a function that checks if a number is prime and returns true if it is, and false otherwise. Test it with the number $randomNumber.";

// Define a design pattern
$designPattern = "Strategy";

// Solve the problem using the chosen design pattern
class PrimeChecker {
    public function isPrime($number) {
        if ($number <= 1) {
            return false;
        }
        for ($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i == 0) {
                return false;
            }
        }
        return true;
    }
}

class PrimeCheckerDecorator {
    protected $primeChecker;

    public function __construct(PrimeChecker $primeChecker) {
        $this->primeChecker = $primeChecker;
    }

    public function check($number) {
        return $this->primeChecker->isPrime($number);
    }
}

$primeChecker = new PrimeChecker();
$primeCheckerDecorator = new PrimeCheckerDecorator($primeChecker);

// Test the solution
$result = $primeCheckerDecorator->check($randomNumber);

// Output the result
echo "Number: $randomNumber";
echo "Is Prime: " . ($result ? 'true' : 'false');
?>
```