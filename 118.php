<?php
class Solution {

    /**
     * @param Integer $numRows
     * @return Integer[][]
     */
    function generate($numRows) {
    	$res = [];
        for ($i = 0; $i < $numRows; $i++) {
        	if ($i == 0) {
        		$res[$i] = [1];
        	} else if ($i == 1) {
        		$res[$i] = [1,1];
        	} else {
        		$res[$i][0] = 1;
        		for ($j = 1; $j < $i; $j++) {
        			$res[$i][$j] = $res[$i - 1][$j - 1] + $res[$i - 1][$j];
        		}
    			$res[$i][$i] = 1;
        	}
        }
        return $res;
    }
}

$test = new Solution;
$ret = $test->generate(5);
var_dump($ret);