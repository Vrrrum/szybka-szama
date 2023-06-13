<?php
    require_once "conn.php";

    $sql = "SELECT dish_id, dish_name, caloric_values, price, img FROM dishes";
    $result = mysqli_query($conn, $sql);
    if(!$result) {
        die("Error mysql: ".mysqli_error($con));
    }
    $dishes_r = array();
    while($row = mysqli_fetch_assoc($result)) {
        array_push($dishes_r, $row);
    }
    print_r($dishes_r);
    echo "łąka";
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <?php require_once "head.php" ?>
    <link rel="stylesheet" href="../css/dishList.css">
</head>
<body>
    <nav>
        <?php require_once "menu.php" ?>
    </nav>

    <main>
        <?php
        foreach($dishes_r as $value) {
        ?>
        <a href="product.php?id=<?= $value["dish_id"] ?>">
            <div style="background-image: url('../img/dishes/<?= $value["img"] ?>.webp')">
                <div class="desc">
                    <h3><?= $value["dish_name"]?></h3>
                    <p><?= $value["price"]?>zł</p>
                </div>
            </div>
        </a>
        <?php } ?>
    </main>
</body>
</html>