<?php
function ImgChecK($files){

    $size = 0;
    foreach($files['images']['size'] as $s)
    {
        $size += $s;
    }

    if($size < 11000000)
    {
        $actualext = array();
        $allowed = array('jpg', 'jpeg', 'png');

        foreach($files['images']['name'] as $imageName)
        {
            $ext = explode('.', $imageName);
            array_push($actualext, strtolower(end($ext)));
        }

        $is_ok = true;

        foreach($actualext as $a)
        {
            if(!in_array($a, $allowed))
            {
                $is_ok = false;
                break;
            }
        }

        if($is_ok == true)
        {
            return 1;
        }
        else{
            return 3; //nem jó kép formátum
        }
        
    }
    else{
        return 2; //max 10MB
    }
}






session_start();
include 'db_config.php';

if(isset($_POST['form1_submit']) and $_POST['form1_submit'] == 'form1_chk')
{
    $error = array();
    $is_OK = true;

    if(!empty($_POST['phone']))
    {
        if(strlen((string)$_POST['phone']) == 10)
        {
            if($_POST['phone'] != $_POST['originalphone'])
            {
                $phonenum = $_POST['phone'];
                $sql = "SELECT phone FROM users WHERE phone='$phonenum'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    array_push($error, 'existphError');
                    $is_OK = false;
                }
                else{
                    $_SESSION['phone'] = $_POST['phone'];
                }
            }
            else{
                $_SESSION['phone'] = $_POST['originalphone'];
            }
        }
        else{
            array_push($error, 'phoneError');
            $is_OK = false;
        }
    }
    else{
        $_SESSION['phone'] = null;
    }

    if($is_OK == true)
    {
        echo "none";
    }
    else{
        echo json_encode($error);
    }
}






if(isset($_POST['form2_submit']) and $_POST['form2_submit'] == 'form2_chk')
{
    $errorForm2 = array();
    $is_OK = true;

    if(empty($_POST['street']))
    {
        array_push($errorForm2, 'streetError');
        $is_OK = false;
    }
    if(empty($_POST['housenumber']) or $_POST['housenumber'] <= 0)
    {
        array_push($errorForm2, 'housenumberError');
        $is_OK = false;
    }
    if(empty($_POST['area']) or $_POST['area'] <= 0)
    {
        array_push($errorForm2, 'areaError');
        $is_OK = false;
    }
    if(empty($_POST['rooms']) or $_POST['rooms'] <= 0)
    {
        array_push($errorForm2, 'roomsError');
        $is_OK = false;
    }
    if(!empty($_POST['halfrooms']))
    {
        if($_POST['halfrooms'] < 0)
        {
            array_push($errorForm2, 'halfroomError');
            $is_OK = false;
        }
    }
    if(isset($_POST['level']) and isset($_POST['maxLevel']) and $_POST['level'] >= 0 and $_POST['maxLevel'] >= 0)
    {
        if($_POST['level'] > $_POST['maxLevel'])
        {
            array_push($errorForm2, 'levelBiggerError');
            $is_OK = false;
        }
    }
    else{
        if(!isset($_POST['level']) or $_POST['level'] < 0)
        {
            array_push($errorForm2, 'levelError');
            $is_OK = false;
        }
        if(!isset($_POST['maxLevel']) or $_POST['maxLevel'] < 0)
        {
            array_push($errorForm2, 'maxLevelError');
            $is_OK = false;
        }
    }
    if(empty($_POST['rentalPeriod']) or $_POST['rentalPeriod'] <= 0)
    {
        array_push($errorForm2, 'rentalPeriodError');
        $is_OK = false;
    }
    if(empty($_POST['overhead']) or $_POST['overhead'] <= 0)
    {
        array_push($errorForm2, 'overheadError');
        $is_OK = false;
    }
    if(empty($_POST['common']) or $_POST['common'] <= 0)
    {
        array_push($errorForm2, 'commonError');
        $is_OK = false;
    }
    if(empty($_POST['price']) or $_POST['price'] <= 0)
    {
        array_push($errorForm2, 'priceError');
        $is_OK = false;
    }
    if(empty($_POST['description']))
    {
        array_push($errorForm2, 'descriptionError');
        $is_OK = false;
    }

    if($is_OK == true)
    {
        $_SESSION['rent-sell-option'] = $_POST['rent-sell-option'];
        $_SESSION['type'] = $_POST['type'];
        $_SESSION['city'] = $_POST['city'];
        $_SESSION['street'] = $_POST['street'];
        $_SESSION['housenumber'] = $_POST['housenumber'];
        $_SESSION['area'] = $_POST['area'];
        $_SESSION['rooms'] = $_POST['rooms'];
        $_SESSION['halfrooms'] = $_POST['halfrooms'];
        $_SESSION['condition'] = $_POST['condition'];
        $_SESSION['comfort'] = $_POST['comfort'];
        $_SESSION['furnished'] = $_POST['furnished'];
        $_SESSION['height'] = $_POST['height'];
        $_SESSION['wc'] = $_POST['wc'];
        $_SESSION['airconditioner'] = $_POST['airconditioner'];
        $_SESSION['animal'] = $_POST['animal'];
        $_SESSION['smoking'] = $_POST['smoking'];
        $_SESSION['barrier-free'] = $_POST['barrier-free'];
        $_SESSION['moved'] = $_POST['moved'];
        $_SESSION['level'] = $_POST['level'];
        $_SESSION['maxLevel'] = $_POST['maxLevel'];
        $_SESSION['elevator'] = $_POST['elevator'];
        $_SESSION['rentalPeriod'] = $_POST['rentalPeriod'];
        $_SESSION['overhead'] = $_POST['overhead'];
        $_SESSION['common'] = $_POST['common'];
        $_SESSION['price'] = $_POST['price'];
        $_SESSION['description'] = $_POST['description'];
        echo "none";
    }
    else{
        echo json_encode($errorForm2);
    }
}






