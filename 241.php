<?php
class Solution
{

    /**
     * @param String $input
     * @return Integer[]
     */
    public function diffWaysToCompute($input)
    {
        $ans = [];
        for ($i = 0; $i < strlen($input); $i++) {
            $c = $input[$i];
            if ($c == '-' || $c == "*" || $c == "+") {
                $left  = $this->diffWaysToCompute(substr($input, 0, $i));
                $right = $this->diffWaysToCompute(substr($input, $i + 1));
                foreach ($left as $a) {
                    foreach ($right as $b) {
                        if ($c == '+') {
                            array_push($ans, $a + $b);
                        } elseif ($c == '-') {
                            array_push($ans, $a - $b);
                        } else {
                            array_push($ans, $a * $b);
                        }
                    }
                }
            }
        }
        if (empty($ans)) {
            array_push($ans, $input);
        }
        return $ans;
    }
}
