<?php
require_once('dbConnexion.php');

$pseudo = $_POST['pseudo'];
$color = $_POST['color'];

// try{
//     $request = $db->prepare("INSERT INTO users (pseudo) VALUES ( :pseudo)");


//     $request->execute([ 'pseudo' => $pseudo
//                     ]);

// } catch(PDOException $e){
//     header('Location: ./userInscription.php');
// }

//     header('Location: ../../index.php');

   
   $req = $db->prepare("SELECT count(id) FROM users WHERE LOWER(pseudo) = :pseudo");
   $req->execute([ 'pseudo' => strtolower($pseudo)
                    ]);

   if($req->fetchColumn() > 0)
   {
    //   echo 'Pseudo déjà utilisé !';
        header('Location: ../../util/userInscription.php?name='.$pseudo);
   }
   else
   {
    //   echo 'Pseudo libre :-)';
        $request = $db->prepare("INSERT INTO users (pseudo, color) VALUES ( :pseudo, :color)");
        $request->execute([ 'pseudo' => $pseudo,
                             'color' => $color
                            ]);
        ?>
        <form name="form1" method="post" action="../../index.php"> 
            <input type="hidden" name="pseudo" value="<?= $pseudo; ?>" /> 
        </form> 
        <script type="text/javascript"> 
            document.form1.submit(); //on envoie le formulaire vers ma-page.php 
        </script> 
        <?php
   }