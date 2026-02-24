<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journee HomePage</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <?php 
        // Avvio della sessione per accedere ai dati dell'utente loggato
        session_start();

        // Inclusione Bootstrap, connessione al database e navbar
        include 'sources/include/bootStrap.html';
        include 'sources/include/db.php';
        include 'sources/include/navBar.php';

        // Se l'utente non è autenticato, reindirizzamento alla landing page
        if(!isset($_SESSION["id"])) {
            header("Location: landing.php");
            exit;
        }

        // Recupero dell'id utente dalla sessione
        $id = $_SESSION["id"];

        // Query per ottenere le ultime 3 pagine scritte dall'utente
        $query = "SELECT titolo, giornoScrittura, pensieroGiornaliero 
                  FROM pagine 
                  WHERE idUtente = ". $id . "
                  ORDER BY giornoScrittura DESC
                  LIMIT 3";

        $result = mysqli_query($conn, $query);

        // Salvo i risultati in un array associativo
        $pages = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        // Query per recuperare nome e cognome dell'utente
        $userQuery = "SELECT nome, cognome FROM UTENTI WHERE id=".$id;

        $user = mysqli_query($conn, $userQuery);
        $userRow = mysqli_fetch_array($user);
    ?>

    <style>
        /* Stile generale della pagina */
        body {
            margin: 0;
            background-image: url('sources/images/backgrounds/home.png');
            font-family: 'IBM Plex Sans', sans-serif;
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Testo con ombra per migliore leggibilità */
        .text {
            color: #FFFFFF;
            text-shadow: 1px 2px 3px rgba(0, 0, 0, 0.4);
        }

        /* Bottone personalizzato viola */
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

        /* Spaziatura verticale centrale */
        .phrases {
            margin-top: 25vh;
        }

        /* Card delle pagine del diario */
        .card {
            background-color: #FFFCE6;
            box-shadow: 1px 2px 5px rgba(0,0,0,0.4);
        }

        .spacer {
            padding-top: 12vh;
        }
    </style>
</head>

<body>
    <div class="container-fluid text-center"> 
        
        <!-- Sezione di benvenuto -->
        <div class="row">
            <div class="col-12 phrases">
                <h1 class="text">
                    <!-- Visualizza il nome dell'utente -->
                    Welcome <?php echo $userRow["nome"] ?>!<br>
                    How you feelin' today?
                </h1>

                <div class="spacer"></div>

                <!-- Pulsante per scrivere una nuova pagina -->
                <form action="diary/write/index.php">
                    <button class="btn btn-purple btn-lg">First Page!?</button>
                </form>
            </div>
        </div>

        <!-- Sezione intestazione pagine recenti -->
        <div class="row phrases">
            <div class="col-11">
                <h1 class="text float-start">Your Recent Journee's</h1>
            </div>
            <div class="col-1">
                <!-- Pulsante per vedere tutte le pagine -->
                <form action="diary/view/index.php">
                    <button class="btn btn-purple btn-lg">→</button>
                </form>
            </div>
        </div>

        <!-- Sezione card delle ultime pagine -->
        <div class="row">
<?php 
            // Se l'utente non ha ancora scritto pagine
            if (empty($pages)) {
                echo "<div class='col-12'>
                        <h3 class='empty-msg'>
                            Non hai ancora scritto nulla. Inizia il tuo viaggio oggi!
                        </h3>
                      </div>";
            } else {

                // Ciclo sulle pagine (massimo 3)
                foreach ($pages as $page) {

                    // Sanitizzazione output per sicurezza (anti XSS)
                    $titolo = !empty($page["titolo"]) 
                              ? htmlspecialchars($page["titolo"]) 
                              : "Senza titolo";

                    $testo = !empty($page["pensieroGiornaliero"]) 
                             ? htmlspecialchars($page["pensieroGiornaliero"]) 
                             : "Nessun pensiero registrato...";

                    // Formattazione data nel formato italiano
                    $data = date("d/m/Y", strtotime($page["giornoScrittura"]));
                    ?>
                    
                    <!-- Card singola pagina -->
                    <div class="col-md-4">
                        <div class="card p-4 text-start">
                            <h4 class="fw-bold"><?php echo $titolo ?></h4>
                            <p class="flex-grow-1"><?php echo $testo ?></p>
                            <small class="text-muted mt-auto text-end"><?php echo $data ?></small>
                        </div>
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