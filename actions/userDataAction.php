<?php

include 'db_config.php';

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

}
else{
    echo json_encode($error);
}