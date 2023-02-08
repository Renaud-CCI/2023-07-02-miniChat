<?php

include_once('./partial/requests/connexion.php');

if(isset($_GET['userId'])) {
    $userId = $_GET['userId'];
    $message = $_GET['message'];
    $query = $db->prepare(' INSERT INTO messages 
                            (userId, message, dateAndTime) 
                            VALUES (:userId,:message, NOW())');
    $query->execute([
        'userId' => $userId,
        'message' => $message,
    ]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="pageTest.php" method="get">
        <input type="text" name="userId" placeholder="id">
        <input type="text" name="message" placeholder="message">
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>