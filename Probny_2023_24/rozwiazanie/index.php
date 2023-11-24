<?php


$connection=mysqli_connect("localhost", "root", "", "firma");

if(!$connection){
    die('baza sie zepsula');

}

$result=mysqli_query($connection, "SELECT * FROM pracownicy;");

$connection->close();






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <title>Dane osobowe</title>
</head>
<body>
    <div class="h1">
        <h1>Dane osobowe pracowników</h1></div>

    <div class="flexmain">
        <span class="flexleft">
            <ul class="ul1" type="none">
                <li><a href="index.php"><button class="btn">Wyświetl dane</button></a></li>
                <li><a href="formularz.php"><button class="btn">Wpisz dane</button></a></li>
            </ul>
        </span>
        <span class="flexright">
            <table style='margin: auto; border: 1px solid black;'>
        <tr><th>Id</th><th>Nazwisko</th><th>Imie</th><th>PESEL</th></tr>

        <?php
    while($row=mysqli_fetch_array($result)){
        echo "<tr>
        <td>".$row['id']."</td>
        <td>".$row['nazwisko']."</td>
        <td>".$row['imie']."</td>
        <td>".$row['PESEL']."</td>
        </tr>";
    }

?>

        </table>
        </span>
    </div>
    <div class="footer"><h5>Autor strony: NumerPesel</h5></div>
</body>
</html>