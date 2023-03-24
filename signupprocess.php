<?php

require __DIR__ . '/db.php';

$Name = $_POST['name'];
$Firstname = $_POST['firstname'];
$Email = $_POST['email'];
$hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
$req = "INSERT INTO `users` (nom, prenom, mail, mdp) VALUES ('$Name', '$Firstname', '$Email','$hash')";

$result = mysqli_query($mysqli,$req);
session_start();
$_SESSION["user"] = $row["id"];
$_SESSION["nom"] = $row["nom"];
$_SESSION["prenom"] = $row["prenom"];
$_SESSION["mail"] = $row["mail"];
$_SESSION["date"] = $row["creationdate"];

mysqli_close($mysqli);

header('location: account.php');
?>
