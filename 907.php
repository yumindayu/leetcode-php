<?php
class Solution
{

    /**
     * @param Integer[] $A
     * @return Integer
     */
    public function sumSubarrayMins($A)
    {
        array_push($A, 0);

        $stack = new SplStack();
        $sum   = 0;
        for ($i = 0; $i < count($A); $i++) {
            while (!$stack->isEmpty() && $A[$stack->top()] >= $A[$i]) {
                $last = $stack->pop();
                $out  = !$stack->isEmpty() ? $stack->top() : -1;
                $sum += ($last - $out) * ($i - $last) * $A[$last];
            }
            $stack->push($i);
        }
        return $sum % (pow(10, 9) + 7);
    }
}
