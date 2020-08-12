<?php
/*
// Definition for a Node.
class Node {
public $val;
public $neighbors;

@param Integer $val
@param list<Node> $neighbors
function __construct($val, $neighbors) {
$this->val = $val;
$this->neighbors = $neighbors;
}
}
 */
class Solution
{

    /**
     * @param Node $node
     * @return Node
     * BFS
     */
    public function cloneGraph($node)
    {
        if (!$node) {
            return $node;
        }

        $queue = [];
        array_push($queue, $node);

        $visited             = [];
        $visited[$node->val] = new Node($node->val, []); //php的数组不能将对象作为key 所以这里的key是node的val

        while (!empty($queue)) {
            $n = array_shift($queue);
            foreach ($n->neighbors as $neighbor) {
                if (!isset($visited[$neighbor->val])) {
                    $visited[$neighbor->val] = new Node($neighbor->val, []);
                    array_push($queue, $neighbor);
                }
                array_push($visited[$n->val]->neighbors, $visited[$neighbor->val]);
            }
        }
        return $visited[$node->val];
    }

}
