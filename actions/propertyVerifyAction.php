<?php
include 'db_config.php';

if(isset($_POST['accept']))
{
    $id=$_POST['propId'];

    $sql = 'UPDATE property SET verify=1 WHERE property_id='.$id.'';
    mysqli_query($conn, $sql);

    header('Location: ../pages/admin.php');
}

if(isset($_POST['delete']))
{
    $id=$_POST['propId'];
    
    $sql = 'DELETE FROM property WHERE property_id='.$id.'';
    mysqli_query($conn, $sql);

    header('Location: ../pages/admin.php');
}
