<?php
require __DIR__ . '/db.php';

$Email = $_POST['email'];
$Password = $_POST['password'];

$request = "SELECT * FROM users WHERE mail = '$Email'";

$reponse = mysqli_query( $mysqli,$request);

$row = $reponse->fetch_assoc();

if (password_verify($Password, $row['mdp'])){
    session_start();
    $_SESSION["user"] = $row["id"];
    $_SESSION["nom"] = $row["nom"];
    $_SESSION["prenom"] = $row["prenom"];
    $_SESSION["mail"] = $row["mail"];
    $_SESSION["date"] = $row["creationdate"];
    header("Location: account.php");
}
?>