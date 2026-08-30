```php
<?php
// Problem: Implement a system to manage a library of books using the Factory Method pattern.

// Book interface
interface Book {
    public function getTitle();
    public function getAuthor();
}

// FictionBook class
class FictionBook implements Book {
    private $title;
    private $author;

    public function __construct($title, $author) {
        $this->title = $title;
        $this->author = $author;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }
}

// NonFictionBook class
class NonFictionBook implements Book {
    private $title;
    private $author;

    public function __construct($title, $author) {
        $this->title = $title;
        $this->author = $author;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }
}

// BookFactory class
class BookFactory {
    public static function createBook($type, $title, $author) {
        switch ($type) {
            case 'fiction':
                return new FictionBook($title, $author);
            case 'non-fiction':
                return new NonFictionBook($title, $author);
            default:
                throw new Exception("Unknown book type");
        }
    }
}

// Usage
try {
    $fictionBook = BookFactory::createBook('fiction', '1984', 'George Orwell');
    echo "Book Title: " . $fictionBook->getTitle() . ", Author: " . $fictionBook->getAuthor() . "\n";

    $nonFictionBook = BookFactory::createBook('non-fiction', 'Sapiens', 'Yuval Noah Harari');
    echo "Book Title: " . $nonFictionBook->getTitle() . ", Author: " . $nonFictionBook->getAuthor() . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
```