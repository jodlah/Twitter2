<?php
    session_start();

    include_once '_menu.html';

    if (isset($_SESSION['id'])) {
        echo "Welcome: ". $_SESSION['username'];
    } else {
        header("Location: index.php");
    }
    //echo "<html><form action='logout.php'><button>LOG OUT</button></form>";

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
        <div class="form-group text-center>
            <form method="post">
                <textarea class="form-control" id="exempleTextarea" rows="5" cols="50" maxlength="140" placeholder="What's going on? " name="text"></textarea>
                <button class="btn btn-primary" type="submit">Tweet</button>
            </form>
        </div>


<?php

Tweet::printAllTweets($connection);

$tweetId = $_SESSION['tweet_id'];

Comment::printCommentByTweetId($connection, $tweetId);

?>

    </body>
</html>

