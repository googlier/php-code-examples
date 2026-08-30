```php
<?php
// Generate a random programming problem and solve it using a random design pattern

class RandomNumberGenerator {
    public function generate($min, $max) {
        return mt_rand($min, $max);
    }
}

class Problem {
    protected $generator;
    protected $problem;
    protected $solution;

    public function __construct($generator) {
        $this->generator = $generator;
        $this->generateProblem();
        $this->solveProblem();
    }

    private function generateProblem() {
        $this->problem = "Find the sum of all even numbers between " . $this->generator->generate(1, 100) . " and " . $this->generator->generate(101, 200) . ".";
    }

    private function solveProblem() {
        $min = $this->generator->generate(1, 100);
        $max = $this->generator->generate(101, 200);
        $sum = 0;
        for ($i = $min; $i <= $max; $i++) {
            if ($i % 2 == 0) {
                $sum += $i;
            }
        }
        $this->solution = "The sum is: " . $sum;
    }

    public function getProblem() {
        return $this->problem;
    }

    public function getSolution() {
        return $this->solution;
    }
}

$generator = new RandomNumberGenerator();
$problem = new Problem($generator);

echo "Problem: " . $problem->getProblem() . "<br>";
echo "Solution: " . $problem->getSolution();
?>
```