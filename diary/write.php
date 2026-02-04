<!doctype html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scrivi il tuo diario</title>
    <?php include '../sources/include/bootStrap.html'; ?>
    <?php

    $conn = mysqli_connect("localhost", "root", "", "journee")
    or die("Connection failed: " . mysqli_connect_error());

    session_start();

    if(!isset($_SESSION["id"])){
        header("Location: ../auth/login.php");
        exit;
    }
    
    ?>

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

                        <textarea class="form-control" id="title" name="title" rows="1" cols="7"
                            placeholder="Write a title" required></textarea>
                    </div>

                    <div class="row-7">

                        <textarea class="form-control" id="comments" name="comments" rows="7" cols="7"
                            placeholder="Write your thoughts" required></textarea>
                    </div>
                </div>

            </div>

            
            <div class="col-5">
            
                <div class="row">

                    <?php for($i=1; $i<=3; $i++): ?>

                        <h4>Domanda <?= $i ?></h4>
                        <?php for($j=5; $j>=1; $j--): ?>

                            <div class="col-1">

                                <div class="form-check">

                                    <input class="form-check-input" type="Radio" name="scale<?= $i ?>" value="<?= $j ?>"
                                        <?php if($j==5) echo "required"; ?>>
                                    <label class="form-check-label"><?= $j ?></label>
                                </div>
                            </div>

                        <?php endfor; ?>
                    
                    <?php endfor; ?>

                </div>
            
            </div>

        </div>


        <button type="submit">Invia</button>
    </form>
</body>

</html>