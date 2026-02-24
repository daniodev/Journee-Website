<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journee HomePage</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <?php 
        session_start();

        include 'sources/include/bootStrap.html';
        include 'sources/include/db.php';
        include 'sources/include/loggedNavBar.php';

        if(!isset($_SESSION["id"])) {
            header("Location: landing.php");
            exit;
        }

        $id = $_SESSION["id"];

        $query = "SELECT idPagina, titolo, giornoScrittura, pensieroGiornaliero 
                  FROM pagine 
                  WHERE idUtente = ". $id . "
                  ORDER BY giornoScrittura DESC
                  LIMIT 3";

        $result = mysqli_query($conn, $query);
        $pages = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        $userQuery = "SELECT nome, cognome FROM UTENTI WHERE id=".$id;
        $user = mysqli_query($conn, $userQuery);
        $userRow = mysqli_fetch_array($user);
    ?>

    <style>
        body {
            margin: 0;
            background-image: url('sources/images/backgrounds/home.png');
            font-family: 'IBM Plex Sans', sans-serif;
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            overflow-x: hidden;
        }

        .text {
            color: #FFFFFF;
            text-shadow: 1px 2px 3px rgba(0, 0, 0, 0.4);
            font-size: clamp(15px, 5vw, 50px);
        }

        .btn-purple {
            color: #FFFFFF;
            background-color: #5B47DF;
            border-color: #5B47DF;
            padding: 10px 20px;
            border-radius: 40px;
            font-weight: bold;
        }

        .btn-purple:hover {
            background-color: #452EDB;
            border-color: #452EDB;
        }

        .phrases {
            margin-top: 25vh;
        }

        .card {
            background-color: #FFFCE6;
            box-shadow: 1px 2px 5px rgba(0,0,0,0.4);
            transition: all 0.2s ease;
        }

        .card-link {
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .card-link:hover .card {
            box-shadow: 2px 4px 12px rgba(0,0,0,0.25);
            transform: translateY(-3px);
        }

        .spacer {
            padding-top: 12vh;
        }
    </style>
</head>

<body>
    <div class="container-fluid text-center"> 
        
        <div class="row">
            <div class="col-12 phrases">
                <h1 class="text">
                    Welcome <?php echo $userRow["nome"] ?>!<br>
                    How you feelin' today?
                </h1>

                <div class="spacer"></div>

                <form action="diary/write/">
                    <button class="btn btn-purple btn-lg">Write now</button>
                </form>
            </div>
        </div>

        <div class="row phrases">
            <div class="col-11">
                <h1 class="text float-start">Your Recent Journee's</h1>
            </div>
            <div class="col-1">
                <form action="diary/view/index.php">
                    <button class="btn btn-purple btn-lg">→</button>
                </form>
            </div>
        </div>

        <div class="row">
            <?php 
            if (empty($pages)) { ?>
                <!-- <div class="col-md-4">
                            <div class="card p-4 text-start">
                                <h4 class="fw-bold">Inizia a scrivere ora!</h4>
                                <p class="flex-grow-1"></p>
                                <small class="text-muted mt-auto text-end">DD/MM/YYYY</small>
                            </div>
                    </div> -->
            <?php } else {
                foreach ($pages as $page) {

                    $idPagina = $page["idPagina"];

                    $titolo = !empty($page["titolo"]) 
                              ? htmlspecialchars($page["titolo"]) 
                              : "Senza titolo";

                    $testo = !empty($page["pensieroGiornaliero"]) 
                             ? htmlspecialchars($page["pensieroGiornaliero"]) 
                             : "Nessun pensiero registrato...";

                    $data = date("d/m/Y", strtotime($page["giornoScrittura"]));
                    ?>
                    
                    <div class="col-md-4">
                        <a href="../diary/view/?id=<?= $idPagina ?>" class="card-link">
                            <div class="card p-4 text-start">
                                <h4 class="fw-bold"><?php echo $titolo ?></h4>
                                <p class="flex-grow-1"><?php echo $testo ?></p>
                                <small class="text-muted mt-auto text-end"><?php echo $data ?></small>
                            </div>
                        </a>
                    </div>

                    <?php 
                }
            }
            ?>
        </div>

        <div class="spacer"></div>
    </div>
</body>

</html>