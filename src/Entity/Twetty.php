<?php

/**
 * Created by PhpStorm.
 * User: jodlah
 * Date: 27.09.16
 * Time: 18:33
 */
class Twetty
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

    public function saveToDB(mysqli $connection)
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

}