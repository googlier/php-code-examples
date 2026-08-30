```php
<?php
// Define a class for a stack using the Iterator design pattern
class Stack implements Iterator {
    private $stack = array();
    private $position = 0;

    public function push($item) {
        array_push($this->stack, $item);
    }

    public function pop() {
        if ($this->position == 0) {
            throw new Exception("UnderflowException");
        }
        $this->position--;
        return array_pop($this->stack);
    }

    public function current() {
        return $this->stack[$this->position];
    }

    public function key() {
        return $this->position;
    }

    public function next() {
        $this->position++;
    }

    public function rewind() {
        $this->position = 0;
    }

    public function valid() {
        return isset($this->stack[$this->position]);
    }
}

// Usage of the Stack class
$stack = new Stack();
$stack->push(1);
$stack->push(2);
$stack->push(3);
echo $stack->pop(); // Outputs 3
echo $stack->pop(); // Outputs 2
echo $stack->pop(); // Outputs 1
?>
```