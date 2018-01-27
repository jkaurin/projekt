<?php
    $id = $_GET["id"];
    require_once 'konfiguracija.php';
    $sql = "DELETE FROM rezervacije WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "s", $id); 
        if(mysqli_stmt_execute($stmt)){
            header("location: Rezervacije.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
?>
