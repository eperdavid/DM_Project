<?php
session_start();
include 'db_config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

if(isset($_POST['accept']))
{
    $email = $_POST['owneremail'];
    $id=$_POST['propId'];
    $date = date('Y-m-d', strtotime(' + 6 months'));
    $sql = 'UPDATE property SET verify=1, date = "'.$date.'" WHERE property_id='.$id.'';
    mysqli_query($conn, $sql);

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

    $mail->Subject = 'Hirdetés elfogadva';
    $mail->Body    = 'Kedves felhasználó,<br>
    <br>
    Azért kapta ezt az üzenetet, mert értesíteni szertnénk, hogy nemrégiben feltöltött hirdetését <b>elfogadtuk</b>, mostantó látható az oldalon<br>
    <br>
    Fontos tudnivaló: Kérjük vegye figyelembe, hogy hirdetése <b>6</b> hónap múlva automatikussan törlődik.<br>';
    
    $mail->send();

    header('Location: ../pages/admin.php');
}

if(isset($_POST['delete']))
{
    $email = $_POST['owneremail'];
    $id=$_POST['propId'];
    
    $sql = 'DELETE FROM property WHERE property_id='.$id.'';
    mysqli_query($conn, $sql);

    if($_SESSION['userlevel'] == 2 and isset($_POST['fromEdit']))
    {
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
    
        $mail->Subject = 'Hirdetés törölve';
        $mail->Body    = 'Kedves felhasználó,<br>
        <br>
        Sajnálattal értesitjük,hogy a nemrégiben feltöltött hirdetését <b>töröltük</b><br>
        Lehet, hogy a hirdetés nem felelt meg az általános irányelveinknek vagy tartalmazott olyan elemeket, amik nem megengedettek a platformunkon.<br>
        <br>';
        
        $mail->send();

        header('Location: ../pages/admin.php');
    }
    else{
        header('Location: ../pages/myproperties.php');
    }
    if($_SESSION['userlevel'] == 1){
        header('Location: ../pages/myproperties.php');
    }

    
}
