<?php

include_once "library.php";




if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['setUsername']) && !empty($_POST['setUsername'])) {
        $user = new Users;
        $user->setUsername(htmlspecialchars($_POST['setUsername']));
    } else {
        throw new Exception('set username');
    }
    if (isset($_POST['setEmail'])) {
        $user->setEmail(htmlspecialchars($_POST['setEmail']));
    }
    if (isset($_POST['setPwd'])) {
        $user->setPassword(htmlspecialchars($_POST['setPwd']));
    }
    if (isset($_POST['setUsername'])
        && isset($_POST['setEmail'])
        && isset($_POST['setPwd'])) {
        $user->saveToDB($connection);
    }
    //header("Location: index.php");
    var_dump($user);
    var_dump($_POST);
} else {
    echo "Registration faild";
}