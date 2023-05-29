<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-Request-with, Content-Type, Origin, Cache-Control, Pragma, Authorization");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header('Content-type: application/json');
$dati = json_decode(file_get_contents("php://input"));
//print_r($dati);

//Datas
$user = $dati->user;
$img = $dati->img;

try{
    // connect with database
    $hostname = "localhost";
    $dbname = "app";
    $user = "root";
    $pass = "";
    $db = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);

    // insert in users table
    $sql = $db->prepare("UPDATE user SET Img = ? WHERE user.UserName = ?");
    $sql->execute([$img,$user]);
    echo '{"ok" : "200"}';
} catch(Exception $e){
    //Something went bad
    echo "{'Fail' : '$e'}";
}
?>