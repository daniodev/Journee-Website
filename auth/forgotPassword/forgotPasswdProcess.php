<?php
include '../../sources/include/db.php';

// Controlla se è stata inviata l'email
if(!isset($_POST["email"])){
    header("Location: ../forgotPassword/");
    exit;
}

// Query per cercare l'utente tramite email
$query = "SELECT * FROM utenti WHERE email = '" . $_POST["email"] . "'";
$result = mysqli_query($conn, $query);

// Se non trova nessun utente
if(mysqli_num_rows($result) < 1){
    echo "NO";
    exit;
}

// Prende i dati dell'utente
$row = mysqli_fetch_array($result);

echo "SI";
echo "<br>";
echo $row["email"];

// Aggiungere QUI: invio email per reset password
?>