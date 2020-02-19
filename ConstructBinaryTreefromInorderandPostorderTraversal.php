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
class Solution {

  /**
   * @param Integer[] $preorder
   * @param Integer[] $inorder
   * @github https://github.com/yumindayu/leetcode-php
   * @return TreeNode

    1
   / \
  2   3
 /   / \
 4   5  6
  \     /
   7   8

preOrder  [1,2,4,7,3,5,6,8]

inOrder   [4,7,2,1,5,3,8,6]

postOrder [7,4,2,5,8,6,3,1]


    @github https://github.com/yumindayu/leetcode-php
  */
  function buildTree($preorder, $inorder) {
    if (!$preorder) {
      return null;
    }
    $x = array_shift($preorder);
    $node = new TreeNode($x);
    $key = array_search($x, $inorder);

    $node->left = $this->buildTree(array_slice($preorder, 0, $key), array_slice($inorder, 0, $key));
    $node->right = $this->buildTree(array_slice($preorder, $key), array_slice($inorder, $key + 1));

    return $node;
  }

  function buildTree2($inorder, $postOrder) {
    if (!$postOrder) {
      return null;
    }
    $x = array_pop($postOrder);
    $node = new TreeNode($x);
    $key = array_search($x, $inorder);

    $node->left = $this->buildTree2(array_slice($inorder, 0, $key), array_slice($postOrder, 0, $key));
    $node->right = $this->buildTree2(array_slice($inorder, $key + 1), array_slice($postOrder, $key));
    return $node;
  }
}





