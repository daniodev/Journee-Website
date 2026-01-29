<?php 

    $conn = mysqli_connect("127.0.0.1","root","","journee_db");
    $query = $conn -> query("SELECT * FROM utenti where username=". "'" .$_POST["username"] . "'");

    $registered = false;
    while ($row = mysqli_fetch_array($query)) {

        if ($row["username"] == $_POST["username"]) {
            $registered = true;
            if($row["password"] == $_POST["password"]) {
                echo"Password corretta";
            }else{
                echo "Password sbagliata";
            }
    
        }
    }

    if($registered == false) {
        echo "Non sei registrato";
    }

    mysqli_close($conn);
?>