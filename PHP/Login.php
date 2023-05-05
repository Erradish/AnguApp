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
    $email = $dati->email;
    $password = $dati->password;

    if (isset($email))
    {
 
        // connect with database
        $hostname = "localhost";
        $dbname = "app";
        $user = "root";
        $pass = "";
        $db = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);
    
        // check if credentials are okay, and email is verified
        $sql = $db->prepare("SELECT * FROM user WHERE Mail = ?");
        $sql->execute([$email]);
        
        $result = array();
        while ($data = $sql->fetch(PDO::FETCH_ASSOC)) {
            array_push($result, $data);
        }
        if (count($result) == 0) {
            errore(400, "Not registered");//Non registrato
        }
        else{
            
            if (!password_verify($password, $result[0]["Password"]))
            {
                errore(401,"Unauthorized"); //Password errata
            }
    
            if ($result[0]["Verificato"] == false)
            {
                errore(403,"Unauthorized");//Non è verificato, reindirizzata alla form di conferma
            }
    
            errore(200,"Success");
            exit();
        }
    }
?>
