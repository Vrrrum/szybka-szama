<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zaloguj</title>
    <?php require_once "head.php"?>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <nav>
        <?php require_once "menu.php"?>
    </nav>
    <section id="login">
        <h1>Zaloguj się</h1>
        <form action="./index.html">
            <input type="text" name="login" placeholder="E-mail">
            <input type="password" name="password" placeholder="Hasło">
            <input type="submit" name="submit" value="Zaloguj">
        </form>
        <a href="create.php"><p>Nie masz konta?</p> <p>Stwórz je!</p></a>
    </section>
</body>
</html>