```php
<?php
// Define an interface for a logger
interface Logger {
    public function log(string $message): void;
}

// Implement a simple file logger
class FileLogger implements Logger {
    private $filePath;

    public function __construct(string $filePath) {
        $this->filePath = $filePath;
    }

    public function log(string $message): void {
        file_put_contents($this->filePath, $message . PHP_EOL, FILE_APPEND);
    }
}

// Implement a logger that outputs to the console
class ConsoleLogger implements Logger {
    public function log(string $message): void {
        echo $message . PHP_EOL;
    }
}

// Implement a logger that uses a database to store logs
class DatabaseLogger implements Logger {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function log(string $message): void {
        $stmt = $this->pdo->prepare('INSERT INTO logs (message) VALUES (:message)');
        $stmt->execute(['message' => $message]);
    }
}

// Use the Strategy pattern to select the logger at runtime
class LoggerContext {
    private $logger;

    public function __construct(Logger $logger) {
        $this->logger = $logger;
    }

    public function setLogger(Logger $logger): void {
        $this->logger = $logger;
    }

    public function log(string $message): void {
        $this->logger->log($message);
    }
}

// Usage example
try {
    // Initialize loggers
    $fileLogger = new FileLogger('app.log');
    $consoleLogger = new ConsoleLogger();
    $dbLogger = new DatabaseLogger(new PDO('mysql:host=localhost;dbname=test', 'user', 'password'));

    // Create a logger context
    $loggerContext = new LoggerContext($fileLogger);

    // Log messages using different strategies
    $loggerContext->log('This is a file log message');
    $loggerContext->setLogger($consoleLogger);
    $loggerContext->log('This is a console log message');
    $loggerContext->setLogger($dbLogger);
    $loggerContext->log('This is a database log message');
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
```