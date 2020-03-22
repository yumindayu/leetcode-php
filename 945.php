<?php
class Solution
{

    /**
     * @param Integer[] $A
     * @return Integer
     */
    public function minIncrementForUnique($A)
    {
        if (!$A) {
            return 0;
        }
        $map = [];
        for ($i = 0; $i < count($A); $i++) {
            $map[$A[$i]] = isset($map[$A[$i]]) ? $map[$A[$i]] + 1 : 1;
        }

        $count    = 0;
        $position = [];
        foreach ($map as $k => $v) {
            if ($v == 1) {
                continue;
            }

            for ($i = 1; $i < $v; $i++) {
                $num = $k;
                while (true) {
                    if (!isset($map[$num])) {
                        $map[$num]    = 1;
                        $position[$k] = $num;
                        $count += $num - $k;
                        break;
                    }
                    if (isset($position[$num])) {
                        $num = $position[$num] + 1;
                    } else {
                        $num++;
                    }

                }
            }
        }
        return $count;
    }

}
$test = new Solution;
$A    = [3, 2, 1, 2, 1, 7];

$ret = $test->minIncrementForUnique($A);
var_dump($ret);exit;
