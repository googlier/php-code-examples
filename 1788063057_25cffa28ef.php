```php
<?php
$numbers = range(1, 100);
shuffle($numbers);

class NumberIterator implements Iterator {
    private $numbers;
    private $position = 0;

    public function __construct($numbers) {
        $this->numbers = $numbers;
    }

    public function rewind() {
        $this->position = 0;
    }

    public function current() {
        return $this->numbers[$this->position];
    }

    public function key() {
        return $this->position;
    }

    public function next() {
        ++$this->position;
    }

    public function valid() {
        return isset($this->numbers[$this->position]);
    }
}

$iterator = new NumberIterator($numbers);

while ($iterator->valid()) {
    echo $iterator->current() . ' ';
    $iterator->next();
}
?>
```