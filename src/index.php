<?php
session_start();
include_once 'library.php';

//$user = new Users();
//$user = Users::loadUserById($mysqli, 11);
//$user->getId();


//var_dump($user);

//$tweet = new Tweet(30);
//$tweet->setText('Lorem ipsum');
//$tweet->setCreationDate('2016-09-29');
//$tweet->saveToTweetyDB($mysqli);
//
//
//var_dump($tweet);


//$user = Users::loadUserById($mysqli, 11);
//
//var_dump($user);
//
//$user->setUsername('Robert');
//$user->saveToDB($mysqli);
//
//$users = Users::loadAllUsers($mysqli);
//
//var_dump($users);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Twitter</title>
</head>
<body>

<div>
    <form method="post" action="login.php">
        <label>LOGIN</label><br><br>
            <input type="text" name="email" placeholder="e-mail"><br>
            <input type="password" name="pwd" placeholder="password"><br>
        <button type="submit" name="submit">LOGIN</button>
    </form>
</div>

<div>
    <form method="post" action="signUpForm.html">
        <button type="submit">SIGN UP</button>
    </form>
</div>
</body>
</html>
