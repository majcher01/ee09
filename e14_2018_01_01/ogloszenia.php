<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal ogłoszeniowy</title>
    <link rel="stylesheet" type="text/css" href="styl1.css">
</head>
<body>
    <header>
<h1>Portal ogłoszeniowy</h1>
    </header>
    <div class="main">
        <div class="lewy">
<h2>Kategorie ogłoszeń</h2>
<ol>
    <li>Książki</li>
    <li>Muzyka</li>
    <li>Filmy</li>
</ol>
<img src="ksiazki.jpg" alt="Kupię / sprzedam książkę">

<table>
    <tr>
        <td>Liczba ogłoszeń</td>
        <td>Cena ogłoszenia</td>
        <td>Bonus</td>
    </tr>
    <tr>
        <td>1-10</td>
        <td>1 PLN</td>
        <td rowspan="3">Subskrypcja newslettera to upust 0,20 PLN na ogłoszenie</td>
    </tr>
    <tr>
        <td>11-50</td>
        <td>0,80 PLN</td>
    </tr>
    <tr>
        <td>51 i więcej</td>
        <td>0,60 PLN</td>
        
    </tr>
</table>
        </div>
        <div class="prawy">
            <h2>Ogłoszenia kategorii książki</h2>
            <?php
$connection=mysqli_connect("localhost","root","","ogloszenia");
if(!$connection){
    die("Blad polaczenia z baza!");
}

$query1=mysqli_query($connection,"SELECT id, tytul, tresc FROM ogloszenie WHERE kategoria=1;");

while($row=mysqli_fetch_array($query1)){
    $cid=$row['id'];
    echo "
    <h3>".$cid." ".$row['tytul']."</h3>
    <p>".$row['tresc']."</p>
    ";

$query2=mysqli_query($connection,"SELECT uzytkownik.telefon FROM uzytkownik JOIN ogloszenie on uzytkownik.id=ogloszenie.uzytkownik_id WHERE ogloszenie.id=$cid");
$r2=mysqli_fetch_row($query2);
echo "
<p>telefon kontaktowy: ".$r2['0']."</p>
";

}


$connection->close();

?>
        </div>
    </div>

    <footer>
Portal ogłoszeniowy opracował: PESEL
    </footer>
</body>
</html>