<?php
class Solution
{

    /**
     * @param String[] $words
     * @return Integer
     * @github https://github.com/yumindayu/leetcode-php
     */
    public function minimumLengthEncoding($words)
    {
        $count = 0;
        $data  = array_map(function ($a) {return strrev($a);}, $words);
        usort($data, function ($a, $b) {
            return strlen($b) <=> strlen($a);
        });
        $trie = new Trie;
        foreach ($data as $str) {
            $count += $trie->insert($str);
        }
        return $count;
    }
}

class TrieNode
{
    public $char;
    public $is_end = false;
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
    public function insert($word)
    {
        $is_new = false;
        $root   = $this->root;
        for ($i = 0; $i < strlen($word); $i++) {
            if (!isset($root->children[$word[$i]])) {
                $root->children[$word[$i]]       = new TrieNode();
                $root->children[$word[$i]]->char = $word[$i];
                $is_new                          = true;
            }
            if ($i == strlen($word) - 1) {
                $root->children[$word[$i]]->is_end = true;
            }
            $root = $root->children[$word[$i]];
        }
        return $is_new ? strlen($word) + 1 : 0;
    }
}
