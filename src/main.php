<?php
    session_start();

    if (isset($_SESSION['id'])) {
        echo "User Id:" .$_SESSION['id'];
    } else {
        header("Location: index.php");
    }
    echo "<html><form action='logout.php'><button>LOG OUT</button></form>"
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Main page</title>
</head>
    <body>
        <form>
            <textarea rows="5" cols="50" maxlength="140" placeholder="What's going on?  "></textarea>
            <button type="submit">Tweet</button>
        </form>
    </body>
</html>

<?php

include_once 'library.php';

$mysqli = new mysqli(
    '127.0.0.1',
    'root',
    'coderslab',
    'twitter2'
);

$tweets = Tweet::printAllTweets($mysqli);

