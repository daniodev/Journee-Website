<?php 

    include '../../sources/include/db.php';
    // Controllo che tutti i campi obbligatori siano stati inviati
    if(!isset($_POST["email"]) || !isset($_POST["password"]) || !isset($_POST["username"]) || !isset($_POST["nome"]) || !isset($_POST["cognome"]) || !isset($_POST["confirmPassword"])){
        header("Location: ../register/");
        exit();
    }
    // Verifico se l'email esiste già nel database
    $check = $conn -> query("SELECT * FROM utenti where email=". "'" . $_POST["email"]. "'");
    if ($check -> num_rows > 0) {
        header("Location: ../register?error=1");
        exit();
    }
    // Controllo che le due password inserite corrispondano
    if($_POST["password"] != $_POST["confirmPassword"]){
        header("Location: ../register?error=2");
        exit();
    }
    // Creo una versione sicura (hash) della password
    $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
     // Preparo la query per inserire il nuovo utente
    $string = "INSERT INTO utenti (username, nome, cognome, email, password_hash) values ";
    $string .= "('". $_POST["username"]. "', ";
    $string .= "'". $_POST["nome"] . "', ";
    $string .= "'". $_POST["cognome"] . "', ";
    $string .= "'". $_POST["email"] . "', ";
    $string .= "'". $password_hash . "')";

    // Eseguo la query e, se va a buon fine, mando l'utente al login
    if ($conn -> query($string)) {
         header("Location: ../login/");
    }
 // Chiudo la connessione al database
    mysqli_close($conn);
?>