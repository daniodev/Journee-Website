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
    if (isset($_POST['tipologie']) && is_array($_POST['tipologie'])) {
        foreach ($_POST['tipologie'] as $idTipoScala) {
            // Recuperiamo il valore del range corrispondente all'ID della scala
            $voto = intval($_POST['valutazione'][$idTipoScala]);
            
            $queryScale = "INSERT INTO scale (valutazione, idPagina, idTipoScala) 
                           VALUES ('$voto', '$idPagina', '$idTipoScala')";
            mysqli_query($conn, $queryScale);
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