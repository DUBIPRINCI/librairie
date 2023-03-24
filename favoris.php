<?php
session_start();
require "db.php";
$titre = mysqli_real_escape_string($mysqli, $_POST['titre']);
$auteur = $_POST['auteur'];
$date = $_POST['date'];
$image = $_POST['image'];


$ajout = "INSERT INTO `favoris` (img, titre, auteur, date, id_user) VALUES ('$image', '$titre', '$auteur','$date','{$_SESSION["user"]}')";

$resultat = mysqli_query($mysqli,$ajout);
header('location: search.php');
?>