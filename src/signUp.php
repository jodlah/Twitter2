<?php

include_once "library.php";

$mysqli = new mysqli(
    '127.0.0.1',
    'root',
    'coderslab',
    'twitter2'
);

$user = new Users;

$user->setUsername($_POST['setUsername']);
$user->setEmail($_POST['setEmail']);
$user->setPassword($_POST['setPwd']);
$user->saveToDB($mysqli);

var_dump($user);

header("Location: index.php");
//
//$user = Users::loadUserById($mysqli, 33);
//$user->getId();
//$user->setUsername('Maciek');
//$user->setEmail('kuba@twitter.pl');
//$user->setPassword('4321');
//$user->saveToDB($mysqli);
//
//$user->delete($mysqli);



/*var_dump($user);*/