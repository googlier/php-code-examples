```php
<?php

// Problem: Implement a system that manages a queue of tasks where tasks are of different types and have varying priorities.
// Design Pattern: Strategy

// Define task interface
interface Task {
    public function execute();
}

// Implement specific tasks
class PrintTask implements Task {
    public function execute() {
        echo "Printing...\n";
    }
}

class EmailTask implements Task {
    public function execute() {
        echo "Sending email...\n";
    }
}

// Define strategy interface
interface TaskStrategy {
    public function executeTask(Task $task);
}

// Implement strategy for each priority
class HighPriorityStrategy implements TaskStrategy {
    public function executeTask(Task $task) {
        echo "Executing high priority task: ";
        $task->execute();
    }
}

class LowPriorityStrategy implements TaskStrategy {
    public function executeTask(Task $task) {
        echo "Executing low priority task: ";
        $task->execute();
    }
}

// Define context that uses strategy
class TaskManager {
    private $strategy;

    public function __construct(TaskStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(TaskStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function executeTask(Task $task) {
        $this->strategy->executeTask($task);
    }
}

// Usage
$printTask = new PrintTask();
$emailTask = new EmailTask();

$highPriority = new HighPriorityStrategy();
$lowPriority = new LowPriorityStrategy();

$manager = new TaskManager($highPriority);
$manager->executeTask($printTask);
$manager->executeTask($emailTask);

$manager->setStrategy($lowPriority);
$manager->executeTask($printTask);
$manager->executeTask($emailTask);
?>
```