<?php
include '../actions/db_config.php';
$error = array();
$is_OK = true;

if(empty($_POST['lastname']))
{
    array_push($error, 'invalidLastname');
    $is_OK = false;
}
if(empty($_POST['firstname']))
{
    array_push($error, 'invalidFirstname');
    $is_OK = false;
}
if(empty($_POST['email']))
{
    array_push($error, 'invalidEmail');
    $is_OK = false;
}
else{
    $email = $_POST['email'];
    $sql = "SELECT email FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        array_push($error, 'existEmail');
        $is_OK = false;
    }
}
if(!empty($_POST['password']) and !empty($_POST['passwordRepeat']))
{
    if(strlen($_POST['password']) < 6)
    {
        array_push($error, 'shortPassword');
        $is_OK = false;
    }
    else{
        if($_POST['password'] != $_POST['passwordRepeat'])
        {
            array_push($error, 'differentPassword');
            $is_OK = false;
        }    
    }
}
else{
    if(empty($_POST['password']))
    {
        array_push($error, 'invalidPwd');
        $is_OK = false;
    }
    if(empty($_POST['passwordRepeat']))
    {
        array_push($error, 'invalidPasswordRepeat');
        $is_OK = false;
    }
}


    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../PHPMailer/src/Exception.php';
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/SMTP.php';

if($is_OK == true)
{


    $firtname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $token = bin2hex(random_bytes(16));


    $sql = "INSERT INTO users (firstname, lastname, email, password, token) VALUES ('$firtname', '$lastname', '$email','$password', '$token')";
    mysqli_query($conn, $sql);

    $mail = new PHPMailer(true);

    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'eper.david01@gmail.com';                     //SMTP username
    $mail->Password   = 'mqxripzgcqtcqhdn';                               //SMTP password
    $mail->SMTPSecure = 465;            //Enable implicit TLS encryption
    
    //Recipients
    $mail->setFrom('eper.david01@gmail.com', 'HomeDeals');
        
    $mail->addAddress("$email");     //Add a recipient
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML

    $mail->Subject = 'Regisztracio';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    
    $mail->send();

    array_push($error, "none");

    echo json_encode($error);
}
else{
    echo json_encode($error);
}