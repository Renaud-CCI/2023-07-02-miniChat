<?php
    session_start();
    include_once('PHP/header.php');
?>

<?php
    if(count($_SESSION['questions']) == 0){
      require_once('./traitements/config.php');
  
      $query = $db->prepare(" SELECT DISTINCT * FROM questions 
                              WHERE theme = :theme
                              ORDER BY RAND()
                              LIMIT 10");
      $query -> execute(['theme' => $_SESSION['theme']]);
      $_SESSION['questions'] = $query->fetchAll();
      }
  
      $questionNumberView = $_SESSION['count'] + 1;

if ($_SESSION['count'] < 10){
  echo " 
  
<div id='question' class='container bg-light text-center d-flex justify-content-center align-items-center text-center my-3'>
  <h3>
    {$_SESSION['questions'][$_SESSION['count']]['question']}
  </h3>
</div>

<div id='answer' class='container text-center d-flex flex-wrap justify-content-center align-items-center'>
  
    <form class='col col-lg-6 col-md-6 col-sm-6 align-items-center text-center mt-4' action='./traitements/answerToScore.php' method='get'>
      <input style='display:none' type='hidden' name='answer' value='a1'>
      <input type='hidden' name='id' value='{$_SESSION['questions'][$_SESSION['count']]['id']}'>
      <button class='bg-light' id='a1' type='submit'>
      <p>
        {$_SESSION['questions'][$_SESSION['count']]['a1']}
      </p>
      </button>
    </form>

    <form class='col col-lg-6 col-md-6 col-sm-6 align-items-center text-center mt-4' action='./traitements/answerToScore.php' method='get'>
      <input type='hidden' name='answer' value='a2'>
      <input type='hidden' name='id' value='{$_SESSION['questions'][$_SESSION['count']]['id']}'>
      <button class='bg-light' id='a2' type='submit'>
      <p>
       {$_SESSION['questions'][$_SESSION['count']]['a2']}
      </p>
     </button>
    </form>

    <form class='col col-lg-6 col-md-6 col-sm-6 align-items-center text-center' action='./traitements/answerToScore.php' method='get'>
      <input type='hidden' name='answer' value='a3'>
      <input type='hidden' name='id' value='{$_SESSION['questions'][$_SESSION['count']]['id']}'>
      <button class='bg-light' id='a3' type='submit'>
      <p>
        {$_SESSION['questions'][$_SESSION['count']]['a3']}
      </p>
      </button>
    </form>

    <form class='col col-lg-6 col-md-6 col-sm-6 align-items-center text-center' action='./traitements/answerToScore.php' method='get'>
      <input type='hidden' name='answer' value='a4'>
      <input type='hidden' name='id' value='{$_SESSION['questions'][$_SESSION['count']]['id']}'>
      <button class='bg-light' id='a4' type='submit'>
      <p>
        {$_SESSION['questions'][$_SESSION['count']]['a4']}
      </p>
      </button>
    </form>


</div>

<div class='flex-column justify-content-center text-center my-3'>
<div id='questionNumberView'>
  <h4>
    Question {$questionNumberView}/10
  </h4>
</div>

<div id='scoreView'>
  <h4>
    Score = {$_SESSION['score']}
  </h4>
</div>

</div>

<div class='container d-flex justify-content-end my-2'>
  <div class='wrapper'>
    <a href='#'>
      <button class='btn btn-primary p-2'><span>Suivant >> </span></button>
    </a>
  </div>
</div>
  
  ";


} else {
    echo "
      <div class='container text-center my-5'>
        <div class='col'>
          <h4 style='color:white'>
            Bravo, vous avez obtenu {$_SESSION['score']} points !
          </h4>
        </div>
      </div>
      <div class='col d-flex justify-content-center'>
        <a style='text-decoration:none' href='./index.php'>
          <button class='btn btn-primary'>
            Retour à l'accueil
          </button>
        </a>
      </div>
  ";
};

?>

<?php
  include_once('PHP/script.php');
?>