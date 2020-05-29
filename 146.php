<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
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
            unset($this->cache[$toRemove->key]);
        }

        // Create a new node and move to the top of useage list
        $node = new Node($key, $value);
        $this->usedList->addNode($node);
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

    public function __construct()
    {
        $this->head       = new Node(0, 0);
        $this->head->prev = null;

        $this->tail       = new Node(0, 0);
        $this->tail->next = null;

        $this->head->next = $this->tail;
        $this->tail->prev = $this->head;

    }
    public function removeNode(Node $node)
    {
        $next = $node->next;
        $prev = $node->prev;

        $prev->next = $next;
        $next->prev = $prev;
    }

    public function addNode($node)
    {
        $node->prev = $this->head;
        $node->next = $this->head->next;

        $this->head->next->prev = $node;
        $this->head->next       = $node;

    }

    public function moveToHead(Node $node)
    {
        $this->removeNode($node);
        $this->addNode($node);
    }

    public function removeTail()
    {
        $node = $this->tail->prev;
        $this->removeNode($node);
        return $node;
    }
}

/**
 * Your LRUCache object will be instantiated and called as such:
 * $obj = LRUCache($capacity);
 * $ret_1 = $obj->get($key);
 * $obj->put($key, $value);
 */
