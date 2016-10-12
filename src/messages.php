<?php

session_start();

include_once 'library.php';

if (isset($_SESSION['id'])) {
    echo "Welcome: ". $_SESSION['username'];
} else {
    header("Location: index.php");
}


if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $subject = htmlspecialchars($_POST['subject']);;
    $receiver = Users::loadIdByUsername($connection,$_POST['to_id']);
    $message_content = htmlspecialchars($_POST['message']);;

}

$time = date("Y-m-d H:i:s");
$sender = $_SESSION['id'];

if(isset($_POST['message']) && !empty($_POST['message'])) {

    $message = new Messages();

    $message->setFromId($sender);
    $message->setToId($receiver);
    $message->setTimeSent($time);
    $message->setSubject($subject);
    $message->setMessage($message_content);
    $message->saveToMessageDB($connection);

    header("Location: messages.php");

}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Messages</title>

</head>
<body>
<div>
    <form method="post">
        <input type="text" name="to_id" placeholder="Receiver name(id)."><br>
        <input type="text" name="subject" placeholder="Subject."><br>
        <textarea rows="5" cols="50" maxlength="140" placeholder="What do you want to write? " name="message"></textarea><br>
        <button type="submit">Send message.</button>
    </form>

    <form action="inbox.php">
        <button>INBOX</button>
        <?php ?>
    </form>
</div>
</body>
</html>