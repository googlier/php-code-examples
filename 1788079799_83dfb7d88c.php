```php
<?php

class User {
    private $name;
    private $email;

    public function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }
}

class UserRepository {
    private $users = [];

    public function addUser(User $user) {
        $this->users[] = $user;
    }

    public function findUserByEmail($email) {
        foreach ($this->users as $user) {
            if ($user->getEmail() == $email) {
                return $user;
            }
        }
        return null;
    }
}

interface Logger {
    public function log($message);
}

class FileLogger implements Logger {
    public function log($message) {
        file_put_contents('log.txt', $message . PHP_EOL, FILE_APPEND);
    }
}

class UserRetrievalService {
    private $userRepository;
    private $logger;

    public function __construct(UserRepository $userRepository, Logger $logger) {
        $this->userRepository = $userRepository;
        $this->logger = $logger;
    }

    public function retrieveUserByEmail($email) {
        $user = $this->userRepository->findUserByEmail($email);
        if ($user) {
            $this->logger->log('User found: ' . $user->getName());
            return $user;
        } else {
            $this->logger->log('User not found for email: ' . $email);
            return null;
        }
    }
}

$userRepository = new UserRepository();
$userRepository->addUser(new User('John Doe', 'john@example.com'));
$userRepository->addUser(new User('Jane Doe', 'jane@example.com'));

$logger = new FileLogger();

$userRetrievalService = new UserRetrievalService($userRepository, $logger);

$user = $userRetrievalService->retrieveUserByEmail('john@example.com');

if ($user) {
    echo 'User Name: ' . $user->getName() . PHP_EOL;
} else {
    echo 'User not found' . PHP_EOL;
}
?>
```