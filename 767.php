<?php
class Solution
{

    /**
     * @param String $S
     * @return String
     */
    public function reorganizeString($S)
    {
        $n = strlen($S);
        if ($n < 2) {
            return $S;
        }

        $counts   = array_fill(0, 26, 0);
        $maxCount = 0;
        for ($i = 0; $i < $n; $i++) {
            $c = $S[$i];
            $counts[ord($c) - ord('a')]++;
            $maxCount = max($maxCount, $counts[ord($c) - ord('a')]);
        }
        if ($maxCount > floor(($n + 1) / 2)) {
            return "";
        }

        $queue = new SplPriorityQueue;
        foreach (range('a', 'z') as $letter) {
            if ($counts[ord($letter) - ord('a')] > 0) {
                $queue->insert($letter, $counts[ord($letter) - ord('a')]);
            }
        }
        $str = "";
        while ($queue->count() > 1) {
            $letter1 = $queue->extract();
            $letter2 = $queue->extract();
            $str .= $letter1;
            $str .= $letter2;
            $index1 = ord($letter1) - ord('a');
            $index2 = ord($letter2) - ord('a');
            $counts[$index1]--;
            $counts[$index2]--;
            if ($counts[$index1] > 0) {
                $queue->insert($letter1, $counts[$index1]);
            }
            if ($counts[$index2] > 0) {
                $queue->insert($letter2, $counts[$index2]);
            }
        }
        if ($queue->count() > 0) {
            $str .= $queue->extract();
        }
        return $str;
    }
}
