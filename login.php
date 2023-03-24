<?php require "header.php" ?>
<form class="logsignform" action="loginprocess.php" method="post">
    <h1 id="signuptitle">Login to the Dubibrairie</h1>
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Mot de passe">
    <button class="btnsubmit">Login</button>
</form>
<?php require "footer.php" ?>