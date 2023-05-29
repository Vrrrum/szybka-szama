<?php

require "conn.php";


if(isset($_POST["submit"])) {
    if (isset($_POST["login"]) && isset($_POST["password"])) {

        $login = $_POST["login"];
        $password = $_POST["password"];

        if(validate_email($login) && validate_password($password)) {
            if(login_func($login, $password)) {
                echo "Zalogowano";
            } else {
                echo "Niepoprawne dane logowania";
            }
        } else {
            echo "Niepoprawne dane logowania";
        }
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

    if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        return false;
    } else {
        return true;
    }
}



function login_func($username, $password)
{
    $query = "SELECT password_hash FROM users WHERE username = '$username'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password_hash'];

        if (password_verify($password, $hashed_password)) {
            return true;
        }
    }
    return false;
}




