    <?php
    session_start();


    
    if(!isset($_SESSION["id"])){
        header("Location: ../../auth/login/");
        exit;
    }
    if (!isset($_POST['abilita_accesso'])) {
    header("Location: scaleSelection.php");
    
    exit;
    /*
$_SESSION['ScalePrefScelte'] = true;
*/
}


    ?>