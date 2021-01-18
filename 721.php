<?php
class Solution
{
    public $root = [];
    /**
     * @param String[][] $accounts
     * @return String[][]
     */
    public function accountsMerge($accounts)
    {
        for ($i = 0; $i < count($accounts); $i++) {
            $this->root[$i] = $i;
        }
        $count = count($accounts[0]);
        $map   = [];
        foreach ($accounts as $key => $account) {
            $count = count($account);
            for ($i = 1; $i < $count; $i++) {
                if (isset($map[$account[$i]])) {
                    array_push($map[$account[$i]], $key);
                } else {
                    $map[$account[$i]][] = $key;
                }
            }
        }

        //这里直接用并查集
        foreach ($map as $index) {
            if (count($index) > 1) {
                for ($i = 0; $i < count($index) - 1; $i++) {
                    $this->union($index[$i], $index[$i + 1]);
                }
            }
        }
        $visited = [];
        $ans     = [];
        foreach ($map as $index) {
            $emailArray = [];
            foreach ($index as $v) {
                $index   = $this->find($v);
                $account = $accounts[$v];
                $count   = count($account);
                $name    = $account[0];
                for ($i = 1; $i < $count; $i++) {
                    if (isset($ans[$index])) {
                        if (!isset($emailArray[$account[$i]])) {
                            $ans[$index][$account[$i]] = true;
                        }
                    } else {
                        $ans[$index][$account[$i]] = true;
                    }
                    $emailArray[$account[$i]] = true;
                }
            }
        }
        $ret = [];
        foreach ($ans as $index => $email) {
            $emails = array_keys($email);
            sort($emails);
            array_unshift($emails, $accounts[$index][0]);
            array_push($ret, $emails);
        }

        return $ret;
    }

    public function union($x, $y)
    {
        $x              = $this->find($x);
        $y              = $this->find($y);
        $this->root[$x] = $y;
    }

    public function find($x)
    {
        if ($this->root[$x] != $x) {
            $this->root[$x] = $this->find($this->root[$this->root[$x]]);
        }
        return $this->root[$x];
    }
}
