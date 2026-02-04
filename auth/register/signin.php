<?php 

    include '../../sources/include/db.php';

    if(!isset($_POST["email"]) || !isset($_POST["password"]) || !isset($_POST["username"]) || !isset($_POST["nome"]) || !isset($_POST["cognome"]) || !isset($_POST["confirmPassword"])){
        header("Location: ../register/");
        exit();
    }

    $check = $conn -> query("SELECT * FROM utenti where email=". "'" . $_POST["email"]. "'");
    if ($check -> num_rows > 0) {
        header("Location: ../register?error=1");
        exit();
    }

    if($_POST["password"] != $_POST["confirmPassword"]){
        header("Location: ../register?error=2");
        exit();
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
         header("Location: ../login/");
    }

    mysqli_close($conn);
?>  