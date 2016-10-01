<?php
session_start();

include_once "library.php";

$email = $_POST['email'];
$pwd = $_POST['pwd'];

$sha1pwd = sha1($pwd);

Users::loadUserByEmailAndPwd($connection, $email, $sha1pwd);


