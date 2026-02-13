<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journee HomePage</title>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <?php 
        include 'sources/include/bootStrap.html';
        include 'sources/include/db.php';
        include 'sources/include/navBar.php';

    if(!isset($_SESSION["id"])) {
        header("Location: landing.php");
        exit;
    }
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>