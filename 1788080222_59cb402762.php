```php
<?php
// Generate a random programming problem and solve it using a random design pattern

class RandomProblem {
    public function generateProblem() {
        $operations = ['+', '-', '*', '/'];
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        $operation = $operations[array_rand($operations)];
        $this->problem = "What is {$num1} {$operation} {$num2}?";
        $this->answer = eval("return {$num1} {$operation} {$num2};");
    }

    public function getProblem() {
        return $this->problem;
    }

    public function checkAnswer($userAnswer) {
        return $this->answer == $userAnswer;
    }
}

class Strategy {
    abstract public function execute($data);
}

class OperationStrategy implements Strategy {
    public function execute($data) {
        return eval("return {$data};");
    }
}

class Context {
    private $strategy;

    public function __construct(Strategy $strategy) {
        $this->strategy = $strategy;
    }

    public function executeStrategy($data) {
        return $this->strategy->execute($data);
    }
}

$problemGenerator = new RandomProblem();
$problemGenerator->generateProblem();
$problem = $problemGenerator->getProblem();
$expectedAnswer = $problemGenerator->answer;

$userAnswer = readline("Enter your answer: ");

$context = new Context(new OperationStrategy());
$userResponse = $context->executeStrategy($userAnswer);

if ($problemGenerator->checkAnswer($userResponse)) {
    echo "Correct!";
} else {
    echo "Incorrect. The correct answer is {$expectedAnswer}.";
}
?>
```