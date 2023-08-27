<?php
    session_start();
    include '../actions/db_config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/updateStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">    
    <link rel="stylesheet" href="../style/updateStyle.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <title>Document</title>
</head>
<body>
    <?php include 'nav.php'; ?>
    <main>
        <div class="forms">
            <h3>Hirdetés módosítása</h3>
            <div class="firstForm">

                <form id="form1">
                    <span style="text-align: center;" class="errorMsg" id="insertErrorMsg"></span>
                    <?php
                    if(!empty($_GET['id']) and isset($_SESSION['id']))
                    {
                        $sql = 'SELECT * FROM property WHERE property_id="'.$_GET['id'].'" AND user_id = "'.$_SESSION['id'].'"';
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            echo '<input type="hidden" name="sendID" value="'.$_GET['id'].'">';
                            while($row = mysqli_fetch_assoc($result)) {
                                if($row['rent_sell'] == "Kiadó")
                                {
                                    if($row['type'] == "Lakás")
                                    {
                                        echo '
                                        <div class="rent-sell">
                                            '.$row['rent_sell'].'
                                        </div>
                                        <div>
                                            <label>Típus</label>
                                            <div class="type">'.$row['type'].'</div>
                                        </div>
                                        <div>
                                            <label>Város</label>
                                            <div class="search_select_box">
                                                <select class="my-select w-100" name="city" data-live-search="true">';
                                                foreach($cities as $city)
                                                {
                                                    $selected = "";
                                                    if($row['city'] == $city)
                                                    {
                                                        $selected = "selected";
                                                    }
                                                    echo '<option '.$selected.'>'.$city.'</option>';
                                                }
                                            echo '</select>
                                            </div>
                                        </div>
                                        <input type="hidden" name="rent-sell-option" value="'.$row['rent_sell'].'">
                                        <input type="hidden" name="type" value="'.$row['type'].'">
                                        <div>
                                            <label>Utca</label>
                                            <input type="text" name="street" value="'.$row['street'].'">
                                            <span class="errorMsg" id="streetErrorMSG"></span>
                                        </div>
                                        <div class="double">
                                            <div>
                                                <label>Házszám</label>
                                                <input type="number" name="housenumber" value="'.$row['housenumber'].'">
                                                <span class="errorMsg" id="houseNumberErrorMSG"></span>
                                            </div>
                                            <div  id="areaDiv">
                                                <label>Alapterület</label>
                                                <input type="number" name="area" value="'.$row['area'].'">
                                                <span class="errorMsg" id="areaErrorMSG"></span>
                                            </div>
                                        </div>

                                        <div id="rentApartment">
                                            <div class="double firstDiv">
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
                                                        '; if($row['propertycondition'] == "Új építésű") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Új építésű</option>
                                                        '; if($row['propertycondition'] == "Újszerű") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Újszerű</option>
                                                        '; if($row['propertycondition'] == "Felújított") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Felújított</option>
                                                        '; if($row['propertycondition'] == "Jó állapotú") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Jó állapotú</option>
                                                        '; if($row['propertycondition'] == "Közepes állapotú") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Közepes állapotú</option>
                                                        '; if($row['propertycondition'] == "Felújitandó") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Felújitandó</option>
                                                        '; if($row['propertycondition'] == "Befejezetlen") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Befejezetlen</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Komfort</label>
                                                <div class="search_select_box">
                                                    <select class="my-select w-100" name="comfort">
                                                    '; if($row['comfort'] == "Luxus") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Luxus</option>
                                                    '; if($row['comfort'] == "Összkomfortos") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Összkomfortos</option>
                                                    '; if($row['comfort'] == "Komfortos") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Komfortos</option>
                                                    '; if($row['comfort'] == "Komfort nélküli") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Komfort nélküli</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Bútorzott</label>
                                                <div class="search_select_box">
                                                    <select class="my-select w-100" name="furnished">
                                                    '; if($row['furnished'] == "Igen") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Igen</option>
                                                    '; if($row['furnished'] == "Nem") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Nem</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Belmagasság</label>
                                                <div class="search_select_box">
                                                    <select class="my-select w-100" name="height">
                                                    '; if($row['height'] == "3 méternél alacsonyabb") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>3 méternél alacsonyabb</option>
                                                    '; if($row['height'] == "3 méter vagy magasabb") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>3 méter vagy magasabb</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Fürdő és wc</label>
                                                <div class="search_select_box">
                                                    <select class="my-select w-100" name="wc">
                                                    '; if($row['wc'] == "Külön helyiségben") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Külön helyiségben</option>
                                                    '; if($row['wc'] == "Egy helyiségben") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Egy helyiségben</option>
                                                    '; if($row['wc'] == "Külön és egyben is") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Külön és egyben is</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Légkondicionáló</label>
                                                <div class="search_select_box">
                                                    <select class="my-select w-100" name="airconditioner">
                                                    '; if($row['airconditioner'] == "Van") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Van</option>
                                                    '; if($row['airconditioner'] == "Nincs") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Nincs</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="double">
                                                <div>
                                                    <label>Állat hozható-e?</label>
                                                    <div class="search_select_box">
                                                        <select class="my-select w-100" name="animal">
                                                        '; if($row['animal'] == "Igen") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Igen</option>
                                                        '; if($row['animal'] == "Nem") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Nem</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div>
                                                    <label>Dohányzás</label>
                                                    <div class="search_select_box">
                                                        <select class="my-select w-100" name="smoking">
                                                        '; if($row['smoking'] == "Megengedett") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Megengedett</option>
                                                        '; if($row['smoking'] == "Nem megengedett") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Nem megengedett</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Akadálymentesített</label>
                                                <div class="search_select_box">
                                                    <select class="my-select w-100" name="barrier-free">
                                                    '; if($row['barrier_free'] == "Igen") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Igen</option>
                                                    '; if($row['barrier_free'] == "Nem") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Nem</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Költöhető</label>
                                                <div class="search_select_box">
                                                    <select class="my-select w-100" name="moved">
                                                    '; if($row['moved'] == "Azonnal") { $selected = "selected"; } else { $selected = ""; } echo'<option>Azonnal</option>
                                                    '; if($row['moved'] == "1 hónapon belül") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>1 hónapon belül</option>
                                                    '; if($row['moved'] == "2 hónapon belül") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>2 hónapon belül</option>
                                                    '; if($row['moved'] == "3 hónapon belül") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>3 hónapon belül</option>
                                                    '; if($row['moved'] == "4 hónapon belül") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>4 hónapon belül</option>
                                                    '; if($row['moved'] == "5 hónapon belül") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>5 hónapon belül</option>
                                                    '; if($row['moved'] == "6 hónapon belü") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>6 hónapon belül</option>
                                                    '; if($row['moved'] == "7 hónapon belül") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>7 hónapon belül</option>
                                                    '; if($row['moved'] == "8 hónapon belül") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>8 hónapon belül</option>
                                                    '; if($row['moved'] == "9 hónapon belül") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>9 hónapon belül</option>
                                                    '; if($row['moved'] == "10 hónapon belü") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>10 hónapon belül</option>
                                                    '; if($row['moved'] == "11 hónapon belül") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>11 hónapon belül</option>
                                                    '; if($row['moved'] == "1 éven belül") { $selected = "selected"; } else { $selected = ""; } echo'<option>1 éven belül</option>
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
                                                    '; if($row['elevator'] == "Van") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Van</option>
                                                    '; if($row['elevator'] == "Nincs") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Nincs</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Fűtés</label>
                                                <div class="search_select_box">
                                                    <select class="my-select w-100" name="heating">
                                                    '; if($row['heating'] == "Gáz") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Gáz</option>
                                                    '; if($row['heating'] == "Házközponti") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Házközponti</option>
                                                    '; if($row['heating'] == "Kandalló") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Kandalló</option>
                                                    '; if($row['heating'] == "Padlófűtés") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Padlófűtés</option>
                                                    '; if($row['heating'] == "Kályha") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Kályha</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Minimum bérleti idő</label>
                                                <input type="number" name="rentalPeriod" value="'.$row['rentalPeriod'].'">
                                                <span class="errorMsg" id="rentalPeriodErrorMSG"></span>
                                            </div>
                                            <div class="lastDiv">
                                                <label>Rezsiköltség</label>
                                                <input type="number" name="overhead" value="'.$row['overhead'].'">
                                                <span class="errorMsg" id="overheadErrorMSG"></span>
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
                                            <hr>
                                            <div>
                                                <label>Képfelöltés</label>
                                                <input type="file" name="images[]" multiple>
                                                <span class="errorMsg" id="descriptionErrorMSG"></span>
                                            </div>
                                        </div>';
                                    }
                                    if($row['type'] == "Ház")
                                    {
                                        echo '
                                        <div class="rent-sell">
                                            '.$row['rent_sell'].'
                                        </div>
                                        <div>
                                            <label>Típus</label>
                                            <div class="type">'.$row['type'].'</div>
                                        </div>
                                        <div>
                                            <label>Város</label>
                                            <div class="search_select_box">
                                                <select class="my-select w-100" name="city" data-live-search="true">';
                                                foreach($cities as $city)
                                                {
                                                    $selected = "";
                                                    if($row['city'] == $city)
                                                    {
                                                        $selected = "selected";
                                                    }
                                                    echo '<option '.$selected.'>'.$city.'</option>';
                                                }
                                            echo '</select>
                                            </div>
                                        </div>
                                        <input type="hidden" name="rent-sell-option" value="'.$row['rent_sell'].'">
                                        <input type="hidden" name="type" value="'.$row['type'].'">
                                        <div>
                                            <label>Utca</label>
                                            <input type="text" name="street" value="'.$row['street'].'">
                                            <span class="errorMsg" id="streetErrorMSG"></span>
                                        </div>
                                        <div class="double">
                                            <div>
                                                <label>Házszám</label>
                                                <input type="number" name="housenumber" value="'.$row['housenumber'].'">
                                                <span class="errorMsg" id="houseNumberErrorMSG"></span>
                                            </div>
                                            <div  id="areaDiv">
                                                <label>Alapterület</label>
                                                <input type="number" name="area" value="'.$row['area'].'">
                                                <span class="errorMsg" id="areaErrorMSG"></span>
                                            </div>
                                        </div>

                                        <div id="rentHouse">
                                            <div class="double firstDiv">
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
                                                <label>Telekterület</label>
                                                <input type="number" name="plotArea" value="'.$row['plotArea'].'">
                                                <span class="errorMsg" id="rentHouseplotAreaErrorMSG"></span>
                                            </div>
                                            <div>
                                                <label>Állapot</label>
                                                <div class="search_select_box">
                                                    <select class="my-select w-100" name="condition">
                                                        '; if($row['propertycondition'] == "Új építésű") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Új építésű</option>
                                                        '; if($row['propertycondition'] == "Újszerű") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Újszerű</option>
                                                        '; if($row['propertycondition'] == "Felújított") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Felújított</option>
                                                        '; if($row['propertycondition'] == "Jó állapotú") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Jó állapotú</option>
                                                        '; if($row['propertycondition'] == "Közepes állapotú") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Közepes állapotú</option>
                                                        '; if($row['propertycondition'] == "Felújitandó") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Felújitandó</option>
                                                        '; if($row['propertycondition'] == "Befejezetlen") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Befejezetlen</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Komfort</label>
                                                <div class="search_select_box">
                                                    <select class="my-select w-100" name="comfort">
                                                    '; if($row['comfort'] == "Luxus") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Luxus</option>
                                                    '; if($row['comfort'] == "Összkomfortos") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Összkomfortos</option>
                                                    '; if($row['comfort'] == "Komfortos") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Komfortos</option>
                                                    '; if($row['comfort'] == "Komfort nélküli") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Komfort nélküli</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Bútorzott</label>
                                                <div class="search_select_box">
                                                    <select class="my-select w-100" name="furnished">
                                                    '; if($row['furnished'] == "Igen") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Igen</option>
                                                    '; if($row['furnished'] == "Nem") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Nem</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Belmagasság</label>
                                                <div class="search_select_box">
                                                    <select class="my-select w-100" name="height">
                                                    '; if($row['height'] == "3 méternél alacsonyabb") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>3 méternél alacsonyabb</option>
                                                    '; if($row['height'] == "3 méter vagy magasabb") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>3 méter vagy magasabb</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Fürdő és wc</label>
                                                <div class="search_select_box">
                                                    <select class="my-select w-100" name="wc">
                                                    '; if($row['wc'] == "Külön helyiségben") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Külön helyiségben</option>
                                                    '; if($row['wc'] == "Egy helyiségben") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Egy helyiségben</option>
                                                    '; if($row['wc'] == "Külön és egyben is") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Külön és egyben is</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Légkondicionáló</label>
                                                <div class="search_select_box">
                                                    <select class="my-select w-100" name="airconditioner">
                                                    '; if($row['airconditioner'] == "Van") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Van</option>
                                                    '; if($row['airconditioner'] == "Nincs") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Nincs</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="double">
                                                <div>
                                                    <label>Állat hozható-e?</label>
                                                    <div class="search_select_box">
                                                        <select class="my-select w-100" name="animal">
                                                        '; if($row['animal'] == "Igen") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Igen</option>
                                                        '; if($row['animal'] == "Nem") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Nem</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div>
                                                    <label>Dohányzás</label>
                                                    <div class="search_select_box">
                                                        <select class="my-select w-100" name="smoking">
                                                        '; if($row['smoking'] == "Megengedett") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Megengedett</option>
                                                        '; if($row['smoking'] == "Nem megengedett") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Nem megengedett</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Akadálymentesített</label>
                                                <div class="search_select_box">
                                                    <select class="my-select w-100" name="barrier-free">
                                                    '; if($row['barrier_free'] == "Igen") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Igen</option>
                                                    '; if($row['barrier_free'] == "Nem") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Nem</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Költöhető</label>
                                                <div class="search_select_box">
                                                    <select class="my-select w-100" name="moved">
                                                    '; if($row['moved'] == "Azonnal") { $selected = "selected"; } else { $selected = ""; } echo'<option>Azonnal</option>
                                                    '; if($row['moved'] == "1 hónapon belül") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>1 hónapon belül</option>
                                                    '; if($row['moved'] == "2 hónapon belül") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>2 hónapon belül</option>
                                                    '; if($row['moved'] == "3 hónapon belül") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>3 hónapon belül</option>
                                                    '; if($row['moved'] == "4 hónapon belül") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>4 hónapon belül</option>
                                                    '; if($row['moved'] == "5 hónapon belül") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>5 hónapon belül</option>
                                                    '; if($row['moved'] == "6 hónapon belü") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>6 hónapon belül</option>
                                                    '; if($row['moved'] == "7 hónapon belül") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>7 hónapon belül</option>
                                                    '; if($row['moved'] == "8 hónapon belül") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>8 hónapon belül</option>
                                                    '; if($row['moved'] == "9 hónapon belül") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>9 hónapon belül</option>
                                                    '; if($row['moved'] == "10 hónapon belü") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>10 hónapon belül</option>
                                                    '; if($row['moved'] == "11 hónapon belül") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>11 hónapon belül</option>
                                                    '; if($row['moved'] == "1 éven belül") { $selected = "selected"; } else { $selected = ""; } echo'<option>1 éven belül</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Épület szintje</label>
                                                <input type="number" name="maxLevel" value="'.$row['maxLevel'].'">
                                                <span class="errorMsg" id="maxLevelErrorMSG"></span>
                                            </div>
                                            <div>
                                                <label>Pince</label>
                                                <div class="search_select_box">
                                                    <select class="my-select w-100" name="rentHousecellar">
                                                    '; if($row['cellar'] == "Van") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Van</option>
                                                    '; if($row['cellar'] == "Nincs") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Nincs</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Fűtés</label>
                                                <div class="search_select_box">
                                                    <select class="my-select w-100" name="heating">
                                                    '; if($row['heating'] == "Gáz") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Gáz</option>
                                                    '; if($row['heating'] == "Házközponti") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Házközponti</option>
                                                    '; if($row['heating'] == "Kandalló") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Kandalló</option>
                                                    '; if($row['heating'] == "Padlófűtés") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Padlófűtés</option>
                                                    '; if($row['heating'] == "Kályha") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Kályha</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Minimum bérleti idő</label>
                                                <input type="number" name="rentalPeriod" value="'.$row['rentalPeriod'].'">
                                                <span class="errorMsg" id="rentalPeriodErrorMSG"></span>
                                            </div>
                                            <div class="lastDiv">
                                                <label>Rezsiköltség</label>
                                                <input type="number" name="overhead" value="'.$row['overhead'].'">
                                                <span class="errorMsg" id="overheadErrorMSG"></span>
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
                                            <hr>
                                            <div>
                                                <label>Képfelöltés</label>
                                                <input type="file" name="images[]" multiple>
                                                <span class="errorMsg" id="descriptionErrorMSG"></span>
                                            </div>
                                        </div>';
                                    }
                                }
                                if($row['rent_sell'] == "Eladó")
                                {
                                    if($row['type'] == "Lakás")
                                    {
                                        echo '
                                        <div class="rent-sell">
                                            '.$row['rent_sell'].'
                                        </div>
                                        <div>
                                            <label>Típus</label>
                                            <div class="type">'.$row['type'].'</div>
                                        </div>
                                        <div>
                                            <label>Város</label>
                                            <div class="search_select_box">
                                                <select class="my-select w-100" name="city" data-live-search="true">';
                                                foreach($cities as $city)
                                                {
                                                    $selected = "";
                                                    if($row['city'] == $city)
                                                    {
                                                        $selected = "selected";
                                                    }
                                                    echo '<option '.$selected.'>'.$city.'</option>';
                                                }
                                            echo '</select>
                                            </div>
                                        </div>
                                        <input type="hidden" name="rent-sell-option" value="'.$row['rent_sell'].'">
                                        <input type="hidden" name="type" value="'.$row['type'].'">
                                        <div>
                                            <label>Utca</label>
                                            <input type="text" name="street" value="'.$row['street'].'">
                                            <span class="errorMsg" id="streetErrorMSG"></span>
                                        </div>
                                        <div class="double">
                                            <div>
                                                <label>Házszám</label>
                                                <input type="number" name="housenumber" value="'.$row['housenumber'].'">
                                                <span class="errorMsg" id="houseNumberErrorMSG"></span>
                                            </div>
                                            <div  id="areaDiv">
                                                <label>Alapterület</label>
                                                <input type="number" name="area" value="'.$row['area'].'">
                                                <span class="errorMsg" id="areaErrorMSG"></span>
                                            </div>
                                        </div>

                                        <div id="sellApartment">
                                            <div class="double firstDiv">
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
                                                        '; if($row['propertycondition'] == "Új építésű") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Új építésű</option>
                                                        '; if($row['propertycondition'] == "Újszerű") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Újszerű</option>
                                                        '; if($row['propertycondition'] == "Felújított") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Felújított</option>
                                                        '; if($row['propertycondition'] == "Jó állapotú") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Jó állapotú</option>
                                                        '; if($row['propertycondition'] == "Közepes állapotú") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Közepes állapotú</option>
                                                        '; if($row['propertycondition'] == "Felújitandó") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Felújitandó</option>
                                                        '; if($row['propertycondition'] == "Befejezetlen") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Befejezetlen</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Komfort</label>
                                                <div class="search_select_box">
                                                    <select class="my-select w-100" name="comfort">
                                                    '; if($row['comfort'] == "Luxus") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Luxus</option>
                                                    '; if($row['comfort'] == "Összkomfortos") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Összkomfortos</option>
                                                    '; if($row['comfort'] == "Komfortos") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Komfortos</option>
                                                    '; if($row['comfort'] == "Komfort nélküli") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Komfort nélküli</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Bútorzott</label>
                                                <div class="search_select_box">
                                                    <select class="my-select w-100" name="furnished">
                                                    '; if($row['furnished'] == "Igen") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Igen</option>
                                                    '; if($row['furnished'] == "Nem") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Nem</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Belmagasság</label>
                                                <div class="search_select_box">
                                                    <select class="my-select w-100" name="height">
                                                    '; if($row['height'] == "3 méternél alacsonyabb") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>3 méternél alacsonyabb</option>
                                                    '; if($row['height'] == "3 méter vagy magasabb") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>3 méter vagy magasabb</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Fürdő és wc</label>
                                                <div class="search_select_box">
                                                    <select class="my-select w-100" name="wc">
                                                    '; if($row['wc'] == "Külön helyiségben") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Külön helyiségben</option>
                                                    '; if($row['wc'] == "Egy helyiségben") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Egy helyiségben</option>
                                                    '; if($row['wc'] == "Külön és egyben is") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Külön és egyben is</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Légkondicionáló</label>
                                                <div class="search_select_box">
                                                    <select class="my-select w-100" name="airconditioner">
                                                    '; if($row['airconditioner'] == "Van") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Van</option>
                                                    '; if($row['airconditioner'] == "Nincs") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Nincs</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Akadálymentesített</label>
                                                <div class="search_select_box">
                                                    <select class="my-select w-100" name="barrier-free">
                                                    '; if($row['barrier_free'] == "Igen") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Igen</option>
                                                    '; if($row['barrier_free'] == "Nem") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Nem</option>
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
                                                    '; if($row['elevator'] == "Van") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Van</option>
                                                    '; if($row['elevator'] == "Nincs") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Nincs</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Fűtés</label>
                                                <div class="search_select_box">
                                                    <select class="my-select w-100" name="heating">
                                                    '; if($row['heating'] == "Gáz") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Gáz</option>
                                                    '; if($row['heating'] == "Házközponti") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Házközponti</option>
                                                    '; if($row['heating'] == "Kandalló") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Kandalló</option>
                                                    '; if($row['heating'] == "Padlófűtés") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Padlófűtés</option>
                                                    '; if($row['heating'] == "Kályha") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Kályha</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Szigetelés</label>
                                                <div class="search_select_box">
                                                    <select class="my-select w-100" name="sellApartmentinsulation">
                                                        '; if($row['insulation'] == "Van") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Van</option>
                                                        '; if($row['insulation'] == "Nincs") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Nincs</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="lastDiv">
                                                <label>Rezsiköltség</label>
                                                <input type="number" name="overhead" value="'.$row['overhead'].'">
                                                <span class="errorMsg" id="overheadErrorMSG"></span>
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
                                            <hr>
                                            <div>
                                                <label>Képfelöltés</label>
                                                <input type="file" name="images[]" multiple>
                                                <span class="errorMsg" id="descriptionErrorMSG"></span>
                                            </div>
                                        </div>';
                                    }
                                    if($row['type'] == "Ház")
                                    {
                                        echo '
                                        <div class="rent-sell">
                                            '.$row['rent_sell'].'
                                        </div>
                                        <div>
                                            <label>Típus</label>
                                            <div class="type">'.$row['type'].'</div>
                                        </div>
                                        <div>
                                            <label>Város</label>
                                            <div class="search_select_box">
                                                <select class="my-select w-100" name="city" data-live-search="true">';
                                                foreach($cities as $city)
                                                {
                                                    $selected = "";
                                                    if($row['city'] == $city)
                                                    {
                                                        $selected = "selected";
                                                    }
                                                    echo '<option '.$selected.'>'.$city.'</option>';
                                                }
                                            echo '</select>
                                            </div>
                                        </div>
                                        <input type="hidden" name="rent-sell-option" value="'.$row['rent_sell'].'">
                                        <input type="hidden" name="type" value="'.$row['type'].'">
                                        <div>
                                            <label>Utca</label>
                                            <input type="text" name="street" value="'.$row['street'].'">
                                            <span class="errorMsg" id="streetErrorMSG"></span>
                                        </div>
                                        <div class="double">
                                            <div>
                                                <label>Házszám</label>
                                                <input type="number" name="housenumber" value="'.$row['housenumber'].'">
                                                <span class="errorMsg" id="houseNumberErrorMSG"></span>
                                            </div>
                                            <div  id="areaDiv">
                                                <label>Alapterület</label>
                                                <input type="number" name="area" value="'.$row['area'].'">
                                                <span class="errorMsg" id="areaErrorMSG"></span>
                                            </div>
                                        </div>

                                        <div id="sellHouse">
                                            <div class="double firstDiv">
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
                                                <label>Telekterület</label>
                                                <input type="number" name="plotArea" value="'.$row['plotArea'].'">
                                                <span class="errorMsg" id="sellHouseplotAreaErrorMSG"></span>
                                            </div>
                                            <div>
                                                <label>Állapot</label>
                                                <div class="search_select_box">
                                                    <select class="my-select w-100" name="condition">
                                                        '; if($row['propertycondition'] == "Új építésű") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Új építésű</option>
                                                        '; if($row['propertycondition'] == "Újszerű") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Újszerű</option>
                                                        '; if($row['propertycondition'] == "Felújított") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Felújított</option>
                                                        '; if($row['propertycondition'] == "Jó állapotú") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Jó állapotú</option>
                                                        '; if($row['propertycondition'] == "Közepes állapotú") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Közepes állapotú</option>
                                                        '; if($row['propertycondition'] == "Felújitandó") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Felújitandó</option>
                                                        '; if($row['propertycondition'] == "Befejezetlen") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Befejezetlen</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Komfort</label>
                                                <div class="search_select_box">
                                                    <select class="my-select w-100" name="comfort">
                                                    '; if($row['comfort'] == "Luxus") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Luxus</option>
                                                    '; if($row['comfort'] == "Összkomfortos") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Összkomfortos</option>
                                                    '; if($row['comfort'] == "Komfortos") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Komfortos</option>
                                                    '; if($row['comfort'] == "Komfort nélküli") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Komfort nélküli</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Bútorzott</label>
                                                <div class="search_select_box">
                                                    <select class="my-select w-100" name="furnished">
                                                    '; if($row['furnished'] == "Igen") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Igen</option>
                                                    '; if($row['furnished'] == "Nem") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Nem</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Belmagasság</label>
                                                <div class="search_select_box">
                                                    <select class="my-select w-100" name="height">
                                                    '; if($row['height'] == "3 méternél alacsonyabb") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>3 méternél alacsonyabb</option>
                                                    '; if($row['height'] == "3 méter vagy magasabb") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>3 méter vagy magasabb</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Fürdő és wc</label>
                                                <div class="search_select_box">
                                                    <select class="my-select w-100" name="wc">
                                                    '; if($row['wc'] == "Külön helyiségben") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Külön helyiségben</option>
                                                    '; if($row['wc'] == "Egy helyiségben") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Egy helyiségben</option>
                                                    '; if($row['wc'] == "Külön és egyben is") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Külön és egyben is</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Légkondicionáló</label>
                                                <div class="search_select_box">
                                                    <select class="my-select w-100" name="airconditioner">
                                                    '; if($row['airconditioner'] == "Van") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Van</option>
                                                    '; if($row['airconditioner'] == "Nincs") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Nincs</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Akadálymentesített</label>
                                                <div class="search_select_box">
                                                    <select class="my-select w-100" name="barrier-free">
                                                    '; if($row['barrier_free'] == "Igen") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Igen</option>
                                                    '; if($row['barrier_free'] == "Nem") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Nem</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Épület szintje</label>
                                                <input type="number" name="maxLevel" value="'.$row['maxLevel'].'">
                                                <span class="errorMsg" id="maxLevelErrorMSG"></span>
                                            </div>
                                            <div>
                                                <label>Pince</label>
                                                <div class="search_select_box">
                                                    <select class="my-select w-100" name="sellHousecellar" value="'.$row['cellar'].'">
                                                        <option>Van</option>
                                                        <option>Nincs</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Fűtés</label>
                                                <div class="search_select_box">
                                                    <select class="my-select w-100" name="heating">
                                                    '; if($row['heating'] == "Gáz") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Gáz</option>
                                                    '; if($row['heating'] == "Házközponti") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Házközponti</option>
                                                    '; if($row['heating'] == "Kandalló") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Kandalló</option>
                                                    '; if($row['heating'] == "Padlófűtés") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Padlófűtés</option>
                                                    '; if($row['heating'] == "Kályha") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Kályha</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Szigetelés</label>
                                                <div class="search_select_box">
                                                    <select class="my-select w-100" name="sellHouseinsulation">
                                                        '; if($row['insulation'] == "Van") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Van</option>
                                                        '; if($row['insulation'] == "Nincs") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Nincs</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="lastDiv">
                                                <label>Rezsiköltség</label>
                                                <input type="number" name="overhead" value="'.$row['overhead'].'">
                                                <span class="errorMsg" id="overheadErrorMSG"></span>
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
                                            <hr>
                                            <div>
                                                <label>Képfelöltés</label>
                                                <input type="file" name="images[]" multiple>
                                                <span class="errorMsg" id="descriptionErrorMSG"></span>
                                            </div>
                                        </div>';
                                    }
                                }

                                if($row['type'] == "Telek")
                                {
                                    echo '
                                    <div class="rent-sell">
                                        '.$row['rent_sell'].'
                                    </div>
                                    <div>
                                        <label>Típus</label>
                                        <div class="type">'.$row['type'].'</div>
                                    </div>
                                    <div>
                                            <label>Város</label>
                                            <div class="search_select_box">
                                                <select class="my-select w-100" name="city" data-live-search="true">';
                                                foreach($cities as $city)
                                                {
                                                    $selected = "";
                                                    if($row['city'] == $city)
                                                    {
                                                        $selected = "selected";
                                                    }
                                                    echo '<option '.$selected.'>'.$city.'</option>';
                                                }
                                        echo '</select>
                                        </div>
                                    </div>
                                    <input type="hidden" name="rent-sell-option" value="'.$row['rent_sell'].'">
                                    <input type="hidden" name="type" value="'.$row['type'].'">
                                    <div>
                                        <label>Utca</label>
                                        <input type="text" name="street" value="'.$row['street'].'">
                                        <span class="errorMsg" id="streetErrorMSG"></span>
                                    </div>
                                    <div>
                                        <label>Házszám</label>
                                        <input type="number" name="housenumber" value="'.$row['housenumber'].'">
                                        <span class="errorMsg" id="houseNumberErrorMSG"></span>
                                    </div>

                                    <div id="rentPlot">
                                        <div class="firstDiv">
                                            <label>Telekterület</label>
                                            <input type="number" name="PlotFormArea" value="'.$row['plotArea'].'">
                                            <span class="errorMsg" id="PlotFormAreaErrorMSG"></span>
                                        </div>
                                        <div>
                                            <label>Beépíthetőség</label>
                                            <input type="number" name="coverage" value="'.$row['coverage'].'">
                                            <span class="errorMsg" id="coverageErrorMSG"></span>
                                        </div>
                                        <div>
                                            <label>Villany</label>
                                            <div class="search_select_box">
                                                <select class="my-select w-100" name="electricity">
                                                '; if($row['electricity'] == "Telken belül") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Telken belül</option>
                                                '; if($row['electricity'] == "Utcában") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Utcában</option>
                                                '; if($row['electricity'] == "Nincs") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Nincs</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div>
                                            <label>Víz</label>
                                            <div class="search_select_box">
                                                <select class="my-select w-100" name="water">
                                                '; if($row['water'] == "Telken belül") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Telken belül</option>
                                                '; if($row['water'] == "Utcában") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Utcában</option>
                                                '; if($row['water'] == "Nincs") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Nincs</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div>
                                            <label>Gáz</label>
                                            <div class="search_select_box">
                                                <select class="my-select w-100" name="gas">
                                                '; if($row['gas'] == "Telken belül") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Telken belül</option>
                                                '; if($row['gas'] == "Utcában") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Utcában</option>
                                                '; if($row['gas'] == "Nincs") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Nincs</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="lastDiv">
                                            <label>Csatorna</label>
                                            <div class="search_select_box">
                                                <select class="my-select w-100" name="canal">
                                                '; if($row['canal'] == "Telken belül") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Telken belül</option>
                                                '; if($row['canal'] == "Utcában") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Utcában</option>
                                                '; if($row['canal'] == "Nincs") { $selected = "selected"; } else { $selected = ""; } echo'<option '.$selected.'>Nincs</option>
                                                </select>
                                            </div>
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
                                        <hr>
                                        <div>
                                            <label>Képfelöltés</label>
                                            <input type="file" name="images[]" multiple>
                                            <span class="errorMsg" id="descriptionErrorMSG"></span>
                                        </div>
                                    </div>';
                                }
                            }
                        }
                        else{
                            echo '<script>window.location.href="index.php"</script>';
                        }
                    }
                    else{
                        echo '<script>window.location.href="index.php"</script>';
                    }
                    ?>
    
                    <div>
                        <br>
                        <input type="hidden" name="form2_submit" value="form2_chk">
                        <button>Mentés</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <script src="../script/ajax-validation-update.js"></script>
    <script> $('.my-select').selectpicker({ noneResultsText: 'Nincs találat erre {0}'}); </script>
</body>
</html>