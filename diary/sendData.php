<?php

    session_start();
    if(!isset($_SESSION["id"])){
        header("Location: ../auth/login.php");
        exit;
    }

    include '../sources/include/db.php';

    $query1 = "INSERT INTO pagine (idUtente, titolo, giornoScrittura, pensieroGiornaliero) VALUES (" .
    $_SESSION["id"] . ", '" . $_POST["title"] . "', '" . date('Y-m-d H:i:s') . "', '" . $_POST["comments"] . "')";

    mysqli_query($conn, $query1);
    $idPagina = mysqli_insert_id($conn);

    function memorizzaScale ($nome, $scala, $conn, $idPagina){

        include '../sources/include/db.php';
        $res = mysqli_query($conn, "SELECT idTipoScala FROM tipologiascale WHERE nome='". $nome . "'");
        $row = mysqli_fetch_assoc($res);
        $idTipoScala = $row['idTipoScala'];
        return $query = "INSERT INTO scale (valutazione, idPagina, idTipoScala) VALUES ('" .
        $scala . "', '" . $idPagina . "', '" . $idTipoScala . "')";

    };

    mysqli_query($conn, memorizzaScale("Lavoro", $_POST["scale1"], $conn, $idPagina));
    mysqli_query($conn, memorizzaScale("Relazioni Sentimentali", $_POST["scale2"], $conn, $idPagina));
    mysqli_query($conn, memorizzaScale("frocità", $_POST["scale3"], $conn, $idPagina));

    header("Location: view.php");
    exit;
?>