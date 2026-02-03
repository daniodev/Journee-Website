<?php
include '../sources/include/db.php';

    if(!isset($_POST["email"])){
    header("Location: forgotPasswd.php");
    exit;
    }

    $query = "SELECT * FROM utenti where email=". "'" .$_POST["email"] . "'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) < 1){
    echo"NO";
    exit;
    }

    $row = mysqli_fetch_array($result);
    echo "SI";
    echo "<br>";
    echo $row["email"];

    // AGGIUNGERE QUI IL CODICE PER INVIARE L'EMAIL PER RESET DELLA PASSWORD
?>