<?php

session_start();

include_once 'library.php';

$id = $_SESSION['id'];

echo Messages::printMessages($connection, $id);

