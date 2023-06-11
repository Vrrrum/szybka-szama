<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Szybka szama - Produkt</title>
    <?php require_once "head.php"?>
    <link rel="stylesheet" href="../css/product.css">
</head>
<body>
    <nav>
        <?php require_once "menu.php"?>
    </nav>
    <main>
        <div class="banner"></div>

        <h1>Pizza italiana peperoni</h1>
        <p>34.99zł</p>
        <div>
            <img width="60" src="../img/add.svg" alt="">
            <img width="60" src="../img/fav.svg" alt="">
        </div>

        <h2>Informacje</h2>
        <h3>Alergeny</h3>
        <ul>
            <li>Orzeszki ziemne</li>
            <li>Mięczaki</li>
        </ul>
        <h3>Wartość kaloryczna <sup>Całość</sup></h3>
        <div class="cal-bar">
            <div style="width: 50%"></div>
        </div>
        <p>1044 kcl / 2500 kcl dziennie</p>

        <h3>Wartość kaloryczna <sup>Kawałek</sup></h3>
        <div class="cal-bar">
            <div style="width: 10%"></div>
        </div>
        <p>233 kcl / 2500 kcl dziennie</p>
    </main>


</body>
</html>