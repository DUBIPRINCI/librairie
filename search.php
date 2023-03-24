<?php require "header.php"?>
<section class="search">
    <div style="display: flex; flex-direction: raw;">
        <form action="search.php" method="POST">
        <input id="recherche" type="text" placeholder="Recherche" name="search">
            <select name="sujet">
                <option value="">Catégorie</option>
                <option value="geography">geography</option>
                <option value="history">history</option>
                <option value="religion">religion</option>
                <option value="sport">sport</option>
                <option value="art">art</option>
                <option value="business">business</option>
                <option value="cooking">cooking</option>
                <option value="humor">humor</option>
                <option value="humor">fantasy</option>
            </select>
            <input type="submit" value="Envoyer">
        </form>
    </div>
    <section class="lsearch">
        <form action="favoris.php"></form>
        <?php
        if (!empty($_POST['sujet'])){
            $_SESSION["sujet"] = $_POST['sujet'];
        }
        if (!empty($_POST['search'])){
            $_SESSION["search"] = $_POST['search'];
        }
        if (!isset($_SESSION['sujet'])) {
            $_SESSION['sujet'] = "";
        }
        if (!isset($_SESSION['search'])) {
            $_SESSION['search'] = "";
        }

        $_SESSION['url'] = "";

        if ($_SESSION['sujet'] == "" and $_SESSION['search'] != ""){
            $_SESSION['url'] = "https://www.googleapis.com/books/v1/volumes?q=".urlencode($_SESSION['search'])."&maxResults=20";
        } else if ($_SESSION['search'] == "" and $_SESSION['sujet'] != ""){
            $_SESSION['url'] = "https://www.googleapis.com/books/v1/volumes?q=subject:".urlencode($_SESSION['sujet'])."&maxResults=20";
        } else if ($_SESSION['sujet'] != "" and $_SESSION['search'] != ""){
            $_SESSION['url'] = "https://www.googleapis.com/books/v1/volumes?q=".urlencode($_SESSION['search'])."+subject:".urlencode($_SESSION['sujet'])."&maxResults=20";
        } else {
            $_SESSION['url'] = "https://www.googleapis.com/books/v1/volumes?q=:&maxResults=20";
        }

        $response = file_get_contents($_SESSION['url']);

        $data = json_decode($response, true);

        foreach ($data['items'] as $item) {
            echo '<div class="livre">';
            if (isset($item['volumeInfo']['imageLinks']) && isset($item['volumeInfo']['imageLinks']['thumbnail'])){
                echo '<img src="' . $item['volumeInfo']['imageLinks']['thumbnail'] . '" onerror="this.src=\'default_image.png\'">';
            } else {
                echo '<img src="default_image.png">';
            }
            echo '<div class="titrelivre">';
            echo '<h2>' . $item['volumeInfo']['title'] . '</h2>';
            echo '</div>';
            if (isset($item['volumeInfo']['authors'][0])){
                echo '<p>' . $item['volumeInfo']['authors'][0] . '</p>';
            }
            if (isset($item['volumeInfo']['publishedDate'])){
                echo '<p>' . $item['volumeInfo']['publishedDate'] . '</p>';
            }
            if (isset($_SESSION['user'])){
                echo '<form method="post" action="favoris.php">';
                echo '<input type="hidden" name="titre" value="' . $item['volumeInfo']['title'] . '">';
            
                if (isset($item['volumeInfo']['authors'][0])){
                    echo '<input type="hidden" name="auteur" value="' . $item['volumeInfo']['authors'][0] . '">';
                } else {
                    echo '<input type="hidden" name="auteur" value="">';
                }
            
                echo '<input type="hidden" name="date" value="' . $item['volumeInfo']['publishedDate'] . '">';
            
                if (isset($item['volumeInfo']['imageLinks']['thumbnail'])){
                    echo '<input type="hidden" name="image" value="' . $item['volumeInfo']['imageLinks']['thumbnail'] . '">';
                } else {
                    echo '<input type="hidden" name="image" value="">';
                }
            
                echo '<button class="favoris" type="submit">Ajouter au panier</button>';
                echo '</form>';
            }
            echo '</div>';
        }
        ?>
    </section>
</section>

<?php require "footer.php" ?>