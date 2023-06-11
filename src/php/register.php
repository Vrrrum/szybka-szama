<?php
session_start();
require 'conn.php';

function validate_email($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validate_password($password)
{
    $uppercase = preg_match("/[A-Z]/", $password);
    $lowercase = preg_match("/[a-z]/", $password);
    $number = preg_match("/[0-9]/", $password);
    $specialChars = preg_match("/[^A-Za-z0-9]/", $password);

    return $uppercase && $lowercase && $number && $specialChars && strlen($password) >= 8;
}

function validate_tel($tel)
{
    return preg_match('/^[0-9]{9}$/', $tel);
}

if (isset($_POST["submit"])) {
    $login = $_POST["login"];
    $password = $_POST["password"];
    $tel = $_POST["tel"];
    $date = date("Y-m-d");

    if (!validate_email($login)) {
        echo "Niepoprawny email";
        exit();
    }

    if (!validate_password($password)) {
        echo "Hasło powinno zawierać co najmniej 8 znaków, w tym przynajmniej jedną dużą literę, jedną małą literę, jedną cyfrę i jeden znak specjalny.";
        exit();
    }

    if (!validate_tel($tel)) {
        echo "Niepoprawny numer telefonu";
        exit();
    }

    $login = mysqli_real_escape_string($conn, $login);
    $password = mysqli_real_escape_string($conn, $password);
    $tel = mysqli_real_escape_string($conn, $tel);

    $query_check_if_exist = "SELECT * FROM users WHERE user_email = '$login'";
    $result = mysqli_query($conn, $query_check_if_exist);

    if (mysqli_num_rows($result) > 0) {
        echo "Użytkownik już istnieje";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (user_email, user_password, user_contact_number, creation_date) VALUES ('$login','$hashed_password', '$tel', '$date')";
        $result_insert = mysqli_query($conn, $query);

        if ($result_insert) {
            $query_l = "SELECT user_id FROM users WHERE user_email = '$login' AND user_password = '$hashed_password'";
            $result = mysqli_query($conn, $query_l);
            $final = mysqli_fetch_array($result);
            $_SESSION["id"] = $final["id"];

            echo "Użytkownik został utworzony";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>123</title>
    <link rel="stylesheet" href="../css/register.css">
</head>
<body>
<div id="login">
    <h1>Stwórz konto</h1>
    <form action="register.php" method="POST">
        <input type="email" name="login" placeholder="E-mail">
        <input type="password" name="password" placeholder="Hasło">
        <input type="tel" name="tel" placeholder="Numer telefonu">
        <input type="submit" name="submit" value="Stwórz">
    </form>
    <a href="login.php">Masz już konto? <p>Zaloguj się!</p></a>
</div>
</body>
</html>
