```php
<?php

// Problem: Implement a system to manage a collection of books, where each book can be borrowed and returned.

// Design Pattern: Observer Pattern

// Class: Book
class Book {
    private $title;
    private $author;
    private $isBorrowed = false;
    private $observers = [];

    public function __construct($title, $author) {
        $this->title = $title;
        $this->author = $author;
    }

    public function borrow() {
        if (!$this->isBorrowed) {
            $this->isBorrowed = true;
            foreach ($this->observers as $observer) {
                $observer->update($this);
            }
        }
    }

    public function returnBook() {
        if ($this->isBorrowed) {
            $this->isBorrowed = false;
            foreach ($this->observers as $observer) {
                $observer->update($this);
            }
        }
    }

    public function attach($observer) {
        $this->observers[] = $observer;
    }

    public function detach($observer) {
        $key = array_search($observer, $this->observers);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function isBorrowed() {
        return $this->isBorrowed;
    }
}

// Class: Library
class Library {
    private $books = [];

    public function addBook(Book $book) {
        $this->books[] = $book;
    }

    public function getBooks() {
        return $this->books;
    }
}

// Class: Reader
class Reader {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function borrowBook(Book $book) {
        $book->borrow();
        echo $this->name . " has borrowed " . $book->getTitle() . "\n";
    }

    public function returnBook(Book $book) {
        $book->returnBook();
        echo $this->name . " has returned " . $book->getTitle() . "\n";
    }
}

// Usage
$library = new Library();
$book1 = new Book("1984", "George Orwell");
$book2 = new Book("To Kill a Mockingbird", "Harper Lee");
$reader1 = new Reader("John Doe");
$reader2 = new Reader("Jane Smith");

$library->addBook($book1);
$library->addBook($book2);

$reader1->borrowBook($book1);
$reader2->borrowBook($book2);

$reader1->returnBook($book1);
?>
```