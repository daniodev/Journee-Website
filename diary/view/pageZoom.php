<?php

session_start();

if(!isset($_GET["id"]) || !isset($_SESSION["id"])){
    header("Location: index.php");
    exit;
}

include '../../sources/include/db.php';
include '../../sources/include/bootStrap.html';

$query = "SELECT titolo, giornoScrittura, pensieroGiornaliero FROM Pagine where idUtente = ". $_SESSION["id"] . " AND idPagina = " . $_GET["id"];
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


// codice dove prende il page id e lo usa per trovare le scale di valore.
$query2 = "SELECT * FROM scale WHERE idPagina = " . $_GET["id"];
$result2 = mysqli_query($conn, $query2);
echo "<hr>";
while ($row = mysqli_fetch_array($result2)) {
    $type=$row["idTipoScala"];
    $query3 = "SELECT * FROM tipologiaScale where idTipoScala =" . $type;
    $result3 = mysqli_query($conn, $query3);
    $row3 = mysqli_fetch_array($result3);
    echo $row3["descrizione"] . "<br><br>";
    echo $row["valutazione"] . "<br><br>";
}
    
if(!$result2){
    die(mysqli_error($conn));
}



?>
<form action="../delete/" method="POST">
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
    <button type="submit" class="btn btn-danger">
        Elimina pagina
    </button>
</form>