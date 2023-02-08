<?php

include_once('./partial/requests/dbConnexion.php');


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
    $results = $db->query(" SELECT * FROM messages 
                            ORDER BY dateAndTime DESC   
                            LIMIT 20");
    $messages = $results->fetchAll();
    echo json_encode($messages);
}

function postMessage(){
    global $db;
    if(!array_key_exists('userId', $_POST) || !array_key_exists('message', $_POST)){
        echo json_encode(["status" => "error", "message" => "Une ou plusieurs entrées n'ont pas été renseignées"]);
        return;
    }
    $userId = $_POST['userId'];
    $message = $_POST['message'];
    $query = $db->prepare(' INSERT INTO messages
                            (userId, message, dateAndTime) 
                            VALUES (:userId,:message, NOW())');
    $query->execute([
        'userId' => $userId,
        'message' => $message
    ]);
    echo json_encode(["status" => "success"]);
}