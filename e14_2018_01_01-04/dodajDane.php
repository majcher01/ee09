<?php

$conn=mysqli_connect("localhost","root","","ogloszenia");
if(!$conn){
    die("Blad polaczenia z baza!");
}

$imie=$_POST['imie'];
$nazwisko=$_POST['nazwisko'];
$telefon=$_POST['telefon'];
$email=$_POST['email'];

mysqli_query($conn,"INSERT INTO `uzytkownik`(`id`, `imie`, `nazwisko`, `telefon`, `email`) VALUES (NULL,'$imie','$nazwisko','$telefon','$email')");


$conn->close();

header("Location: rejestracja.html");



?>