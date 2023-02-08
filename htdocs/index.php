<?php
session_start();
echo "session avant if:";
var_dump($_SESSION);
echo "<br> post:";
var_dump($_POST);

if(isset($_POST['pseudo'])){
    $_SESSION['pseudo'] = $_POST['pseudo'];
}

echo "<br> session après if:";
var_dump($_SESSION);
?>

<?php include_once('./partial/skeleton/header.php'); ?>




<section class="container d-flex" >

    <section id="messagesCollumn" class="col-8 m-1">

        <section id="messagesBox" class="bg-danger">
            <div class="messages">
            </div>
        </section>

        <section id="writingBox">
            <form action="handler.php?task=write" method="post">
                <input type="text" name="userId" id="userId" placeholder="nickname">
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
            try
        </section>
    </section>

</section>



    
<?php include_once('./partial/skeleton/indexFooter.php') ;?>

