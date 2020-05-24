<?php
class Solution
{

    /**
     * @param Integer[][] $board
     * @return Integer
     */
    public function slidingPuzzle($board)
    {
        $direction = [
            0 => [1, 3],
            1 => [0, 2, 4],
            2 => [1, 5],
            3 => [0, 4],
            4 => [1, 3, 5],
            5 => [2, 4],
        ];

        $visited = [];
        $queue   = [];
        $len     = 0;
        $str     = "";
        $target  = "123450";
        for ($i = 0; $i < count($board); $i++) {
            for ($j = 0; $j < count($board[0]); $j++) {
                $str .= $board[$i][$j];
            }
        }
        if ($str == $target) {
            return 0;
        }

        $queue[$str] = 0;
        while (!empty($queue)) {
            $temp = [];
            foreach ($queue as $str => $value) {
                $str = (string) $str;
                for ($c = 0; $c < strlen($str); $c++) {
                    if ($str[$c] == 0) {
                        //可以移动
                        foreach ($direction[$c] as $move) {
                            //找出move并交换
                            $new_str        = $str;
                            $tmp            = $new_str[$move];
                            $new_str[$move] = $new_str[$c];
                            $new_str[$c]    = $tmp;
                            if ($new_str == $target) {
                                return $len + 1;
                            }
                            if (!isset($visited[$new_str])) {
                                $visited[$new_str] = 1;
                                $temp[$new_str]    = 1;
                            }
                        }
                    }
                }
            }
            $queue = $temp;
            $len++;
        }
        return -1;
    }
}
