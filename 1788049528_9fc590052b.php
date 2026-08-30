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
        if ($amount > $this->balance) {
            throw new Exception("Insufficient funds");
        }
        $this->balance -= $amount;
    }

    public function getBalance() {
        return $this->balance;
    }
}

// Define an interface for a logging system
interface Logger {
    public function log($message);
}

// Implement a simple file-based logger
class FileLogger implements Logger {
    public function log($message) {
        file_put_contents('log.txt', $message . PHP_EOL, FILE_APPEND);
    }
}

// Use the Strategy design pattern to allow different logging strategies
class AccountManager {
    private $logger;

    public function __construct(Logger $logger) {
        $this->logger = $logger;
    }

    public function createAccount($initialBalance) {
        $this->logger->log("Creating new account with initial balance: $initialBalance");
        return new BankAccount($initialBalance);
    }

    public function deposit($account, $amount) {
        $this->logger->log("Depositing $amount into account");
        $account->deposit($amount);
    }

    public function withdraw($account, $amount) {
        $this->logger->log("Withdrawing $amount from account");
        $account->withdraw($amount);
    }

    public function getBalance($account) {
        $this->logger->log("Getting balance of account");
        return $account->getBalance();
    }
}

// Example usage
$logger = new FileLogger();
$accountManager = new AccountManager($logger);

$account = $accountManager->createAccount(100);
$accountManager->deposit($account, 50);
$accountManager->withdraw($account, 30);
$balance = $accountManager->getBalance($account);
echo "Current balance: $balance";
?>
```