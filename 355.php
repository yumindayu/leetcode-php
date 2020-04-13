<?php
class Twitter
{
    public $follower_root = [];

    public $user_tweet_root = [];

    public $time = 0;

    public $tweet_time = [];

    /**
     * Initialize your data structure here.
     */
    public function __construct()
    {

    }

    /**
     * Compose a new tweet.
     * @param Integer $userId
     * @param Integer $tweetId
     * @return NULL
     */
    public function postTweet($userId, $tweetId)
    {
        if (isset($this->user_tweet_root[$userId])) {
            array_unshift($this->user_tweet_root[$userId], $tweetId);
        } else {
            $this->user_tweet_root[$userId][] = $tweetId;
        }
        $this->time++;
        $this->tweet_time[$tweetId] = $this->time;

    }

    /**
     * Retrieve the 10 most recent tweet ids in the user's news feed. Each item in the news feed must be posted by users who the user followed or by the user herself. Tweets must be ordered from most recent to least recent.
     * @param Integer $userId
     * @return Integer[]
     */
    public function getNewsFeed($userId)
    {
        $users = $this->follower_root[$userId] ?? [];
        array_push($users, $userId);
        $users = array_unique($users);
        $lists = [];
        $queue = new \SplPriorityQueue;
        if (!empty($users)) {
            foreach ($users as $user) {
                $list = $this->user_tweet_root[$user];
                if (!empty($list)) {
                    $first = $list[0];
                    $queue->insert([$user, 0, $first], $this->tweet_time[$first]);
                }
            }
            $queue->setExtractFlags(\SplPriorityQueue::EXTR_BOTH);
            $count = 0;
            while (!$queue->isEmpty()) {
                $count++;
                if ($count > 10) {
                    break;
                }
                $data    = $queue->extract();
                $user    = $data['data'][0];
                $key     = $data['data'][1];
                $tweetId = $data['data'][2];
                array_push($lists, $tweetId);
                if (isset($this->user_tweet_root[$user][$key + 1])) {
                    $t = $this->user_tweet_root[$user][$key + 1];
                    $queue->insert([$user, $key + 1, $t], $this->tweet_time[$t]);
                }
            }
        }
        return $lists;
    }

    /**
     * Follower follows a followee. If the operation is invalid, it should be a no-op.
     * @param Integer $followerId
     * @param Integer $followeeId
     * @return NULL
     */
    public function follow($followerId, $followeeId)
    {
        if (isset($this->follower_root[$followerId])) {
            array_push($this->follower_root[$followerId], $followeeId);
        } else {
            $this->follower_root[$followerId][] = $followeeId;
        }
    }

    /**
     * Follower unfollows a followee. If the operation is invalid, it should be a no-op.
     * @param Integer $followerId
     * @param Integer $followeeId
     * @return NULL
     */
    public function unfollow($followerId, $followeeId)
    {
        $key = array_search($followeeId, $this->follower_root[$followerId]);
        if ($key !== false) {
            unset($this->follower_root[$followerId][$key]);
        }
    }
}

/**
 * Your Twitter object will be instantiated and called as such:
 * $obj = Twitter();
 * $obj->postTweet($userId, $tweetId);
 * $ret_2 = $obj->getNewsFeed($userId);
 * $obj->follow($followerId, $followeeId);
 * $obj->unfollow($followerId, $followeeId);
 */
