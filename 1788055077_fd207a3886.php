```php
<?php
// Define a class for a simple bank account
class BankAccount {
    private $balance = 0;

    public function deposit($amount) {
        $this->balance += $amount;
    }

    public function withdraw($amount) {
        if ($this->balance >= $amount) {
            $this->balance -= $amount;
        } else {
            throw new Exception("Insufficient funds");
        }
    }

    public function getBalance() {
        return $this->balance;
    }
}

// Implement the Singleton design pattern for the BankAccount class
class SingletonBankAccount {
    private static $instance = null;
    private $account;

    private function __construct() {
        $this->account = new BankAccount();
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function deposit($amount) {
        $this->account->deposit($amount);
    }

    public function withdraw($amount) {
        $this->account->withdraw($amount);
    }

    public function getBalance() {
        return $this->account->getBalance();
    }
}

// Usage
try {
    $account = SingletonBankAccount::getInstance();
    $account->deposit(100);
    echo "Balance: " . $account->getBalance() . "\n";
    $account->withdraw(50);
    echo "Balance: " . $account->getBalance() . "\n";
    $account->withdraw(60); // Should throw an exception
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>
```