```php
<?php
// Define an interface for a queue
interface Queue {
    public function enqueue($item);
    public function dequeue();
    public function isEmpty();
}

// Implement the queue using a linked list
class LinkedListQueue implements Queue {
    private $head;
    private $tail;
    private $size = 0;

    public function enqueue($item) {
        $newNode = new Node($item);
        if ($this->isEmpty()) {
            $this->head = $newNode;
        } else {
            $this->tail->setNext($newNode);
        }
        $this->tail = $newNode;
        $this->size++;
    }

    public function dequeue() {
        if ($this->isEmpty()) {
            return null;
        }
        $item = $this->head->getItem();
        $this->head = $this->head->getNext();
        if ($this->head === null) {
            $this->tail = null;
        }
        $this->size--;
        return $item;
    }

    public function isEmpty() {
        return $this->size === 0;
    }
}

// Define a node class for the linked list
class Node {
    private $item;
    private $next;

    public function __construct($item) {
        $this->item = $item;
        $this->next = null;
    }

    public function getItem() {
        return $this->item;
    }

    public function getNext() {
        return $this->next;
    }

    public function setNext($next) {
        $this->next = $next;
    }
}

// Create a queue and use it
$queue = new LinkedListQueue();
$queue->enqueue(1);
$queue->enqueue(2);
$queue->enqueue(3);
echo $queue->dequeue(); // Output: 1
echo $queue->dequeue(); // Output: 2
?>
```