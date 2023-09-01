<?php
session_start();


if(!empty($_GET['token']))
{
    include 'db_config.php';


    $sql = 'SELECT * FROM users WHERE token = "'.$_GET['token'].'"';
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
            if($row['new_email'] != "")
            {
                $sql = 'UPDATE users SET token="", email="'.$row['new_email'].'", new_email = "" WHERE token = "'.$_GET['token'].'"';
                mysqli_query($conn, $sql);

                $_SESSION['check'] = true;
                header('Location: ../pages/index.php?newemailActivated');
            }
            else{
                $sql = 'UPDATE users SET token="", verify=1 WHERE token = "'.$_GET['token'].'"';
                mysqli_query($conn, $sql);

                $_SESSION['check'] = true;
                header('Location: ../pages/index.php?emailActivated');
            }
        }

    }
    else{
        header('Location: ../pages/index.php');
    }
    
}
else{
    header('Location: ../pages/index.php');
}