<?php
class MinStack
{

    public $statck    = [];
    public $min_stack = [];
    /**
     * initialize your data structure here.
     */
    public function __construct()
    {
        $this->stack     = [];
        $this->min_stack = [];
    }

    /**
     * @param Integer $x
     * @return NULL
     */
    public function push($x)
    {
        array_unshift($this->stack, $x);
        if (!empty($this->min_stack)) {
            array_unshift($this->min_stack, min($this->min_stack[0], $x));
        } else {
            array_unshift($this->min_stack, $x);
        }
    }

    /**
     * @return NULL
     */
    public function pop()
    {
        array_shift($this->stack);
        array_shift($this->min_stack);
    }

    /**
     * @return Integer
     */
    public function top()
    {
        return $this->stack[0];
    }

    /**
     * @return Integer
     */
    public function getMin()
    {
        return $this->min_stack[0];
    }
}

$obj = new MinStack();
$obj->push(-2);
$obj->push(0);
$obj->push(-3);
print_r($obj->stack);exit;
$obj->getMin();
$obj->pop();
$obj->top();
$obj->getMin();
