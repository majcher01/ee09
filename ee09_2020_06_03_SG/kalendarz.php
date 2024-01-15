<?php
if(isset($_POST['trescwpisu'])){
    $conn=mysqli_connect("localhost","root","","egzamin5");
    $trescwpisu=$_POST['trescwpisu'];
    mysqli_query($conn, "UPDATE zadania SET wpis='$trescwpisu' WHERE dataZadania='2020-07-13'");
    $conn->close();
    unset($_POST['trescwpisu']);
}

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mój kalendarz</title>
    <link rel="stylesheet" type="text/css" href="styl5.css">
</head>
<body>
   <header>
    <div class="header1">
        <img src="logo1.png" alt="Mój kalendarz">
    </div>
    <div class="header2">
        <h1>KALENDARZ</h1>
        <?php
        $connection=mysqli_connect("localhost","root","","egzamin5");
        if(!$connection){
            die("blad bazy danych!");
        }

        $query=mysqli_query($connection, "SELECT miesiac, rok FROM zadania WHERE dataZadania='2020-07-01'");
        $result=mysqli_fetch_array($query);
        echo "<h3>miesiąc: ".$result['miesiac'].", rok: ".$result['rok']."</h3>";
        ?>
    </div>
   </header> 
   <div class='main'>
<?php
$query2=mysqli_query($connection, "SELECT dataZadania, wpis FROM zadania WHERE miesiac='lipiec'");

while($row=mysqli_fetch_array($query2)){
    echo "
    <div class='dzien'>
    
    <h5>".$row['dataZadania']."</h5>
    <p>".$row['wpis']."</p>

    </div>
    ";
}




$connection->close();
?>
   </div>

   <footer>
<form action="./kalendarz.php" method="POST">
dodaj wpis: <input type="text" name="trescwpisu"><input type="submit" value="DODAJ">
</form>
<p>
    Strone wykonal: PESEL
</p>
   </footer>
</body>
</html>