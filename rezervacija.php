<?php
require_once 'konfiguracija.php';

$ime = $_POST["ime"];
$prezime = $_POST["prezime"];
$dogadaj = $_POST["event"];
$mail = $_POST["mail"];

if($_SERVER["REQUEST_METHOD"] == "POST"){
        $sql = "INSERT INTO rezervacije (ime, prezime, dogadaj, mail) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ssss", $ime, $prezime, $dogadaj, $mail);
            if(mysqli_stmt_execute($stmt)){
                header("location: Rezervacije.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
    mysqli_close($link);
}
?>