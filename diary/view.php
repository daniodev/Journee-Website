 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<?php 

    session_start();

    $conn = mysqli_connect("127.0.0.1","root","","journee");
    $query = "SELECT nome, cognome FROM UTENTI where id=".$_SESSION["id"];

    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_array($result);
    echo "Nome: ". $row["nome"] . " Cognome: " . $row["cognome"];
?>

<form action="../auth/logout.php">
    <button class="btn btn-danger">ESCI</button>
</form>