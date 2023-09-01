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
        <h3>Hirdetésfeladás</h3>

        <div class="progress">
            <div><i class="fa-solid fa-user"></i><label>Hirdető adatai</label></div>
            <div id="progress2"><i id="progress2Icon" class="fa-solid fa-house"></i><label id="progress2Label">Ingatlan adatai</label></div>
            <div id="progress3"><i id="progress3Icon" class="fa-solid fa-image"></i><label id="progress3Label">Kép feltöltés</label></div>
        </div>

        <?php

        echo '
        <div class="forms">
            <div class="firstForm">
                <form id="form1">
                <div class="name">
                    <div>
                        <label>Vezetéknév</label>
                        <input class="disabled" disabled type="text" value="'.$_SESSION['lastname'].'">
                        <span class="errorMsg" id="lastnameErrorMSG"></span>
                    </div>
                    <div>
                        <label>Keresztnév</label>
                        <input class="disabled" disabled type="text" value="'.$_SESSION['firstname'].'">
                        <span class="errorMsg" id="firstnameErrorMSG"></span>
                    </div>
                </div>
                <div>
                    <label>Email</label>
                    <input class="disabled" disabled type="email" value="'.$_SESSION['email'].'">
                    <span class="errorMsg" id="emailErrorMSG"></span>
                </div>
                <div>
                    <label>Telefon</label>
                    <input class="disabled" disabled type="number" name="phone" value="'.$_SESSION['phone'].'">
                    <span class="errorMsg" id="phoneErrorMSG"></span>
                </div>
                <div>
                    <br>
                    <input type="hidden" name="form1_submit" value="form1_chk">
                    <button>Tovább</button>
                    <button type="button" class="mt-4 editBtn"><a href="#">Adatok módosítása</a></button>
                </div>
                </form>
            </div>

            <div class="secondForm">
                <form id="form2">
                <div>
                    <div class="rent-sell">
                        <input type="radio" id="rent" name="rent-sell-option" onchange="formChange();" value="Kiadó" checked>
                        <label class="rent" for="rent">Kiadó</label>
                        <input type="radio" id="sell" name="rent-sell-option" onchange="formChange();" value="Eladó">
                        <label class="sell" for="sell">Eladó</label>
                    </div>
                </div>
                <div>
                    <label>Típus</label>
                    <div class="search_select_box">
                    <select class="my-select w-100" name="type" id="type" onchange="formChange();">
                        <option>Lakás</option>
                        <option>Ház</option>
                        <option>Telek</option>
                    </select>
                    </div>
                </div>
                <div>
                    <label>Város</label>
                    <div class="search_select_box">
                        <select class="my-select w-100" name="city" data-live-search="true">';
                            foreach($cities as $city)
                            {
                                echo '<option>'.$city.'</option>';
                            }
                    echo '</select>
                    </div>
                </div>
                <div>
                    <label>Utca</label>
                    <input type="text" name="street">
                    <span class="errorMsg" id="streetErrorMSG"></span>
                </div>
                <div class="double">
                    <div>
                        <label>Házszám</label>
                        <input type="number" name="housenumber">
                        <span class="errorMsg" id="houseNumberErrorMSG"></span>
                    </div>
                    <div  id="areaDiv">
                        <label>Alapterület</label>
                        <input type="number" name="area">
                        <span class="errorMsg" id="areaErrorMSG"></span>
                    </div>
                </div>



                <div id="rentApartment">
                    <div class="double firstDiv">
                        <div>
                            <label>Szobák száma</label>
                            <input type="number" name="rooms">
                            <span class="errorMsg" id="roomsErrorMSG"></span>
                        </div>
                        <div>
                            <label>Félszobák száma</label>
                            <input type="number" name="halfrooms">
                            <span class="errorMsg" id="halfroomsErrorMSG"></span>
                        </div>
                    </div>
                    <div>
                        <label>Állapot</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="condition">
                                <option>Új építésű</option>
                                <option>Újszerű</option>
                                <option>Felújított</option>
                                <option>Jó állapotú</option>
                                <option>Közepes állapotú</option>
                                <option>Felújitandó</option>
                                <option>Befejezetlen</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Komfort</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="comfort">
                                <option>Luxus</option>
                                <option>Összkomfortos</option>
                                <option>Komfortos</option>
                                <option>Komfort nélküli</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Bútorzott</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="furnished">
                                <option>Igen</option>
                                <option>Nem</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Belmagasság</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="height">
                                <option>3 méternél alacsonyabb</option>
                                <option>3 méter vagy magasabb</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Fürdő és wc</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="wc">
                                <option>Külön helyiségben</option>
                                <option>Egy helyiségben</option>
                                <option>Külön és egyben is</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Légkondicionáló</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="airconditioner">
                                <option>Van</option>
                                <option>Nincs</option>
                            </select>
                        </div>
                    </div>
                    <div class="double">
                        <div>
                            <label>Állat hozható-e?</label>
                            <div class="search_select_box">
                                <select class="my-select w-100" name="animal">
                                    <option>Igen</option>
                                    <option>Nem</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label>Dohányzás</label>
                            <div class="search_select_box">
                                <select class="my-select w-100" name="smoking">
                                    <option>Megengedett</option>
                                    <option>Nem megengedett</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label>Akadálymentesített</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="barrier-free">
                                <option>Igen</option>
                                <option>Nem</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Költöhető</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="moved">
                                <option>Azonnal</option>
                                <option>1 hónapon belül</option>
                                <option>2 hónapon belül</option>
                                <option>3 hónapon belül</option>
                                <option>4 hónapon belül</option>
                                <option>5 hónapon belül</option>
                                <option>6 hónapon belül</option>
                                <option>7 hónapon belül</option>
                                <option>8 hónapon belül</option>
                                <option>9 hónapon belül</option>
                                <option>10 hónapon belül</option>
                                <option>11 hónapon belül</option>
                                <option>1 éven belül</option>
                            </select>
                        </div>
                    </div>
                    <div class="double">
                        <div>
                            <label>Emelet</label>
                            <input type="number" name="level">
                            <span class="errorMsg" id="levelErrorMSG"></span>
                        </div>
                        <div>
                            <label>Épület szintje</label>
                            <input type="number" name="maxLevel">
                            <span class="errorMsg" id="maxLevelErrorMSG"></span>
                        </div>
                    </div>
                    <div>
                        <label>Lift</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="elevator">
                                <option>Van</option>
                                <option>Nincs</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Fűtés</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="heating">
                                <option>Gáz</option>
                                <option>Házközponti</option>
                                <option>Kandalló</option>
                                <option>Padlófűtés</option>
                                <option>Kályha</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Minimum bérleti idő</label>
                        <input type="number" name="rentalPeriod">
                        <span class="errorMsg" id="rentalPeriodErrorMSG"></span>
                    </div>
                    <div class="lastDiv">
                        <label>Rezsiköltség</label>
                        <input type="number" name="overhead">
                        <span class="errorMsg" id="overheadErrorMSG"></span>
                    </div>
                </div>

                <div id="rentHouse">
                    <div class="double firstDiv">
                        <div>
                            <label>Szobák száma</label>
                            <input type="number" name="rentHouserooms">
                            <span class="errorMsg" id="rentHouseroomsErrorMSG"></span>
                        </div>
                        <div>
                            <label>Félszobák száma</label>
                            <input type="number" name="rentHousehalfrooms">
                            <span class="errorMsg" id="rentHousehalfroomsErrorMSG"></span>
                        </div>
                    </div>
                    <div>
                        <label>Telekterület</label>
                        <input type="number" name="plotArea">
                        <span class="errorMsg" id="rentHouseplotAreaErrorMSG"></span>
                    </div>
                    <div>
                        <label>Állapot</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="rentHousecondition">
                                <option>Új építésű</option>
                                <option>Újszerű</option>
                                <option>Felújított</option>
                                <option>Jó állapotú</option>
                                <option>Közepes állapotú</option>
                                <option>Felújitandó</option>
                                <option>Befejezetlen</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Komfort</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="rentHousecomfort">
                                <option>Luxus</option>
                                <option>Összkomfortos</option>
                                <option>Komfortos</option>
                                <option>Komfort nélküli</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Bútorzott</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="rentHousefurnished">
                                <option>Igen</option>
                                <option>Nem</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Belmagasság</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="rentHouseheight">
                                <option>3 méternél alacsonyabb</option>
                                <option>3 méter vagy magasabb</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Fürdő és wc</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="rentHousewc">
                                <option>Külön helyiségben</option>
                                <option>Egy helyiségben</option>
                                <option>Külön és egyben is</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Légkondicionáló</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="rentHouseairconditioner">
                                <option>Van</option>
                                <option>Nincs</option>
                            </select>
                        </div>
                    </div>
                    <div class="double">
                        <div>
                            <label>Állat hozható-e?</label>
                            <div class="search_select_box">
                                <select class="my-select w-100" name="rentHouseanimal">
                                    <option>Igen</option>
                                    <option>Nem</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label>Dohányzás</label>
                            <div class="search_select_box">
                                <select class="my-select w-100" name="rentHousesmoking">
                                    <option>Megengedett</option>
                                    <option>Nem megengedett</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label>Akadálymentesített</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="rentHousebarrier-free">
                                <option>Igen</option>
                                <option>Nem</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Költöhető</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="rentHousemoved">
                                <option>Azonnal</option>
                                <option>1 hónapon belül</option>
                                <option>2 hónapon belül</option>
                                <option>3 hónapon belül</option>
                                <option>4 hónapon belül</option>
                                <option>5 hónapon belül</option>
                                <option>6 hónapon belül</option>
                                <option>7 hónapon belül</option>
                                <option>8 hónapon belül</option>
                                <option>9 hónapon belül</option>
                                <option>10 hónapon belül</option>
                                <option>11 hónapon belül</option>
                                <option>1 éven belül</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Épület szintje</label>
                        <input type="number" name="rentHousemaxLevel">
                        <span class="errorMsg" id="rentHousemaxLevelErrorMSG"></span>
                    </div>
                    <div>
                        <label>Pince</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="rentHousecellar">
                                <option>Van</option>
                                <option>Nincs</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Fűtés</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="rentHouseheating">
                                <option>Gáz</option>
                                <option>Házközponti</option>
                                <option>Kandalló</option>
                                <option>Padlófűtés</option>
                                <option>Kályha</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Minimum bérleti idő</label>
                        <input type="number" name="rentHouserentalPeriod">
                        <span class="errorMsg" id="rentHouserentalPeriodErrorMSG"></span>
                    </div>
                    <div class="lastDiv">
                        <label>Rezsiköltség</label>
                        <input type="number" name="rentHouseoverhead">
                        <span class="errorMsg" id="rentHouseoverheadErrorMSG"></span>
                    </div>
                </div>

                <div id="rentPlot">
                    <div class="firstDiv">
                        <label>Telekterület</label>
                        <input type="number" name="PlotFormArea">
                        <span class="errorMsg" id="PlotFormAreaErrorMSG"></span>
                    </div>
                    <div>
                        <label>Beépíthetőség</label>
                        <input type="number" name="coverage">
                        <span class="errorMsg" id="coverageErrorMSG"></span>
                    </div>
                    <div>
                        <label>Villany</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="electricity">
                                <option>Telken belül</option>
                                <option>Utcában</option>
                                <option>Nincs</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Víz</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="water">
                                <option>Telken belül</option>
                                <option>Utcában</option>
                                <option>Nincs</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Gáz</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="gas">
                                <option>Telken belül</option>
                                <option>Utcában</option>
                                <option>Nincs</option>
                            </select>
                        </div>
                    </div>
                    <div class="lastDiv">
                        <label>Csatorna</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="canal">
                                <option>Telken belül</option>
                                <option>Utcában</option>
                                <option>Nincs</option>
                            </select>
                        </div>
                    </div>
                </div>

                
                <div id="sellApartment">
                    <div class="double firstDiv">
                        <div>
                            <label>Szobák száma</label>
                            <input type="number" name="sellApartmentrooms">
                            <span class="errorMsg" id="sellApartmentroomsErrorMSG"></span>
                        </div>
                        <div>
                            <label>Félszobák száma</label>
                            <input type="number" name="sellApartmenthalfrooms">
                            <span class="errorMsg" id="sellApartmenthalfroomsErrorMSG"></span>
                        </div>
                    </div>
                    <div>
                        <label>Állapot</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="sellApartmentcondition">
                                <option>Új építésű</option>
                                <option>Újszerű</option>
                                <option>Felújított</option>
                                <option>Jó állapotú</option>
                                <option>Közepes állapotú</option>
                                <option>Felújitandó</option>
                                <option>Befejezetlen</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Komfort</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="sellApartmentcomfort">
                                <option>Luxus</option>
                                <option>Összkomfortos</option>
                                <option>Komfortos</option>
                                <option>Komfort nélküli</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Bútorzott</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="sellApartmentfurnished">
                                <option>Igen</option>
                                <option>Nem</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Belmagasság</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="sellApartmentheight">
                                <option>3 méternél alacsonyabb</option>
                                <option>3 méter vagy magasabb</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Fürdő és wc</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="sellApartmentwc">
                                <option>Külön helyiségben</option>
                                <option>Egy helyiségben</option>
                                <option>Külön és egyben is</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Légkondicionáló</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="sellApartmentairconditioner">
                                <option>Van</option>
                                <option>Nincs</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Akadálymentesített</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="sellApartmentbarrier-free">
                                <option>Igen</option>
                                <option>Nem</option>
                            </select>
                        </div>
                    </div>
                    <div class="double">
                        <div>
                            <label>Emelet</label>
                            <input type="number" name="sellApartmentlevel">
                            <span class="errorMsg" id="sellApartmentlevelErrorMSG"></span>
                        </div>
                        <div>
                            <label>Épület szintje</label>
                            <input type="number" name="sellApartmentmaxLevel">
                            <span class="errorMsg" id="sellApartmentmaxLevelErrorMSG"></span>
                        </div>
                    </div>
                    <div>
                        <label>Lift</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="sellApartmentelevator">
                                <option>Van</option>
                                <option>Nincs</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Fűtés</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="sellApartmentheating">
                                <option>Gáz</option>
                                <option>Házközponti</option>
                                <option>Kandalló</option>
                                <option>Padlófűtés</option>
                                <option>Kályha</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Szigetelés</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="sellApartmentinsulation">
                                <option>Van</option>
                                <option>Nincs</option>
                            </select>
                        </div>
                    </div>
                    <div class="lastDiv">
                        <label>Rezsiköltség</label>
                        <input type="number" name="sellApartmentoverhead">
                        <span class="errorMsg" id="sellApartmentoverheadErrorMSG"></span>
                    </div>
                </div>

                <div id="sellHouse">
                    <div class="double firstDiv">
                        <div>
                            <label>Szobák száma</label>
                            <input type="number" name="sellHouserooms">
                            <span class="errorMsg" id="sellHouseroomsErrorMSG"></span>
                        </div>
                        <div>
                            <label>Félszobák száma</label>
                            <input type="number" name="sellHousehalfrooms">
                            <span class="errorMsg" id="sellHousehalfroomsErrorMSG"></span>
                        </div>
                    </div>
                    <div>
                        <label>Telekterület</label>
                        <input type="number" name="sellHouseplotArea">
                        <span class="errorMsg" id="sellHouseplotAreaErrorMSG"></span>
                    </div>
                    <div>
                        <label>Állapot</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="sellHousecondition">
                                <option>Új építésű</option>
                                <option>Újszerű</option>
                                <option>Felújított</option>
                                <option>Jó állapotú</option>
                                <option>Közepes állapotú</option>
                                <option>Felújitandó</option>
                                <option>Befejezetlen</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Komfort</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="sellHousecomfort">
                                <option>Luxus</option>
                                <option>Összkomfortos</option>
                                <option>Komfortos</option>
                                <option>Komfort nélküli</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Bútorzott</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="sellHousefurnished">
                                <option>Igen</option>
                                <option>Nem</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Belmagasság</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="sellHouseheight">
                                <option>3 méternél alacsonyabb</option>
                                <option>3 méter vagy magasabb</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Fürdő és wc</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="sellHousewc">
                                <option>Külön helyiségben</option>
                                <option>Egy helyiségben</option>
                                <option>Külön és egyben is</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Légkondicionáló</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="sellHouseairconditioner">
                                <option>Van</option>
                                <option>Nincs</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Akadálymentesített</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="sellHousebarrier-free">
                                <option>Igen</option>
                                <option>Nem</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Épület szintje</label>
                        <input type="number" name="sellHousemaxLevel">
                        <span class="errorMsg" id="sellHousemaxLevelErrorMSG"></span>
                    </div>
                    <div>
                        <label>Pince</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="sellHousecellar">
                                <option>Van</option>
                                <option>Nincs</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Fűtés</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="sellHouseheating">
                                <option>Gáz</option>
                                <option>Házközponti</option>
                                <option>Kandalló</option>
                                <option>Padlófűtés</option>
                                <option>Kályha</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Szigetelés</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" name="sellHouseinsulation">
                                <option>Van</option>
                                <option>Nincs</option>
                            </select>
                        </div>
                    </div>
                    <div class="lastDiv">
                        <label>Rezsiköltség</label>
                        <input type="number" name="sellHouseoverhead">
                        <span class="errorMsg" id="sellHouseoverheadErrorMSG"></span>
                    </div>
                </div>


                <div>
                    <label>Ár</label>
                    <input type="number" name="price">
                    <span class="errorMsg" id="priceErrorMSG"></span>
                </div>
                <div>
                    <label>Leírás</label>
                    <textarea name="description"></textarea>
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
        
       
        ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <script> $('.my-select').selectpicker({ noneResultsText: 'Nincs találat erre {0}'}); </script>
    <script src="../script/ajax-validation-insert.js"></script>


    <script src="../script/form-change.js"></script>
    
   
</body>
</html>