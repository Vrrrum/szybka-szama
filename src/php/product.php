<?php
    require_once "conn.php";

    $id = $_GET["id"];

    $sql = "SELECT * FROM dishes WHERE dish_id=$id";
    $result = mysqli_query($conn, $sql);
    if(!$result) {
        die("Error mysql: ".mysqli_error($con));
    }
    $dish_r = mysqli_fetch_assoc($result);
    print_r($dish_r);

    $sql = "SELECT `allergens`.`allergen_name` FROM `dishes_allergens` JOIN `allergens` ON `allergens`.`allergen_id` = `dishes_allergens`.`id_allergens` WHERE `id_dishes` = $id";
    $result = mysqli_query($conn, $sql);
    if(!$result) {
        die("Error mysql: ".mysqli_error($con));
    }
    $allergens_r = array();
    while($row = mysqli_fetch_assoc($result)) {
        array_push($allergens_r, $row);
    }

    print_r($allergens_r)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Szybka szama - Produkt</title>
    <?php require_once "head.php"?>
    <link rel="stylesheet" href="../css/product.css">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/2819/2819194.png">
</head>
<body>
    <nav>
        <?php require_once "menu.php"?>
    </nav>
    <main>
        <div class="banner" style="background-image: url('../img/dishes/<?= $dish_r["img"] ?>.webp')"></div>

        <h1><?=$dish_r["dish_name"]?></h1>
        <p><?=$dish_r["price"]?>zł</p>
        <div>
            <img width="60" src="../img/add.svg" alt="">
            <img width="60" src="../img/fav.svg" alt="">
        </div>

        <h2>Informacje</h2>
        <h3>Alergeny</h3>
        <ul>
            <?php 
            foreach($allergens_r as $value) {
                ?>
                <li><?=$value["allergen_name"]?></li>
                <?php
            }
            ?>
        </ul>
        <h3>Wartość kaloryczna <sup>Całość</sup></h3>
        <div class="cal-bar">
            <div style="width: <?=($dish_r['caloric_values']/2500)*100?>%"></div>
        </div>
        <p><?=$dish_r['caloric_values']?> / 2500 kcl dziennie</p>
<!-- 
        <h3>Wartość kaloryczna <sup>Kawałek</sup></h3>
        <div class="cal-bar">
            <div style="width: 10%"></div>
        </div>
        <p>233 kcl / 2500 kcl dziennie</p> -->
    </main>


</body>
</html>