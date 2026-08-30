```php
<?php
// Generate a random programming problem and solve it using a random design pattern

class RandomProblem {
    public function generateProblem() {
        $operations = ['+', '-', '*', '/'];
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        $operation = $operations[array_rand($operations)];
        return "What is $num1 $operation $num2? ";
    }

    public function solveProblem($problem, $userAnswer) {
        list($num1, $operation, $num2) = sscanf($problem, '%d %s %d');
        switch ($operation) {
            case '+':
                $correctAnswer = $num1 + $num2;
                break;
            case '-':
                $correctAnswer = $num1 - $num2;
                break;
            case '*':
                $correctAnswer = $num1 * $num2;
                break;
            case '/':
                $correctAnswer = $num1 / $num2;
                break;
        }
        return $correctAnswer == $userAnswer;
    }
}

class StrategyContext {
    private $strategy;

    public function setStrategy($strategy) {
        $this->strategy = $strategy;
    }

    public function executeStrategy($problem, $userAnswer) {
        return $this->strategy->solveProblem($problem, $userAnswer);
    }
}

class Strategy {
    public function solveProblem($problem, $userAnswer) {
        return false; // Default implementation
    }
}

class SimpleStrategy extends Strategy {
    public function solveProblem($problem, $userAnswer) {
        $problemObj = new RandomProblem();
        return $problemObj->solveProblem($problem, $userAnswer);
    }
}

class StrategyFactory {
    public static function getStrategy($strategyType) {
        switch ($strategyType) {
            case 'simple':
                return new SimpleStrategy();
            default:
                throw new Exception("Invalid strategy type");
        }
    }
}

// Usage
$problem = (new RandomProblem())->generateProblem();
echo "Problem: $problem\n";

$strategyType = 'simple';
$strategy = StrategyFactory::getStrategy($strategyType);
$context = new StrategyContext();
$context->setStrategy($strategy);

$userAnswer = (int)readline("Your Answer: ");
$result = $context->executeStrategy($problem, $userAnswer);

if ($result) {
    echo "Correct!\n";
} else {
    echo "Incorrect!\n";
}
?>
```