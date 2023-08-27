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

            if($_SESSION['phone'] != $_POST['phone'])
            {
                $phonenum = $_POST['phone'];
                $sql = "SELECT phone FROM users WHERE phone='$phonenum'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    array_push($error, 'existphError');
                    $is_OK = false;
                }
                else{
                    $_SESSION['newphone'] = $_POST['phone'];
                }
            }
            else{
                unset($_SESSION['newphone']);
            }
        }
        else{
            array_push($error, 'phoneError');
            $is_OK = false;
        }
    }
    else{
        array_push($error, 'emptyPhone');
        $is_OK = false;
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

    if($_POST['rent-sell-option'] == "Kiadó")
    {
        if($_POST['type'] == "Lakás")
        {
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
        }
        if($_POST['type'] == "Ház")
        {
            if(empty($_POST['rentHouserooms']) or $_POST['rentHouserooms'] <= 0)
            {
                array_push($errorForm2, 'rentHouseroomsError');
                $is_OK = false;
            }
            if(!empty($_POST['rentHousehalfrooms']))
            {
                if($_POST['rentHousehalfrooms'] < 0)
                {
                    array_push($errorForm2, 'rentHousehalfroomError');
                    $is_OK = false;
                }
            }
            if(empty($_POST['plotArea']) or $_POST['plotArea'] <= 0)
            {
                array_push($errorForm2, 'rentHouseplotAreaError');
                $is_OK = false;
            }
            if(empty($_POST['rentHousemaxLevel']) or $_POST['rentHousemaxLevel'] <= 0)
            {
                array_push($errorForm2, 'rentHousemaxLevelError');
                $is_OK = false;
            }
            if(empty($_POST['rentHouserentalPeriod']) or $_POST['rentHouserentalPeriod'] <= 0)
            {
                array_push($errorForm2, 'rentHouserentalPeriodError');
                $is_OK = false;
            }
            if(empty($_POST['rentHouseoverhead']) or $_POST['rentHouseoverhead'] <= 0)
            {
                array_push($errorForm2, 'rentHouseoverheadError');
                $is_OK = false;
            }
        }
    }
    else{
        if($_POST['type'] == 'Lakás')
        {
            if(empty($_POST['sellApartmentrooms']) or $_POST['sellApartmentrooms'] <= 0)
            {
                array_push($errorForm2, 'sellApartmentroomsError');
                $is_OK = false;
            }
            if(!empty($_POST['sellApartmenthalfrooms']))
            {
                if($_POST['sellApartmenthalfrooms'] < 0)
                {
                    array_push($errorForm2, 'sellApartmenthalfroomError');
                    $is_OK = false;
                }
            }
            if(isset($_POST['sellApartmentlevel']) and isset($_POST['sellApartmentmaxLevel']) and $_POST['sellApartmentlevel'] >= 0 and $_POST['sellApartmentmaxLevel'] >= 0)
            {
                if($_POST['sellApartmentlevel'] > $_POST['sellApartmentmaxLevel'])
                {
                    array_push($errorForm2, 'sellApartmentlevelBiggerError');
                    $is_OK = false;
                }
            }
            else{
                if(!isset($_POST['sellApartmentlevel']) or $_POST['sellApartmentlevel'] < 0)
                {
                    array_push($errorForm2, 'sellApartmentlevelError');
                    $is_OK = false;
                }
                if(!isset($_POST['sellApartmentmaxLevel']) or $_POST['sellApartmentmaxLevel'] < 0)
                {
                    array_push($errorForm2, 'sellApartmentmaxLevelError');
                    $is_OK = false;
                }
            }
            if(empty($_POST['sellApartmentoverhead']) or $_POST['sellApartmentoverhead'] <= 0)
            {
                array_push($errorForm2, 'sellApartmentoverheadError');
                $is_OK = false;
            }
        }
        if($_POST['type'] == "Ház")
        {
            if(empty($_POST['sellHouserooms']) or $_POST['sellHouserooms'] <= 0)
            {
                array_push($errorForm2, 'sellHouseroomsError');
                $is_OK = false;
            }
            if(!empty($_POST['sellHousehalfrooms']))
            {
                if($_POST['sellHousehalfrooms'] < 0)
                {
                    array_push($errorForm2, 'sellHousehalfroomError');
                    $is_OK = false;
                }
            }
            if(empty($_POST['sellHouseplotArea']) or $_POST['sellHouseplotArea'] <= 0)
            {
                array_push($errorForm2, 'sellHouseplotAreaError');
                $is_OK = false;
            }
            if(empty($_POST['sellHousemaxLevel']) or $_POST['sellHousemaxLevel'] <= 0)
            {
                array_push($errorForm2, 'sellHousemaxLevelError');
                $is_OK = false;
            }
            if(empty($_POST['sellHouseoverhead']) or $_POST['sellHouseoverhead'] <= 0)
            {
                array_push($errorForm2, 'sellHouseoverheadError');
                $is_OK = false;
            }
        }
    }

    if($_POST['type'] == "Telek")
    {
        if(empty($_POST['PlotFormArea']) or $_POST['PlotFormArea'] <= 0)
        {
            array_push($errorForm2, 'plotFromAreaError');
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
    }

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
        if($_POST['type'] != "Telek")
        {
            array_push($errorForm2, 'areaError');
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

    if($is_OK == true)
    {

        $_SESSION['rent-sell-option'] = $_POST['rent-sell-option'];
        $_SESSION['type'] = $_POST['type'];
        $_SESSION['city'] = $_POST['city'];
        $_SESSION['street'] = $_POST['street'];
        $_SESSION['housenumber'] = $_POST['housenumber'];
        $_SESSION['price'] = $_POST['price'];
        $_SESSION['description'] = $_POST['description'];

        if($_POST['rent-sell-option'] == 'Kiadó')
        {
            if($_POST['type'] == 'Lakás')
            {
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
                $_SESSION['heating'] = $_POST['heating'];
            }
            if($_POST['type'] == 'Ház')
            {
                $_SESSION['area'] = $_POST['area'];
                $_SESSION['rooms'] = $_POST['rentHouserooms'];
                $_SESSION['halfrooms'] = $_POST['rentHousehalfrooms'];
                $_SESSION['plotArea'] = $_POST['plotArea'];
                $_SESSION['condition'] = $_POST['rentHousecondition'];
                $_SESSION['comfort'] = $_POST['rentHousecomfort'];
                $_SESSION['furnished'] = $_POST['rentHousefurnished'];
                $_SESSION['height'] = $_POST['rentHouseheight'];
                $_SESSION['wc'] = $_POST['rentHousewc'];
                $_SESSION['airconditioner'] = $_POST['rentHouseairconditioner'];
                $_SESSION['animal'] = $_POST['rentHouseanimal'];
                $_SESSION['smoking'] = $_POST['rentHousesmoking'];
                $_SESSION['barrier-free'] = $_POST['rentHousebarrier-free'];
                $_SESSION['moved'] = $_POST['rentHousemoved'];
                $_SESSION['maxLevel'] = $_POST['rentHousemaxLevel'];
                $_SESSION['cellar'] = $_POST['rentHousecellar'];
                $_SESSION['heating'] = $_POST['rentHouseheating'];
                $_SESSION['rentalPeriod'] = $_POST['rentHouserentalPeriod'];
                $_SESSION['overhead'] = $_POST['rentHouseoverhead'];
            }
        }
        else{
            if($_POST['type'] == 'Lakás')
            {
                $_SESSION['area'] = $_POST['area'];
                $_SESSION['rooms'] = $_POST['sellApartmentrooms'];
                $_SESSION['halfrooms'] = $_POST['sellApartmenthalfrooms'];
                $_SESSION['condition'] = $_POST['sellApartmentcondition'];
                $_SESSION['comfort'] = $_POST['sellApartmentcomfort'];
                $_SESSION['furnished'] = $_POST['sellApartmentfurnished'];
                $_SESSION['height'] = $_POST['sellApartmentheight'];
                $_SESSION['wc'] = $_POST['sellApartmentwc'];
                $_SESSION['airconditioner'] = $_POST['sellApartmentairconditioner'];
                $_SESSION['barrier-free'] = $_POST['sellApartmentbarrier-free'];
                $_SESSION['level'] = $_POST['sellApartmentlevel'];
                $_SESSION['maxLevel'] = $_POST['sellApartmentmaxLevel'];
                $_SESSION['elevator'] = $_POST['sellApartmentelevator'];
                $_SESSION['insulation'] = $_POST['sellApartmentinsulation'];
                $_SESSION['overhead'] = $_POST['sellApartmentoverhead'];
                $_SESSION['heating'] = $_POST['sellApartmentheating'];
            }
            if($_POST['type'] == 'Ház')
            {
                $_SESSION['area'] = $_POST['area'];
                $_SESSION['rooms'] = $_POST['sellHouserooms'];
                $_SESSION['halfrooms'] = $_POST['sellHousehalfrooms'];
                $_SESSION['plotArea'] = $_POST['sellHouseplotArea'];
                $_SESSION['condition'] = $_POST['sellHousecondition'];
                $_SESSION['comfort'] = $_POST['sellHousecomfort'];
                $_SESSION['furnished'] = $_POST['sellHousefurnished'];
                $_SESSION['height'] = $_POST['sellHouseheight'];
                $_SESSION['wc'] = $_POST['sellHousewc'];
                $_SESSION['airconditioner'] = $_POST['sellHouseairconditioner'];
                $_SESSION['barrier-free'] = $_POST['sellHousebarrier-free'];
                $_SESSION['maxLevel'] = $_POST['sellHousemaxLevel'];
                $_SESSION['cellar'] = $_POST['sellHousecellar'];
                $_SESSION['heating'] = $_POST['sellHouseheating'];
                $_SESSION['insulation'] = $_POST['sellHouseinsulation'];
                $_SESSION['overhead'] = $_POST['sellHouseoverhead'];
            }
        }

        if($_POST['type'] == 'Telek')
        {
            $_SESSION['PlotFormArea'] = $_POST['PlotFormArea'];
            $_SESSION['coverage'] = $_POST['coverage'];
            $_SESSION['electricity'] = $_POST['electricity'];
            $_SESSION['water'] = $_POST['water'];
            $_SESSION['gas'] = $_POST['gas'];
            $_SESSION['canal'] = $_POST['canal'];
        }

       
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

    if($_SESSION['rent-sell-option'] == "Kiadó")
    {
        if($_SESSION['type'] == "Lakás")
        {
            if(isset($_SESSION['rent-sell-option']) and isset($_SESSION['type']) and isset($_SESSION['city']) and isset($_SESSION['street'])
            and isset($_SESSION['rentalPeriod']) and isset($_SESSION['housenumber']) and isset( $_SESSION['area']) and isset($_SESSION['rooms']) and isset($_SESSION['halfrooms'])
            and isset($_SESSION['condition']) and isset($_SESSION['comfort']) and isset($_SESSION['furnished']) and isset($_SESSION['height']) and isset($_SESSION['wc'])
            and isset($_SESSION['airconditioner']) and isset($_SESSION['animal']) and isset($_SESSION['smoking']) and isset($_SESSION['barrier-free']) and isset($_SESSION['moved'])
            and isset($_SESSION['level']) and isset($_SESSION['maxLevel']) and isset($_SESSION['elevator']) and isset($_SESSION['overhead']) and isset($_SESSION['heating'])
            and isset($_SESSION['price']) and isset($_SESSION['description']))
            {

                if($_FILES['images']['name'][0] != "")
                {
                    if(ImgChecK($_FILES) == 1)
                    {

                        $sql = 'INSERT INTO property (user_id, rent_sell, type, city, street, housenumber, area, rooms, halfrooms, propertycondition, comfort, furnished, height, wc, airconditioner, animal, smoking, barrier_free, moved, level, maxLevel, elevator, rentalPeriod, overhead, heating, price, description) VALUES ("'.$_SESSION["id"].'","'.$_SESSION["rent-sell-option"].'","'.$_SESSION["type"].'","'.$_SESSION["city"].'","'.$_SESSION["street"].'","'.$_SESSION["housenumber"].'","'.$_SESSION["area"].'","'.$_SESSION["rooms"].'","'.$_SESSION["halfrooms"].'","'.$_SESSION["condition"].'","'.$_SESSION["comfort"].'","'.$_SESSION["furnished"].'","'.$_SESSION["height"].'","'.$_SESSION["wc"].'","'.$_SESSION["airconditioner"].'","'.$_SESSION["animal"].'","'.$_SESSION["smoking"].'","'.$_SESSION["barrier-free"].'","'.$_SESSION["moved"].'","'.$_SESSION["level"].'","'.$_SESSION["maxLevel"].'","'.$_SESSION["elevator"].'","'.$_SESSION["rentalPeriod"].'","'.$_SESSION["overhead"].'","'.$_SESSION["heating"].'","'.$_SESSION["price"].'","'.$_SESSION["description"].'")';
                        mysqli_query($conn, $sql);

                        $last_id = mysqli_insert_id($conn);

                        $folder = "../img/$last_id";

                        if(!file_exists($folder))
                        {
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
                    
                    $sql = 'INSERT INTO property (user_id, rent_sell, type, city, street, housenumber, area, rooms, halfrooms, propertycondition, comfort, furnished, height, wc, airconditioner, animal, smoking, barrier_free, moved, level, maxLevel, elevator, rentalPeriod, overhead, heating, price, description) VALUES ("'.$_SESSION["id"].'","'.$_SESSION["rent-sell-option"].'","'.$_SESSION["type"].'","'.$_SESSION["city"].'","'.$_SESSION["street"].'","'.$_SESSION["housenumber"].'","'.$_SESSION["area"].'","'.$_SESSION["rooms"].'","'.$_SESSION["halfrooms"].'","'.$_SESSION["condition"].'","'.$_SESSION["comfort"].'","'.$_SESSION["furnished"].'","'.$_SESSION["height"].'","'.$_SESSION["wc"].'","'.$_SESSION["airconditioner"].'","'.$_SESSION["animal"].'","'.$_SESSION["smoking"].'","'.$_SESSION["barrier-free"].'","'.$_SESSION["moved"].'","'.$_SESSION["level"].'","'.$_SESSION["maxLevel"].'","'.$_SESSION["elevator"].'","'.$_SESSION["rentalPeriod"].'","'.$_SESSION["overhead"].'","'.$_SESSION["heating"].'","'.$_SESSION["price"].'","'.$_SESSION["description"].'")';
                    mysqli_query($conn, $sql);

                    
                    if(isset($_SESSION['newphone']) and !empty($_SESSION['newphone']))
                    {
                        $sql = 'UPDATE users SET phone="'.$_SESSION["newphone"].'" WHERE id="'.$_SESSION["id"].'"';
                        mysqli_query($conn, $sql);

                        $_SESSION['phone'] = $_SESSION['newphone'];
                    } 
                }


                if($is_OK == true)
                {

                    foreach($_SESSION as $key => $val)
                    {
                        if ($key !== 'id' and $key !== 'email' and $key !== 'userlevel' and $key !== 'firstname' and $key !== 'lastname' and $key !== 'phone')
                        {
                            unset($_SESSION[$key]);
                        }
                    }

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
        if($_SESSION['type'] == "Ház")
        {
            if(isset($_SESSION['rent-sell-option']) and isset($_SESSION['type']) and isset($_SESSION['city']) and isset($_SESSION['street'])
            and isset($_SESSION['rentalPeriod']) and isset($_SESSION['housenumber']) and isset( $_SESSION['area']) and isset($_SESSION['rooms']) and isset($_SESSION['halfrooms'])
            and isset($_SESSION['condition']) and isset($_SESSION['comfort']) and isset($_SESSION['furnished']) and isset($_SESSION['height']) and isset($_SESSION['wc'])
            and isset($_SESSION['airconditioner']) and isset($_SESSION['animal']) and isset($_SESSION['smoking']) and isset($_SESSION['barrier-free']) and isset($_SESSION['moved'])
            and isset($_SESSION['maxLevel']) and isset($_SESSION['cellar']) and isset($_SESSION['overhead']) and isset($_SESSION['heating']) and isset($_SESSION['plotArea'])
            and isset($_SESSION['price']) and isset($_SESSION['description']))
            {

                if($_FILES['images']['name'][0] != "")
                {
                    if(ImgChecK($_FILES) == 1)
                    {

                        $sql = 'INSERT INTO property (user_id, rent_sell, type, city, street, housenumber, area, rooms, halfrooms, propertycondition, comfort, furnished, height, wc, airconditioner, animal, smoking, barrier_free, moved, maxLevel, rentalPeriod, overhead, heating, price, description, cellar, plotArea) VALUES ("'.$_SESSION["id"].'","'.$_SESSION["rent-sell-option"].'","'.$_SESSION["type"].'","'.$_SESSION["city"].'","'.$_SESSION["street"].'","'.$_SESSION["housenumber"].'","'.$_SESSION["area"].'","'.$_SESSION["rooms"].'","'.$_SESSION["halfrooms"].'","'.$_SESSION["condition"].'","'.$_SESSION["comfort"].'","'.$_SESSION["furnished"].'","'.$_SESSION["height"].'","'.$_SESSION["wc"].'","'.$_SESSION["airconditioner"].'","'.$_SESSION["animal"].'","'.$_SESSION["smoking"].'","'.$_SESSION["barrier-free"].'","'.$_SESSION["moved"].'","'.$_SESSION["maxLevel"].'","'.$_SESSION["rentalPeriod"].'","'.$_SESSION["overhead"].'","'.$_SESSION["heating"].'","'.$_SESSION["price"].'","'.$_SESSION["description"].'","'.$_SESSION["cellar"].'","'.$_SESSION["plotArea"].'")';
                        mysqli_query($conn, $sql);

                        $last_id = mysqli_insert_id($conn);

                        $folder = "../img/$last_id";

                        if(!file_exists($folder))
                        {
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
                    
                    $sql = 'INSERT INTO property (user_id, rent_sell, type, city, street, housenumber, area, rooms, halfrooms, propertycondition, comfort, furnished, height, wc, airconditioner, animal, smoking, barrier_free, moved, maxLevel, rentalPeriod, overhead, heating, price, description, cellar, plotArea) VALUES ("'.$_SESSION["id"].'","'.$_SESSION["rent-sell-option"].'","'.$_SESSION["type"].'","'.$_SESSION["city"].'","'.$_SESSION["street"].'","'.$_SESSION["housenumber"].'","'.$_SESSION["area"].'","'.$_SESSION["rooms"].'","'.$_SESSION["halfrooms"].'","'.$_SESSION["condition"].'","'.$_SESSION["comfort"].'","'.$_SESSION["furnished"].'","'.$_SESSION["height"].'","'.$_SESSION["wc"].'","'.$_SESSION["airconditioner"].'","'.$_SESSION["animal"].'","'.$_SESSION["smoking"].'","'.$_SESSION["barrier-free"].'","'.$_SESSION["moved"].'","'.$_SESSION["maxLevel"].'","'.$_SESSION["rentalPeriod"].'","'.$_SESSION["overhead"].'","'.$_SESSION["heating"].'","'.$_SESSION["price"].'","'.$_SESSION["description"].'","'.$_SESSION["cellar"].'","'.$_SESSION["plotArea"].'")';
                    mysqli_query($conn, $sql);

                    if(isset($_SESSION['newphone']) and !empty($_SESSION['newphone']))
                    {
                        $sql = 'UPDATE users SET phone="'.$_SESSION["newphone"].'" WHERE id="'.$_SESSION["id"].'"';
                        mysqli_query($conn, $sql);

                        $_SESSION['phone'] = $_SESSION['newphone'];
                    } 
                }


                if($is_OK == true)
                { 
                    foreach($_SESSION as $key => $val)
                    {
                        if ($key !== 'id' and $key !== 'email' and $key !== 'userlevel' and $key !== 'firstname' and $key !== 'lastname' and $key !== 'phone')
                        {
                            unset($_SESSION[$key]);
                        }
                    }

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
    }
    if($_SESSION['rent-sell-option'] == "Eladó")
    {
        if($_SESSION['type'] == "Lakás")
        {
            if(isset($_SESSION['rent-sell-option']) and isset($_SESSION['type']) and isset($_SESSION['city']) and isset($_SESSION['street'])
            and isset($_SESSION['insulation']) and isset($_SESSION['housenumber']) and isset( $_SESSION['area']) and isset($_SESSION['rooms']) and isset($_SESSION['halfrooms'])
            and isset($_SESSION['condition']) and isset($_SESSION['comfort']) and isset($_SESSION['furnished']) and isset($_SESSION['height']) and isset($_SESSION['wc'])
            and isset($_SESSION['airconditioner']) and isset($_SESSION['barrier-free']) and isset($_SESSION['level']) and isset($_SESSION['maxLevel']) 
            and isset($_SESSION['elevator']) and isset($_SESSION['overhead']) and isset($_SESSION['heating']) and isset($_SESSION['price']) and isset($_SESSION['description']))
            {

                if($_FILES['images']['name'][0] != "")
                {
                    if(ImgChecK($_FILES) == 1)
                    {

                        $sql = 'INSERT INTO property (user_id, rent_sell, type, city, street, housenumber, area, rooms, halfrooms, propertycondition, comfort, furnished, height, wc, airconditioner, barrier_free, level, maxLevel, elevator, overhead, heating, price, description, insulation) VALUES ("'.$_SESSION["id"].'","'.$_SESSION["rent-sell-option"].'","'.$_SESSION["type"].'","'.$_SESSION["city"].'","'.$_SESSION["street"].'","'.$_SESSION["housenumber"].'","'.$_SESSION["area"].'","'.$_SESSION["rooms"].'","'.$_SESSION["halfrooms"].'","'.$_SESSION["condition"].'","'.$_SESSION["comfort"].'","'.$_SESSION["furnished"].'","'.$_SESSION["height"].'","'.$_SESSION["wc"].'","'.$_SESSION["airconditioner"].'","'.$_SESSION["barrier-free"].'","'.$_SESSION["level"].'","'.$_SESSION["maxLevel"].'","'.$_SESSION["elevator"].'","'.$_SESSION["overhead"].'","'.$_SESSION["heating"].'","'.$_SESSION["price"].'","'.$_SESSION["description"].'","'.$_SESSION["insulation"].'")';
                        mysqli_query($conn, $sql);

                        $last_id = mysqli_insert_id($conn);

                        $folder = "../img/$last_id";

                        if(!file_exists($folder))
                        {
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
                    
                    $sql = 'INSERT INTO property (user_id, rent_sell, type, city, street, housenumber, area, rooms, halfrooms, propertycondition, comfort, furnished, height, wc, airconditioner, barrier_free, level, maxLevel, elevator, overhead, heating, price, description, insulation) VALUES ("'.$_SESSION["id"].'","'.$_SESSION["rent-sell-option"].'","'.$_SESSION["type"].'","'.$_SESSION["city"].'","'.$_SESSION["street"].'","'.$_SESSION["housenumber"].'","'.$_SESSION["area"].'","'.$_SESSION["rooms"].'","'.$_SESSION["halfrooms"].'","'.$_SESSION["condition"].'","'.$_SESSION["comfort"].'","'.$_SESSION["furnished"].'","'.$_SESSION["height"].'","'.$_SESSION["wc"].'","'.$_SESSION["airconditioner"].'","'.$_SESSION["barrier-free"].'","'.$_SESSION["level"].'","'.$_SESSION["maxLevel"].'","'.$_SESSION["elevator"].'","'.$_SESSION["overhead"].'","'.$_SESSION["heating"].'","'.$_SESSION["price"].'","'.$_SESSION["description"].'","'.$_SESSION["insulation"].'")';
                    mysqli_query($conn, $sql);

                    
                    if(isset($_SESSION['newphone']) and !empty($_SESSION['newphone']))
                    {
                        $sql = 'UPDATE users SET phone="'.$_SESSION["newphone"].'" WHERE id="'.$_SESSION["id"].'"';
                        mysqli_query($conn, $sql);

                        $_SESSION['phone'] = $_SESSION['newphone'];
                    } 
                }


                if($is_OK == true)
                {
                   foreach($_SESSION as $key => $val)
                    {
                        if ($key !== 'id' and $key !== 'email' and $key !== 'userlevel' and $key !== 'firstname' and $key !== 'lastname' and $key !== 'phone')
                        {
                            unset($_SESSION[$key]);
                        }
                    }

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
        if($_SESSION['type'] == "Ház")
        {
            if(isset($_SESSION['rent-sell-option']) and isset($_SESSION['type']) and isset($_SESSION['city']) and isset($_SESSION['street'])
            and isset($_SESSION['insulation']) and isset($_SESSION['housenumber']) and isset( $_SESSION['area']) and isset($_SESSION['rooms']) and isset($_SESSION['halfrooms'])
            and isset($_SESSION['condition']) and isset($_SESSION['comfort']) and isset($_SESSION['furnished']) and isset($_SESSION['height']) and isset($_SESSION['wc'])
            and isset($_SESSION['airconditioner']) and isset($_SESSION['barrier-free']) and isset($_SESSION['maxLevel']) and isset($_SESSION['cellar']) 
            and isset($_SESSION['overhead']) and isset($_SESSION['heating']) and isset($_SESSION['plotArea'])
            and isset($_SESSION['price']) and isset($_SESSION['description']))
            {

                if($_FILES['images']['name'][0] != "")
                {
                    if(ImgChecK($_FILES) == 1)
                    {

                        $sql = 'INSERT INTO property (user_id, rent_sell, type, city, street, housenumber, area, rooms, halfrooms, propertycondition, comfort, furnished, height, wc, airconditioner, barrier_free, maxLevel, overhead, heating, price, description, cellar, plotArea) VALUES ("'.$_SESSION["id"].'","'.$_SESSION["rent-sell-option"].'","'.$_SESSION["type"].'","'.$_SESSION["city"].'","'.$_SESSION["street"].'","'.$_SESSION["housenumber"].'","'.$_SESSION["area"].'","'.$_SESSION["rooms"].'","'.$_SESSION["halfrooms"].'","'.$_SESSION["condition"].'","'.$_SESSION["comfort"].'","'.$_SESSION["furnished"].'","'.$_SESSION["height"].'","'.$_SESSION["wc"].'","'.$_SESSION["airconditioner"].'","'.$_SESSION["barrier-free"].'","'.$_SESSION["maxLevel"].'","'.$_SESSION["overhead"].'","'.$_SESSION["heating"].'","'.$_SESSION["price"].'","'.$_SESSION["description"].'","'.$_SESSION["cellar"].'","'.$_SESSION["plotArea"].'")';
                        mysqli_query($conn, $sql);

                        $last_id = mysqli_insert_id($conn);

                        $folder = "../img/$last_id";

                        if(!file_exists($folder))
                        {
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
                    
                    $sql = 'INSERT INTO property (user_id, rent_sell, type, city, street, housenumber, area, rooms, halfrooms, propertycondition, comfort, furnished, height, wc, airconditioner, barrier_free, maxLevel, overhead, heating, price, description, cellar, plotArea, insulation) VALUES ("'.$_SESSION["id"].'","'.$_SESSION["rent-sell-option"].'","'.$_SESSION["type"].'","'.$_SESSION["city"].'","'.$_SESSION["street"].'","'.$_SESSION["housenumber"].'","'.$_SESSION["area"].'","'.$_SESSION["rooms"].'","'.$_SESSION["halfrooms"].'","'.$_SESSION["condition"].'","'.$_SESSION["comfort"].'","'.$_SESSION["furnished"].'","'.$_SESSION["height"].'","'.$_SESSION["wc"].'","'.$_SESSION["airconditioner"].'","'.$_SESSION["barrier-free"].'","'.$_SESSION["maxLevel"].'","'.$_SESSION["overhead"].'","'.$_SESSION["heating"].'","'.$_SESSION["price"].'","'.$_SESSION["description"].'","'.$_SESSION["cellar"].'","'.$_SESSION["plotArea"].'","'.$_SESSION["insulation"].'")';
                    mysqli_query($conn, $sql);

                    if(isset($_SESSION['newphone']) and !empty($_SESSION['newphone']))
                    {
                        if(isset($_SESSION['newphone']) and !empty($_SESSION['newphone']))
                        {
                            $sql = 'UPDATE users SET phone="'.$_SESSION["newphone"].'" WHERE id="'.$_SESSION["id"].'"';
                            mysqli_query($conn, $sql);

                            $_SESSION['phone'] = $_SESSION['newphone'];
                        } 
                    } 
                }

                if($is_OK == true)
                { 
                    foreach($_SESSION as $key => $val)
                    {
                        if ($key !== 'id' and $key !== 'email' and $key !== 'userlevel' and $key !== 'firstname' and $key !== 'lastname' and $key !== 'phone')
                        {
                            unset($_SESSION[$key]);
                        }
                    }

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
    }

    if($_SESSION['type'] == "Telek")
    {
        if(isset($_SESSION['rent-sell-option']) and isset($_SESSION['type']) and isset($_SESSION['city']) and isset($_SESSION['street'])
        and isset($_SESSION['housenumber']) and isset($_SESSION['PlotFormArea']) and isset($_SESSION['coverage']) and isset($_SESSION['electricity']) and isset($_SESSION['water'])
        and isset($_SESSION['gas']) and isset($_SESSION['canal']) and isset($_SESSION['price']) and isset($_SESSION['description']))
        {

            if($_FILES['images']['name'][0] != "")
            {
                if(ImgChecK($_FILES) == 1)
                {

                    $sql = 'INSERT INTO property (user_id, rent_sell, type, city, street, housenumber, plotArea, water, gas, canal, electricity, coverage, price, description) VALUES ("'.$_SESSION["id"].'","'.$_SESSION["rent-sell-option"].'","'.$_SESSION["type"].'","'.$_SESSION["city"].'","'.$_SESSION["street"].'","'.$_SESSION["housenumber"].'","'.$_SESSION["PlotFormArea"].'","'.$_SESSION["water"].'","'.$_SESSION["gas"].'","'.$_SESSION["canal"].'","'.$_SESSION["electricity"].'","'.$_SESSION["coverage"].'","'.$_SESSION["price"].'","'.$_SESSION["description"].'")';
                    mysqli_query($conn, $sql);

                    $last_id = mysqli_insert_id($conn);

                    $folder = "../img/$last_id";

                    if(!file_exists($folder))
                    {
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
                
                $sql = 'INSERT INTO property (user_id, rent_sell, type, city, street, housenumber, plotArea, water, gas, canal, electricity, coverage, price, description) VALUES ("'.$_SESSION["id"].'","'.$_SESSION["rent-sell-option"].'","'.$_SESSION["type"].'","'.$_SESSION["city"].'","'.$_SESSION["street"].'","'.$_SESSION["housenumber"].'","'.$_SESSION["PlotFormArea"].'","'.$_SESSION["water"].'","'.$_SESSION["gas"].'","'.$_SESSION["canal"].'","'.$_SESSION["electricity"].'","'.$_SESSION["coverage"].'","'.$_SESSION["price"].'","'.$_SESSION["description"].'")';
                mysqli_query($conn, $sql);

                if(isset($_SESSION['newphone']) and !empty($_SESSION['newphone']))
                {
                    if(isset($_SESSION['newphone']) and !empty($_SESSION['newphone']))
                    {
                        $sql = 'UPDATE users SET phone="'.$_SESSION["newphone"].'" WHERE id="'.$_SESSION["id"].'"';
                        mysqli_query($conn, $sql);

                        $_SESSION['phone'] = $_SESSION['newphone'];
                    } 
                } 
            }

            if($is_OK == true)
            { 
                foreach($_SESSION as $key => $val)
                    {
                        if ($key !== 'id' and $key !== 'email' and $key !== 'userlevel' and $key !== 'firstname' and $key !== 'lastname' and $key !== 'phone')
                        {
                            unset($_SESSION[$key]);
                        }
                    }

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
}