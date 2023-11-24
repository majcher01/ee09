<?php
/*
$nazwisko=$_POST['nazwisko'];
$imie=$_POST['imie'];
$pesel=$_POST['pesel'];

*/

$link='?x=2';   //check wpisane dane
if( empty($_POST['nazwisko']) || empty($_POST['imie']) || empty($_POST['pesel']) ){
if(empty($_POST['nazwisko'])){
    $link=$link."&nazwisko=brak";
}
if(empty($_POST['imie'])){
    $link=$link."&imie=brak";
}
if(empty($_POST['pesel'])){
    $link=$link."&pesel=brak";
}
header('Location: formularz.php'.$link);
}else{
    //check pesel
    $pesel=$_POST['pesel'];
    if(strlen($pesel)!=11){
        header('Location: formularz.php?pesel=zakrotki');
    }

    

    $cyfry=str_split($pesel);

    $suma=1*$cyfry[0]+3*$cyfry[1]+7*$cyfry[2]+9*$cyfry[3]+1*$cyfry[4]+3*$cyfry[5]+7*$cyfry[6]+9*$cyfry[7]+1*$cyfry[8]+3*$cyfry[9];

    $reszta=$suma%10;

    if($reszta==0 && $cyfry[10]==0){
        $check='ok';
    }else if($reszta!=0 && ($cyfry[10]==(10-$reszta))){
        $check='ok';
    }else{
        $check='nieok';
    }

    if($check=='nieok'){
        header("Location: formularz.php?pesel=niepoprawny");
    }else{
        $imie=$_POST['imie'];
        $nazwisko=$_POST['nazwisko'];
        $connection=mysqli_connect("localhost", "root", "", "firma");

        if(!$connection){
            die('baza sie zepsula');
        
        }
        
        $result=mysqli_query($connection, "INSERT INTO `pracownicy`(`id`, `nazwisko`, `imie`, `PESEL`) VALUES ('NULL','$nazwisko','$imie','$pesel');");
        
        $connection->close();   
        $url="formularz.php?sukces=tak&imie=$imie&nazwisko=$nazwisko&pesel=$pesel";
        header('Location: '.$url);


    }

    

    //var_dump($cyfry);
}



?>