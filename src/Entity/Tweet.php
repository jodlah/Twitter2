<?php


class Tweet
{
    private $id;
    private $userId;
    private $username;
    private $text;
    private $creationDate;


    public function __construct()
    {
        $this->id = -1;
        $this->userId = "";
        $this->username ="";
        $this->text = "";
        $this->creationDate = "";
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @param string $creationDate
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }

    public function saveToTweetyDB(mysqli $connection)
    {
        if ($this->id == -1) {

            $sql = "INSERT INTO twetty(user_id, text, creation_date)
                VALUES ('$this->userId', '$this->text', '$this->creationDate')";

            $result = $connection->query($sql);

            if ($result == true) {
                $this->id = $connection->insert_id;
                return true;
            }

        } else {
            $sql = "UPDATE twetty SET userId='$this->userId',
                                 text='$this->text',
                                 creationDate='$this->creationDate'
                    WHERE id=$this->id;";

            $result = $connection->query($sql);

            if ($result == true) {
                return true;
            }
        }
        return false;
    }



//    static public function loadTweetById(mysqli $connection, $id)
//    {
//        $sql = "SELECT * FROM twetty WHERE id=$id";
//
//        $result = $connection->query($sql);
//
//        if ($result == true && $result->num_rows == 1) {
//            $row = $result->fetch_assoc();
//
//            $loadTweet = new Tweet();
//            $loadTweet->id = $row['id'];
//            $loadTweet->userId = $row['user_id'];
//            $loadTweet->text = $row['text'];
//            $loadTweet->creationDate = $row['creation_date'];
//
//            return $loadTweet;
//        }
//
//        return null;
//    }

    static public function loadTweetByUserId(mysqli $connection, $id)
    {
        $sql = "SELECT * FROM twetty WHERE userId=$id";
        $ret = [];

        $result = $connection->query($sql);

        if ($result == true && $result->num_rows != 0) {
            foreach ($result as $row) {
                $loadtweet= new Tweet();
                $loadtweet->id = $row['id'];
                $loadtweet->userId = $row['user_id'];
                $loadtweet->text = $row['text'];
                $loadtweet->creationDate = $row['creation_date'];

                $ret[] = $loadtweet;
            }
        }
        return $ret;
    }

    //wczytuje tweety z bazy danych
    static public function loadAllTweets(mysqli $connection)
    {
        $sql = "SELECT twetty.*, users.username 
                FROM twetty 
                RIGHT JOIN users 
                ON twetty.user_id=users.id
                ORDER BY creation_date DESC ";

        $ret = [];

        $result = $connection->query($sql);

        if ($result == true && $result->num_rows != 0) {
            foreach ($result as $row) {
                $loadtweet = new Tweet();
                $loadtweet->id = $row['id'];
                $loadtweet->userId = $row['user_id'];
                $loadtweet->username = $row['username'];
                $loadtweet->text = $row['text'];
                $loadtweet->creationDate = $row['creation_date'];

                $ret[] = $loadtweet;
            }
        }
        return $ret;
    }

    static public function printAllTweets (mysqli $connection)
    {
        $tweets = self::loadAllTweets($connection);
        $div = '<div class="">';
        foreach ($tweets as $tweet) {
            $comment = Comment::printCommentByTweetId($connection, $tweet->id); //moment przekazania id tweet do metody printCommentByTweetId
            $div .= sprintf(
                '
                <div class="tweet">
                    <p class="item date">%s</p>
                    <p class="item username">%s</p><br>
                    <p class="item text">%s</p><br>
                        <div class="well">
                        <h6 class="comments">Comments:</h6>
                        <div>%s</div>
                            <form method="post" action="addComment.php?id=%s">
                                <textarea class="form-control" id="exempleTextarea" row="1" cols="50" placeholder="Leave comment" name="text"></textarea><br>
                                <button class="btn btn-primary btn-sm" id="btn-comment" type="submit">Post</button>
                            </form>
                        </div>
                </div>
                ',
                $tweet->creationDate,
                $tweet->username,
                $tweet->text,
                $comment,
                $tweet->id //przekazuje tweetId metodą GET do addComment.php
            );
        }
        $div .= '</div>';
        echo $div;
    }
}