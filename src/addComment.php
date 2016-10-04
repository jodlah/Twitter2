<?php

session_start();

include_once "library.php";

var_dump($_SESSION);

$userid = $_SESSION['id'];
$tweet_id = $_SESSION['tweet_id'];
$today = gmdate("Y-m-d");

if (isset($_POST['text'])) {
    $text = htmlspecialchars($_POST['text']);
}

if(isset ($_POST['text'])) {

    $comment = new Comment();

    $comment->setUserId($userid);
    $comment->setTweetId($tweet_id);
    $comment->setCreationDate($today);
    $comment->setText($text);
    $comment->saveToCommentsDB($connection);

    header("Location: main.php");

}