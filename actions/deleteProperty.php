<?php
session_start();
include 'db_config.php';

if($_POST['action'] == "delete")
{
    $sql = 'SELECT * FROM property WHERE property_id ='.$_POST['id'].' AND user_id='.$_SESSION['id'].'';
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0)
    {
        $delsql = 'DELETE FROM property WHERE property_id='.$_POST['id'].'';
        mysqli_query($conn,$delsql);
    }

    $folder = '../img/'.$_POST['id'];

    if(file_exists($folder))
    {
        $images = glob($folder . '/*');

        foreach($images as $image)
        {
            unlink($image);
        }

        rmdir($folder);
    }
}