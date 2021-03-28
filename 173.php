<?php
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class BSTIterator
{
    public $cur;
    public $stack;
    /**
     * @param TreeNode $root
     */
    public function __construct($root)
    {
        $this->cur   = $root;
        $this->stack = new SplStack();
    }

    /**
     * @return Integer
     */
    public function next()
    {
        while ($this->cur != null) {
            $this->stack->push($this->cur);
            $this->cur = $this->cur->left;
        }
        $this->cur = $this->stack->pop();
        $ret       = $this->cur->val;
        $this->cur = $this->cur->right;
        return $ret;

    }

    /**
     * @return Boolean
     */
    public function hasNext()
    {
        return $this->cur != null || !$this->stack->isEmpty();
    }
}

/**
 * Your BSTIterator object will be instantiated and called as such:
 * $obj = BSTIterator($root);
 * $ret_1 = $obj->next();
 * $ret_2 = $obj->hasNext();
 */
