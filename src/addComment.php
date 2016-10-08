<?php

session_start();

include_once "library.php";

$userid = $_SESSION['id'];
$tweetId = $_GET['id'];
$today = gmdate("Y-m-d");

var_dump($tweetId);

if (isset($_POST['text'])) {
    $text = htmlspecialchars($_POST['text']);
}

if(isset ($_POST['text'])) {

    $comment = new Comment();

    $comment->setUserId($userid);
    $comment->setTweetId($tweetId);
    $comment->setCreationDate($today);
    $comment->setText($text);
    $comment->saveToCommentsDB($connection);

    header("Location: main.php");

}