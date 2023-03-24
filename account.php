<?php
require "header.php";
require __DIR__ . '/db.php';
$request = "SELECT * FROM users WHERE id='{$_SESSION['user']}'";
$resp = mysqli_query($mysqli, $request);
$res = mysqli_fetch_assoc($resp);
?>

<section id="account">
    <h1 style="font-size: 28px;">Mon compte</h1>
    <hr>
    <h2>Mes Informations</h2>
    <form action="modifier.php" class="changer">
        <p>nom : <?php echo $res['nom']; ?></p>
        <button class="modifier" type="submit"><img src="changer.png" width="30"></button>
    </form>
    <form action="modifier.php" class="changer">
        <p>prenom : <?php echo $res['prenom']; ?></p>
        <button class="modifier" type="submit"><img src="changer.png" width="30"></button>
    </form>
    <form action="modifier.php" class="changer">
        <p>mail : <?php echo $res['mail']; ?></p>
        <button class="modifier" type="submit"><img src="changer.png" width="30"></button>
    </form>
    <p>membre depuis le : <?php echo $res['creationdate']; ?></p>
    <hr>
    <a id="deconnexion" href="deco.php">Déconnexion</a>
</section>

<?php require "footer.php" ?>