<?php
session_start();

include '../actions/db_config.php';

$is_OK = true;
$error = array();

if(!empty($_POST['email']) and !empty($_POST['password']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            if(password_verify($password, $row['password']))
            {
                if($row['verify'] == 1)
                {
                    if($row['level'] != 5)
                    {
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['email'] = $email;
                        $_SESSION['userlevel'] = $row['level'];
                        $_SESSION['firstname'] = $row['firstname'];
                        $_SESSION['lastname'] = $row['lastname'];
                        $_SESSION['phone'] = $row['phone'];

                        array_push($error, 'none');
                    }
                    else{
                        array_push($error, 'bannedError');
                        $is_OK = false;
                    }
                }
                else{
                    array_push($error, 'notActiveError');
                    $is_OK = false;
                }
            }
            else{
                array_push($error, 'loginFail');
                $is_OK = false;
            }
        }
    }
    else{
        array_push($error, 'loginFail');
        $is_OK = false;
    }

}
else{
    if(empty($_POST['email']))
    {
        array_push($error, 'emailError');
        $is_OK = false;
    }
    if(empty($_POST['password']))
    {
        array_push($error, 'passwordError');
        $is_OK = false;
    }
}


if($is_OK == true)
{
    echo json_encode($error);
}
else{
    echo json_encode($error);
}