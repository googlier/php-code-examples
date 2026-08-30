```php
<?php
// Define a class that represents a bank account
class BankAccount {
    private $balance;

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

// Use Singleton design pattern to ensure only one instance of BankAccount
class BankAccountSingleton {
    private static $instance = null;
    private $bankAccount;

    private function __construct() {
        $this->bankAccount = new BankAccount();
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function deposit($amount) {
        self::getInstance()->bankAccount->deposit($amount);
    }

    public function withdraw($amount) {
        self::getInstance()->bankAccount->withdraw($amount);
    }

    public function getBalance() {
        return self::getInstance()->bankAccount->getBalance();
    }
}

// Test the BankAccountSingleton
$account = BankAccountSingleton::getInstance();
$account->deposit(100);
echo "Balance: " . $account->getBalance() . "\n"; // Balance: 100
$account->withdraw(50);
echo "Balance: " . $account->getBalance() . "\n"; // Balance: 50
?>
```