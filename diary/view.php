 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
 <!DOCTYPE html>
 <html lang="it">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Storico diario</title>
 </head>
 <body>
    <?php 
        session_start();

        $id = $_SESSION["id"];
        if(!isset($id)){
            header("Location: ../auth/login.php");
            exit;
        }

        $conn = mysqli_connect("127.0.0.1","root","","journee");
        $query = "SELECT nome, cognome FROM UTENTI where id=".$id;

        $result = mysqli_query($conn, $query);

        $row = mysqli_fetch_array($result);
        echo "Nome: ". $row["nome"] . " Cognome: " . $row["cognome"];

        $diary = mysqli_fetch_array(mysqli_query($conn, "SELECT titolo, giornoScrittura, pensieroGiornaliero FROM pagine where idUtente=". $id));
        echo $diary["titolo"] . " " . $diary["giornoScrittura"] . " " . $diary["pensieroGiornaliero"];
    ?>


<form action="../auth/logout.php">
    <button class="btn btn-danger">ESCI</button>
</form>
 </body>
 </html>