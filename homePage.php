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
        
        .btn-primary {
            --bs-btn-font-weight: 600;
            
            --bs-btn-color: #000;
            --bs-btn-bg: #fe7d82;
            --bs-btn-border-color: #fe7d82;
            
            --bs-btn-hover-color: #000;
            --bs-btn-hover-bg: #e9565b;
            --bs-btn-hover-border-color: #e9565b;
            
            --bs-btn-active-color: #000;
            --bs-btn-active-bg: #transparent;
            --bs-btn-active-border-color: #000;
        }

        .btn-primary {
            color: #000;
            background-color: #fe7d82;
            border-color: #fe7d82;

            font-weight: 600;
        }

        .btn-primary:hover {
            color: #000;
            background-color: #e9565b;
            border-color: #e9565b;
        }

        .btn-primary:active {
            color: #000;
            background-color: #transparent;
            border-color: #000;
        }
    </style>
</head>

<body>
    <div class="container-fluid text-center"> 
        <div class="row">
            <div class="col-12">
                <h1>
                    Welcome Madison!<br>
                    Your Journee starts now!
                </h1>

                <button class="btn btn-primary btn-lg">Get started</button>
            </div>

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