<!doctype html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Scrivi il tuo diario</title>
    
    <?php include '../../sources/include/bootStrap.html';
    include '../../sources/include/db.php';
    session_start();

    // Controllo accesso: solo utenti loggati
    if(!isset($_SESSION["id"])){
        header("Location: ../../auth/login/");
        exit;
    }

    // Ritorna la descrizione (domanda) dato l'id tipologia
    function getTipologiaById($idTipologia, $conn) {

        $query = "SELECT * FROM TipologiaScale WHERE idTipoScala = " . $idTipologia;
        $result = mysqli_query($conn, $query);
        $answer = mysqli_fetch_array($result);
        return $answer['descrizione'];
    }
    ?>

    <style>
        body {
        margin: 0;
        background-image: url('../../sources/images/writeBackground.png');
        font-family: 'IBM Plex Sans', sans-serif;
        background-size: cover;
        overflow-x: hidden;
        }

        .btn-custom {
            background-color: #fe7d82;
            border-color: #fe7d82;
            border-radius: 40px;
            padding-left: 50px;
            padding-right: 50px;
        }

        .btn-custom:hover {
            background-color: #e86f74;
            border-color: #e86f74;
        }

        .text {
            background: rgba(255, 255, 255, 0.4) !important;
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border: white solid 2px;
            border-radius: 20px 20px 0 0;
            resize: none;
        }
        .title{
            height: 10vh;
        }
        .title::placeholder{
            font-size: clamp(25px, 5vw, 45px);  
            font-weight: bold;
            text-align: center;
        }
        .content{
            border: none;
            border-radius: 0 0 20px 20px;
            height: 65vh;
        }
        .content::placeholder{
            font-size: clamp(10px, 5vw, 15px);  
        }

        .inputs{
            margin-top: 15vh;
        }
        .textarea{
            resize: none !important;
        }
    </style>
</head>

<body>

    <?php include '../../sources/include/navBar.php'; ?>

    <form action="sendData.php" method="post">
        <div class="container-fluid">
             
                <div class="row justify-content-center">


                    <div class="inputs col-7">

                        <div class="row-1">
                            <textarea class="form-control text title" id="title" name="title" rows="1" 
                                    placeholder="Title here. A poetic one" required></textarea>
                        </div>

                        <div class="row-7">
                            <textarea class="form-control text content" id="comments" name="comments" rows="7" 
                                    placeholder="No hints. It's your day after all" required></textarea>
                        </div>
                    </div>
                <!--
                <div class="col-5">
                    <div class="row">

                        <?php for($i=1; $i<=3; $i++): ?>
                            <?php
                                // Recupera la domanda dal DB usando l'indice del ciclo
                                $question = getTipologiaById($i, $conn);
                            ?>

                            <h4><?= $question ?></h4>
                            
                            <?php for($j=1; $j<=5; $j++): ?>
                                <div class="col-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="Radio" 
                                               name="scale<?= $i ?>" value="<?= $j ?>"
                                               <?php if($j==5) echo "required"; ?>>

                                        <label class="form-check-label"><?= $j ?></label>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        
                        <?php endfor; ?>

                    </div>
                </div> -->
            </div>
            <button type="submit" class="btn btn-custom btn-lg">Done!</button>
        </div>
    </form>
</body>

</html>
