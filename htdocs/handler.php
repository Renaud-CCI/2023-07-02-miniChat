<?php
// include_once('./partial/skeleton/header.php');
include_once('./partial/requests/dbConnexion.php');
// var_dump($_GET);


$task = 'list';

if(array_key_exists("task", $_GET)){
    $task = $_GET['task'];
};

if($task == 'write'){
    postMessage();
} else {
    getMessages();
}

function getMessages(){
    global $db;
    $results = $db->query(" SELECT *, DATE_FORMAT(dateAndTime,'%d/%m/%y %Hh%i') AS niceDate FROM messages 
                            INNER JOIN users ON users.id = messages.userId
                            ORDER BY niceDate DESC   
                            LIMIT 10");
    $messages = $results->fetchAll();
    echo json_encode($messages);
}

function postMessage(){
    global $db;
    // var_dump($_POST);
    if(!array_key_exists('userId', $_POST) || !array_key_exists('message', $_POST)){
        echo json_encode(["status" => "error", "message" => "Une ou plusieurs entrées n'ont pas été renseignées"]);
        return;
    }
    $userId = $_POST['userId'];
    $message = $_POST['message'];
    setlocale(LC_TIME, 'fr_FR');
    date_default_timezone_set('Europe/Paris');
    $dbDate = date("Y-m-d H:i:s");
    $query = $db->prepare(' INSERT INTO messages
                            (userId, message, dateAndTime) 
                            VALUES (:userId,:message, :dateAndTime)');
    $query->execute([
        'userId' => $userId,
        'message' => $message,
        'dateAndTime' => $dbDate
    ]);
    echo json_encode(["status" => "success"]);
}