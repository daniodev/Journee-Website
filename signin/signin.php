<?php 

    $conn = mysqli_connect("127.0.0.1","root","","journee_db");

    $check = $conn -> query("SELECT * FROM utenti where username=". "'" . $_POST["username"]. "'");
    if ($check -> num_rows > 0) {
        echo "Username già presente";
        exit;
    }

    $string = "INSERT INTO utenti (username, nome, cognome, email, password) values ";
    $string .= "('". $_POST["username"]. "', ";
    $string .= "'". $_POST["nome"] . "', ";
    $string .= "'". $_POST["cognome"] . "', ";
    $string .= "'". $_POST["email"] . "', ";
    $string .= "'". $_POST["password"] . "')";

    echo $string;
    if ($conn -> query($string)) {
        echo "Ti sei registrato correttamente";
         header("Location: Login/login.php");
    }else{
        echo "Errore.";
    }
    
?>  