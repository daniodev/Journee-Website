<?php

    session_start();
    include '../../sources/include/db.php';


    if(!isset($_GET["id"])){
        header("Location: ../view/");
        exit;
    }

    $query = "DELETE FROM pagine WHERE idPagina=" . $_GET["id"] . " AND idUtente=" . $_SESSION["id"];
    

    echo $query;
    mysqli_query($conn, $query);
    mysqli_close($conn);

    header("Location: ../view/");
    exit;

?>