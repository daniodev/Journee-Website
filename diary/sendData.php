<?php

    session_start();

    if(!isset($_SESSION["id"])){
        header("Location: ../auth/login.php");
        exit;
    }

    $conn = mysqli_connect("127.0.0.1","root","","journee");
    $query = "INSERT INTO pagine (idUtente, titolo, giornoScrittura, pensieroGiornaliero) VALUES (".
    $_SESSION["id"]. ", " ."'titolo'" . ", '" . date('Y-m-d H:i:s'). "', '" .$_POST["comments"]. "')";
    mysqli_query($conn, $query);

    header("Location: view.php");
    exit;

$comments = $_POST["comments"];
$s1 = $_POST["scale1"];
$s2 = $_POST["scale2"];
$s3 = $_POST["scale3"];

echo $comments;
echo $s1;
echo $s2;
echo $s3;
?>