<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: X-Request-with, Content-Type, Origin, Cache-Control, Pragma, Authorization");
    header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
    header('Content-type: application/json');

    $dati = json_decode(file_get_contents("php://input"));
    //print_r($dati);

    $mittente = $dati->mittente;
    $destinatario = $dati->destinatario;
    try{
        // connect with database
        $hostname = "localhost";
        $dbname = "app";
        $user = "root";
        $pass = "";
        $db = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);
    
        // insert in users table
        //INSERT INTO `message` (`Id`, `Sender`, `Recipient`, `Text`, `TimeSent`) VALUES (NULL, 'asdasdsadasd', 'Erradish', 'asdasdasd', '2023-05-25');

        $sql = $db->prepare("SELECT * FROM message WHERE Sender LIKE ? AND Recipient LIKE ? OR Sender LIKE ? AND Recipient LIKE ?");
        $sql->execute([$mittente,$destinatario,$destinatario,$mittente]);
        $result = array();
            while ($data = $sql->fetch(PDO::FETCH_ASSOC)) {
            array_push($result, $data);
            }
         //$result = array_reverse($result);
        echo json_encode($result);
    } catch(Exception $e){
        //Something went bad
        echo "{'Fail' : '$e'}";
    }
?>