<?php

session_start();
// Controlla sessione e id pagina
if(!isset($_GET["id"]) || !isset($_SESSION["id"])){
    header("Location: index.php");
    exit;
}
/*
 if(!$_SESSION["ScalePrefScelte"]){
            header("Location: ../../diary/write/scaleSelection.php");
        }
*/
include '../../sources/include/db.php';
include '../../sources/include/bootStrap.html';

// Query per prendere la pagina dell'utente
$query = "SELECT titolo, giornoScrittura, pensieroGiornaliero 
          FROM Pagine 
          WHERE idUtente = ". $_SESSION["id"] . " 
          AND idPagina = " . $_GET["id"];

$result = mysqli_query($conn, $query);
// Se la pagina non esiste
if(mysqli_num_rows($result) == 0){
    header("Location: write.php");
    exit;
}
// Prende i dati della pagina
$page = mysqli_fetch_array($result);

echo "<br>";
echo $page["titolo"];
echo "<br>";
echo $page["giornoScrittura"];
echo "<br>";
echo $page["pensieroGiornaliero"];


// Prende le scale legate alla pagina
$query2 = "SELECT * FROM scale WHERE idPagina = " . $_GET["id"];
$result2 = mysqli_query($conn, $query2);

echo "<hr>";

// Cicla le scale
while ($row = mysqli_fetch_array($result2)) {

    $type = $row["idTipoScala"];
    // Prende la descrizione del tipo scala
    $query3 = "SELECT * FROM tipologiaScale WHERE idTipoScala = " . $type;
    $result3 = mysqli_query($conn, $query3);
    $row3 = mysqli_fetch_array($result3);

    echo $row3["descrizione"] . "<br><br>";
    echo $row["valutazione"] . "<br><br>";
}
// Controllo errori
if(!$result2){
    die(mysqli_error($conn));
}
?>
<!-- Form per eliminare la pagina -->
<form action="../delete/" method="POST">
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
    <button type="submit" class="btn btn-danger">
        Elimina pagina
    </button>
</form>
