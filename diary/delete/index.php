<?php

    session_start();
    include '../../sources/include/db.php';

    // Se non ricevo un ID tramite POST, rimando l'utente alla visualizzazione
    if(!isset($_POST["id"])){
        header("Location: ../view/");
        exit;
    }

    // Preparo la query per cancellare la pagina specifica dell'utente loggato
    // Nota: Sarebbe meglio usare i prepared statements per evitare SQL Injection
    $query = "DELETE FROM pagine WHERE idPagina=" . $_POST["id"] . " AND idUtente=" . $_SESSION["id"];
    
    // Debug: mostro la query a video (da rimuovere in produzione)
    echo $query;

    // Eseguo la query sul database
    mysqli_query($conn, $query);

    // Chiudo la connessione al database
    mysqli_close($conn);

    // Torno alla pagina principale dopo l'eliminazione
    header("Location: ../view/");
    exit;

?>