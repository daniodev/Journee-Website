<?php

session_start();

if(!isset($_GET["id"]) || !isset($_SESSION["id"])){
    header("Location: view.php");
    exit;
}

include '../sources/include/db.php';

$query = "SELECT titolo, giornoScrittura, pensieroGiornaliero FROM Pagine where idUtente = ". $_SESSION["id"] . " AND idPagina = " . $_GET["id"];
echo $query;
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) == 0){
    header("Location: write.php");
    exit;
}

$page = mysqli_fetch_array($result);
echo "<br>";
echo $page["titolo"];
echo "<br>";
echo $page["giornoScrittura"];
echo "<br>";
echo $page["pensieroGiornaliero"];
?>