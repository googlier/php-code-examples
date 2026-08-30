```php
<?php

// Define a class to represent a simple bank account
class BankAccount {
    private $balance;

    public function __construct($initialBalance = 0) {
        $this->balance = $initialBalance;
    }

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

// Implement the Singleton design pattern to ensure only one instance of BankAccount is created
class SingletonBankAccount {
    private static $instance = null;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new BankAccount();
        }
        return self::$instance;
    }
}

// Test the Singleton design pattern
$account1 = SingletonBankAccount::getInstance();
$account1->deposit(100);
echo "Balance in account1: " . $account1->getBalance() . "\n";

$account2 = SingletonBankAccount::getInstance();
$account2->withdraw(50);
echo "Balance in account2: " . $account2->getBalance() . "\n";

?>
```