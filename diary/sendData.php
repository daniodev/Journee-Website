<?php

    session_start();

    if(!isset($_SESSION["id"])){
        header("Location: ../auth/login.php");
        exit;
    }

    include '../sources/include/db.php';
    $query = "INSERT INTO pagine (idUtente, titolo, giornoScrittura, pensieroGiornaliero) VALUES (".
    $_SESSION["id"]. ", '" . $_POST["title"] . "', '" . date('Y-m-d H:i:s'). "', '" .$_POST["comments"]. "')";
    mysqli_query($conn, $query);

    header("Location: view.php");
    exit;

$title = $_POST["title"];
$comments = $_POST["comments"];
$s1 = $_POST["scale1"];
$s2 = $_POST["scale2"];
$s3 = $_POST["scale3"];

echo $title;
echo $comments;
echo $s1;
echo $s2;
echo $s3;
?>