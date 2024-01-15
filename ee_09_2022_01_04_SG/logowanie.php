<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>
    <link rel="stylesheet" type="text/css" href="styl4.css">
</head>
<body>
    <header>
<h1>Forum wielbicieli psów</h1>
    </header>

    <div class="main">
        <div class="lewy">
<img src="obraz.jpg" alt="foksterier">
        </div>

        <div class="prawymain">
            <div class="prawygora">
            <h2>Zapisz się</h2>
            <form action="./logowanie.php" method="POST">
                login: <input type="text" name="login"><br>
                hasło: <input type="password" name="haslo"><br>
                powtórz hasło: <input type="password" name="haslo2"><br>
                <input type="submit" value="Zapisz">
            </form>

            <?php

            if(isset($_POST['login']) || isset($_POST['haslo']) || isset($_POST['haslo2'])){
                $login=$_POST['login'];
                $haslo=$_POST['haslo'];
                $haslo2=$_POST['haslo2'];

                if(empty($login) || empty($haslo) || empty($haslo2)){
                    //die("wypełnij wszystkie pola");
                    echo "<p>wypełnij wszystkie pola</p>";
                }else if($haslo!=$haslo2){

                    echo "<p>hasła nie są takie same</p>";
                }else{

                $connection=mysqli_connect("localhost","root","","psy");
                if(!$connection){
                    die("Blad bazy danych");
                }

                $query1=mysqli_query($connection,"SELECT login FROM uzytkownicy WHERE login='$login'");
                if(mysqli_num_rows($query1)>0){
                    echo "<p>login występuje w bazie danych, konto nie zostało dodane</p>";
                }else{

                $haslohash=sha1($haslo);
                mysqli_query($connection, "INSERT INTO `uzytkownicy`(`id`, `login`, `haslo`) VALUES (NULL,'$login','$haslohash');");
                echo "<p>Konto zostało dodane</p>";
            }
                $connection->close();
            }
        }

            ?>
            </div>
            <div class="prawydol">
            <h2>Zapraszamy wszystkich</h2>
            <ol>
                <li>właścicieli psów</li>
                <li>weterynarzy</li>
                <li>tych, co chcą kupić psa</li>
                <li>tych, co lubią psy</li>
            </ol>
            <a href="regulamin.html">Przeczytaj regulamin forum</a>
            </div>
        </div>
    </div>

    <footer>
    Stronę wykonał: PESEL
    </footer>
</body>
</html>