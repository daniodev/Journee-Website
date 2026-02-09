<!doctype html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scrivi il tuo diario</title>
    
    <?php include '../../sources/include/bootStrap.html'; ?>
    <?php
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
            background-image: url('../../sources/images/background.png');
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
    
    <form action="sendData.php" method="post">
        <div class="container-fluid">
             
            <div class="row">

                <div class="col-7">

                    <div class="row-1">
                        <h1>How was Today?</h1>
                    </div>

                    <div class="row-1">
                        <textarea class="form-control" id="title" name="title" rows="1" 
                                  placeholder="Write a title" required></textarea>
                    </div>

                    <div class="row-7">
                        <textarea class="form-control" id="comments" name="comments" rows="7" 
                                  placeholder="Write your thoughts" required></textarea>
                    </div>
                </div>
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
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-lg">Invia</button>
        </div>
    </form>
</body>

</html>
