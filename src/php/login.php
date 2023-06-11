<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>123</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="login">
        <h1>Zaloguj się</h1>
        <form method="post">
            <input type="text" name="login" placeholder="E-mail">
            <input type="password" name="password" placeholder="Hasło">
            <input type="submit" name="submit" value="Zaloguj">
        </form>
        <a href="register.php"><p>Nie masz konta?</p> <p>Stwórz je!</p></a>
    </div>
</body>
</html>


<?php

require 'conn.php';

if(isset($_POST['submit'])){
    $login = $_POST['login'];
    $password = $_POST['password'];

    if(!validate_email($login)){
        echo "Niepoprawny email";
        exit();
    }
    if(!validate_password($password)){
        echo "Niepoprawne hasło";
        exit();
    }


    $query_login = "SELECT user_id, user_password FROM users WHERE user_email = '$login'";

    $result_login = mysqli_query($conn, $query_login);

    if (mysqli_num_rows($result_login) > 0) {
        $final2 = mysqli_fetch_array($result_login);
        $hashed_password = $final2["password"];

        if (password_verify($login, $hashed_password)) {
            $_SESSION["id"] = $final2["id"]; // id usera do koszyku i autoryzacji

        } else {
            echo "Wrong password";
        }
    } else {
        echo "User does not exist";
    }
}

function validate_email($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    } else {
        return true;
    }
}

function validate_password($password)
{
    $uppercase = preg_match("@[A-Z]@", $password);
    $lowercase = preg_match("@[a-z]@", $password);
    $number = preg_match("@[0-9]@", $password);
    $specialChars = preg_match("@[^\w]@", $password);

    if (
        !$uppercase ||
        !$lowercase ||
        !$number ||
        !$specialChars ||
        strlen($password) < 8
    ) {
        return false;
    } else {
        return true;
    }
}
