```php
<?php

// Define an interface for a logger
interface Logger {
    public function log($message);
}

// Implement the logger using a Singleton design pattern
class SingletonLogger implements Logger {
    private static $instance = null;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new SingletonLogger();
        }
        return self::$instance;
    }

    public function log($message) {
        echo "Log: " . $message . "\n";
    }
}

// Define a function that uses the logger to log a message
function logMessage($message) {
    $logger = SingletonLogger::getInstance();
    $logger->log($message);
}

// Call the function to log a message
logMessage("This is a log message.");
?>
```