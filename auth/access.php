<?php 

    if(!isset($_POST["email"]) || !isset($_POST["password"])){
        header("Location: login.php");
        exit;
    }

    session_start();

    include '../sources/include/db.php';
    $query = $conn -> query("SELECT * FROM utenti where email=". "'" .$_POST["email"] . "'");

    if($query->num_rows == 0){
        header("Location: login.php?error=2");
        exit;
    }
    
    $row = mysqli_fetch_array($query);

    if(password_verify($_POST["password"], $row["password_hash"])) {
        $_SESSION["id"] = $row["id"];
        $_SESSION["nome"] = $row["nome"];
        header("Location: ../diary/view.php");
        }else{
            header("Location: login.php?error=1");
            exit;
        }

    mysqli_close($conn);
?>