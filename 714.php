<?php
class Solution
{

    /**
     * @param Integer[] $prices
     * @param Integer $fee
     * @return Integer
     */
    public function maxProfit($prices, $fee)
    {
        $none = 0; //手里没股票
        $have = PHP_INT_MIN + $fee; //手里有股票
        foreach ($prices as $p) {
            $temp = $none;
            $none = max($none, $have + $p - $fee); //之前没股票 或者 之前有现在卖 之前利润 + 当天价格 - 手续费
            $have = max($have, $temp - $p); //之前有股票 或者 之前没有现在买入 注意只收一次手续费所以买入的时候不扣手续费
        }
        return $none;
    }
}
