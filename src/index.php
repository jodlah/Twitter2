<?php
include_once 'library.php';

$mysqli = new mysqli(
    '127.0.0.1',
    'root',
    'coderslab',
    'twitter2'
);

//$user = new Users();
//$user = Users::loadUserById($mysqli, 11);
//$user->getId();


//var_dump($user);

$tweet = new Tweet(21);
$tweet->setText('blablabla');
$tweet->setCreationDate('2016-09-28');
$tweet->saveToTweetDB($mysqli);





var_dump($tweet);


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
    <form method="post" action="#">
        <label>Zaloguj się</label><br><br>
            Adres e-mail:<input type="text" name="email"><br>
            Hasło:       <input type="password" name="psw"><br>
        <button type="submit" name="submit">Wyślij</button>
    </form>
</div>

<div>
    <form method="post" action="registration.php">
        <button type="submit">Rejestracja</button>
    </form>
</div>


</body>
</html>
