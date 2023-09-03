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



        if($_POST['type'] == "Lakás")
        {
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
            if($_POST['rent-sell-option'] == "Kiadó")
            {
                if(empty($_POST['rentalPeriod']) or $_POST['rentalPeriod'] <= 0)
                {
                    array_push($errorForm2, 'rentalPeriodError');
                    $is_OK = false;
                }
            }
            if(empty($_POST['overhead']) or $_POST['overhead'] <= 0)
            {
                array_push($errorForm2, 'overheadError');
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
        }
        if($_POST['type'] == "Ház")
        {
            if(empty($_POST['area']) or $_POST['area'] <= 0)
            {
                array_push($errorForm2, 'areaError');
                $is_OK = false;
            }
            if(empty($_POST['plotArea']) or $_POST['plotArea'] <= 0)
            {
                array_push($errorForm2, 'plotAreaError');
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
            if(!isset($_POST['maxLevel']) or $_POST['maxLevel'] < 0)
            {
                array_push($errorForm2, 'maxLevelError');
                $is_OK = false;
            }
            if($_POST['rent-sell-option'] == "Kiadó")
            {
                if(empty($_POST['rentalPeriod']) or $_POST['rentalPeriod'] <= 0)
                {
                    array_push($errorForm2, 'rentalPeriodError');
                    $is_OK = false;
                }
            }
            if(empty($_POST['overhead']) or $_POST['overhead'] <= 0)
            {
                array_push($errorForm2, 'overheadError');
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
        }

        if($_POST['type'] == "Telek")
        {
            if(empty($_POST['PlotFormArea']) or $_POST['PlotFormArea'] <= 0)
            {
                array_push($errorForm2, 'PlotFormAreaError');
                $is_OK = false;
            }
            if(empty($_POST['coverage']) or $_POST['coverage'] <= 0)
            {
                    array_push($errorForm2, 'coverageError');
                    $is_OK = false;
            }
            else{
                if($_POST['coverage'] > 100)
                {
                    array_push($errorForm2, 'coverageTooHighError');
                    $is_OK = false;
                }
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
        }
    

        
    
    
    
    

    if($is_OK == true)
    {
        if($_POST['rent-sell-option'] == "Kiadó")
        {
            if($_POST['type'] == "Lakás")
            {
                if(!empty($_POST['city']) and !empty($_POST['condition']) and !empty($_POST['comfort']) and !empty($_POST['furnished']) and !empty($_POST['height'])
                and !empty($_POST['wc']) and !empty($_POST['airconditioner']) and !empty($_POST['animal']) and !empty($_POST['smoking']) and !empty($_POST['barrier-free'])
                and !empty($_POST['moved']) and !empty($_POST['elevator']) and !empty($_POST['heating']))
                {
                    if($_FILES['images']['name'][0] != "")
                    {
                        if(ImgChecK($_FILES) == 1)
                        {

                            $sql = 'UPDATE property SET city="'.$_POST["city"].'",street="'.$_POST["street"].'",housenumber="'.$_POST["housenumber"].'",area="'.$_POST["area"].'",rooms="'.$_POST["rooms"].'",halfrooms="'.$_POST["halfrooms"].'",propertycondition="'.$_POST["condition"].'",comfort="'.$_POST["comfort"].'",furnished="'.$_POST["furnished"].'",height="'.$_POST["height"].'",wc="'.$_POST["wc"].'",airconditioner="'.$_POST["airconditioner"].'",animal="'.$_POST["animal"].'",smoking="'.$_POST["smoking"].'",barrier_free="'.$_POST["barrier-free"].'",moved="'.$_POST["moved"].'",level="'.$_POST["level"].'",maxLevel="'.$_POST["maxLevel"].'",elevator="'.$_POST["elevator"].'",rentalPeriod="'.$_POST["rentalPeriod"].'",overhead="'.$_POST["overhead"].'", price="'.$_POST["price"].'",description="'.$_POST["description"].'",heating="'.$_POST["heating"].'" WHERE property_id='.$_POST['sendID'].'';
                            mysqli_query($conn, $sql);

                            $last_id = $_POST['sendID'];

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
                        echo 'ok';
                    }
                    else{
                        $sql = 'UPDATE property SET city="'.$_POST["city"].'",street="'.$_POST["street"].'",housenumber="'.$_POST["housenumber"].'",area="'.$_POST["area"].'",rooms="'.$_POST["rooms"].'",halfrooms="'.$_POST["halfrooms"].'",propertycondition="'.$_POST["condition"].'",comfort="'.$_POST["comfort"].'",furnished="'.$_POST["furnished"].'",height="'.$_POST["height"].'",wc="'.$_POST["wc"].'",airconditioner="'.$_POST["airconditioner"].'",animal="'.$_POST["animal"].'",smoking="'.$_POST["smoking"].'",barrier_free="'.$_POST["barrier-free"].'",moved="'.$_POST["moved"].'",level="'.$_POST["level"].'",maxLevel="'.$_POST["maxLevel"].'",elevator="'.$_POST["elevator"].'",rentalPeriod="'.$_POST["rentalPeriod"].'",overhead="'.$_POST["overhead"].'", price="'.$_POST["price"].'",description="'.$_POST["description"].'",heating="'.$_POST["heating"].'" WHERE property_id='.$_POST['sendID'].'';
                        mysqli_query($conn, $sql);

                        echo 'ok';
                    }
                }
                else{
                    echo 'insertError';
                }
            }
            if($_POST['type'] == "Ház")
            {
                if(!empty($_POST['city']) and !empty($_POST['condition']) and !empty($_POST['comfort']) and !empty($_POST['furnished']) and !empty($_POST['height'])
                and !empty($_POST['wc']) and !empty($_POST['airconditioner']) and !empty($_POST['animal']) and !empty($_POST['smoking']) and !empty($_POST['barrier-free'])
                and !empty($_POST['moved']) and !empty($_POST['rentHousecellar']) and !empty($_POST['heating']))
                {
                    if($_FILES['images']['name'][0] != "")
                    {
                        if(ImgChecK($_FILES) == 1)
                        {

                            $sql = 'UPDATE property SET city="'.$_POST["city"].'",street="'.$_POST["street"].'",housenumber="'.$_POST["housenumber"].'",area="'.$_POST["area"].'",rooms="'.$_POST["rooms"].'",halfrooms="'.$_POST["halfrooms"].'",plotArea="'.$_POST["plotArea"].'",propertycondition="'.$_POST["condition"].'",comfort="'.$_POST["comfort"].'",furnished="'.$_POST["furnished"].'",height="'.$_POST["height"].'",wc="'.$_POST["wc"].'",airconditioner="'.$_POST["airconditioner"].'",animal="'.$_POST["animal"].'",smoking="'.$_POST["smoking"].'",barrier_free="'.$_POST["barrier-free"].'",moved="'.$_POST["moved"].'",maxLevel="'.$_POST["maxLevel"].'",cellar="'.$_POST["rentHousecellar"].'",heating="'.$_POST["heating"].'",rentalPeriod="'.$_POST["rentalPeriod"].'",overhead="'.$_POST["overhead"].'", price="'.$_POST["price"].'",description="'.$_POST["description"].'" WHERE property_id='.$_POST['sendID'].'';
                            mysqli_query($conn, $sql);

                            $last_id = $_POST['sendID'];

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
                        echo 'ok';
                    }
                    else{
                        $sql = 'UPDATE property SET city="'.$_POST["city"].'",street="'.$_POST["street"].'",housenumber="'.$_POST["housenumber"].'",area="'.$_POST["area"].'",rooms="'.$_POST["rooms"].'",halfrooms="'.$_POST["halfrooms"].'",plotArea="'.$_POST["plotArea"].'",propertycondition="'.$_POST["condition"].'",comfort="'.$_POST["comfort"].'",furnished="'.$_POST["furnished"].'",height="'.$_POST["height"].'",wc="'.$_POST["wc"].'",airconditioner="'.$_POST["airconditioner"].'",animal="'.$_POST["animal"].'",smoking="'.$_POST["smoking"].'",barrier_free="'.$_POST["barrier-free"].'",moved="'.$_POST["moved"].'",maxLevel="'.$_POST["maxLevel"].'",cellar="'.$_POST["rentHousecellar"].'",heating="'.$_POST["heating"].'",rentalPeriod="'.$_POST["rentalPeriod"].'",overhead="'.$_POST["overhead"].'", price="'.$_POST["price"].'",description="'.$_POST["description"].'" WHERE property_id='.$_POST['sendID'].'';
                        mysqli_query($conn, $sql);

                        echo 'ok';
                    }
                }
                else{
                    echo 'insertError';
                }
            }
        }
        if($_POST['rent-sell-option'] == "Eladó")
        {
            if($_POST['type'] == "Lakás")
            {
                if(!empty($_POST['city']) and !empty($_POST['condition']) and !empty($_POST['comfort']) and !empty($_POST['furnished']) and !empty($_POST['height'])
                and !empty($_POST['wc']) and !empty($_POST['airconditioner']) and !empty($_POST['barrier-free'])
                and !empty($_POST['sellApartmentinsulation']) and !empty($_POST['elevator']) and !empty($_POST['heating']))
                {
                    if($_FILES['images']['name'][0] != "")
                    {
                        if(ImgChecK($_FILES) == 1)
                        {

                            $sql = 'UPDATE property SET city="'.$_POST["city"].'",street="'.$_POST["street"].'",housenumber="'.$_POST["housenumber"].'",area="'.$_POST["area"].'",rooms="'.$_POST["rooms"].'",halfrooms="'.$_POST["halfrooms"].'",propertycondition="'.$_POST["condition"].'",comfort="'.$_POST["comfort"].'",furnished="'.$_POST["furnished"].'",height="'.$_POST["height"].'",wc="'.$_POST["wc"].'",airconditioner="'.$_POST["airconditioner"].'",barrier_free="'.$_POST["barrier-free"].'",level="'.$_POST["level"].'",maxLevel="'.$_POST["maxLevel"].'",elevator="'.$_POST["elevator"].'", heating="'.$_POST["heating"].'",insulation="'.$_POST["insulation"].'",overhead="'.$_POST["overhead"].'", price="'.$_POST["price"].'",description="'.$_POST["description"].'" WHERE property_id='.$_POST['sendID'].'';
                            mysqli_query($conn, $sql);

                            $last_id = $_POST['sendID'];

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
                        echo 'ok';
                    }
                    else{
                        $sql = 'UPDATE property SET city="'.$_POST["city"].'",street="'.$_POST["street"].'",housenumber="'.$_POST["housenumber"].'",area="'.$_POST["area"].'",rooms="'.$_POST["rooms"].'",halfrooms="'.$_POST["halfrooms"].'",propertycondition="'.$_POST["condition"].'",comfort="'.$_POST["comfort"].'",furnished="'.$_POST["furnished"].'",height="'.$_POST["height"].'",wc="'.$_POST["wc"].'",airconditioner="'.$_POST["airconditioner"].'",barrier_free="'.$_POST["barrier-free"].'",level="'.$_POST["level"].'",maxLevel="'.$_POST["maxLevel"].'",elevator="'.$_POST["elevator"].'", heating="'.$_POST["heating"].'",insulation="'.$_POST["insulation"].'",overhead="'.$_POST["overhead"].'", price="'.$_POST["price"].'",description="'.$_POST["description"].'" WHERE property_id='.$_POST['sendID'].'';
                        mysqli_query($conn, $sql);

                        echo 'ok';
                    }
                }
                else{
                    echo 'insertError';
                }
            }
            if($_POST['type'] == "Ház")
            {
                if(!empty($_POST['city']) and !empty($_POST['condition']) and !empty($_POST['comfort']) and !empty($_POST['furnished']) and !empty($_POST['height'])
                and !empty($_POST['wc']) and !empty($_POST['airconditioner']) and !empty($_POST['barrier-free']) and !empty($_POST['sellHousecellar']) and !empty($_POST['heating'])
                and !empty($_POST['sellHouseinsulation']))
                {
                    if($_FILES['images']['name'][0] != "")
                    {
                        if(ImgChecK($_FILES) == 1)
                        {

                            $sql = 'UPDATE property SET city="'.$_POST["city"].'",street="'.$_POST["street"].'",housenumber="'.$_POST["housenumber"].'",area="'.$_POST["area"].'",rooms="'.$_POST["rooms"].'",halfrooms="'.$_POST["halfrooms"].'",plotArea="'.$_POST["plotArea"].'",propertycondition="'.$_POST["condition"].'",comfort="'.$_POST["comfort"].'",furnished="'.$_POST["furnished"].'",height="'.$_POST["height"].'",wc="'.$_POST["wc"].'",airconditioner="'.$_POST["airconditioner"].'",barrier_free="'.$_POST["barrier-free"].'",maxLevel="'.$_POST["maxLevel"].'",cellar="'.$_POST["sellHousecellar"].'",heating="'.$_POST["heating"].'",insulation="'.$_POST["sellHouseinsulation"].'",overhead="'.$_POST["overhead"].'", price="'.$_POST["price"].'",description="'.$_POST["description"].'" WHERE property_id='.$_POST['sendID'].'';
                            mysqli_query($conn, $sql);

                            $last_id = $_POST['sendID'];

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
                        echo 'ok';
                    }
                    else{
                        $sql = 'UPDATE property SET city="'.$_POST["city"].'",street="'.$_POST["street"].'",housenumber="'.$_POST["housenumber"].'",area="'.$_POST["area"].'",rooms="'.$_POST["rooms"].'",halfrooms="'.$_POST["halfrooms"].'",plotArea="'.$_POST["plotArea"].'",propertycondition="'.$_POST["condition"].'",comfort="'.$_POST["comfort"].'",furnished="'.$_POST["furnished"].'",height="'.$_POST["height"].'",wc="'.$_POST["wc"].'",airconditioner="'.$_POST["airconditioner"].'",barrier_free="'.$_POST["barrier-free"].'",maxLevel="'.$_POST["maxLevel"].'",cellar="'.$_POST["sellHousecellar"].'",heating="'.$_POST["heating"].'",insulation="'.$_POST["sellHouseinsulation"].'",overhead="'.$_POST["overhead"].'", price="'.$_POST["price"].'",description="'.$_POST["description"].'" WHERE property_id='.$_POST['sendID'].'';
                        mysqli_query($conn, $sql);

                        echo 'ok';
                    }
                }
                else{
                    echo 'insertError';
                }
            }
        }
        if($_POST['type'] == "Telek")
        {
            if(!empty($_POST['city']) and !empty($_POST['electricity']) and !empty($_POST['water']) and !empty($_POST['gas']) and !empty($_POST['canal']))
            {
                if($_FILES['images']['name'][0] != "")
                    {
                        if(ImgChecK($_FILES) == 1)
                        {

                            $sql = 'UPDATE property SET city="'.$_POST["city"].'",street="'.$_POST["street"].'",housenumber="'.$_POST["housenumber"].'",plotArea="'.$_POST["PlotFormArea"].'",coverage="'.$_POST["coverage"].'",electricity="'.$_POST["electricity"].'",water="'.$_POST["water"].'",gas="'.$_POST["gas"].'",canal="'.$_POST["canal"].'",price="'.$_POST["price"].'",description="'.$_POST["description"].'" WHERE property_id='.$_POST['sendID'].'';
                            mysqli_query($conn, $sql);

                            $last_id = $_POST['sendID'];

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
                        echo 'ok';
                    }
                    else{
                        $sql = 'UPDATE property SET city="'.$_POST["city"].'",street="'.$_POST["street"].'",housenumber="'.$_POST["housenumber"].'",plotArea="'.$_POST["PlotFormArea"].'",coverage="'.$_POST["coverage"].'",electricity="'.$_POST["electricity"].'",water="'.$_POST["water"].'",gas="'.$_POST["gas"].'",canal="'.$_POST["canal"].'",price="'.$_POST["price"].'",description="'.$_POST["description"].'" WHERE property_id='.$_POST['sendID'].'';
                        mysqli_query($conn, $sql);

                        echo 'ok';
                    }
            }
            else{
                echo 'insertError';
            }
        }
        
    }
    else{
        echo json_encode($errorForm2);
    }
    header('../pages/myproperties.php');
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