<?php
class Solution
{
    public $res = [];

    public function splitIntoFibonacci($S)
    {
        $this->dfs($start, $S);
        return $this->res ? $this->res : [];
    }

    public function dfs($start, $S)
    {
        if ($start >= strlen($S) && count($this->res) > 2) {
            return true;
        }
        for ($i = $start; $i < strlen($S); $i++) {
            $num = substr($S, $start, $i - $start + 1);
            if ($i - $start + 1 >= 2 && $num[0] === '0' || $num >= pow(2, 31)) {
                continue;
            }
            $count = count($this->res);
            if ($count >= 2 && $this->res[$count - 2] + $this->res[$count - 1] != $num) {
                continue;
            }
            $this->res[] = $num;
            if ($this->dfs($i + 1, $S)) {
                return true;
            }
            array_pop($this->res);
        }

        return false;
    }

}
