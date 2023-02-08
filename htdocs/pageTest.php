<?php

include_once('./partial/requests/dbConnexion.php');
var_dump($_GET);

//AJOUTER UN MESSAGE ------------------
// if(isset($_GET['userId'])) {
//     $userId = $_GET['userId'];
//     $message = $_GET['message'];
//     $query = $db->prepare(' INSERT INTO messages 
//                             (userId, message, dateAndTime) 
//                             VALUES (:userId,:message, NOW())');
//     $query->execute([
//         'userId' => $userId,
//         'message' => $message,
//     ]);
// }


// AJOUTER UN USER ------------------
// if(isset($_GET['userId'])) {
//     $userId = $_GET['userId'];
//     // $message = $_GET['message'];
//     $query = $db->prepare(' INSERT INTO users 
//                             (pseudo) 
//                             VALUES (:pseudo)');
//     $query->execute([
//         'pseudo' => $userId,
//         // 'message' => $message,
//     ]);
// }



//AJOUTER UNE COULEUR-------------------
if(isset($_GET['userId']) && isset($_GET['color'])) {
    echo"<br>OK!!<br>";
    $userId = $_GET['userId'];
    $color = $_GET['color'];
    $query = $db->prepare(' UPDATE users 
                            SET color=:color
                            WHERE id = :userId');
    $query->execute([
        'color' => $color,
        'userId' => $userId,
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
        <input type="color" name="color">
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>