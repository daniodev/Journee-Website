<!doctype html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scrivi il tuo diario</title>
    
    <?php 
    include 'sources/include/bootStrap.html';
    include 'sources/include/db.php';
    session_start();
    ?>

    <style>
        body {
            background-color: #FFC547;
            background-size: cover;
            background-position: center;
        }

        .btn-register {
            background-color: #fe7d82;
            border-color: #fe7d82;
        }

        .btn-register:hover {
            background-color: #e86f74;
            border-color: #e86f74;
        }

        .card {
            border: none;
            border-radius: 1rem;
        }

        .card-body {
            background-color: rgba(255, 219, 151, 0.95);
            backdrop-filter: blur(6px);
            border-radius: 1rem;
        }
    </style>
</head>

<body>
    <div class="container-fluid"> 
        <div class="row">

        </div>

        <div class="row">
            <div class="col">
                One of three columns
            </div>

            <div class="col">
                One of three columns
            </div>

            <div class="col">
                One of three columns
            </div>
        </div>
    </div>
</body>

</html>