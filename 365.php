<?php
class Solution
{

    /**
     * @param Integer $x
     * @param Integer $y
     * @param Integer $z
     * @return Boolean
     * @github https://github.com/yumindayu/leetcode-php

    输入: x = 3, y = 5, z = 4
    输出: True

    x y
    0 0
    0 5
    3 2
    0 2
    2 0
    2 5
    3 4
     */
    public function canMeasureWater($x, $y, $z)
    {
        if ($x + $y < $z) {
            return false;
        }
        $visited = [];
        $queue   = [[0, 0]];

        while (!empty($queue)) {
            $array   = array_shift($queue);
            $x_water = $array[0];
            $y_water = $array[1];
            if ($x_water == $z || $y_water == $z || $x_water + $y_water == $z) {
                return true;
            }
            //这里一定不能直接把数组放入visited 用in_array来判断vistied存不存在
            //因为php里用in_array判断一个数组在不在另一个数组里是非常低效的
            // 比如二维数组[[1,2],[2,3],[3,4]...] 用in_array判断 [1,2] 在不在数组里 这种方法在php里很低效，leetcode导致超时
            //所以这里用二维数组降一维的思路 存储visited

            $key = $x_water * ($x + $y + 1) + $y_water;
            if (isset($visited[$key])) {
                continue;
            }
            $visited[$key] = 1;
            //x 注满
            $case1   = [$x, $y_water];
            $queue[] = $case1;
            //y 注满
            $case2   = [$x_water, $y];
            $queue[] = $case2;

            //x 倒出
            $case3   = [0, $y_water];
            $queue[] = $case3;

            //y 倒出
            $case4   = [$x_water, 0];
            $queue[] = $case4;

            //x的水倒向y 两个条件 y满 或者 x空
            $temp_x_water = $y - $y_water >= $x_water ? 0 : $x_water - ($y - $y_water);
            $temp_y_water = $y - $y_water >= $x_water ? $y_water + $x_water : $y;
            $case5        = [$temp_x_water, $temp_y_water];
            $queue[]      = $case5;

            //y的水倒向x 两个条件 x满 或者 y空
            $temp_y_water = $x - $x_water >= $y_water ? 0 : $y_water - ($x - $x_water);
            $temp_x_water = $x - $x_water >= $y_water ? $x_water + $y_water : $x;

            $case6   = [$temp_x_water, $temp_y_water];
            $queue[] = $case6;
        }
        return false;
    }

    //欧几里得算法求最大公约数
    public function canMeasureWater2($x, $y, $z)
    {
        if ($x + $y < $z) {
            return false;
        }

        if ($x == $z || $y == $z || $x + $y == $z) {
            return true;
        }

        return $z % $this->gcd($x, $y) == 0;

    }
    public function gcd($x, $y)
    {
        return $y == 0 ? $x : $this->gcd($y, $x % $y);
    }
}
