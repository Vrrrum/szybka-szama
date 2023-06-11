<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>123</title>
    <link rel="stylesheet" href="create.css">
</head>
<body>
    <section id="login">
        <h1>Stwórz konto</h1>
        <form action="login.html">
        <input type="text" name="user" placeholder="Nazwa użytkownika">
            <input type="email" name="mail" placeholder="E-mail">
            <input type="tel" name="telefon" placeholder="Numer telefonu">
            <input type="text" name="password" placeholder="Hasło">
            <input type="submit" name="submit" value="Stwórz">
        </form>
        <a href="login.html">Masz już konto? <p>Zaloguj się!</p></a>
    </section>
</body>
</html>

<?php
if(isset($_POST['submit'])){
  $usereg=$_POST['user'];
  $passreg=$_POST['password'];
  $emailreg=$_POST['mail'];
  $telreg=$_POST['telefon']
}

$query='SELECT * FROM uzytkownicy';
$result = mysqli_query($conn, $query);
$wynik=mysqli_fetch_assoc($result);

if(isset($_POST['submit']) && isset($_POST['checkreg']) && !empty($usereg) && !empty($passreg)&& !empty($emailreg))
{
    $createuser="INSERT INTO uzytkownicy (username,user_password,user_email,user_contact_number) VALUES ('$usereg','$passreg','$emailreg','$telreg')";
    mysqli_query($conn,$createuser);
    $usereg='';
    $passreg='';
    $emailreg='';
    $telreg='';
    echo "<script type='text/javascript'>
    window.location.href = 'login.php';
    </script>";
}else{
    echo 'Zapoznaj sie z regulaminem';
}
