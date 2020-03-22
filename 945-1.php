<?php
class Solution
{

    /**
     * @param Integer[] $A
     * @return Integer
     * @github https://github.com/yumindayu/leetcode-php
     */
    public function minIncrementForUnique($A)
    {
        if (!$A) {
            return 0;
        }
        $ret   = [];
        $count = 0;
        for ($i = 0; $i < count($A); $i++) {
            $num = $A[$i];
            if (isset($ret[$num])) {
                while (true) {
                    if (isset($ret[$num])) {
                        $num++;
                        $count++;
                    } else {
                        break;
                    }
                }
            }
            $ret[$num] = true;
        }
        return $count;
    }
}
