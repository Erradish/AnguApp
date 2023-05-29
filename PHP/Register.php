<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-Request-with, Content-Type, Origin, Cache-Control, Pragma, Authorization");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header('Content-type: application/json');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer(true);
$dati = json_decode(file_get_contents("php://input"));
//print_r($dati);

//Datas
$name = $dati->name;
$email = $dati->email;
$password = $dati->password;

$encrypted_password = password_hash($password, PASSWORD_DEFAULT);
$number = $dati->number;
$verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

//Send mail using gmail  
    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->SMTPAuth = true; // enable SMTP authentication
    $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
    $mail->Port = 465; // set the SMTP port for the GMAIL server
    $mail->Username = "angularappradici@gmail.com"; // GMAIL username
    //$mail->Password = "xsmtpsib-63a10cbd0fcd0cb6389819dae74228501a1492ad160815f8a5c1596ddb556c5f-KIXHpUPqmQ1WsOYZ"; // GMAIL password
    $mail->Password = 'gnyapyrvnrwqjtkd';
//Typical mail data
$mail->AddAddress($email, "Dear ".$name);    
$mail->SetFrom("angularappradici@gmail.com");

 //Content
 $mail->isHTML(true);                                  //Set email format to HTML
 $mail->Subject = 'Email Confirmation';
 $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p> <p><a href="localhost:4200/emailConfirm">Vai alla nuova pagina</a></p>';

try{
    $mail->Send();
    // connect with database
    $hostname = "localhost";
    $dbname = "app";
    $user = "root";
    $pass = "";
    $db = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);

    // insert in users table
    $sql = $db->prepare("INSERT INTO user(Mail,UserName,Password,Number,Img,Codice,Verificato) VALUES (?,?,?,?,?,?,?)");
    $sql->execute([$email,$name,$encrypted_password,$number,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHRoDN-6Z6ly_xGFhRBbomJhsNK0ggKvaTZQ&usqp=CAU',$verification_code,FALSE]);
    echo "{'ok' : '$verification_code'}";
} catch(Exception $e){
    //Something went bad
    echo "{'Fail' : '$e'}";
}
?>