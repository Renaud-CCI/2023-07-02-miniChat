<?php
session_start();

require_once('./traitements/config.php');

$query = $db->prepare(" SELECT * FROM questions 
                        WHERE theme = :theme
                        ORDER BY RAND()
                        LIMIT 10");
$query -> execute(['theme' => $_SESSION['theme']]);
$questions = $query->fetchAll();
// echo"<br> questions :";
// var_dump($questions[0]['question']);
// echo"<br>";

