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
     * @param Integer[] $pre
     * @param Integer[] $post
     * https://leetcode-cn.com/problems/construct-binary-tree-from-preorder-and-postorder-traversal/solution/tu-jie-889-gen-ju-qian-xu-he-hou-xu-bian-li-gou-2/
     *    用前序遍历的第一个元素创建出根节点
     *    用前序遍历的第二个元素x，去后序遍历中找对应的下标y，将y+1就能得到左子树的个数了
     *    将前序数组，后序数组拆分左右两部分
     *    递归的处理前序数组左边、后序数组右边
     *    递归的处理前序数组右边、后序数组右边
     *    返回根节点
     * @return TreeNode
     */
    public function constructFromPrePost($pre, $post)
    {
        if (!$pre) {
            return null;
        }

        $n = count($pre);
        if ($n == 1) {
            return new TreeNode($pre[0]);
        }
        //根节点
        $root       = new TreeNode($pre[0]);
        $count      = count($pre);
        $key        = array_search($pre[1], $post);
        $left_count = $key + 1;
        $pre_left   = array_slice($pre, 1, $left_count);
        $pre_right  = array_slice($pre, $left_count + 1);
        $post_left  = array_slice($post, 0, $left_count);
        $post_right = array_slice($post, $left_count, $n - 1);

        $root->left  = $this->constructFromPrePost($pre_left, $post_left);
        $root->right = $this->constructFromPrePost($pre_right, $post_right);
        return $root;
    }
}
