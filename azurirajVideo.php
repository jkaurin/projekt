<?php
    $id = $_GET["id"];
    $ime = $_GET["ime"];
    $prezime = $_GET["prezime"];
    $email = $_GET["email"];
    $komentar = $_GET["komentar"];

    require_once 'konfiguracija.php';

    $sql = "UPDATE videoComments SET ime=?, prezime=?, email=?, komentar=? WHERE id=?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "ssssi", $ime, $prezime, $email, $komentar, $id); 
        if(mysqli_stmt_execute($stmt)){
            header("location: single-video.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
?>
