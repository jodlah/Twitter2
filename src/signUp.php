<?php

include_once "library.php";

$user = new Users;

$user->setUsername($_POST['setUsername']);
$user->setEmail($_POST['setEmail']);
$user->setPassword($_POST['setPwd']);
$user->saveToDB($connection);

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