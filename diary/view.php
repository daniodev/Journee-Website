 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
 <!DOCTYPE html>
 <html lang="it">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Storico diario</title>
 </head>
 <body style="background-color: d090d2;">
    <?php 
        session_start();

        if(!isset($_SESSION["id"])){
            header("Location: ../auth/login.php");
            exit;
        }
        $id = $_SESSION["id"];

        include '../sources/include/db.php';
        $userQuery = "SELECT nome, cognome FROM UTENTI where id=".$id;
        $pagesQuery = "SELECT titolo, giornoScrittura, pensieroGiornaliero FROM pagine where idUtente=". $id. " ORDER BY giornoScrittura DESC";


        $user = mysqli_query($conn, $userQuery);
        $userRow = mysqli_fetch_array($user);
        echo "<div style='background-color: white;'>";
        echo "<h1 class='h1 text-center'>Benvenuto, " . $userRow["nome"] . " " . $userRow["cognome"] . "</h1>";
        
        echo "<div class='position-absolute top-0 end-0 mt-2 me-2'>";
        echo "<form action='../diary/write.php' class='d-inline'>";
        echo "<button class='btn btn-warning'>Scrivi</button>";
        echo "</form>";
        echo "<form action='../auth/logout.php' class='d-inline ms-2'>";
        echo "<button class='btn btn-danger'>Logout</button>";
        echo "</form>";
        echo "</div>";
        echo "</div>";

        echo "<div class='container mt-4 text-center'>";
        $pages = mysqli_query($conn, $pagesQuery);
        while ($row = mysqli_fetch_array($pages)) {
            $date = DateTime::createFromFormat('Y-m-d H:i:s', $row["giornoScrittura"]);
            echo $row["titolo"] . " " . $date->format('d:m:y H:i') . " " . $row["pensieroGiornaliero"] . "<br>";
        }
        echo "</div>";
    ?>
 </body>
 </html>