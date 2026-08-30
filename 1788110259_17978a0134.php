```php
<?php
// Define a class to handle a stack using a Singly Linked List
class Node {
    public $data;
    public $next;

    public function __construct($data) {
        $this->data = $data;
        $this->next = null;
    }
}

class Stack {
    private $top;

    public function __construct() {
        $this->top = null;
    }

    public function push($data) {
        $newNode = new Node($data);
        $newNode->next = $this->top;
        $this->top = $newNode;
    }

    public function pop() {
        if ($this->top === null) {
            return null;
        }
        $data = $this->top->data;
        $this->top = $this->top->next;
        return $data;
    }

    public function peek() {
        if ($this->top === null) {
            return null;
        }
        return $this->top->data;
    }

    public function isEmpty() {
        return $this->top === null;
    }
}

// Example usage
$stack = new Stack();
$stack->push(10);
$stack->push(20);
$stack->push(30);

echo "Top element is " . $stack->peek() . "\n"; // Output: Top element is 30

echo "Popped element is " . $stack->pop() . "\n"; // Output: Popped element is 30

echo "Is stack empty? " . ($stack->isEmpty() ? 'Yes' : 'No') . "\n"; // Output: Is stack empty? No
?>
```