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
$user->setPassword($_POST['setPsw']);
$user->saveToDB($mysqli);

$user = Users::loadUserById($mysqli, 21);
$user->getId();
$user->setUsername('Dawid');
$user->setEmail('dawid@twitter.pl');
$user->setPassword('4321');
$user->saveToDB($mysqli);

//$user->delete($mysqli);



var_dump($user);

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Twitter - rejestracja</title>
</head>
<body>
    <div>
        <form method="post" action="#">
            <label>Zarejestruj się</label><br><br>
            <label>Username<input type="text" name="setUsername"></label><br>
            <label>Adres e-mail:<input type="email" name="setEmail"></label><br>
            <label>Podaj hasło: <input type="password" name="setPsw"></label><br>
            <button type="submit" name="submit">Utwórz konto.</button>
        </form>
    </div>
</body>
</html>

