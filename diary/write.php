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


//$query = $conn -> query()

/*
if($row["username"] == $_POST["username"]){
$registered = true;
if($row["password"] == $_POST["password"]){
echo"Password c";
}else{
echo"Password sb";
}

*/

?>

</head>

<body>
    <form action="sendData.php" method="post">
        <div class="container-fluid">

            <div class="row">
                <h1>How was Today?</h1>
            </div>

            <div class="row">

                <div class="col-md-6 col-12">

                    <textarea class="form-control" id="comments" name="comments" rows="7" cols="50"
                        placeholder="Write your thoughts" required></textarea>
                </div>

                <div class="col-md-2 col-4">

                    <h4>Scala 1</h4>
                    <?php for($i=5;$i>=1;$i--): ?>
                    <div class="form-check">
                        <input class="form-check-input" type="Radio" name="scale1" value="<?= $i ?>"
                            <?php if($i==5) echo "required"; ?>>
                        <label class="form-check-label"><?= $i ?></label>
                    </div>
                    <?php endfor; ?>
                </div>

                <div class="col-md-2 col-4">

                    <h4>Scala 2</h4>
                    <?php for($i=5;$i>=1;$i--): ?>
                    <div class="form-check">
                        <input class="form-check-input" type="Radio" name="scale2" value="<?= $i ?>"
                            <?php if($i==5) echo "required"; ?>>
                        <label class="form-check-label"><?= $i ?></label>
                    </div>
                    <?php endfor; ?>
                </div>


                <div class="col-md-2 col-4">

                    <h4>Scala 3</h4>
                    <?php for($i=5;$i>=1;$i--): ?>
                    <div class="form-check">
                        <input class="form-check-input" type="Radio" name="scale3" value="<?= $i ?>"
                            <?php if($i==5) echo "required"; ?>>
                        <label class="form-check-label"><?= $i ?></label>
                    </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>


        <button type="submit">Invia</button>
    </form>
</body>

</html>