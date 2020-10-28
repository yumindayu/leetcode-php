<?php
class Solution
{

    /**
     * @param Integer[] $arr
     * @return Boolean
     */
    public function uniqueOccurrences($arr)
    {
        // $count = [];
        // for ($i = 0; $i < count($arr); $i++) {
        //     if (isset($count[$arr[$i]])) {
        //         $count[$arr[$i]]++;
        //     } else {
        //         $count[$arr[$i]] = 1;
        //     }
        // }
        $count = array_count_values($arr);
        $value = array_flip($count);
        return count($value) == count($count);
    }
}
