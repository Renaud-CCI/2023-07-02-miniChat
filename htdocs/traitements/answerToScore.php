<?php
session_start();
require_once('../traitements/config.php');
$query = $db->prepare(" SELECT * FROM questions 
                        WHERE id = :id");
$query -> execute(['id' => $_GET['id']]);
$response = $query -> fetch();
// print_r($response); 
if ($response[$_GET['answer']] == $response['true_answer']){
    $_SESSION['score']+=10;
    $_SESSION['count']++;
    // header('Location : ../quizEcho.php');
} else {
    $_SESSION['count']++;
    // header('Location : ../quizEcho.php');
}
header('Location: ../quizpage.php');
exit();
// var_dump($_SESSION);
    
