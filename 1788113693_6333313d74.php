```php
<?php
// Define a function to generate a random number between $min and $max
function getRandomNumber($min, $max) {
    return mt_rand($min, $max);
}

// Define a function to implement the Singleton design pattern
class DatabaseConnection {
    private static $instance = null;

    private function __construct() {
        // Simulate database connection
        echo "Database connection established.\n";
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new DatabaseConnection();
        }
        return self::$instance;
    }

    public function query($sql) {
        // Simulate database query
        echo "Executing query: $sql\n";
    }
}

// Main code
$number = getRandomNumber(1, 100);
echo "Random number generated: $number\n";

$db = DatabaseConnection::getInstance();
$db->query("SELECT * FROM users WHERE age > $number");
?>
```