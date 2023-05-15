<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-Request-with, Content-Type, Origin, Cache-Control, Pragma, Authorization");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header('Content-type: application/json');

require_once 'jwt/src/BeforeValidException.php';
require_once 'jwt/src/ExpiredException.php';
require_once 'jwt/src/SignatureInvalidException.php';
require_once 'jwt/src/JWT.php';

use \Firebase\JWT\JWT; 

    function risposta($response_code, $message)
    {
        http_response_code($response_code);
        header("Content-type: application/json; charset: UTF-8");
        echo ('{"Status":"'.$response_code.'", "description":"'.$message.'"}');
        die;
    }
    $dati = json_decode(file_get_contents("php://input"));
    $email = $dati->email;
    $password = $dati->password;
    
        $hostname = "localhost";
        $dbname = "app";
        $user = "root";
        $pass = "";
        $db = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);

    if (isset($email))
    {
 
        // connect with database
        
    
        // check if credentials are okay, and email is verified
        $sql = $db->prepare("SELECT * FROM user WHERE Mail = ?");
        $sql->execute([$email]);
        
        $result = array();
        while ($data = $sql->fetch(PDO::FETCH_ASSOC)) {
            array_push($result, $data);
        }
        if (count($result) == 0) {
            risposta(400, "Not registered");//Non registrato
        }
        else{
            
            if (!password_verify($password, $result[0]["Password"]))
            {
                risposta(401,"Unauthorized"); //Password errata
            }
    
            if ($result[0]["Verificato"] == false)
            {
                risposta(403,"Unauthorized");//Non è verificato, reindirizzata alla form di conferma
            }
    
            
            $issuedat_claim = time();  
            $tempo = $issuedat_claim + 10;

            $attuale = date("Y-m-d H:i:s", time());
            $attuale = strtotime($attuale);

            $durata = date("Y-m-d H:i:s", $tempo +10);
            $durata = strtotime($durata);
            $key = "asdaefasd";

            $token = array(
                "iat" => $attuale,
                "jti"  => base64_encode(rand(0, 10000000)),
                "nbf" => $tempo,
                "exp"  => $durata,
                "data" => array(
                    "mail" => $email,
                )
            ); 
        
            $jwt = JWT::encode($token, $key);
            
            $sql = $db->prepare("UPDATE user SET Token = ? WHERE Mail = ?");
            $sql->execute([$jwt,$email]);

            $arr = array('token' => $jwt);
            $sql = $db->prepare("SELECT Mail, UserName, Number, Img, Token FROM user WHERE Mail LIKE ?");
            $sql->execute([$email]);

            $result = array();
            while ($data = $sql->fetch(PDO::FETCH_ASSOC)) {
            array_push($result, $data);
            }
            echo json_encode($result[0]);
            exit();
        }
    }
?>