<?php

class Messages
{
    private $id;
    private $from_id;
    private $to_id;
    private $time_sent;
    private $subject;
    private $message;
    private $username;


    public function __construct()
    {
        $this->id = -1;
        $this->from_id = '';
        $this->to_id = '';
        $this->time_sent = '';
        $this->subject = '';
        $this->message = '';
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
    public function getFromId()
    {
        return $this->from_id;
    }

    /**
     * @param string $from_id
     */
    public function setFromId($from_id)
    {
        $this->from_id = $from_id;
    }

    /**
     * @return string
     */
    public function getToId()
    {
        return $this->to_id;
    }

    /**
     * @param string $to_id
     */
    public function setToId($to_id)
    {
        $this->to_id = $to_id;
    }

    /**
     * @return string
     */
    public function getTimeSent()
    {
        return $this->time_sent;
    }

    /**
     * @param string $time_sent
     */
    public function setTimeSent($time_sent)
    {
        $this->time_sent = $time_sent;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function saveToMessageDB(mysqli $connection)
    {
        if ($this->id == -1) {

            $sql = "INSERT INTO messages(from_id, to_id, time_sent, subject, message)
                VALUES ('$this->from_id', '$this->to_id', '$this->time_sent', '$this->subject', '$this->message')";

            $result = $connection->query($sql);

            if ($result == true) {
                $this->id = $connection->insert_id;
                return true;
            }

        } else {
            $sql = "UPDATE messages 
                    SET from_id='$this->from_id',
                        to_id='$this->to_id',
                        time_sent='$this->time_sent',
                        subject='$this->subject',
                        message='$this->message'
                    WHERE id=$this->id";

            $result = $connection->query($sql);

            if ($result == true) {
                return true;
            }
        }
        return false;
    }


    static public function loadMessagesByUserId(mysqli $connection, $to_id)
    {
        $sql = "SELECT messages.*, users.username FROM messages JOIN users ON messages.to_id=users.id WHERE to_id=$to_id";
        $ret = [];

        $result = $connection->query($sql);

        if ($result == true && $result->num_rows != 0) {
            foreach ($result as $row) {
                $loadMessage = new Messages();
                $loadMessage->id = $row['id'];
                $loadMessage->from_id = $row['from_id'];
                $loadMessage->to_id = $row['to_id'];
                $loadMessage->time_sent = $row['time_sent'];
                $loadMessage->subject = $row['subject'];
                $loadMessage->message = $row['message'];
                $loadMessage->username = $row['username'];

                $ret[] = $loadMessage;
            }
        }
        return $ret;
    }

    static public function printMessages (mysqli $connection, $from_id)
    {
        $messages = self::loadMessagesByUserId($connection, $from_id);
        $div = '<div>';
        foreach ($messages as $message) {
            $div .= sprintf(
                '
                <div style="border: solid black 1px">
                    <p>%s</p>
                    <p>%s:</p>
                    <p>Subject: %s</p>
                    <p>Message: %s</p>
                    <form action="deleteMessage.php?id=%s">
                    <button>Delete message.</button>
                    </form>
                </div><br>
                ',
                $message->time_sent,
                $message->username,
                $message->subject,
                $message->message
            );
        }
        $div .= '</div>';
        echo $div;
    }

    public function deleteMessage(mysqli $connection, $id)
    {
        if($this->id != -1) {
            $sql = "DELETE FROM messages WHERE id = $id";
            $result = $connection->query($sql);
            if($result == true) {
                $this->id = -1;
                return true;
            }
            return false;
        }
        return true;
    }

}