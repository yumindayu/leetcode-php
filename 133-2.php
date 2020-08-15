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

    public $visited = [];
    /**
     * @param Node $node
     * @return Node
     * DFS
     */
    public function cloneGraph($node)
    {
        if (!$node) {
            return $node;
        }

        if (isset($this->visited[$node->val])) {
            return $this->visited[$node->val];
        }

        $copy                      = new Node($node->val, []);
        $this->visited[$node->val] = $copy;

        foreach ($node->neighbors as $neighbor) {
            array_push($copy->neighbors, $this->cloneGraph($neighbor));
        }
        return $copy;
    }

}
