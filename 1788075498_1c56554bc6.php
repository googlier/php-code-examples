```php
<?php

// Define a class for a BankAccount with basic functionalities
class BankAccount {
    private $balance = 0;

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

// Use the Singleton design pattern to ensure only one instance of BankAccount is created
class SingletonBankAccount {
    private static $instance = null;
    private $bankAccount;

    private function __construct() {
        $this->bankAccount = new BankAccount();
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new SingletonBankAccount();
        }
        return self::$instance;
    }

    public function getBankAccount() {
        return $this->bankAccount;
    }
}

// Usage
try {
    $account = SingletonBankAccount::getInstance()->getBankAccount();
    $account->deposit(1000);
    echo "Balance: " . $account->getBalance() . "\n";
    $account->withdraw(500);
    echo "Balance: " . $account->getBalance() . "\n";
    $account->withdraw(600);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
```