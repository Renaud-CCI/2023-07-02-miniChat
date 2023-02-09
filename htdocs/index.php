<?php
include_once('./partial/skeleton/header.php');
// echo "session avant if:";
// var_dump($_SESSION);
// echo "<br> post:";
// var_dump($_POST);

$_SESSION['pseudo'] = '';
$_SESSION['id'] = '';
$_SESSION['color'] = '';

if(isset($_POST['pseudo'])){
    include('./partial/requests/dbConnexion.php');
    $users = $db->prepare("  SELECT * FROM users 
                            WHERE LOWER(pseudo) = :pseudo");
    $users->execute([ 'pseudo' => strtolower($_POST['pseudo']) ]);
    foreach($users as $user){
    // var_dump($user);  
    $_SESSION['pseudo'] = $user['pseudo'];
    $_SESSION['id'] = $user['id'];
    $_SESSION['color'] = $user['color'];
    }
}
// echo "<br>session apres if:";
// var_dump($_SESSION);


?>





<section class="container d-flex" >

    <section id="messagesCollumn" class="col-8 m-1 container">

        <section id="messagesBox" class="row" style="display:<?= $_SESSION['color']? 'block': 'none'?>;" >
            <div class="messages">
            </div>
        </section>

        <section id="messagesBoxNone" class="row text-center" style="display:<?= $_SESSION['color']? 'none': 'block'?>;" > 
        <p class="my-5">CONNECTEZ-VOUS POUR VOIR LES MESSAGES  </p>         
        </section>

        <section id="writingBox" class="row align-content-center my-2">
            <form action="./handler.php?task=write" method="post">
                <input type="hidden" name="userId" id="userId" value="<?= $_SESSION['id']; ?>">
                <input type="text" id="message" name="message" placeholder="saisir texte">
                <button type="submit">📭 Envoyer</button>
            </form>

        </section>
    </section>

    <section id="userCollumn" class="col-4 m-1">

        <section id="connectionCont" class="text-center align-items-center justify-content-center rounded my-auto" style="display:<?= $_SESSION['color']? 'none': 'block'?>">
            <button class="mx-3 my-2" onclick="window.location.href ='./util/userConnexion.php';">Se connecter</button>
            <button class="mx-3 my-2" onclick="window.location.href ='./util/userInscription.php';">S'inscrire</button>
        </section>

        <section id="deconnectionCont" style="background-color:<?= $_SESSION['color'] ?>; display:<?= $_SESSION['color']? 'block': 'none'?>;" class="text-center rounded">
            <p class="text-center p-0 m-auto"><?= $_SESSION['pseudo']?></p>
            <a class="m-auto" href="./util/userDeconnexion.php">deconnection</a>
        </section>

        <section id="usersCont" class="text-center mt-3">
            <h2 class="m-3">UTILISATEURS</h2>
            <div id="usersDiv"></div>
        </section>

    </section>

</section>



    
<?php include_once('./partial/skeleton/footer.php') ;?>

