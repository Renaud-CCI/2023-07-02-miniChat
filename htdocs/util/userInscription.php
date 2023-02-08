<?php
include_once('../partial/skeleton/header.php');


?>
<h2>Inscription</h2>
<form action="../partial/requests/userInscriptionInDB.php" method="post">
    <label for="pseudo">Pseudo :</label>
    <input type="text"name="pseudo" style="border:solid 2px <?= isset($_GET['name'])? 'red' : 'black';?>" placeholder="<?=isset($_GET['name'])? 'nom déjà utilisé' : '';?>">
    <label for="color">Couleur par défaut :</label>
    <input type="color" name="color">
    <input type="submit" value="S'inscrire">
</form>
<hr>
<a href="../index.php">Retour à l'accueil</a>

<?php
include_once('../partial/skeleton/otherFooter.php');
?>