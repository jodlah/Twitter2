<?php

/**
 * Created by PhpStorm.
 * User: jodlah
 * Date: 27.09.16
 * Time: 18:33
 */
class Tweet
{
    private $id;

    private $userid;

    private $text;

    private $creationDate;


    public function __construct($userid)
    {
        $this->id = -1;
        $this->userid = $userid;
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
     * @param int $userid
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;
    }

    /**
     * @return int
     */
    public function getUserid()
    {
        return $this->userid;
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

    public function saveToTweetDB(mysqli $connection)
    {

        if($this->id == -1) {
            $sql = "INSERT INTO tweety(userid, text, creation_date)
                    VALUES ('$this->userid', '$this->text', '$this->creationDate')";

            $result = $connection->query($sql);

            if($result == true) {
                $this->id = $connection->insert_id;
                return true;
            }
        }
    }



    static public function loadTweetById(mysqli $connection, $id)
    {
        $sql = "SELECT * FROM twetty WHERE id=$id";

        $result = $connection->query($sql);

        if ($result == true && $result->num_rows == 1) {
            $row = $result->fetch_assoc();

            $loadedUser = new Tweet();
            $loadedUser->id = $row['id'];
            $loadedUser->userId = $row['userId'];
            $loadedUser->text = $row['text'];
            $loadedUser->creationDate = $row['creationDate'];

            return $loadedUser;
        }

        return null;
    }

    static public function loadTweetByUserId(mysqli $connection, $id)
    {
        $sql = "SELECT * FROM twetty WHERE userId=$id";
        $ret = [];

        $result = $connection->query($sql);

        if ($result == true && $result->num_rows != 0) {
            foreach ($result as $row) {
                $loadedUser = new Tweet();
                $loadedUser->id = $row['id'];
                $loadedUser->userId = $row['userId'];
                $loadedUser->text = $row['text'];
                $loadedUser->creationDate = $row['creationDate'];

                $ret[] = $loadedUser;
            }
        }
        return $ret;
    }

    static public function loadAllTweets(mysqli $connection)
    {
        $sql = "SELECT * FROM twetty";
        $ret = [];

        $result = $connection->query($sql);

        if ($result == true && $result->num_rows != 0) {
            foreach ($result as $row) {
                $loadedUser = new Tweet();
                $loadedUser->id = $row['id'];
                $loadedUser->userId = $row['userId'];
                $loadedUser->text = $row['text'];
                $loadedUser->creationDate = $row['creationDate'];

                $ret[] = $loadedUser;
            }
        }
        return $ret;
    }


}