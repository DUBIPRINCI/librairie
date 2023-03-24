<?php require "header.php" ?>

<section id="panier">
    <h1>Mon Panier</h1>
    <hr>
    <div class="lsearch">
        <?php
        require __DIR__ . '/db.php';

        $request = "SELECT * FROM favoris WHERE id_user = '{$_SESSION['user']}'";

        $reponses = mysqli_query( $mysqli,$request);

        foreach ($reponses as $lignes) {
            echo '<div class="livre">';
            if (isset($lignes['img'])) {
                echo "<img src='{$lignes['img']}'>";
            } else {
                echo '<img src="default_image.png">';
            }
            if (isset($lignes['titre'])) {
                echo '<h2 class="titrelivre2">' . "{$lignes['titre']}" . '</h2>';
            }
            if (isset($lignes['auteur'])) {
                echo '<p>' . "{$lignes['auteur']}" . '</p>';
            }
            if (isset($lignes['date'])) {
                echo '<p>' . "{$lignes['date']}" . '</p>';
            }
            echo '<form method="post" action="supprimer.php">';
            echo '<input type="hidden" name="id" value="' . "{$lignes['id']}" . '">';
            echo '<button class="favoris" type="submit">Supprimer</button>';
            echo '</form>';
            echo '</div>';
        }
        ?>
    </div>
</section>

<?php require "footer.php" ?>