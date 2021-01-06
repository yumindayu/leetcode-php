<?php
class Solution
{

    /**
     * @param String[][] $equations
     * @param Float[] $values
     * @param String[][] $queries
     * @return Float[]
     */
    public function calcEquation($equations, $values, $queries)
    {
        $g = []; // 数据结构 Map<String, Map<String, Double>>
        $this->buildGraph($g, $equations, $values);
        $ans = array_fill(0, count($queries), -1.0);
        for ($i = 0; $i < count($queries); $i++) {
            $from = $queries[$i][0];
            $to   = $queries[$i][1];
            if (!isset($g[$from]) || !isset($g[$to])) {
                continue;
            }

            $this->dfs($g, $from, $to, 1.0, [], $i, $ans);
        }
        return $ans;
    }

    public function dfs($g, $from, $to, $total, $vistied, $index, &$ans)
    {
        $vistied[$from] = 1;
        if (empty($g[$from])) {
            return;
        }

        if (isset($g[$from][$to])) {
            $ans[$index] = $g[$from][$to] * $total;
            return;
        }
        foreach ($g[$from] as $neighbor => $val) {
            if (isset($vistied[$neighbor])) {
                continue;
            }

            $this->dfs($g, $neighbor, $to, $g[$from][$neighbor] * $total, $vistied, $index, $ans);
        }
    }

    public function buildGraph(&$g, $equations, $values)
    {
        for ($i = 0; $i < count($equations); $i++) {
            $from            = $equations[$i][0];
            $to              = $equations[$i][1];
            $g[$from][$to]   = $values[$i];
            $g[$to][$from]   = (float) 1.0 / $values[$i];
            $g[$from][$from] = 1.0;
            $g[$to][$to]     = 1.0;
        }
    }
}
