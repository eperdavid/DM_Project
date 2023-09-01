<?php
include 'db_config.php';
$is_ok = true;
$error = array();

if(!empty($_POST['password']))
{
    if(strlen($_POST['password']) >= 6)
    {
        if($_POST['password'] == $_POST['passwordagain'])
        {
            $token = $_POST['passwordToken'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            $sql = 'UPDATE users SET password="'.$password.'", passwordToken="" WHERE passwordToken="'.$token.'"';
            mysqli_query($conn, $sql);

            echo 'ok';
        }
        else{
            array_push($error, 'notMatchPass');
        }
    }
    else{
        array_push($error, 'shortPass');
    }
}
else{
    array_push($error, 'passError');
}

echo json_encode($error);