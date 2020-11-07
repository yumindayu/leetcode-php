<?php
class Solution
{

    /**
     * @param Integer $rowIndex
     * @return Integer[]
     */
    public function getRow($rowIndex)
    {

        for ($i = 0; $i <= $rowIndex; $i++) {
            if ($i == 0) {
                $pre = [1];
            } elseif ($i == 1) {
                $pre = [1, 1];
            } else {
                $now = [];
                for ($j = 1; $j < $i; $j++) {
                    array_push($now, $pre[$j - 1] + $pre[$j]);
                }
                array_unshift($now, 1);
                array_push($now, 1);
                $pre = $now;
            }
        }
        return $pre;
    }

    /**
     * @param Integer $rowIndex
     * @return Integer[]
     */
    public function getRow2($rowIndex)
    {
        $numRows = $rowIndex + 1;
        $res     = [];
        for ($i = 0; $i < $numRows; $i++) {
            if ($i == 0) {
                $res[$i] = [1];
            } elseif ($i == 1) {
                $res[$i] = [1, 1];
            } else {
                $res[$i][0] = 1;
                for ($j = 1; $j < $i; $j++) {
                    $res[$i][$j] = $res[$i - 1][$j - 1] + $res[$i - 1][$j];
                }
                $res[$i][$i] = 1;
            }
        }
        return $res[$numRows - 1];
    }
}
