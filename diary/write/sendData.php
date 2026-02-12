<?php

session_start();

// Controlla se l'utente è loggato
if (!isset($_SESSION["id"])) {
    header("Location: ../../auth/login/");
    exit;
}

include '../../sources/include/db.php';

// Inserisce una nuova pagina
$query1 = "INSERT INTO pagine (idUtente, titolo, giornoScrittura, pensieroGiornaliero) VALUES (" .
    $_SESSION["id"] . ", '" . $_POST["title"] . "', '" . date('Y-m-d H:i:s') . "', '" . $_POST["comments"] . "')";

mysqli_query($conn, $query1);

// Prende l'id della pagina appena creata
$idPagina = mysqli_insert_id($conn);

// Funzione per salvare le scale
function memorizzaScale($nome, $scala, $conn, $idPagina){

    include '../../sources/include/db.php';

    // Trova il tipo scala dal nome
    $res = mysqli_query($conn, "SELECT idTipoScala FROM tipologiascale WHERE nome='" . $nome . "'");
    $row = mysqli_fetch_assoc($res);
    $idTipoScala = $row['idTipoScala'];

    // Ritorna la query di inserimento
    return "INSERT INTO scale (valutazione, idPagina, idTipoScala) VALUES ('" .
        $scala . "', '" . $idPagina . "', '" . $idTipoScala . "')";
};

// Salva le varie scale
mysqli_query($conn, memorizzaScale("Lavoro", $_POST["scale1"], $conn, $idPagina));
mysqli_query($conn, memorizzaScale("Relazioni Sentimentali", $_POST["scale2"], $conn, $idPagina));
mysqli_query($conn, memorizzaScale("Lavoro", $_POST["scale3"], $conn, $idPagina));

// Torna alla vista principale
header("Location: ../view/");
exit;
?>