<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">    <link rel="stylesheet" href="../style/addPropertyStyle.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <title>Document</title>
</head>
<body>
    <?php 
    include '../actions/db_config.php';
    include 'nav.php'; 

    ?>
    <main>
        <?php
        if(empty($_GET['edit']))
        {
            echo '<h3>Hirdetésfeladás</h3>';
        }
        else{
            echo '<h3>Hirdetés módosítása</h3>';
        }

        ?>

        
        <div class="progress">
            <div><i class="fa-solid fa-user"></i><label>Hirdető adatai</label></div>
            <div id="progress2"><i id="progress2Icon" class="fa-solid fa-house"></i><label id="progress2Label">Ingatlan adatai</label></div>
            <div id="progress3"><i id="progress3Icon" class="fa-solid fa-image"></i><label id="progress3Label">Kép feltöltés</label></div>
        </div>

        <?php

        if(empty($_GET['edit']))
        {
        echo '
        <div class="forms">
            <div class="firstForm">
                <form id="form1">
                <div class="name">
                    <div>
                        <label>Vezetéknév</label>
                        <input class="disabled" disabled type="text" value="'; if(isset($_SESSION['lastname'])) { echo $_SESSION['lastname']; } else { echo ''; } echo '">
                        <span class="errorMsg" id="lastnameErrorMSG"></span>
                    </div>
                    <div>
                        <label>Keresztnév</label>
                        <input class="disabled" disabled type="text" value="'; if(isset($_SESSION['firstname'])) { echo $_SESSION['firstname']; } else { echo ''; } echo '">
                        <span class="errorMsg" id="firstnameErrorMSG"></span>
                    </div>
                </div>
                <div>
                    <label>Email</label>
                    <input class="disabled" disabled type="email" value="'; if(isset($_SESSION['email'])) { echo $_SESSION['email']; } else { echo ''; } echo '">
                    <span class="errorMsg" id="emailErrorMSG"></span>
                </div>
                <div>
                    <label>Telefon (nem kötelező)</label>
                    <input type="number" name="phone" value="'; if(isset($_SESSION['phone'])) { echo $_SESSION['phone']; } else { echo ''; } echo '">
                    <span class="errorMsg" id="phoneErrorMSG"></span>
                </div>
                <div>
                    <br>
                    <input type="hidden" name="form1_submit" value="form1_chk">
                    <button>Tovább</button>
                </div>
                </form>
            </div>

            <div class="secondForm">
                <form id="form2">
                <div>
                    <div class="rent-sell">
                        <input type="radio" id="rent" name="rent-sell-option" value="Kiadó" '; if(isset($_SESSION['rent-sell-option']) and $_SESSION['rent-sell-option'] == 'Kiadó') { echo 'checked';} if(!isset($_SESSION['rent-sell-option'])) { echo 'checked'; } echo '>
                        <label class="rent" for="rent">Kiadó</label>
                        <input type="radio" id="sell" name="rent-sell-option" value="Eladó" '; if(isset($_SESSION['rent-sell-option']) and $_SESSION['rent-sell-option'] == 'Eladó') { echo 'checked';} echo '>
                        <label  class="sell" for="sell">Eladó</label>
                    </div>
                </div>
                <div>
                    <label>Típus</label>
                    <div class="search_select_box">
                    <select class="my-select w-100" name="type">
                        <option '; if(isset($_SESSION['type']) and $_SESSION['type'] == 'Lakás') { echo 'selected'; }; echo '>Lakás</option>
                        <option '; if(isset($_SESSION['type']) and $_SESSION['type'] == 'Ház') { echo 'selected'; }; echo '>Ház</option>
                    </select>
                    </div>
                </div>
                <div>
                    <label>Város</label>
                    <div class="search_select_box">
                        <select class="my-select w-100" name="city" data-live-search="true">
                            <option '; if(isset($_SESSION['city']) and $_SESSION['city'] == 'Alabama') { echo 'selected'; }; echo '>Alabama</option>
                            <option '; if(isset($_SESSION['city']) and $_SESSION['city'] == 'Wyoming') { echo 'selected'; }; echo '>Wyoming</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label>Utca</label>
                    <input type="text" name="street" value="'; if(isset($_SESSION['street'])) { echo $_SESSION['street']; } echo '">
                    <span class="errorMsg" id="streetErrorMSG"></span>
                </div>
                <div class="double">
                    <div>
                        <label>Házszám</label>
                        <input type="number" name="housenumber" value="'; if(isset($_SESSION['housenumber'])) { echo $_SESSION['housenumber']; }echo '">
                        <span class="errorMsg" id="houseNumberErrorMSG"></span>
                    </div>
                    <div>
                        <label>Alapterület</label>
                        <input type="number" name="area" value="'; if(isset($_SESSION['area'])) { echo $_SESSION['area']; } echo '">
                        <span class="errorMsg" id="areaErrorMSG"></span>
                    </div>
                </div>
                <div class="double">
                    <div>
                        <label>Szobák száma</label>
                        <input type="number" name="rooms" value="'; if(isset($_SESSION['rooms'])) { echo $_SESSION['rooms']; } echo'">
                        <span class="errorMsg" id="roomsErrorMSG"></span>
                    </div>
                    <div>
                        <label>Félszobák száma</label>
                        <input type="number" name="halfrooms" value="'; if(isset($_SESSION['halfrooms'])) { echo $_SESSION['halfrooms']; } echo '">
                        <span class="errorMsg" id="halfroomsErrorMSG"></span>
                    </div>
                </div>
                <div>
                    <label>Állapot</label>
                    <div class="search_select_box">
                        <select class="my-select w-100" name="condition">
                            <option '; if(isset($_SESSION['condition']) and $_SESSION['condition'] == 'Új építésű') { echo 'selected'; }; echo '>Új építésű</option>
                            <option '; if(isset($_SESSION['condition']) and $_SESSION['condition'] == 'Újszerű') { echo 'selected'; }; echo '>Újszerű</option>
                            <option '; if(isset($_SESSION['condition']) and $_SESSION['condition'] == 'Felújított') { echo 'selected'; }; echo '>Felújított</option>
                            <option '; if(isset($_SESSION['condition']) and $_SESSION['condition'] == 'Jó állapotú') { echo 'selected'; }; echo '>Jó állapotú</option>
                            <option '; if(isset($_SESSION['condition']) and $_SESSION['condition'] == 'Közepes állapotú') { echo 'selected'; }; echo '>Közepes állapotú</option>
                            <option '; if(isset($_SESSION['condition']) and $_SESSION['condition'] == 'Felújitandó') { echo 'selected'; }; echo '>Felújitandó</option>
                            <option '; if(isset($_SESSION['condition']) and $_SESSION['condition'] == 'Befejezetlen') { echo 'selected'; }; echo '>Befejezetlen</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label>Komfort</label>
                    <div class="search_select_box">
                        <select class="my-select w-100" name="comfort">
                            <option '; if(isset($_SESSION['comfort']) and $_SESSION['comfort'] == 'Luxus') { echo 'selected'; }; echo '>Luxus</option>
                            <option '; if(isset($_SESSION['comfort']) and $_SESSION['comfort'] == 'Összkomfortos') { echo 'selected'; }; echo '>Összkomfortos</option>
                            <option '; if(isset($_SESSION['comfort']) and $_SESSION['comfort'] == 'Komfortos') { echo 'selected'; }; echo '>Komfortos</option>
                            <option '; if(isset($_SESSION['comfort']) and $_SESSION['comfort'] == 'Komfort nélküli') { echo 'selected'; }; echo '>Komfort nélküli</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label>Bútorzott</label>
                    <div class="search_select_box">
                        <select class="my-select w-100" name="furnished">
                            <option '; if(isset($_SESSION['furnished']) and $_SESSION['furnished'] == 'Igen') { echo 'selected'; }; echo '>Igen</option>
                            <option '; if(isset($_SESSION['furnished']) and $_SESSION['furnished'] == 'Nem') { echo 'selected'; }; echo '>Nem</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label>Belmagasság</label>
                    <div class="search_select_box">
                        <select class="my-select w-100" name="height">
                            <option '; if(isset($_SESSION['height']) and $_SESSION['height'] == '3 méternél alacsonyabb') { echo 'selected'; }; echo '>3 méternél alacsonyabb</option>
                            <option '; if(isset($_SESSION['height']) and $_SESSION['height'] == '3 méter vagy magasabb') { echo 'selected'; }; echo '>3 méter vagy magasabb</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label>Fürdő és wc</label>
                    <div class="search_select_box">
                        <select class="my-select w-100" name="wc">
                            <option '; if(isset($_SESSION['wc']) and $_SESSION['wc'] == 'Külön helyiségben') { echo 'selected'; }; echo '>Külön helyiségben</option>
                            <option '; if(isset($_SESSION['wc']) and $_SESSION['wc'] == 'Egy helyiségben') { echo 'selected'; }; echo '>Egy helyiségben</option>
                            <option '; if(isset($_SESSION['wc']) and $_SESSION['wc'] == 'Külön és egyben is') { echo 'selected'; }; echo '>Külön és egyben is</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label>Légkondicionáló</label>
                    <div class="search_select_box">
                        <select class="my-select w-100" name="airconditioner">
                            <option '; if(isset($_SESSION['airconditioner']) and $_SESSION['airconditioner'] == 'Van') { echo 'selected'; }; echo '>Van</option>
                            <option '; if(isset($_SESSION['airconditioner']) and $_SESSION['airconditioner'] == 'Nincs') { echo 'selected'; }; echo '>Nincs</option>
                        </select>
                    </div>
                </div>
                <div class="double">
                    <div>
                        <label>Állat hozható-e?</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="animal">
                                <option '; if(isset($_SESSION['animal']) and $_SESSION['animal'] == 'Igen') { echo 'selected'; }; echo '>Igen</option>
                                <option '; if(isset($_SESSION['animal']) and $_SESSION['animal'] == 'Nem') { echo 'selected'; }; echo '>Nem</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Dohányzás</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="smoking">
                                <option '; if(isset($_SESSION['smoking']) and $_SESSION['smoking'] == 'Megengedett') { echo 'selected'; }; echo '>Megengedett</option>
                                <option '; if(isset($_SESSION['smoking']) and $_SESSION['smoking'] == 'Nem megengedett') { echo 'selected'; }; echo '>Nem megengedett</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div>
                    <label>Akadálymentesített</label>
                    <div class="search_select_box">
                        <select class="my-select w-100" name="barrier-free">
                            <option '; if(isset($_SESSION['barrier-free']) and $_SESSION['barrier-free'] == 'Igen') { echo 'selected'; }; echo '>Igen</option>
                            <option '; if(isset($_SESSION['barrier-free']) and $_SESSION['barrier-free'] == 'Nem') { echo 'selected'; }; echo '>Nem</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label>Költöhető</label>
                    <div class="search_select_box">
                        <select class="my-select w-100" name="moved">
                            <option '; if(isset($_SESSION['moved']) and $_SESSION['moved'] == 'Azonnal') { echo 'selected'; }; echo '>Azonnal</option>
                            <option '; if(isset($_SESSION['moved']) and $_SESSION['moved'] == '1 hónapon belül') { echo 'selected'; }; echo '>1 hónapon belül</option>
                            <option '; if(isset($_SESSION['moved']) and $_SESSION['moved'] == '2 hónapon belül') { echo 'selected'; }; echo '>2 hónapon belül</option>
                            <option '; if(isset($_SESSION['moved']) and $_SESSION['moved'] == '3 hónapon belül') { echo 'selected'; }; echo '>3 hónapon belül</option>
                            <option '; if(isset($_SESSION['moved']) and $_SESSION['moved'] == '4 hónapon belül') { echo 'selected'; }; echo '>4 hónapon belül</option>
                            <option '; if(isset($_SESSION['moved']) and $_SESSION['moved'] == '5 hónapon belül') { echo 'selected'; }; echo '>5 hónapon belül</option>
                            <option '; if(isset($_SESSION['moved']) and $_SESSION['moved'] == '6 hónapon belül') { echo 'selected'; }; echo '>6 hónapon belül</option>
                            <option '; if(isset($_SESSION['moved']) and $_SESSION['moved'] == '7 hónapon belül') { echo 'selected'; }; echo '>7 hónapon belül</option>
                            <option '; if(isset($_SESSION['moved']) and $_SESSION['moved'] == '8 hónapon belül') { echo 'selected'; }; echo '>8 hónapon belül</option>
                            <option '; if(isset($_SESSION['moved']) and $_SESSION['moved'] == '9 hónapon belül') { echo 'selected'; }; echo '>9 hónapon belül</option>
                            <option '; if(isset($_SESSION['moved']) and $_SESSION['moved'] == '10 hónapon belül') { echo 'selected'; }; echo '>10 hónapon belül</option>
                            <option '; if(isset($_SESSION['moved']) and $_SESSION['moved'] == '11 hónapon belül') { echo 'selected'; }; echo '>11 hónapon belül</option>
                            <option ';if(isset($_SESSION['moved']) and $_SESSION['moved'] == '1 éven belül') { echo 'selected'; }; echo '>1 éven belül</option>
                        </select>
                    </div>
                </div>
                <div class="double">
                    <div>
                        <label>Emelet</label>
                        <input type="number" name="level" value="'; if(isset($_SESSION['level'])) { echo $_SESSION['level']; } echo '">
                        <span class="errorMsg" id="levelErrorMSG"></span>
                    </div>
                    <div>
                        <label>Épület szintje</label>
                        <input type="number" name="maxLevel" value="'; if(isset($_SESSION['maxLevel'])) { echo $_SESSION['maxLevel']; } echo '">
                        <span class="errorMsg" id="maxLevelErrorMSG"></span>
                    </div>
                </div>
                <div>
                    <label>Lift</label>
                    <div class="search_select_box">
                        <select class="my-select w-100" name="elevator">
                            <option '; if(isset($_SESSION['elevator']) and $_SESSION['elevator'] == 'Van') { echo 'selected'; };  echo '>Van</option>
                            <option '; if(isset($_SESSION['elevator']) and $_SESSION['elevator'] == 'Nincs') { echo 'selected'; };  echo '>Nincs</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label>Minimum bérleti idő</label>
                    <input type="number" name="rentalPeriod" value="'; if(isset($_SESSION['rentalPeriod'])) { echo $_SESSION['rentalPeriod']; } echo '">
                    <span class="errorMsg" id="rentalPeriodErrorMSG"></span>
                </div>
                <div>
                    <label>Rezsiköltség</label>
                    <input type="number" name="overhead" value="'; if(isset($_SESSION['overhead'])) { echo $_SESSION['overhead']; } echo '">
                    <span class="errorMsg" id="overheadErrorMSG"></span>
                </div>
                <div>
                    <label>Közös költség</label>
                    <input type="number" name="common" value="'; if(isset($_SESSION['common'])) { echo $_SESSION['common']; } echo '">
                    <span class="errorMsg" id="commonErrorMSG"></span>
                </div>
                <div>
                    <label>Ár</label>
                    <input type="number" name="price" value="'; if(isset($_SESSION['price'])) { echo $_SESSION['price']; } echo '">
                    <span class="errorMsg" id="priceErrorMSG"></span>
                </div>
                <div>
                    <label>Leírás</label>
                    <textarea name="description">'; if(isset($_SESSION['description'])) { echo $_SESSION['description']; } echo '</textarea>
                    <span class="errorMsg" id="descriptionErrorMSG"></span>
                </div>
                <div>
                    <br>
                    <input type="hidden" name="form2_submit" value="form2_chk">
                    <button>Tovább</button>
                </div>
            </form>
            </div>

            <div class="thirdForm">
                <form id="form3" enctype="multipart/form-data">
                <div class="UploadIcon">
                    <i class="fa-solid fa-cloud-arrow-up"></i>
                </div>
                <span style="display:block; font-size: small; color: red; text-align: center;" id="insertErrorMsg"></span>
                <span style="display:block; font-size: small; color: red; text-align: center;" id="imageErrorMsg"></span>
                <div>
                    <p>Érvényes kép formátumok: <b>jpg, jpeg, png</b></p>
                    <p>A képek mérete nem haladhatja meg a <b>10 MB</b>-ot</p>
                </div>

                <div>
                    <input type="file" name="images[]" multiple>
                </div>
                <div>
                    <br>
                    <input type="hidden" name="form3_submit" value="form3_chk">
                    <button>Feltöltés</button>
                </div>
            </form>
            </div>
        </div>';
        }
        else{
        $user_ID = $_SESSION['id'];
        $editID = $_GET['edit'];
        $phoneNumber = "";
        $sql = "SELECT phone FROM users WHERE id = $user_ID";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $phoneNumber = $row['phone'];
            }
        }
        
        $sql = "SELECT * FROM property WHERE user_id = $user_ID AND property_id = $editID";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo '
            <div class="forms">
                <div class="firstForm">
                    <form id="form1">
                    <div class="name">
                        <div>
                            <label>Vezetéknév</label>
                            <input class="disabled" disabled type="text" value="'; if(isset($_SESSION['lastname'])) { echo $_SESSION['lastname']; } else { echo ''; } echo '">
                            <span class="errorMsg" id="lastnameErrorMSG"></span>
                        </div>
                        <div>
                            <label>Keresztnév</label>
                            <input class="disabled" disabled type="text" value="'; if(isset($_SESSION['firstname'])) { echo $_SESSION['firstname']; } else { echo ''; } echo '">
                            <span class="errorMsg" id="firstnameErrorMSG"></span>
                        </div>
                    </div>
                    <div>
                        <label>Email</label>
                        <input class="disabled" disabled type="email" value="'; if(isset($_SESSION['email'])) { echo $_SESSION['email']; } else { echo ''; } echo '">
                        <span class="errorMsg" id="emailErrorMSG"></span>
                    </div>
                    <div>
                        <label>Telefon (nem kötelező)</label>
                        <input type="number" name="phone" value="'.$phoneNumber.'">
                        <input type="hidden" name="originalphone" value="'.$phoneNumber.'">
                        <span class="errorMsg" id="phoneErrorMSG"></span>
                    </div>
                    <div>
                        <br>
                        <input type="hidden" name="form1_submit" value="form1_chk">
                        <button>Tovább</button>
                    </div>
                    </form>
                </div>

                <div class="secondForm">
                    <form id="form2">
                    <div>
                        <div class="rent-sell">
                            <input type="radio" id="rent" name="rent-sell-option" value="Kiadó" '; if(isset($_SESSION['rent-sell-option']) and $_SESSION['rent-sell-option'] == 'Kiadó') { echo 'checked';} if(!isset($_SESSION['rent-sell-option'])) { echo 'checked'; } echo '>
                            <label class="rent" for="rent">Kiadó</label>
                            <input type="radio" id="sell" name="rent-sell-option" value="Eladó" '; if(isset($_SESSION['rent-sell-option']) and $_SESSION['rent-sell-option'] == 'Eladó') { echo 'checked';} echo '>
                            <label  class="sell" for="sell">Eladó</label>
                        </div>
                    </div>
                    <div>
                        <label>Típus</label>
                        <div class="search_select_box">
                        <select class="my-select w-100" name="type">
                            <option '; if($row['type'] == 'Lakás') { echo 'selected'; }; echo '>Lakás</option>
                            <option '; if($row['type'] == 'Ház') { echo 'selected'; }; echo '>Ház</option>
                        </select>
                        </div>
                    </div>
                    <div>
                        <label>Város</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="city" data-live-search="true">
                                <option '; if($row['city'] == 'Alabama') { echo 'selected'; }; echo '>Alabama</option>
                                <option '; if($row['city'] == 'Wyoming') { echo 'selected'; }; echo '>Wyoming</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Utca</label>
                        <input type="text" name="street" value="'. $row['street'] .'">
                        <span class="errorMsg" id="streetErrorMSG"></span>
                    </div>
                    <div class="double">
                        <div>
                            <label>Házszám</label>
                            <input type="number" name="housenumber" value="'.$row['housenumber'].'">
                            <span class="errorMsg" id="houseNumberErrorMSG"></span>
                        </div>
                        <div>
                            <label>Alapterület</label>
                            <input type="number" name="area" value="'.$row['area'].'">
                            <span class="errorMsg" id="areaErrorMSG"></span>
                        </div>
                    </div>
                    <div class="double">
                        <div>
                            <label>Szobák száma</label>
                            <input type="number" name="rooms" value="'.$row['rooms'].'">
                            <span class="errorMsg" id="roomsErrorMSG"></span>
                        </div>
                        <div>
                            <label>Félszobák száma</label>
                            <input type="number" name="halfrooms" value="'.$row['halfrooms'].'">
                            <span class="errorMsg" id="halfroomsErrorMSG"></span>
                        </div>
                    </div>
                    <div>
                        <label>Állapot</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="condition">
                                <option '; if($row['propertycondition'] == 'Új építésű') { echo 'selected'; }; echo '>Új építésű</option>
                                <option '; if($row['propertycondition'] == 'Újszerű') { echo 'selected'; }; echo '>Újszerű</option>
                                <option '; if($row['propertycondition'] == 'Felújított') { echo 'selected'; }; echo '>Felújított</option>
                                <option '; if($row['propertycondition'] == 'Jó állapotú') { echo 'selected'; }; echo '>Jó állapotú</option>
                                <option '; if($row['propertycondition'] == 'Közepes állapotú') { echo 'selected'; }; echo '>Közepes állapotú</option>
                                <option '; if($row['propertycondition'] == 'Felújitandó') { echo 'selected'; }; echo '>Felújitandó</option>
                                <option '; if($row['propertycondition'] == 'Befejezetlen') { echo 'selected'; }; echo '>Befejezetlen</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Komfort</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="comfort">
                                <option '; if($row['comfort'] == 'Luxus') { echo 'selected'; }; echo '>Luxus</option>
                                <option '; if($row['comfort'] == 'Összkomfortos') { echo 'selected'; }; echo '>Összkomfortos</option>
                                <option '; if($row['comfort'] == 'Komfortos') { echo 'selected'; }; echo '>Komfortos</option>
                                <option '; if($row['comfort'] == 'Komfort nélküli') { echo 'selected'; }; echo '>Komfort nélküli</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Bútorzott</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="furnished">
                                <option '; if($row['furnished'] == 'Igen') { echo 'selected'; }; echo '>Igen</option>
                                <option '; if($row['furnished'] == 'Nem') { echo 'selected'; }; echo '>Nem</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Belmagasság</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="height">
                                <option '; if($row['height'] == '3 méternél alacsonyabb') { echo 'selected'; }; echo '>3 méternél alacsonyabb</option>
                                <option '; if($row['height'] == '3 méter vagy magasabb') { echo 'selected'; }; echo '>3 méter vagy magasabb</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Fürdő és wc</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="wc">
                                <option '; if($row['wc'] == 'Külön helyiségben') { echo 'selected'; }; echo '>Külön helyiségben</option>
                                <option '; if($row['wc'] == 'Egy helyiségben') { echo 'selected'; }; echo '>Egy helyiségben</option>
                                <option '; if($row['wc'] == 'Külön és egyben is') { echo 'selected'; }; echo '>Külön és egyben is</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Légkondicionáló</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="airconditioner">
                                <option '; if($row['airconditioner'] == 'Van') { echo 'selected'; }; echo '>Van</option>
                                <option '; if($row['airconditioner'] == 'Nincs') { echo 'selected'; }; echo '>Nincs</option>
                            </select>
                        </div>
                    </div>
                    <div class="double">
                        <div>
                            <label>Állat hozható-e?</label>
                            <div class="search_select_box">
                                <select class="my-select w-100" name="animal">
                                    <option '; if($row['animal'] == 'Igen') { echo 'selected'; }; echo '>Igen</option>
                                    <option '; if($row['animal'] == 'Nem') { echo 'selected'; }; echo '>Nem</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label>Dohányzás</label>
                            <div class="search_select_box">
                                <select class="my-select w-100" name="smoking">
                                    <option '; if($row['smoking'] == 'Megengedett') { echo 'selected'; }; echo '>Megengedett</option>
                                    <option '; if($row['smoking'] == 'Nem megengedett') { echo 'selected'; }; echo '>Nem megengedett</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label>Akadálymentesített</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="barrier-free">
                                <option '; if($row['barrier_free'] == 'Igen') { echo 'selected'; }; echo '>Igen</option>
                                <option '; if($row['barrier_free'] == 'Nem') { echo 'selected'; }; echo '>Nem</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Költöhető</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="moved">
                                <option '; if($row['moved'] == 'Azonnal') { echo 'selected'; }; echo '>Azonnal</option>
                                <option '; if($row['moved'] == '1 hónapon belül') { echo 'selected'; }; echo '>1 hónapon belül</option>
                                <option '; if($row['moved'] == '2 hónapon belül') { echo 'selected'; }; echo '>2 hónapon belül</option>
                                <option '; if($row['moved'] == '3 hónapon belül') { echo 'selected'; }; echo '>3 hónapon belül</option>
                                <option '; if($row['moved'] == '4 hónapon belül') { echo 'selected'; }; echo '>4 hónapon belül</option>
                                <option '; if($row['moved'] == '5 hónapon belül') { echo 'selected'; }; echo '>5 hónapon belül</option>
                                <option '; if($row['moved'] == '6 hónapon belül') { echo 'selected'; }; echo '>6 hónapon belül</option>
                                <option '; if($row['moved'] == '7 hónapon belül') { echo 'selected'; }; echo '>7 hónapon belül</option>
                                <option '; if($row['moved'] == '8 hónapon belül') { echo 'selected'; }; echo '>8 hónapon belül</option>
                                <option '; if($row['moved'] == '9 hónapon belül') { echo 'selected'; }; echo '>9 hónapon belül</option>
                                <option '; if($row['moved'] == '10 hónapon belül') { echo 'selected'; }; echo '>10 hónapon belül</option>
                                <option '; if($row['moved'] == '11 hónapon belül') { echo 'selected'; }; echo '>11 hónapon belül</option>
                                <option ';if($row['moved'] == '1 éven belül') { echo 'selected'; }; echo '>1 éven belül</option>
                            </select>
                        </div>
                    </div>
                    <div class="double">
                        <div>
                            <label>Emelet</label>
                            <input type="number" name="level" value="'.$row['level'].'">
                            <span class="errorMsg" id="levelErrorMSG"></span>
                        </div>
                        <div>
                            <label>Épület szintje</label>
                            <input type="number" name="maxLevel" value="'.$row['maxLevel'].'">
                            <span class="errorMsg" id="maxLevelErrorMSG"></span>
                        </div>
                    </div>
                    <div>
                        <label>Lift</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="elevator">
                                <option '; if($row['elevator'] == 'Van') { echo 'selected'; };  echo '>Van</option>
                                <option '; if($row['elevator'] == 'Nincs') { echo 'selected'; };  echo '>Nincs</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Minimum bérleti idő</label>
                        <input type="number" name="rentalPeriod" value="'.$row['rentalPeriod'].'">
                        <span class="errorMsg" id="rentalPeriodErrorMSG"></span>
                    </div>
                    <div>
                        <label>Rezsiköltség</label>
                        <input type="number" name="overhead" value="'.$row['overhead'].'">
                        <span class="errorMsg" id="overheadErrorMSG"></span>
                    </div>
                    <div>
                        <label>Közös költség</label>
                        <input type="number" name="common" value="'.$row['common'].'">
                        <span class="errorMsg" id="commonErrorMSG"></span>
                    </div>
                    <div>
                        <label>Ár</label>
                        <input type="number" name="price" value="'.$row['price'].'">
                        <span class="errorMsg" id="priceErrorMSG"></span>
                    </div>
                    <div>
                        <label>Leírás</label>
                        <textarea name="description">'.$row['description'].'</textarea>
                        <span class="errorMsg" id="descriptionErrorMSG"></span>
                    </div>
                    <div>
                        <br>
                        <input type="hidden" name="form2_submit" value="form2_chk">
                        <button>Tovább</button>
                    </div>
                </form>
                </div>

                <div class="thirdForm">
                    <form id="form3" enctype="multipart/form-data">
                    <div class="UploadIcon">
                        <i class="fa-solid fa-cloud-arrow-up"></i>
                    </div>
                    <span style="display:block; font-size: small; color: red; text-align: center;" id="insertErrorMsg"></span>
                    <span style="display:block; font-size: small; color: red; text-align: center;" id="imageErrorMsg"></span>
                    <div>
                        <p>Érvényes kép formátumok: <b>jpg, jpeg, png</b></p>
                        <p>A képek mérete nem haladhatja meg a <b>10 MB</b>-ot</p>
                    </div>

                    <div>
                        <input type="file" name="images[]" multiple>
                        <input type="hidden" name="editid" value="'.$_GET['edit'].'">
                    </div>
                    <div>
                        <br>
                        <input type="hidden" name="form3_submit" value="form3_chk">
                        <button>Módosítás</button>
                    </div>
                </form>
                </div>
            </div>';
            }
        }
        else{
           echo '<script>window.location.href = "index.php"</script>';
        }
        }
       
        ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <script> $('.my-select').selectpicker({ noneResultsText: 'Nincs találat erre {0}'}); </script>

    <?php
    if(empty($_GET['edit']))
    {
        echo '<script src="../script/ajax-validation-insert.js"></script>';
    }
    else{
        echo '<script src="../script/ajax-validation-update.js"></script>';
    }
    ?>
    
   
</body>
</html>