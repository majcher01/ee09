<?php

if(isset($_POST['trescwydarzenia'])){
    $tresc=$_POST['trescwydarzenia'];
    $connection=mysqli_connect("localhost","root","","egzamin6");
    if(!$connection){
        die("blad bazy danych!");
    }
    mysqli_query($connection,"UPDATE zadania SET wpis = '$tresc' WHERE dataZadania = '2020-08-27'");
    $connection->close();
    unset($_POST['trescwydarzenia']);
}


?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orgzanizer</title>
    <link rel="stylesheet" type="text/css" href="./styl6.css">
</head>
<body>
    <header >
        <div class="header1"><h2>MÓJ ORGANIZER</h2></div>
        <div class="header2">
            <form action="./organizer.php" method="POST" class="form1">
            Wpis wydarzenia: <input type="text" name="trescwydarzenia">
            <input type="submit" value="ZAPISZ">
            </form>
        </div>
        <div class="header3"><img src="logo2.png" alt="Mój orgzanizer"></div>
</header>
    <div class="main">
    <?php
    $connection=mysqli_connect("localhost","root","","egzamin6");
    if(!$connection){
        die("blad bazy danych!");
    }

    $query=mysqli_query($connection, "SELECT dataZadania, miesiac, wpis FROM zadania WHERE miesiac = 'sierpien'");
    while($row=mysqli_fetch_array($query)){
        echo"
        <div class='dzien'>
        <h6>".$row['dataZadania'].",".$row['miesiac']."</h6>
        <p>".$row['wpis']."</p>
        </div>

        ";
    }
    ?>
    </div>
    <footer >
    <h1>
        <?php
$query2=mysqli_query($connection, "SELECT miesiac, rok FROM zadania WHERE dataZadania = '2020-08-01'");
$result2=mysqli_fetch_array($query2);
echo "miesiąc: ".$result2['miesiac'].",rok: ".$result2['rok'];

$connection->close();

?>

    </h1>
<p>
    Strone wykonal: PESEL
</p>
</footer>
</body>
</html>
