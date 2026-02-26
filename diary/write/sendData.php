<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: ../../auth/login/");
    exit;
}

include '../../sources/include/db.php';

// 1. Sanificazione dati per evitare SQL Injection
$idUtente = $_SESSION["id"];
$titolo = mysqli_real_escape_string($conn, $_POST["title"]);
$pensiero = mysqli_real_escape_string($conn, $_POST["comments"]);
$dataOggi = date('Y-m-d H:i:s');

// 2. Inserimento pagina
$queryPagina = "INSERT INTO pagine (idUtente, titolo, giornoScrittura, pensieroGiornaliero) 
                VALUES ('$idUtente', '$titolo', '$dataOggi', '$pensiero')";

if (mysqli_query($conn, $queryPagina)) {
    $idPagina = mysqli_insert_id($conn);

    // 3. Salvataggio Scale selezionate
    // $_POST['tipologie'] contiene gli ID delle checkbox spuntate
// 3. Salvataggio Scale selezionate
if (isset($_POST['valutazione']) && is_array($_POST['valutazione'])) {
    foreach ($_POST['valutazione'] as $idTipoScala => $voto) {
        
        // Sanificazione dei dati del ciclo
        $idTipoScala = intval($idTipoScala);
        $voto = intval($voto);
        
        $queryScale = "INSERT INTO scale (valutazione, idPagina, idTipoScala) 
                       VALUES ('$voto', '$idPagina', '$idTipoScala')";
        
        if (!mysqli_query($conn, $queryScale)) {
            // Opzionale: log errore se una scala fallisce
            error_log("Errore inserimento scala ID $idTipoScala: " . mysqli_error($conn));
        }
    }
}
    // 4. Aggiorna il flag configurazioneCompletata (come richiesto inizialmente)
    // Questo permette all'utente di non essere più rediretto forzatamente
    //$queryUpdate = "UPDATE scalePreferite SET configurazioneCompletata = 1 WHERE idUtente = $idUtente";
    //mysqli_query($conn, $queryUpdate);

    header("Location: ../view/index.php?status=success");
    exit;
} else {
    echo "Errore nell'inserimento: " . mysqli_error($conn);
}
?>