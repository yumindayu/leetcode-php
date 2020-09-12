<?php
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution
{

    /**
     * @param TreeNode $root
     * @return Float[]
     */
    public function averageOfLevels($root)
    {
        $result = [];
        $queue  = [];
        array_push($queue, $root);

        while (!empty($queue)) {
            $count = count($queue);
            $total = 0;
            foreach ($queue as $node) {
                $total += $node->val;
                if ($node->left != null) {
                    array_push($queue, $node->left);
                }
                if ($node->right != null) {
                    array_push($queue, $node->right);
                }
                array_shift($queue);
            }
            array_push($result, $total / $count);
        }
        return $result;
    }
}
