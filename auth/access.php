<?php 

    if(!isset($_POST["email"]) || !isset($_POST["password"])){
        header("Location: login.php");
        exit;
    }

    session_start();

    $conn = mysqli_connect("127.0.0.1","root","","journee");
    $query = $conn -> query("SELECT * FROM utenti where email=". "'" .$_POST["email"] . "'");

    $registered = false;
    while ($row = mysqli_fetch_array($query)) {

        if ($row["email"] == $_POST["email"]) {
            $registered = true;
            if(password_verify($_POST["password"], $row["password_hash"])) {

                $_SESSION["id"] = $row["id"];
                echo "Password corretta.";

                header("Location: ../diary/view.php");

            }else{
                //PASSWD SBAGLIATA
                header("Location: login.php?error=1");
                exit;
            }
    
        }
    }

    if($registered == false) {
            //UTENTE NON REGISTRATO
            header("Location: login.php?error=2");
            exit;
    }

    mysqli_close($conn);
?>