<?php

class Comment
{
    private $id;
    private $userId;
    private $tweetId;
    private $creationDate;
    private $text;

    public function __construct()
    {
        $this->id = -1;
        $this->userId = "";
        $this->tweetId ="";
        $this->creationDate = "";
        $this->text = "";
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
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
     * @return string
     */
    public function getTweetId()
    {
        return $this->tweetId;
    }

    /**
     * @param string $tweetId
     */
    public function setTweetId($tweetId)
    {
        $this->tweetId = $tweetId;
    }

    /**
     * @param string $creationDate
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }

    /**
     * @return string
     */
    public function getCreationDate()
    {
        return $this->creationDate;
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

    public function saveToCommentsDB (mysqli $connection)
    {
        if ($this->id == -1) {

            $sql = "INSERT INTO comments(user_id, tweet_id, creation_date, text)
                VALUES ('$this->userId', '$this->tweetId', '$this->creationDate', '$this->text')";

            $result = $connection->query($sql);

            if ($result == true) {
                $this->id = $connection->insert_id;
                return true;
            }

        } else {
            $sql = "UPDATE comments SET userId='$this->userId',
                                  tweet_id='$this->tweetId',
                                  creationDate='$this->creationDate',
                                  text='$this->text'        
                    WHERE id=$this->id;";

            $result = $connection->query($sql);

            if ($result == true) {
                return true;
            }
        }
        return false;
    }

    static public function loadCommentByTweetId (mysqli $connection, $tweetId)
    {
        $sql = "SELECT * FROM comments WHERE tweet_id=$tweetId";

        $result = $connection->query($sql);

        if ($result == true && $result->num_rows == 1) {
            $row = $result->fetch_assoc();

            $loadedUser = new Comment();
            $loadedUser->id = $row['id'];
            $loadedUser->userId = $row['user_id'];
            $loadedUser->tweetId = $row['tweet_id'];
            $loadedUser->text = $row['text'];
            $loadedUser->creationDate = $row['creation_date'];

            return $loadedUser;
        }

        return null;
    }
}