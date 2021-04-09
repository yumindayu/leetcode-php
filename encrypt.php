<?php
class Solution
{
    public $map = [
        "a" => "bf",
        "n" => "eq",
        "c" => "we",
        "v" => "eq",
        "g" => "ab",
    ];

    public function decrypt(String $text)
    {
        $this->helper($text, 0);
        return $this->res;
    }

    public function helper($text, $step)
    {
        //递归终止条件，2位字符串截取之后如果正好等于字符串长度，说明之前已经完美匹配则假如最终结果集
        if ($step == strlen($text)) {
            $this->res[] = $this->str;
            return;
        }
        //每2位截取字符串
        $value = substr($text, $step, 2);
        //查找该字符串对应的key，因为有重复，所以keys是数组，这里直接用了php的库函数
        $keys = array_keys($this->map, $value);
        //如果找到了，循环（因为结果要求所有可能）
        if (!empty($keys)) {
            foreach ($keys as $key) {
                //回溯算法模版，先拼接该key，进入递归，之后恢复现场，超哥讲的归去来兮
                $this->str .= $key; //先拼接
                $this->helper($text, $step + 2);
                $this->str = substr($this->str, 0, strlen($this->str) - 1); //这一步恢复现场
            }
        }
    }
}

$test   = new Solution();
$result = $test->decrypt("bfbfweab");
print_r($result);
