<?php require "header.php" ?>
<form class="changerinfo" action="modif.php" method="post">
    <h1>Changer les informations</h1>
    <select class="changement" name="changement">
        <option class="changement" value="">Changement</option>
        <option class="changement" name="nom" value="nom">Nom</option>
        <option class="changement" name="prenom" value="prenom">Prenom</option>
        <option class="changement" name="email" value="email">email</option>
    </select>
    <input type="text" name="valeur" placeholder="Votre changement">
    <button class="btnsubmit" type="submit" >Envoyer</button>
</form>
<?php require "footer.php" ?>