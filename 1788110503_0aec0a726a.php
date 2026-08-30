```php
<?php
class RandomProblem {
    public function generateRandomNumber($min, $max) {
        return rand($min, $max);
    }
}

class Factory {
    public static function createProblem() {
        return new RandomProblem();
    }
}

class ProblemSolver {
    public function solve($problem) {
        $number = $problem->generateRandomNumber(1, 100);
        echo "The random number is: " . $number;
    }
}

$problem = Factory::createProblem();
$solver = new ProblemSolver();
$solver->solve($problem);
?>
```