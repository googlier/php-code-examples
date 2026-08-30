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

    public function add(User $user) {
        $this->users[] = $user;
    }

    public function getByName($name) {
        foreach ($this->users as $user) {
            if ($user->getName() === $name) {
                return $user;
            }
        }
        return null;
    }
}

class UserService {
    private $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function createUser($name, $email) {
        $user = new User($name, $email);
        $this->userRepository->add($user);
        return $user;
    }

    public function findUserByName($name) {
        return $this->userRepository->getByName($name);
    }
}

$userRepository = new UserRepository();
$userService = new UserService($userRepository);

$user = $userService->createUser('John Doe', 'john.doe@example.com');
$foundUser = $userService->findUserByName('John Doe');

echo $foundUser->getEmail();
?>
```