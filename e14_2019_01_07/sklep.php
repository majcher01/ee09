


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hurtownia</title>
    <link rel="stylesheet" type="text/css" href="styl1.css">
</head>
<body>
    <div class="gora">
        <div class="logo">
        <img src="komputer.png" alt="hurtownia komputerowa">
        </div>
        <div class="lista">
        <ul>
            <li>Sprzęt</li>
            <li class="lf">
                <ol>
                    <li>Procesory</li>
                    <li>Pamięci RAM</li>
                    <li>Monitory</li>
                    <li>Obudowy</li>
                    <li>Karty graficzne</li>
                    <li>Dyski twarde</li>
                </ol>
            </li>
            <li>Oprogramowanie</li>
        </ul>
        </div>
        <div class="formularz">
        <h2>Hurtownia komputerowa</h2>

        <form action="./sklep.php" method="POST">
        Wybierz kategorię sprzętu<br>
        <input type="number" name="kategoria">
        <input type="submit" value="SPRAWDŹ">
        </form>
        </div>
    </div>

    <div class="main">
   <h1>Podzespoły we wskazanej kategorii</h1>
<?php

if(isset($_POST['kategoria'])){
    $kategoria=$_POST['kategoria'];

    $connection=mysqli_connect("localhost","root","","sklep");
    if(!$connection){
        die("Blad polaczenia z baza!");
    }

    $query=mysqli_query($connection,"SELECT nazwa, opis, cena FROM podzespoly WHERE typy_id=$kategoria");

    while($row=mysqli_fetch_array($query)){
        echo "
        <p>".$row['nazwa']." ".$row['opis']." CENA: ".$row['cena']."</p>
        ";
    }
$connection->close();
}else{
    echo "Wybierz poprawną kategorię sprzętu";
}


?>
    </div>
    <footer>
<h3>Hurtownia działa od poniedziałku do soboty w godzinach 7<sup>00</sup>-16<sup>00</sup></h3>
<a href="mailto: bok@hurtownia.pl">Napisz do nas</a>
Partnerzy:
<a href="http://intel.pl">Intel</a>
<a href="http://amd.pl">AMD</a>
<p>Stronę wykonał: PESEL</p>
    </footer>
</body>
</html>