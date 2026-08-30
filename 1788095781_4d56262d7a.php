```php
<?php

class Iterator {
    private $data;
    private $position = 0;

    public function __construct($data) {
        $this->data = $data;
    }

    public function hasNext() {
        return isset($this->data[$this->position]);
    }

    public function next() {
        return $this->data[$this->position++];
    }
}

class Container {
    private $data = [];

    public function add($item) {
        $this->data[] = $item;
    }

    public function getIterator() {
        return new Iterator($this->data);
    }
}

$container = new Container();
$container->add("Item 1");
$container->add("Item 2");
$container->add("Item 3");

foreach ($container as $item) {
    echo $item . "<br>";
}
?>
```