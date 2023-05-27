<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: X-Request-with, Content-Type, Origin, Cache-Control, Pragma, Authorization");
    header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
    header('Content-type: application/json');

    $dati = json_decode(file_get_contents("php://input"));
    print_r($dati);

    $mittente = $dati->Sender;
    $destinatario =  $dati->nome;
    $messaggio =  $dati->Text;
    try{
        // connect with database
        $hostname = "localhost";
        $dbname = "app";
        $user = "root";
        $pass = "";
        $db = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);
    
        // insert in users table
        //INSERT INTO `message` (`Id`, `Sender`, `Recipient`, `Text`, `TimeSent`) VALUES (NULL, 'asdasdsadasd', 'Erradish', 'asdasdasd', '2023-05-25');

        $sql = $db->prepare("INSERT INTO message(Id,Sender,Recipient,Text,TimeSent) VALUES (NULL,?,?,?,NULL)");
        $sql->execute([$mittente,$destinatario,$messaggio]);
        echo"{'Status' : '200'}";
    } catch(Exception $e){
        //Something went bad
        echo "{'Fail' : '$e'}";
    }
?>