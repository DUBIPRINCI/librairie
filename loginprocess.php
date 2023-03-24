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
    header("Location: account.php");
} else {
    echo "Mauvais Mot de passe";
    echo '<br>';
    echo '<a href="login.php">clique ic pour réessayer</a>';
}
?>