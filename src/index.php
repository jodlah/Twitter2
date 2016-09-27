<?php
include_once 'library.php';

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
            Hasło:       <input type="text" name="psw"><br>
        <button type="submit" name="submit">Wyślij</button>
    </form>
</div>

<div>
    <form method="post" action="/AddUser.php">
        <button type="submit">Rejestracja</button>
    </form>

</div>


</body>
</html>
