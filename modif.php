<?php
session_start();
require __DIR__ . '/db.php';
$request = "UPDATE users SET {$_POST['changement']} = '{$_POST['valeur']}' WHERE id = {$_SESSION['user']}";
$resp = mysqli_query($mysqli, $request);
header('location: account.php');
?>