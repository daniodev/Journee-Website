<?php

    session_start();
    include '../sources/include/db.php';

    if(!isset($_POST["id"])){
        header("Location: view.php");
        exit;
    }

    $query = "DELETE FROM pagine WHERE idPagina=" . $_POST["id"] . " AND idUtente=" . $_SESSION["id"];
    echo $query;
    mysqli_query($conn, $query);

    mysqli_close($conn);

    header("Location: view.php");
    exit;

?>
