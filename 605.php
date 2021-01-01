<?php
class Solution
{

    /**
     * @param Integer[] $flowerbed
     * @param Integer $n
     * @return Boolean
     */
    public function canPlaceFlowers($flowerbed, $n)
    {
        // 每次跳两格
        // for ($i = 0; $i < count($flowerbed); $i += 2) {
        //      // 如果当前为空地
        //     if ($flowerbed[$i] == 0) {
        //         // 如果是最后一格或者下一格为空
        //         if ($i == count($flowerbed) - 1 || $flowerbed[$i + 1] == 0) {
        //             $n--;
        //         } else {
        //             $i++;
        //         }
        //     }
        // }
        // return $n <= 0;
        for ($i = 0; $i < count($flowerbed); $i++) {
            if ($flowerbed[$i] == 0 && ($i == 0 || $flowerbed[$i - 1] == 0) && ($i == count($flowerbed) - 1 || $flowerbed[$i + 1] == 0)) {
                $n--;
                $flowerbed[$i] = 1;
            }
        }

        return $n <= 0;

    }
}
