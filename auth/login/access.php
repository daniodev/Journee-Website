<?php 

// Controlla se email e password sono state inviate
if(!isset($_POST["email"]) || !isset($_POST["password"])){
    header("Location: index.php");
    exit;
}

session_start();

// Connessione al database
include '../../sources/include/db.php';

// Query per trovare l'utente tramite email
$query = $conn->query("SELECT * FROM UTENTI WHERE email = '" . $_POST["email"] . "'");

// Se l'utente non esiste
if($query->num_rows == 0){
    header("Location: ../login?error=2");
    exit;
}

// Prende i dati dell'utente
$row = mysqli_fetch_array($query);

// Controlla se la password è corretta
if(password_verify($_POST["password"], $row["password_hash"])) {

    // Salva dati in sessione
    $_SESSION["id"] = $row["id"];
    $_SESSION["nome"] = $row["nome"];
    $_SESSION["cognome"] = $row["cognome"];

    // Vai alla pagina principale
    header("Location: ../../diary/view/");

} else {

    // Password sbagliata
    header("Location: ../login?error=1");
    exit;
}
// Chiude la connessione
mysqli_close($conn);
?>