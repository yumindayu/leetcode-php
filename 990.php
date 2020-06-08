<?php
class Solution
{

    public $root = [];
    /**
     * @param String[] $equations
     * @return Boolean
     */
    public function equationsPossible($equations)
    {
        for ($i = 'a'; $i < 'z'; $i++) {
            $this->root[$i] = $i;
        }

        foreach ($equations as $str) {
            if ($str[1] == "=") {
                $left  = $str[0];
                $right = $str[3];
                $this->union($left, $right);
            }
        }
        foreach ($equations as $str) {
            if ($str[1] == "!") {
                $left  = $str[0];
                $right = $str[3];
                if ($this->find($left) == $this->find($right)) {
                    return false;
                }
            }
        }
        return ture;
    }

    public function union($rootx, $rooty)
    {
        $rootx              = $this->find($rootx);
        $rooty              = $this->find($rooty);
        $this->root[$rootx] = $rooty;
    }

    public function find($x)
    {
        if ($this->root[$x] != $x) {
            $this->root[$x] = $this->find($this->root[$x]);
        }
        return $this->root[$x];
    }
}
