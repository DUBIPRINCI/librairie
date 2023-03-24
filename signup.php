<?php require "header.php" ?>
<form class="logsignform" action="signupprocess.php" method="post">
    <h1 id="signuptitle">Sign up to the Dubibrairie</h1>
    <input type="text" name="name" placeholder="Nom">
    <input type="text" name="firstname" placeholder="Prenom">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Mot de passe">
    <input type="password" name="password_check" placeholder="Confirmation du mot de passe">
    <button class="btnsubmit" >Envoyer</button>
</form>
<?php require "footer.php" ?>