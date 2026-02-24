<?php 
if(!isset($_POST["email"]) || !isset($_POST["password"])){
    header("Location: index.php");
    exit;
}

session_start();
include '../../sources/include/db.php';


$query = $conn->query("SELECT * FROM UTENTI WHERE email = '" . $_POST["email"] . "'");

if($query->num_rows == 0){
    header("Location: ../login?error=2");
    exit;
}

$row = mysqli_fetch_array($query);

if(password_verify($_POST["password"], $row["password_hash"])) {


    $_SESSION["id"] = $row["id"];
    $_SESSION["nome"] = $row["nome"];
    $_SESSION["cognome"] = $row["cognome"];

    header("Location: ../../diary/write/");

} else {
    header("Location: ../login?error=1");
    exit;
}
mysqli_close($conn);
?>