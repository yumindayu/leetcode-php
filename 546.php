<?php

class Solution
{

    private $length = [];
    private $memory = [];

    /**
     * @param Integer[] $boxes
     * @return Integer
     */
    public function removeBoxes($boxes)
    {
        $length = [1];
        //记录每个相同段的长度
        for ($i = 1; $i < count($boxes); $i++) {
            if ($boxes[$i] == $boxes[$i - 1]) {
                $length[$i] = $length[$i - 1] + 1;
            } else {
                $length[$i] = 1;
            }
        }
        $this->length = $length;

        return $this->remove($boxes, 0, count($boxes) - 1, 0);
    }

    private function remove(&$boxes, $start, $end, $k)
    {
        if ($start > $end) {
            return 0;
        }

        $key = "$start-$end-$k";
        if (isset($this->memory[$key])) {
            return $this->memory[$key];
        }

        //查询是否计算过当前段数据
        $len = $this->length[$end];
        //总拿的段长
        $k += $len;
        //上一个不同数的末位置
        $end -= $len;

        //直接先拿最后一段
        $value = $this->remove($boxes, $start, $end, 0) + $k * $k;

        //最后一段最后拿
        for ($i = $start; $i < $end; $i++) {
            if ($boxes[$i] == $boxes[$end + 1] && $boxes[$i + 1] != $boxes[$end + 1]) {
                $value = max($value, $this->remove($boxes, $start, $i, $k) + $this->remove($boxes, $i + 1, $end, 0));
            }
        }

        $this->memory[$key] = $value;

        return $this->memory[$key];
    }
}
