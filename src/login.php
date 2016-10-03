<?php
session_start();

include_once "library.php";

$email = htmlspecialchars($_POST['email']);
$pwd = htmlspecialchars($_POST['pwd']);

$sha1pwd = sha1($pwd);

Users::loadUserByEmailAndPwd($connection, $email, $sha1pwd);


