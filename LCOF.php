<?php
class MaxQueue {
  public $max_value_queue;

  public $queue;
  /**
   */
  function __construct() {
    $this->max_value_queue = [];
    $this->queue = [];
  }

  /**
   * @return Integer
   */
  function max_value() {
    return empty($this->max_value_queue) ? -1 : $this->max_value_queue[0];
  }

  /**
   * @param Integer $value
   * @return NULL

   max_vulue_queue [10, 8] 

   queue [10, 7, 8]
   */
  function push_back($value) {
    array_push($this->queue, $value);
    while (!empty($this->max_value_queue) && $this->max_value_queue[count($this->max_value_queue) -1] < $value) {
      array_pop($this->max_value_queue);
    }
    array_push($this->max_value_queue, $value);

  }

  /**
   * @return Integer
   */
  function pop_front() {
    if (empty($this->queue)) return -1;
    $value = array_shift($this->queue);
    if ($value == $this->max_value_queue[0]) {
      array_shift($this->max_value_queue);
    }
    return $value;
  }
}

/**
 * Your MaxQueue object will be instantiated and called as such:
 * $obj = MaxQueue();
 * $ret_1 = $obj->max_value();
 * $obj->push_back($value);
 * $ret_3 = $obj->pop_front();
 */