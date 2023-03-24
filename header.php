<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>
<body>
    <header>
        <nav style="display: flex; flex-direction: row; align-items: center; justify-content: center;">
            <a href="index.php"><img src="home.png" width="23px" style="padding-top: 10px;"><p class="navtitle">Accueil</p></a>
            <a href="search.php"><img src="book.png" width="28px" style="padding-top: 10px;"><p class="navtitle">Rechercher</p></a>
            <p style="flex-grow: 1;"></p>
            <?php 
            session_start();
            if (isset($_SESSION['user'])): ?>
            <a href="panier.php"><img src="panier.png" width="28px" style="padding-top: 10px;"><p class="navtitle">Panier</p></a>
            <a href="account.php"><p class="signupnav" style="border: 3px solid white; border-radius: 20px;">Mon Espace</p></a>
            <?php else: ?>
            <a href="login.php"><p class="navtitle">Login</p></a>
            <a href="signup.php"><p class="signupnav" style="border: 3px solid white; border-radius: 20px;">Sign up</p></a>
            <?php endif; ?>
        </nav>
    </header>