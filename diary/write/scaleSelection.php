
<?php
//l'utente dovrà qui selezionare le scale che vuole gli siano fatti
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scegli le tue domande</title>
        <style>
        body {
            background-image: url('../../sources/images/background.png');
            background-size: cover;
            background-position: center;
        }
        .btn-login {
            background-color: #fe7d82 !important;
            border-color: #fe7d82 !important;
        }
        .btn-login:hover {
            background-color: #e86f74 !important;
            border-color: #e86f74 !important;
        }
        .card {
            border: none;
            border-radius: 1rem;
        }

        .card-body {
            background-color: rgba(255, 219, 151, 0.95);
            backdrop-filter: blur(6px);
        }
    </style>
    
    <?php include '../../sources/include/bootStrap.html'; ?>
    <?php
    include '../../sources/include/db.php';
     session_start();
    // Se l'utente non è loggato, viene rimandato alla pagina di login
    if(!isset($_SESSION["id"])){
        header("Location: ../../auth/login/");
        exit;
    }
$query = "SELECT * FROM TipologiaScale";
$result = mysqli_query($conn, $query);

    ?>
</head>
<body>
   <ul class="list-group">
<?php while($row = mysqli_fetch_array($result)): ?>

    <li class="list-group-item">
        <input class="form-check-input me-1 limit-check"
               type="checkbox"
               name="tipologie[]"
               value="<?= $row['idTipoScala'] ?>"
               id="c<?= $row['idTipoScala'] ?>">

        <label class="form-check-label stretched-link"
               for="c<?= $row['idTipoScala'] ?>">
            <?= $row["descrizione"] ?>
        </label>
    </li>

<?php endwhile; ?>

</ul>


<script>
document.querySelectorAll(".limit-check").forEach(cb => {
  cb.addEventListener("change", function () {

    let checked = document.querySelectorAll(".limit-check:checked");

    if (checked.length > 3) {
      this.checked = false;
    }
  });
});
</script>


<?php
$_POST["tipologie"]; // array di idTipoScala selezionati
?>
</body>
</html>
