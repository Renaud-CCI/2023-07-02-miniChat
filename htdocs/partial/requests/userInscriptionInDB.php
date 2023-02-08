<?php
require_once('dbConnexion.php');

$pseudo = $_POST['pseudo'];

try{
    $request = $db->prepare("INSERT INTO users (pseudo) VALUES ( :pseudo)");


    $request->execute([ 'pseudo' => $pseudo
                    ]);
} catch(PDOException $e){
    header('Location: ./userInscription.php');
}



header('Location: ../../index.php');

// <?php
//    $req = bdd->prepare("SELECT count(id) FROM membres WHERE pseudo = ?");
//    $req->execute(array($_POST['pseudo']));
//    if($req->fetchColumn() > 0)
//    {
//       echo 'Pseudo déjà utilisé !';
//    }
//    else
//    {
//       echo 'Pseudo libre :-)';
//    }