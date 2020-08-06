<?php
class Solution
{

    /**
     * @param String[] $words
     * @return Integer[][]
     * ["abcd","dcba","lls","s","sssll"]

    先把每个单词顺序构建字典树，单词结尾is_end直接用下标标记 默认-1

    a   d   l  s(-1)
    b   c   l   s
    c   b   s   s
    d   a       l


    规律是 遍历每个单词的每一部分，如果这部分是回文，那么剩下的部分要去trie树里找 存在不存在这个单词 注意这时候要逆序找
    例子：
    先遍历第一个单词 abcd
    第一步 空字符串也是回文 此时后缀是"abcd",去trie树里找dcba 能找到 加入结果
    第二步 a 是回文，剩下的bcd去trie树里找反转的字符串dcb 如果存在dcd则找到其中一种答案，如果没有继续遍历
    第三步 ab 不是回文 继续
    第四步 abc 不是回文 继续
    第五步 abcd 不是回文 继续

    后缀
    bcd 不是回文
    cd 不是回文
    d 是回文 找abc反序 bca找不到



     */
    public function palindromePairs($words)
    {
        $n    = count($words);
        $trie = new Trie;
        for ($i = 0; $i < $n; $i++) {
            $trie->insert($words[$i], $i); //从前到后构建字典树
        }
        $ret = [];
        for ($i = 0; $i < $n; $i++) {
            $m = strlen($words[$i]);
            for ($j = 0; $j <= $m; $j++) {
                //所有后缀
                if ($this->isPalindrome($words[$i], $j, $m - 1)) {
                    $other_left = $trie->findWord($words[$i], 0, $j - 1);
                    if ($other_left != -1 && $other_left != $i) {
                        $array = [$i, $other_left];
                        array_push($ret, $array);
                    }
                }
                //所有前缀
                if ($j != 0 && $this->isPalindrome($words[$i], 0, $j - 1)) {
                    $other_right = $trie->findWord($words[$i], $j, $m - 1);
                    if ($other_right != -1 && $other_right != $i) {
                        $array = [$other_right, $i];
                        array_push($ret, $array);
                    }
                }
            }
        }
        return $ret;

    }

    public function isPalindrome($s, $left, $right)
    {
        $len = $right - $left + 1;
        for ($i = 0; $i < $len / 2; $i++) {
            if ($s[$left + $i] != $s[$right - $i]) {
                return false;
            }
        }
        return true;
    }
}
//以下为字典树基础代码，之前用一个特殊字符标记is_end，这道题因为要返回下标，所以可以用is_end直接记录下标，默认-1
class TrieNode
{
    public $char;
    public $is_end = -1;
    public $children;

    public function __construct()
    {
        $this->children = [];
    }
}
class Trie
{
    public $root;
    /**
     * Initialize your data structure here.
     */
    public function __construct()
    {
        $this->root = new TrieNode();
    }

    /**
     * Inserts a word into the trie.
     * @param String $word
     * @return NULL
     */
    public function insert($word, $index)
    {
        $root = $this->root;
        for ($i = 0; $i < strlen($word); $i++) {
            if (!isset($root->children[$word[$i]])) {
                $root->children[$word[$i]]       = new TrieNode();
                $root->children[$word[$i]]->char = $word[$i];
            }
            $root = $root->children[$word[$i]];
        }
        $root->is_end = $index;
    }

    /**
     * Returns if the word is in the trie.
     * 正序构建字典树，所以要逆序查找
     * @param String $word
     * @return Boolean
     */
    public function findWord($s, $left, $right)
    {
        $root = $this->root;
        for ($i = $right; $i >= $left; $i--) {
            $x = $s[$i];
            if (!isset($root->children[$x])) {
                return -1;
            }
            $root = $root->children[$x];
        }
        // 返回is_end 如果不是-1说明找到了这个单词
        return $root->is_end;
    }

}
