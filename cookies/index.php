<?php
if(isset($_GET["color"])){
    $cookie_name = "kolor";
$cookie_value = $_GET["color"];
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
header("Location: .");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body{
            <?php  if(isset($_COOKIE["kolor"])){
                $kolor=$_COOKIE["kolor"];
                echo "background-color: ".$kolor;
            }else{
                echo "background-color: white;";
            }
            ?>
        }
    </style>
</head>
<body>
    <div>
        <?php 
        if(isset($kolor)){
            echo "Wybrany kolor: ".$kolor;
        }else{
            echo "Nie wybrales koloru, tlo jest biale";
        }
        ?>
    </div>
    <div>
        <form action="." method="get">
            Wybierz kolor: <input type="text" name="color">
            <bR>
            <input type="submit" value="potwierdz">

        </form>
    </div>
</body>
</html>