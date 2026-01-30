<?php 

    $conn = mysqli_connect("127.0.0.1","root","","journee");

    if(!isset($_POST["email"]) || !isset($_POST["password"]) || !isset($_POST["username"]) || !isset($_POST["nome"]) || !isset($_POST["cognome"])){
        header("Location: ../Login/login.php");
    }

    $check = $conn -> query("SELECT * FROM utenti where username=". "'" . $_POST["username"]. "'");
    if ($check -> num_rows > 0) {

        header("Location: register.php?error=1");
        exit;
    }

    $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $string = "INSERT INTO utenti (username, nome, cognome, email, password_hash) values ";
    $string .= "('". $_POST["username"]. "', ";
    $string .= "'". $_POST["nome"] . "', ";
    $string .= "'". $_POST["cognome"] . "', ";
    $string .= "'". $_POST["email"] . "', ";
    $string .= "'". $password_hash . "')";

    echo $string;
    if ($conn -> query($string)) {
        echo "Ti sei registrato correttamente";
         header("Location: login.php");
    }else{
        echo "Errore.";
    }
    
?>  