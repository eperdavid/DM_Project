<?php
session_start();

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
    echo "ok";
}
else{
    echo json_encode($error);
}