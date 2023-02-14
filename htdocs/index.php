<?php
include_once('./partial/skeleton/header.php');
// echo "session avant if:";
// var_dump($_SESSION);
// echo "<br> post:";
// var_dump($_POST);

if(isset($_POST['pseudo'])){
    include('./partial/requests/dbConnexion.php');
    $users = $db->prepare("  SELECT * FROM users 
                            WHERE LOWER(pseudo) = :pseudo");
    $users->execute([ 'pseudo' => strtolower($_POST['pseudo']) ]);
    foreach($users as $user){
    // var_dump($user);  
    $_SESSION['pseudo'] = $user['pseudo'];
    $_SESSION['id'] = $user['id'];
    }
}

// echo "<br> session après if:";
// var_dump($_SESSION);
$id = $_SESSION['id'];
// echo "<br>";


?>





<section class="container d-flex" >

    <section id="messagesCollumn" class="col-8 m-1">

        <section id="messagesBox" class="bg-danger">
            <div class="messages">
            </div>
        </section>

        <section id="writingBox">
            <form action="./handler.php?task=write" method="post">
                <input type="hidden" name="userId" id="userId" value="<?= $id ?>">
                <input type="text" id="message" name="message" placeholder="saisir texte">
                <button type="submit">📭 Envoyer</button>
            </form>

        </section>
    </section>

    <section id="userCollumn" class="col-4 m-1">
        <section id="connectionCont">
            <a href="./util/userConnexion.php">Se connecter</a>
            <a href="./util/userInscription.php">S'inscrire</a>
        </section>
        <section id="usersCont">
            future section des users enregistrés
        </section>
    </section>

</section>



    
<?php include_once('./partial/skeleton/footer.php') ;?>
