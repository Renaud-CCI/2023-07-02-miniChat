<?php
include_once('../partial/requests/dbConnexion.php');

function getUsers(){
    global $db;
    $results = $db->query(" SELECT pseudo FROM users ORDER BY pseudo DESC");
    $users = $results->fetchAll();
    echo json_encode($users);
}

getUsers();