```php
<?php
// Define a class for a simple bank account
class BankAccount {
    protected $balance;

    public function __construct($initialBalance = 0) {
        $this->balance = $initialBalance;
    }

    public function deposit($amount) {
        $this->balance += $amount;
    }

    public function withdraw($amount) {
        if ($amount > $this->balance) {
            throw new Exception("Insufficient funds");
        }
        $this->balance -= $amount;
    }

    public function getBalance() {
        return $this->balance;
    }
}

// Implement the Singleton design pattern to ensure only one instance of BankAccount
class SingletonBankAccount extends BankAccount {
    private static $instance = null;

    protected function __clone() {}

    protected function __wakeup() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new SingletonBankAccount();
        }
        return self::$instance;
    }
}

// Usage
try {
    $account = SingletonBankAccount::getInstance();
    $account->deposit(100);
    echo "Balance: " . $account->getBalance() . "\n";
    $account->withdraw(50);
    echo "Balance: " . $account->getBalance() . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>
```