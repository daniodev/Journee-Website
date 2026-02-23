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

        $userQuery = "SELECT nome, cognome FROM UTENTI where id=".$id;

        $user = mysqli_query($conn, $userQuery);
        $userRow = mysqli_fetch_array($user);
    ?>

    <style>
        body {
            margin: 0;
            background-image: url('sources/images/background.png');
            font-family: 'IBM Plex Sans', sans-serif;
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            overflow-x: hidden;
        }

        .btn-orange {
            color: #000;
            background-color: #fe7d82;
            border-color: #fe7d82;

            padding: 10px 20px;
            border-radius: 40px;

            font-weight: bold;
        }

        .btn-orange:hover {
            color: #000;
            background-color: #e9565b;
            border-color: #e9565b;
        }

        .btn-orange:active {
            color: #000;
            background-color: #transparent;
            border-color: #000;
        }

        .pharases {
            margin-top: 25vh;
        }

        .card {
            margin: 0;
            background-color: transparent;
            border: 1px solid #000;
        }

        .cell {
            border-right: 1px solid #000;
            border-top: 1px solid #000;
            padding: 1rem;
        }

        .cell:last-child {
            border-right: none;
        }

        .spacer {
            padding-top: 200px;
        }
    </style>
</head>

<body>
    <div class="container-fluid text-center"> 
        <div class="row">
            <div class="col-12 pharases">
                <h1>
                    Welcome <?php echo $userRow["nome"] ?><br>
                    Your Journee starts now!
                </h1>

                <form action="diary/write/index.php">
                <button class="btn btn-orange btn-lg">First Page!?</button>
                </form>
            </div>

        </div>

        <div class="row spacer">
            <div class="col cell">

                
                <div class="card p-4">
                    <h4>Element 1</h4>
                </div>
                <button class="btn btn-orange btn-lg">Let's Go!</button>
            </div>

            <div class="col cell">

                <div class="card p-4">
                    <h4>Element 2</h4>
                </div>
                <button class="btn btn-orange btn-lg">Let's Go!</button>
            </div>

            <div class="col cell">
                
                <div class="card p-4">
                    <h4>Element 3</h4>
                </div>
                <button class="btn btn-orange btn-lg">Let's Go!</button>
            </div>
        </div>
    </div>
    if(!isset($_SESSION["id"])) {
        header("Location: landing.php");
        exit;
    }
    /*
     if(!$_SESSION["ScalePrefScelte"]){
            header("Location: ../../diary/write/scaleSelection.php");
        }
            */
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>