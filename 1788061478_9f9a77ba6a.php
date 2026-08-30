```php
<?php
// Problem: Implement a system to manage a library's book inventory where books can be checked out and returned.

// Design Pattern: Strategy Pattern

interface LibraryStrategy {
    public function checkout($book);
    public function returnBook($book);
}

class RegularLibraryStrategy implements LibraryStrategy {
    public function checkout($book) {
        if ($book['available'] > 0) {
            $book['available']--;
            return "Book '{$book['title']}' checked out successfully.";
        } else {
            return "Book '{$book['title']}' is currently unavailable.";
        }
    }

    public function returnBook($book) {
        $book['available']++;
        return "Book '{$book['title']}' returned successfully.";
    }
}

class LimitedAccessLibraryStrategy implements LibraryStrategy {
    public function checkout($book) {
        if ($book['available'] > 0 && $book['restricted'] == false) {
            $book['available']--;
            return "Book '{$book['title']}' checked out successfully.";
        } else {
            return "Book '{$book['title']}' is either unavailable or restricted.";
        }
    }

    public function returnBook($book) {
        $book['available']++;
        return "Book '{$book['title']}' returned successfully.";
    }
}

class Library {
    private $strategy;
    private $books;

    public function __construct(LibraryStrategy $strategy) {
        $this->strategy = $strategy;
        $this->books = [
            ['title' => 'Book One', 'available' => 2, 'restricted' => false],
            ['title' => 'Book Two', 'available' => 0, 'restricted' => true],
            ['title' => 'Book Three', 'available' => 1, 'restricted' => false]
        ];
    }

    public function checkoutBook($title) {
        foreach ($this->books as &$book) {
            if ($book['title'] == $title) {
                return $this->strategy->checkout($book);
            }
        }
        return "Book not found.";
    }

    public function returnBook($title) {
        foreach ($this->books as &$book) {
            if ($book['title'] == $title) {
                return $this->strategy->returnBook($book);
            }
        }
        return "Book not found.";
    }
}

// Usage
$library = new Library(new RegularLibraryStrategy());
echo $library->checkoutBook('Book One'); // Output: Book 'Book One' checked out successfully.
echo $library->returnBook('Book One'); // Output: Book 'Book One' returned successfully.
?>
```