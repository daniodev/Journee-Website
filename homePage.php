<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journee HomePage</title>
    
    <?php 
        include 'sources/include/bootStrap.html';
        include 'sources/include/db.php';
        include 'sources/include/navBar.php';
        session_start();

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

            background-color: #ffbf4a;
            background-size: cover;
            background-position: center;

            font-family: 'IBM Plex Sans', sans-serif;   
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

        .card {
            margin: 0;
            background-color: #ffbf4a;
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
    </style>
</head>

<body>
    <div class="container-fluid text-center"> 
        <div class="row row-50">
            <div class="col-12">
                <h1>
                    Welcome <?php echo $userRow["nome"] ?><br>
                    Your Journee starts now!
                </h1>

                <button class="btn btn-orange btn-lg">First Page!?</button>
            </div>

        </div>

        <div class="row row-cols-3">
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
</body>

</html>