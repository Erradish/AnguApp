<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-Request-with, Content-Type, Origin, Cache-Control, Pragma, Authorization");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header('Content-type: application/json');

function errore($response_code, $message)
    {
        http_response_code($response_code);
        header("Content-type: application/json; charset: UTF-8");
        echo ('{"Status":"'.$response_code.'", "description":"'.$message.'"}');
        die;
    }

    $dati = json_decode(file_get_contents("php://input"));
    $verification_code = $dati->verification_code;
    $email = $dati->email;
    if (isset($email))
    {
 
        // connect with database
        $hostname = "localhost";
        $dbname = "app";
        $user = "root";
        $pass = "";
        $db = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);
    
        // check if credentials are okay, and email is verified
        $sql = $db->prepare("SELECT * FROM user WHERE Mail = ? AND Codice = ?");
        $sql->execute([$email,$verification_code]);
        // mark email as verified
        $result = array();

        while ($data = $sql->fetch(PDO::FETCH_ASSOC)) {
            array_push($result, $data);
        }
        if (count($result) == 0)
        {
            errore(404,"Unauthorized"); //Codice sbagliato
        }
        else{
            $sql = $db->prepare("UPDATE user SET `Verificato` = '1'  WHERE Mail = ? AND Codice = ?");
            $sql->execute([$email,$verification_code]);
            errore(200,"Success"); //Verificato
        }
        exit();
    }
 
?>