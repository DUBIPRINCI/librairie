<?php

require __DIR__ . '/db.php';

$Name = $_POST['name'];
$Firstname = $_POST['firstname'];
$Email = $_POST['email'];
$hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
$req = "INSERT INTO `users` (nom, prenom, mail, mdp) VALUES ('$Name', '$Firstname', '$Email','$hash')";

$result = mysqli_query($mysqli,$req);
session_start();
$request = "SELECT * FROM users WHERE mail = '$Email'";

$reponse = mysqli_query( $mysqli,$request);

$row = $reponse->fetch_assoc();

$_SESSION["user"] = $row["id"];

mysqli_close($mysqli);

header('location: account.php');
?>
