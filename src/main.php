<?php
    session_start();

    if (isset($_SESSION['id'])) {
        echo "User Id: " .$_SESSION['id'] .", ". "Username: ". $_SESSION['username'] .", ". "Email: ". $_SESSION['email'];
    } else {
        header("Location: index.php");
    }
    echo "<html><form action='logout.php'><button>LOG OUT</button></form>";

include_once 'library.php';

$userid = $_SESSION['id'];

if(isset($_POST['text'])) {
    $text = htmlspecialchars($_POST['text']);
}

$today = gmdate("Y-m-d");


    if (isset ($_POST['text'])) {
        $tweet = new Tweet();

        $tweet->setUserId($userid);
        $tweet->setText($text);
        $tweet->setCreationDate($today);
        $tweet->saveToTweetyDB($connection);

        header("Location: main.php");

    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Main page</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="sha384-2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">
</head>
    <body>
        <form method="post">
            <textarea rows="5" cols="50" maxlength="140" placeholder="What's going on? " name="text"></textarea>
            <button type="submit">Tweet</button>
        </form>


<?php

$tweets = Tweet::printAllTweets($connection);



?>

    </body>
</html>

