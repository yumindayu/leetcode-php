<?php
class Solution
{

    /**
     * @param String $s
     * @return Boolean
     */
    public function isValid($s)
    {
        if (!$s) {
            return true;
        }

        $data = [")" => "(", "}" => "{", "]" => "["];

        $stack = new SplStack();

        for ($i = 0; $i < strlen($s); $i++) {
            if (isset($data[$s[$i]])) {
                if ($stack->isEmpty()) {
                    return false;
                }
                $ele = $stack->pop();
                if ($data[$s[$i]] != $ele) {
                    return false;
                }
            } else {
                $stack->push($s[$i]);
            }
        }
        if (!$stack->isEmpty()) {
            return false;
        }
        return true;
    }
}
