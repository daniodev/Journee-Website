<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journee HomePage</title>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <?php 

        session_start();

        include 'sources/include/bootStrap.html';
        include 'sources/include/db.php';
        include 'sources/include/navBar.php';

        if(!isset($_SESSION["id"])) {
            header("Location: landing.php");
            exit;
        }
        $id = $_SESSION["id"];

        // Query per prendere la pagina dell'utente
        $query = "SELECT titolo, giornoScrittura, pensieroGiornaliero 
            FROM Pagine 
            WHERE idUtente = ". $_SESSION["id"] . "
            ORDER BY giornoScrittura DESC
            LIMIT 3";

        $result = mysqli_query($conn, $query);

        $pages = mysqli_fetch_all($result, MYSQLI_ASSOC);
        

        $userQuery = "SELECT nome, cognome FROM UTENTI where id=".$id;

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
            color: #FFFFFF;
            background-color: #452EDB;
            border-color: #452EDB;
        }

        .btn-purple:active {
            color: #000;
            background-color: #transparent;
            border-color: #000;
        }

        .phrases {
            margin-top: 25vh;
        }

        .card {
            margin: 0;
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
        <div class="row">
            <div class="col-12 phrases">
                <h1 class="text">
                    Welcome <?php echo $userRow["nome"] ?>!<br>
                    How you feeling today?
                </h1>

                <div class="spacer"></div>

                <form action="diary/write/index.php">
                <button class="btn btn-purple btn-lg">First Page!?</button>
                </form>
            </div>

        </div>

        <div class="row phrases">
            <div class="col-11">
                <h1 class="text float-start">Your Recent Journee's</h1>
            </div>
            <div class="col-1">
                <form action="diary/view/index.php">
                <button class="btn btn-purple btn-lg">-></button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col">

                <div class="card p-4">
                    <h4><?php echo $pages[0]["titolo"] ?></h4>
                    <p><?php echo $pages[0]["pensieroGiornaliero"] ?></p>
                    <p class="float-end"><?php echo $pages[0]["giornoScrittura"] ?></p>
                </div>
            </div>

            <div class="col">

                <div class="card p-4">
                    <h4><?php echo $pages[1]["titolo"] ?></h4>
                    <p><?php echo $pages[1]["pensieroGiornaliero"] ?></p>
                    <p class="float-end"><?php echo $pages[1]["giornoScrittura"] ?></p>
                </div>
            </div>

            <div class="col">
                
                <div class="card p-4">
                    <h4><?php echo $pages[2]["titolo"] ?></h4>
                    <p><?php echo $pages[2]["pensieroGiornaliero"] ?></p>
                    <p class="float-end"><?php echo $pages[2]["giornoScrittura"] ?></p>
                </div>
            </div>

            <div class="spacer"></div>
        </div>
    </div>
</body>

</html>