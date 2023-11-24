<?php


$connection=mysqli_connect("localhost", "root", "", "firma");

if(!$connection){
    die('baza sie zepsula');

}

$result=mysqli_query($connection, "SELECT * FROM pracownicy;");

$connection->close();

$div="<hr>";
if(isset($_GET['imie']) && $_GET['imie']=='brak'){
    $div=$div."Brak imienia<br>";
}
if(isset($_GET['nazwisko']) && $_GET['nazwisko']=='brak'){
    $div=$div."Brak nazwiska<br>";
}
if(isset($_GET['pesel'])){
    if($_GET['pesel']=="brak"){
    $div=$div."Brak peselu<br>";
    }
    if($_GET['pesel']=="zakrotki"){
        $div=$div."Za krotki pesel<br>";
    }
    if($_GET['pesel']=="niepoprawny"){
        $div=$div."Niepoprawny pesel<br>";
    }
}
if(isset($_GET['sukces']) && $_GET['sukces']=='tak'){
    $div=$div."Zapisuję do bazy ".$_GET['nazwisko']." ".$_GET['imie']." ".$_GET['pesel'];
}

$div=$div."<hr>";




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
            <div style='text-align:center; width:100%;'>
            <h2>Podaj dane</h2>
            <form method='post' action='skrypt2.php'>
        Nazwisko:<br>
        <input type='text' name='nazwisko'><br>
        Imię:<br>
        <input type='text' name='imie'><br>
        PESEL:<br>
        <input type='number' name='pesel'><br><br>
        <input type='submit' value='Sprawdź i zapisz'>
</form>

<div style='margin-top:50px;'>

<?php
echo $div;
?>

</div>

</div>
        </span>
    </div>
    <div class="footer"><h5>Autor strony: NumerPesel</h5></div>
</body>
</html>