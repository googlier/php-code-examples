```php
<?php

interface Logger {
    public function log($message);
}

class FileLogger implements Logger {
    public function log($message) {
        file_put_contents('log.txt', $message . PHP_EOL, FILE_APPEND);
    }
}

class DatabaseLogger implements Logger {
    public function log($message) {
        // Simulating database logging
        echo "Logging to database: " . $message . PHP_EOL;
    }
}

class LoggerFactory {
    public static function getLogger($type) {
        switch ($type) {
            case 'file':
                return new FileLogger();
            case 'database':
                return new DatabaseLogger();
            default:
                throw new Exception('Unknown logger type');
        }
    }
}

class Application {
    private $logger;

    public function __construct($loggerType) {
        $this->logger = LoggerFactory::getLogger($loggerType);
    }

    public function doSomething() {
        $this->logger->log('Doing something...');
    }
}

$app = new Application('file');
$app->doSomething();

?>
```