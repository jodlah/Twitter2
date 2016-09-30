<?php
session_start();
include_once "library.php";

$connection = new mysqli(
    '127.0.0.1',
    'root',
    'coderslab',
    'twitter2'
);

Users::loadUserByEmailAndPwd($connection, $_POST['email']);


