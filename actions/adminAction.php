<?php

include 'db_config.php';

if($_POST['action'] == "ban")
{
    $id = $_POST['id'];

    $sql = 'SELECT level FROM users WHERE id='.$id.'';
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            if($row['level'] == 1)
            {
                $level = 5;
                $adVisible = 3;
            }
            if($row['level'] == 5)
            {
                $level = 1;
                $adVisible = 1;
            }
        }
    }

    $sql = 'UPDATE users SET level='.$level.' WHERE id='.$id.'';
    mysqli_query($conn, $sql);
    $sql = 'UPDATE property SET verify='.$adVisible.' WHERE user_id='.$id.'';
    mysqli_query($conn, $sql);
}


 if($_POST['action'] == "delete")
{
    $id = $_POST['id'];

    $sql = 'DELETE FROM users WHERE id='.$id.'';
    mysqli_query($conn, $sql);
} 