if(isset($_POST['form3_submit']) and $_POST['form3_submit'] == 'form3_chk')
{
    $errorIMG = array();
    $is_OK = true;

    if(isset($_SESSION['rent-sell-option']) and isset($_SESSION['type']) and isset($_SESSION['city']) and isset($_SESSION['street'])
    and isset($_SESSION['city']) and isset($_SESSION['housenumber']) and isset( $_SESSION['area']) and isset($_SESSION['rooms']) and isset($_SESSION['halfrooms'])
    and isset($_SESSION['condition']) and isset($_SESSION['comfort']) and isset($_SESSION['furnished']) and isset($_SESSION['height']) and isset($_SESSION['wc'])
    and isset($_SESSION['airconditioner']) and isset($_SESSION['animal']) and isset($_SESSION['smoking']) and isset($_SESSION['barrier-free']) and isset($_SESSION['moved'])
    and isset($_SESSION['level']) and isset($_SESSION['maxLevel']) and isset($_SESSION['elevator']) and isset($_SESSION['overhead']) and isset($_SESSION['common'])
    and isset($_SESSION['price']) and isset($_SESSION['description']))
    {

        

        

        if($_FILES['images']['name'][0] != "")
        {
            if(ImgChecK($_FILES) == 1)
            {

                $sql = 'UPDATE property SET rent_sell="'.$_SESSION["rent-sell-option"].'",type="'.$_SESSION["type"].'",city="'.$_SESSION["city"].'",street="'.$_SESSION["street"].'",housenumber="'.$_SESSION["housenumber"].'",area="'.$_SESSION["area"].'",rooms="'.$_SESSION["rooms"].'",halfrooms="'.$_SESSION["halfrooms"].'",propertycondition="'.$_SESSION["condition"].'",comfort="'.$_SESSION["comfort"].'",furnished="'.$_SESSION["furnished"].'",height="'.$_SESSION["height"].'",wc="'.$_SESSION["wc"].'",airconditioner="'.$_SESSION["airconditioner"].'",animal="'.$_SESSION["animal"].'",smoking="'.$_SESSION["smoking"].'",barrier_free="'.$_SESSION["barrier-free"].'",moved="'.$_SESSION["moved"].'",level="'.$_SESSION["level"].'",maxLevel="'.$_SESSION["maxLevel"].'",elevator="'.$_SESSION["elevator"].'",rentalPeriod="'.$_SESSION["rentalPeriod"].'",overhead="'.$_SESSION["overhead"].'",common="'.$_SESSION["common"].'", price="'.$_SESSION["price"].'",description="'.$_SESSION["description"].'" WHERE property_id='.$_POST['editid'].'';
                mysqli_query($conn, $sql);

                $last_id = $_POST['editid'];

                $folder = "../img/$last_id";

                if(file_exists($folder))
                {
                    $files = glob($folder . "/*");

                    foreach ($files as $file) {
                        if (is_file($file)) {
                          unlink($file);
                        }
                    }
                }
                else{
                    mkdir($folder,0777,true);
                }

                $c = 1;
                for($i=0; $i<count($_FILES['images']['name']); $i++)
                {
                    $fileName = $_FILES['images']['name'][$i];
                    $file_tmp = $_FILES["images"]["tmp_name"][$i];

                    $fileNameParts = explode('.', $fileName);
                    $ext = end($fileNameParts);

                    move_uploaded_file($file_tmp, $folder.'/'.$c.'.'.$ext);
                    $c++;
                }
            }
            else if(ImgChecK($_FILES) == 2)
            {
                array_push($errorIMG, 'max10mb');
                $is_OK = false;
            }
            else if(ImgChecK($_FILES) == 3)
            {
                array_push($errorIMG, 'badFormat');
                $is_OK = false;
            }
        }
        else{
            $sql = 'UPDATE property SET rent_sell="'.$_SESSION["rent-sell-option"].'",type="'.$_SESSION["type"].'",city="'.$_SESSION["city"].'",street="'.$_SESSION["street"].'",housenumber="'.$_SESSION["housenumber"].'",area="'.$_SESSION["area"].'",rooms="'.$_SESSION["rooms"].'",halfrooms="'.$_SESSION["halfrooms"].'",propertycondition="'.$_SESSION["condition"].'",comfort="'.$_SESSION["comfort"].'",furnished="'.$_SESSION["furnished"].'",height="'.$_SESSION["height"].'",wc="'.$_SESSION["wc"].'",airconditioner="'.$_SESSION["airconditioner"].'",animal="'.$_SESSION["animal"].'",smoking="'.$_SESSION["smoking"].'",barrier_free="'.$_SESSION["barrier-free"].'",moved="'.$_SESSION["moved"].'",level="'.$_SESSION["level"].'",maxLevel="'.$_SESSION["maxLevel"].'",elevator="'.$_SESSION["elevator"].'",rentalPeriod="'.$_SESSION["rentalPeriod"].'",overhead="'.$_SESSION["overhead"].'",common="'.$_SESSION["common"].'", price="'.$_SESSION["price"].'",description="'.$_SESSION["description"].'" WHERE property_id='.$_POST['editid'].'';
            mysqli_query($conn, $sql);

            
            $sql = 'UPDATE users SET phone="'.$_SESSION["phone"].'" WHERE id="'.$_SESSION["id"].'"';
            mysqli_query($conn, $sql);
        }


        if($is_OK == true)
        {
            unset($_SESSION['rent-sell-option']);
            unset($_SESSION['type']);
            unset($_SESSION['city']);
            unset($_SESSION['street']);
            unset($_SESSION['housenumber']);
            unset($_SESSION['area']);
            unset($_SESSION['rooms']);
            unset($_SESSION['halfrooms']);
            unset($_SESSION['condition']);
            unset($_SESSION['comfort']);
            unset($_SESSION['furnished']);
            unset($_SESSION['height']);
            unset($_SESSION['wc']);
            unset($_SESSION['airconditioner']);
            unset($_SESSION['animal']);
            unset($_SESSION['smoking']);
            unset($_SESSION['barrier-free']);
            unset($_SESSION['moved']);
            unset($_SESSION['level']);
            unset($_SESSION['maxLevel']);
            unset($_SESSION['elevator']);
            unset($_SESSION['rentalPeriod']);
            unset($_SESSION['overhead']);
            unset($_SESSION['common']);
            unset($_SESSION['price']);
            unset($_SESSION['description']);

            echo "ok";
        }
        else{
            echo json_encode($errorIMG);
        }
        
    }
    else{
        echo 'insertError';
    }
}