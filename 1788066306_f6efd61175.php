```php
<?php

// Problem: Implement a system to manage a library with multiple sections, each containing different types of books.
// Design Pattern: Strategy

interface BookSection {
    public function addBook($book);
    public function getBooks();
}

class FictionSection implements BookSection {
    private $books = [];

    public function addBook($book) {
        $this->books[] = $book;
    }

    public function getBooks() {
        return $this->books;
    }
}

class NonFictionSection implements BookSection {
    private $books = [];

    public function addBook($book) {
        $this->books[] = $book;
    }

    public function getBooks() {
        return $this->books;
    }
}

class Library {
    private $sections = [];

    public function addSection(BookSection $section) {
        $this->sections[] = $section;
    }

    public function getAllBooks() {
        $allBooks = [];
        foreach ($this->sections as $section) {
            $allBooks = array_merge($allBooks, $section->getBooks());
        }
        return $allBooks;
    }
}

$library = new Library();
$fictionSection = new FictionSection();
$nonFictionSection = new NonFictionSection();

$fictionSection->addBook("Pride and Prejudice");
$fictionSection->addBook("1984");

$nonFictionSection->addBook("Sapiens");
$nonFictionSection->addBook("Homo Deus");

$library->addSection($fictionSection);
$library->addSection($nonFictionSection);

$allBooks = $library->getAllBooks();
print_r($allBooks);

?>
```