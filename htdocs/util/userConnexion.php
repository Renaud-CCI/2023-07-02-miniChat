<?php
include_once('../partial/skeleton/header.php');
?>
<h2>Connection</h2>
<form action="../index.php" method="post">
    <label for="pseudo">Pseudo :</label>
    <input type="text"name="pseudo">
    <input type="submit" value="Se connecter">
</form>
<hr>
<a href="../index.php">Retour à l'accueil</a>

<?php
include_once('../partial/skeleton/otherFooter.php');
?>