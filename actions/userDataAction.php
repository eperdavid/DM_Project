<?php
session_start();

include 'db_config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

$is_ok = true;
$error = array();

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
if(!empty($_POST['email']))
{
    if($_POST['email'] != $_SESSION['email'])
    {
        $sql = 'SELECT email FROM users WHERE email="'.$_POST['email'].'"';
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            array_push($error, 'existError');
            $is_ok = false;
        }
    }
}
if(empty($_POST['phone']))
{
    array_push($error, 'phoneError');
    $is_ok = false;
}
if(!empty($_POST['phone']))
{
    if(strlen((string)$_POST['phone']) != 10)
    {
        array_push($error, 'phoneFormatError');
        $is_ok = false; 
    }
}





if(!empty($_POST['password']))
{
    if(strlen($_POST['password']) >= 6)
    {
        if($_POST['password'] != $_POST['passwordAgain'])
        {
            array_push($error, 'passwordNotMatch');
            $is_ok = false;
        }
    }
    else{
        array_push($error, 'passwordError');
        $is_ok = false;
    }
}





if($is_ok == true)
{
    $lastname = $_SESSION['lastname'];
    $firstname = $_SESSION['firstname'];
    $email = $_SESSION['email'];
    $phone = $_SESSION['phone'];
    $new_email = "";
    $token = "";

    if(!empty($_POST['lastname']))
    {
        $lastname = $_POST['lastname'];
    }
    if(!empty($_POST['firstname']))
    {
        $firstname = $_POST['firstname'];
    }
    if(!empty($_POST['email']))
    {
        $email = $_POST['email'];
    }
    if(!empty($_POST['phone']))
    {
        $phone = $_POST['phone'];
    }


    if($email != $_SESSION['email'])
    {
        $token = bin2hex(random_bytes(16));
        $new_email = $email;

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

        $mail->Subject = 'Új email cím';
        $mail->Body    = 'Tisztelt Felhasználó,<br>
        <br>
        Ezt az emailt azért küldtük Önnek, mert az Ön által regisztrált fiókon az email címet megváltoztatták.<br>
        Kérjük, erősítse meg az új email címet a következő hivatkozásra kattintva <a href="localhost/DM_Project/actions/emailActivation.php?token='.$token.'">Megerősítés</a><br>
        <br>
        Amennyiben nem Ön kezdeményezte ezt a változtatást, kérjük, hagyja figyelmen kívül ezt az e-mailt.<br>
        <br>
        Üdvözlettel,<br>
        A HomeDeals csapata';
        
        $mail->send();
    }

    if(!empty($_POST['password']))
    {
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $sql = 'UPDATE users SET firstname="'.$firstname.'", lastname="'.$lastname.'", phone="'.$phone.'",password="'.$password.'", token="'.$token.'", new_email="'.$new_email.'" WHERE id='.$_POST['Userid'].'';
        mysqli_query($conn, $sql);
    }
    else{
        $sql = 'UPDATE users SET firstname="'.$firstname.'", lastname="'.$lastname.'", phone="'.$phone.'", token="'.$token.'", new_email="'.$new_email.'" WHERE id='.$_POST['Userid'].'';
        mysqli_query($conn, $sql);
    }
    

    $_SESSION['lastname'] = $lastname;
    $_SESSION['firstname'] = $firstname;
    $_SESSION['phone'] = $phone;

    echo 'ok';
}
else{
    echo json_encode($error);
}