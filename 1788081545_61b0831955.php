```php
<?php
// Problem: Implement a system to manage a collection of books. Each book has a title, author, and ISBN. Create methods to add a book, remove a book, and search for a book by ISBN.

// Design Pattern: Singleton Pattern
class BookManager {
    private static $instance = null;
    private $books = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new BookManager();
        }
        return self::$instance;
    }

    public function addBook($title, $author, $isbn) {
        $this->books[$isbn] = ['title' => $title, 'author' => $author];
    }

    public function removeBook($isbn) {
        if (array_key_exists($isbn, $this->books)) {
            unset($this->books[$isbn]);
        }
    }

    public function searchBookByISBN($isbn) {
        if (array_key_exists($isbn, $this->books)) {
            return $this->books[$isbn];
        }
        return null;
    }
}

// Usage
$bookManager = BookManager::getInstance();
$bookManager->addBook('1984', 'George Orwell', '9780451524935');
$bookManager->addBook('To Kill a Mockingbird', 'Harper Lee', '9780060935467');

print_r($bookManager->searchBookByISBN('9780451524935'));
$bookManager->removeBook('9780451524935');
print_r($bookManager->searchBookByISBN('9780451524935'));
?>
```