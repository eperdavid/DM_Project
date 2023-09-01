<?php
include 'db_config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

$error = array();
$is_OK = true;


if(empty($_POST['email']))
{
    array_push($error, 'emptyEmail');
    $is_OK = false;
}

if($is_OK == true)
{
    $email = $_POST['email'];
    $token = bin2hex(random_bytes(16));

    $sql = 'SELECT email FROM users WHERE email = "'.$_POST['email'].'"';
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
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

        $mail->Subject = 'Elfelejtett jelszó';
        $mail->Body    = 'Kedves Felhasználó,<br>
        <br>
        Ezt az e-mailt azért kapta, mert úgy tűnik, hogy elfelejtette a weboldalunkhoz tartozó jelszavát. Segítségére leszünk a jelszó visszaállításában.<br><br>
        Kérjük, kattintson az alábbi linkre, hogy új jelszót hozzon létre:<br>
        <br>
        <a href="http://localhost/DM_Project/pages/forgotPassword.php?token='.$token.'">Új jelszó beállítása</a><br>
        <br>
        Ha nem ön kérte a jelszóvisszaállítást, kérjük, hagyja figyelmen kívül ezt az e-mailt.';
        
        $mail->send();

        $sql = 'UPDATE users SET passwordToken="'.$token.'" WHERE email="'.$email.'"';
        $result = mysqli_query($conn, $sql);

        echo 'ok';
    }
    else{
        echo "NoUser";
    }
}
else{
    echo json_encode($error);
}