<?php
session_start();
include_once 'library.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Twitter</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
</head>
<body class="loginbody">
    <div class="wrapper">
        <form class ="form-signin" method="post" action="login.php">
            <label class="form-signin-heading"><span>Twitter 2.0</span><p>Please login</p></label><br><br>
                <input class="form-control" type="text" name="email" placeholder="E-mail Address"><br>
                <input class="form-control" type="password" name="pwd" placeholder="Password"><br>
            <button class="loginbtn btn btn-lg btn-primary type="submit" name="submit">LOGIN</button>
            <button formaction="signUpForm.html" class="loginbtn btn btn-lg btn-success type="submit">SIGN UP</button>
        </form>

    </div>
</body>
</html>
