<?php
class LRUCache
{

    protected $usedList;
    protected $cache = [];
    protected $capacity;

    /**
     * @param Integer $capacity
     */
    public function __construct($capacity)
    {
        $this->usedList = new doublyLinkedList();
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
        $this->usedList->moveToHead($node);

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
            $this->usedList->moveToHead($this->cache[$key]);
            return;
        }

        // have reached the limit, remove the least recently used
        if (count($this->cache) >= $this->capacity) {
            $toRemove = $this->usedList->removeTail();
            unset($this->cache[$toRemove]);
        }

        // Create a new node and move to the top of useage list
        $node = new Node($key, $value);
        $this->usedList->moveToHead($node);
        $this->cache[$key] = $node;
    }
}

class Node
{
    public $key;
    public $val;
    public $prev;
    public $next;

    public function __construct($key, $val)
    {
        $this->val = $val;
        $this->key = $key;
    }
}

class doublyLinkedList
{
    protected $head;
    protected $tail;

    public function moveToHead(Node $node)
    {
        if ($this->head === $node) {
            return;
        }

        $next = $node->next;
        $prev = $node->prev;

        if ($node == $this->tail) {
            $this->tail = $prev;
        } else {
            $prev->next = $next;
            $next->prev = $prev;
        }

        if ($this->head) {
            $node->next       = $this->head;
            $node->next->prev = $node;
        }

        if (!$this->tail) {
            $this->tail = $node;
        }

        $this->head = $node;
    }

    protected function updateTail()
    {
        $this->tail = $this->tail->prev;
    }

    public function removeTail()
    {
        $key = $this->tail->key;
        $this->updateTail();
        return $key;
    }
}
