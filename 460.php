<?php
class Node
{
    public $key;
    public $val;
    public $prev;
    public $frequency;
    public $next;

    public function __construct($key, $val, $frequency = 1)
    {
        $this->val       = $val;
        $this->key       = $key;
        $this->frequency = $frequency;
    }
}

class doublyLinkedList
{
    protected $head;
    protected $tail;

    public function __construct()
    {
        $this->head       = new Node(0, 0, PHP_INT_MAX);
        $this->tail       = new Node(-1, 0, -1);
        $this->head->next = $this->tail;
        $this->tail->prev = $this->head;
    }

    /**
     * 更新频次以后可能会更改链表顺序
     */
    public function updateSort(Node $node)
    {
        $node->frequency++;
        $prev = $node->prev;
        while ($prev->frequency <= $node->frequency) {
            $start = $prev->prev;
            $end   = $node->next;

            $start->next = $node;
            $node->prev  = $start;

            $node->next = $prev;
            $prev->prev = $node;

            $prev->next = $end;
            $end->prev  = $prev;

            $prev = $start;
        }
    }

    /**
     *
     */
    public function addToLast(Node $node)
    {
        $prev       = $this->tail->prev;
        $prev->next = $node;
        $node->prev = $prev;

        $node->next       = $this->tail;
        $this->tail->prev = $node;
    }

    public function removeTail()
    {

        $last             = $this->tail->prev;
        $last->prev->next = $this->tail;
        $this->tail->prev = $last->prev;
        return $last->key;
    }
}
class LFUCache
{

    public $linkList;
    public $cache = [];
    public $capacity;

    /**
     * @param Integer $capacity
     */
    public function __construct($capacity)
    {
        $this->linkList = new doublyLinkedList();
        $this->capacity = $capacity;
    }

    /**
     * @param Integer $key
     * @return Integer
     */
    public function get($key)
    {
        if (!isset($this->cache[$key])) {
            return -1;
        }

        // Get the node and move to the top of the useage list
        $node = $this->cache[$key];
        $this->linkList->updateSort($node);

        return $node->val;
    }

    /**
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    public function put($key, $value)
    {
        // updating existing key value
        if (isset($this->cache[$key])) {
            $this->cache[$key]->val = $value;
            $this->linkList->updateSort($this->cache[$key]);
            return;
        }

        // have reached the limit, remove the least recently used
        if (count($this->cache) == $this->capacity) {
            if ($this->capacity == 0) {
                return;
            }

            $toRemove = $this->linkList->removeTail();
            unset($this->cache[$toRemove]);
        }

        // Create a new node and move to the top of useage list
        $node = new Node($key, $value);
        $this->linkList->addToLast($node);
        $this->linkList->updateSort($node);
        $this->cache[$key] = $node;
    }
}

/**
 * Your LFUCache object will be instantiated and called as such:
 * $obj = LFUCache($capacity);
 * $ret_1 = $obj->get($key);
 * $obj->put($key, $value);
 */
