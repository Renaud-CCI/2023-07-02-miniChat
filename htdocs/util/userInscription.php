<?php
include_once('../partial/skeleton/header.php');
?>
<h2>Inscription</h2>
<form action="../partial/requests/userInscriptionInDB.php" method="post">
    <label for="pseudo">Pseudo :</label>
    <input type="text"name="pseudo">
    <input type="submit" value="Se connecter">
</form>

<?php
include_once('../partial/skeleton/otherFooter.php');
?>