<?php
class TrieNode {
  public $char;
  public $is_end = false;
  public $children;

  public function __construct() {
    $this->children = [];
  }
}
class Trie {
    public $root;
    /**
     * Initialize your data structure here.
     * @github https://github.com/yumindayu/leetcode-php
     */
    function __construct() {
      $this->root = new TrieNode();
    }

    /**
     * Inserts a word into the trie.
     * @param String $word
     * @return NULL
     */
    function insert($word) {
      // apple 
      // app 
      $root = $this->root;
      for ($i = 0; $i < strlen($word); $i++) {
        if (!isset($root->children[$word[$i]])) {
          $root->children[$word[$i]] = new TrieNode();
          $root->children[$word[$i]]->char = $word[$i];
        }
        if ($i == strlen($word) - 1) {
          $root->children[$word[$i]]->is_end = true;
        }
        $root = $root->children[$word[$i]];
      }
    }

    /**
     * Returns if the word is in the trie.
     * @param String $word
     * @return Boolean
     */
    function search($word) {
      // apple 
      retun $this->_search($root, $word);
    }

    function _search($root, $word) {
      if ($word == "") {
        return false;
      }
      for ($i = 0; $i < strlen($word); $i++) {
        if (isset($root->children[$word[$i]])) {
          if (strlen($word) == 1 && $root->children[$word[$i]]->is_end == true) {
            return true;
          }
          return $this->_search($root->children[$word[$i]], substr($word, $i + 1));
        }
      }
      return true;
    }


    /**
     * Returns if there is any word in the trie that starts with the given prefix.
     * @param String $prefix
     * @return Boolean
     */
    function startsWith($prefix) {
      //app
      $this->_check($this->root, $prefix);
    }

    function _check($root, $prefix) {
      for ($i = 0; $i < strlen($prefix); $i++) {
        if (isset($root->children[$word[$i]])) {
          return $this->_check($root->children[$word[$i]], substr($prefix, $i + 1));
        }
        return false;
      }
      return true;
    }
}

/**
 * Your Trie object will be instantiated and called as such:
 * $obj = Trie();
 * $obj->insert($word);
 * $ret_2 = $obj->search($word);
 * $ret_3 = $obj->startsWith($prefix);
 */