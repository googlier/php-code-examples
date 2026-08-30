```php
<?php

// Problem: Implement a function to find the maximum depth of a binary tree using recursion.

// Design Pattern: Strategy Pattern

class BinaryTree {
    public $value;
    public $left;
    public $right;

    public function __construct($value, $left = null, $right = null) {
        $this->value = $value;
        $this->left = $left;
        $this->right = $right;
    }
}

interface DepthCalculator {
    public function calculateDepth($tree);
}

class RecursiveDepthCalculator implements DepthCalculator {
    public function calculateDepth($tree) {
        if ($tree == null) {
            return 0;
        } else {
            $leftDepth = $this->calculateDepth($tree->left);
            $rightDepth = $this->calculateDepth($tree->right);
            return max($leftDepth, $rightDepth) + 1;
        }
    }
}

function findMaxDepth($tree) {
    $calculator = new RecursiveDepthCalculator();
    return $calculator->calculateDepth($tree);
}

// Example usage:
$tree = new BinaryTree(1, 
    new BinaryTree(2, 
        new BinaryTree(4), 
        new BinaryTree(5)
    ), 
    new BinaryTree(3, 
        null, 
        new BinaryTree(6)
    )
);

echo "Maximum depth of the binary tree: " . findMaxDepth($tree);

?>
```