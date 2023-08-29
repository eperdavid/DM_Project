<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

$is_ok = true;
$error = array();

if(!isset($_SESSION['id']))
{
    if(empty($_POST['lastname']))
    {
        array_push($error, 'lastnameError');
        $is_ok = false;
    }
    if(empty($_POST['firstname']))
    {
        array_push($error, 'firstnameError');
        $is_ok = false;
    }
    if(empty($_POST['email']))
    {
        array_push($error, 'emailError');
        $is_ok = false;
    }
    if(!empty($_POST['phone']))
    {
    if(strlen((string)$_POST['phone']) != 10)
    {
        array_push($error, 'invalidPhoneError');
        $is_ok = false;  
    }
    }
    else{
        array_push($error, 'phoneError');
        $is_ok = false;
    }
    if(empty($_POST['message']))
    {
        array_push($error, 'messageError');
        $is_ok = false;
    }
}
else{
    if(empty($_POST['message']))
    {
        array_push($error, 'messageError');
        $is_ok = false;
    }
}

if($is_ok == true)
{
    $propertyID = $_POST['propertyID'];
    $email = $_POST['ownerEmail'];
    $name = $_POST['name'];
    $message = strip_tags($_POST['message']);

    if(isset($_SESSION['firstname'])) { $firstname = $_SESSION['firstname']; }else{ $firstname = $_POST['firstname']; }
    if(isset($_SESSION['lastname'])) { $lastname = $_SESSION['lastname']; }else{ $lastname = $_POST['lastname']; }
    if(isset($_SESSION['email'])) { $email2 = $_SESSION['email']; }else{ $email2 = $_POST['email']; }
    if(isset($_SESSION['phone'])) { $phone = $_SESSION['phone']; }else{ $phone = $_POST['phone']; }



    $mail = new PHPMailer(true);

    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'eper.david01@gmail.com';                     //SMTP username
    $mail->Password   = 'mqxripzgcqtcqhdn';                               //SMTP password
    $mail->SMTPSecure = 465;            //Enable implicit TLS encryption
    $mail->CharSet = 'UTF-8';
    
    //Recipients
    $mail->setFrom('eper.david01@gmail.com', 'HomeDeals');
        
    $mail->addAddress("$email");     //Add a recipient
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML

    $mail->Subject = 'Új Érdeklődés az Ingatlanhirdetésével Kapcsolatban';
    $mail->Body    = 'Kedves '.$name.',<br><br>

                    Az Ön ingatlanhirdetéséhez érkezett egy új érdeklődés az oldalunkon keresztül. Az alábbiakban találja az érdeklődő adatait és az üzenetét:<br>
                    <br>
                    <h3 style="margin: 0;">Érdeklődő neve: <span style="font-weight: 400;">'.$lastname.' '.$firstname.'</span></h3>
                    <h3 style="margin: 0;">Érdeklődő email címe: <span style="font-weight: 400;">'.$email2.'</span></h3>
                    <h3 style="margin: 0;">Érdeklődő telefonszáma: <span style="font-weight: 400;">'.$phone.'</span></h3>
                    <br>
                    <h3 style="margin: 0;">Az érdeklődő kiválasztott hírdetése: <span style="font-weight: 400;"><a href="localhost/DM_Project/pages/property.php?id='.$propertyID.'">Megtekintés</a></span></h3>
                    <h3>Üzenet:</h3>
                    '.$message.'
                    <br>
                    <h3>Üdvözlettel,<br>'.$lastname.' '.$firstname.'</h3>
                    Amennyiben további információra van szüksége vagy szeretne kapcsolatba lépni az érdeklődővel, kérem, válaszoljon a megadott email címre vagy hívja a telefonszámot.<br>
                    <br>
                    Köszönjük, hogy weboldalunkat választotta az ingatlanhirdetéséhez, és jó szerencsét kívánunk az értékesítés során!<br>
                    <br>
                    Üdvözlettel,<br>
                    A HomeDeals Csapata
                    ';

    
    $mail->send();

    echo 'mailSend';
}
else{
    echo json_encode($error);
}