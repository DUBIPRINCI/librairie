<?php require "header.php" ?>

<section id="account">
    <h1 style="font-size: 28px;">Mon compte</h1>
    <hr>
    <h2>Mes Informations</h2>
    <p>nom : <?php echo $_SESSION['nom']; ?></p>
    <p>prenom : <?php echo $_SESSION['prenom']; ?></p>
    <p>mail : <?php echo $_SESSION['mail']; ?></p>
    <p>membre depuis le : <?php echo $_SESSION['date']; ?></p>
    <hr>
    <a id="deconnexion" href="deco.php">Déconnexion</a>
</section>

<?php require "footer.php" ?>