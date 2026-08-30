```php
<?php
class IteratorPatternExample {
    private $data = [];
    private $position = 0;

    public function __construct($data) {
        $this->data = $data;
    }

    public function hasNext() {
        return $this->position < count($this->data);
    }

    public function next() {
        return $this->data[$this->position++];
    }
}

$data = [1, 2, 3, 4, 5];
$iterator = new IteratorPatternExample($data);

while ($iterator->hasNext()) {
    echo $iterator->next() . ' ';
}
?>
```