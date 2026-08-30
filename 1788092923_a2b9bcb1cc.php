```php
<?php
// Problem: Implement a system to manage a library with books and authors.

// Design Pattern: Strategy

// Classes
class Book {
    public $title;
    public $author;
    public $isbn;

    public function __construct($title, $author, $isbn) {
        $this->title = $title;
        $this->author = $author;
        $this->isbn = $isbn;
    }
}

class Author {
    public $name;
    public $email;

    public function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
    }
}

interface SearchStrategy {
    public function search(array $books, $query);
}

class TitleSearchStrategy implements SearchStrategy {
    public function search(array $books, $query) {
        return array_filter($books, function($book) use ($query) {
            return stripos($book->title, $query) !== false;
        });
    }
}

class AuthorSearchStrategy implements SearchStrategy {
    public function search(array $books, $query) {
        return array_filter($books, function($book) use ($query) {
            return stripos($book->author, $query) !== false;
        });
    }
}

// Usage
$books = [
    new Book("PHP: The Right Way", "David S. Zuelke", "978-0596157120"),
    new Book("Learning PHP, MySQL & JavaScript", "Robin Nixon", "978-1449355839"),
    new Book("Pro PHP 8", "Rob Walling", "978-1491964820")
];

$authors = [
    new Author("David S. Zuelke", "david.zuelke@example.com"),
    new Author("Robin Nixon", "robin.nixon@example.com"),
    new Author("Rob Walling", "rob.walling@example.com")
];

$searchStrategy = new TitleSearchStrategy();
$books = $searchStrategy->search($books, "PHP");

foreach ($books as $book) {
    echo $book->title . " by " . $book->author . "\n";
}
?>
```