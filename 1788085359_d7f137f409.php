```php
<?php
// Problem: Implement a function to find the maximum depth of a binary tree using recursion.
// Design Pattern: Recursive Strategy

class TreeNode {
    public $value;
    public $left;
    public $right;

    public function __construct($value) {
        $this->value = $value;
        $this->left = null;
        $this->right = null;
    }
}

function maxDepth($node) {
    if ($node === null) {
        return 0;
    } else {
        $leftDepth = maxDepth($node->left);
        $rightDepth = maxDepth($node->right);
        return max($leftDepth, $rightDepth) + 1;
    }
}

// Example usage:
$root = new TreeNode(1);
$root->left = new TreeNode(2);
$root->right = new TreeNode(3);
$root->left->left = new TreeNode(4);
$root->left->right = new TreeNode(5);

echo "Maximum depth of the binary tree: " . maxDepth($root);
?>
```