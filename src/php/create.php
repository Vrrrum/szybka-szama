<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zarejestruj się</title>
    <link rel="stylesheet" href="../css/create.css">
    <?php require_once "head.php" ?>
</head>
<body>
    <nav>
        <?php require_once "menu.php" ?>
    </nav>
    <section id="login">
        <h1>Stwórz konto</h1>
        <form action="login.html">
        <input type="text" name="user" placeholder="Nazwa użytkownika">
            <input type="email" name="mail" placeholder="E-mail">
            <input type="tel" name="telefon" placeholder="Numer telefonu">
            <input type="password" name="password" placeholder="Hasło">
            <input type="submit" name="submit" value="Stwórz">
        </form>
        <a href="login.php">Masz już konto? <p>Zaloguj się!</p></a>
    </section>
</body>
</html>

<?php
require_once "conn.php";

if(isset($_POST['submit'])){
  $usereg=$_POST['user'];
  $passreg=$_POST['password'];
  $emailreg=$_POST['mail'];
  $telreg=$_POST['telefon'];
}

$query='SELECT * FROM users';
$result = mysqli_query($conn, $query);
$wynik=mysqli_fetch_assoc($result);
