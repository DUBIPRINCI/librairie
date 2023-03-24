<?php
session_start();
require "db.php";

$ajout = "DELETE FROM `favoris` WHERE id={$_POST['id']}";

$resultat = mysqli_query($mysqli,$ajout);
header('location: panier.php');
?>