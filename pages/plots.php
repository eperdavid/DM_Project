



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/propertiesStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet"/>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <title>Document</title>
</head>
<body>
    <?php 

    include 'nav.php'; 
    
    
    include '../actions/db_config.php';

    $rentSellSearch = $searchcity = $type = $water = $gas = $canal = $electricity = "";

    $plotAreaMin = $priceMin = $coveragemin = 0;
    $plotAreaMax = $priceMax = $coveragemax = 9999999;

    if(isset($_GET['city'])) { $searchcity = $_GET['city']; }
    if(isset($_GET['rent-sell-option'])) { $rentSellSearch = $_GET['rent-sell-option']; }
    if(isset($_GET['type'])) { $type = $_GET['type']; }
    if(isset($_GET['priceMin']) and $_GET['priceMin'] > 0) { $priceMin = $_GET['priceMin']; }
    if(isset($_GET['priceMax']) and $_GET['priceMax'] > 0) { $priceMax = $_GET['priceMax']; }
    if(isset($_GET['plotAreaMin']) and $_GET['plotAreaMin'] > 0) { $plotAreaMin = $_GET['plotAreaMin']; }
    if(isset($_GET['plotAreaMax']) and $_GET['plotAreaMax'] > 0) { $plotAreaMax = $_GET['plotAreaMax']; }
    if(isset($_GET['coveragemin']) and $_GET['coveragemin'] > 0) { $coveragemin = $_GET['coveragemin']; }
    if(isset($_GET['coveragemax']) and $_GET['coveragemax'] > 0) { $coveragemax = $_GET['coveragemax']; }
    if(isset($_GET['water'])) { $water = $_GET['water']; }
    if(isset($_GET['gas'])) { $gas = $_GET['gas']; }
    if(isset($_GET['canal'])) { $canal = $_GET['canal']; }
    if(isset($_GET['electricity'])) { $electricity = $_GET['electricity']; }


    $sql = 'SELECT * FROM property WHERE type = "Telek" AND verify = 1 AND rent_sell LIKE "%'.$rentSellSearch.'%" AND city LIKE "%'.$searchcity.'%" AND type LIKE "%'.$type.'%" 
    AND price > '.$priceMin.' AND price < '.$priceMax.' AND plotArea > '.$plotAreaMin.' AND plotArea < '.$plotAreaMax.' AND water LIKE "%'.$water.'%" AND gas LIKE "%'.$gas.'%"
    AND canal LIKE "%'.$canal.'%" AND electricity LIKE "%'.$electricity.'%" AND coverage > '.$coveragemin.' AND coverage < '.$coveragemax.'';

    $result = mysqli_query($conn, $sql);
    
    ?>
    <div class="maingap">
        <main>
            <h3>Ingatlanok</h3>
            <hr>
            <div class="flex">
                <div>
                <?php echo mysqli_num_rows($result) ?> találat
                </div>
                <div class="filter">
                    <button data-mdb-toggle="modal" data-mdb-target="#exampleModal" id="searchBtn"><i class="fa-solid fa-magnifying-glass fa-sm"></i> Kereső</button>
                </div>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Részletes kereső</h5>
            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="search-modal-body">
            <form action="plots.php" method="get" id="form2">
                    <div class="row">
                        <div class="col modal-col widthSet" style="text-align: center;">
                            <label class="modal-btn rent-sell-btn rent-sell-active" for="rent" id="rentBtn">Kiadó</label>
                            <input type="radio" id="rent" name="rent-sell-option" onchange="searchChange();" value="Kiadó" checked>
                        </div>
                        <div class="col modal-col widthSet" style="text-align: center;">
                            <label class="modal-btn rent-sell-btn" for="sell" id="sellBtn">Eladó</label>
                            <input type="radio" id="sell" name="rent-sell-option" onchange="searchChange();" value="Eladó">
                        </div>
                    </div>
                    <div>
                        <label>Város</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" data-live-search="true" id="city2" name="city">
                                <option value="">Mindegy</option>
                                <?php
                                foreach($cities as $city)
                                {
                                    echo '<option>'.$city.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div>
                    <label>Típus</label>
                        <div class="search_select_box"> 
                            <select class="my-select w-100" id="type"  onchange="searchChange();" name="type">
                                <option>Lakás</option>
                                <option>Ház</option>
                                <option selected>Telek</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Ár</label><br>  
                        <div class="input-wrapper">
                            <input type="number" placeholder="min" id="pricemin2" name="priceMin">
                            -
                            <input type="number" placeholder="max" id="pricemax2" name="priceMax">
                        </div>
                    </div>
                    <div id="area2">
                        <label>Alapterület</label><br>  
                        <div class="input-wrapper">
                            <input type="number" placeholder="min" id="areamin2" name="areamin">
                            -
                            <input type="number" placeholder="max" id="areamax2" name="areamax">
                        </div>
                    </div>
                    <div id="plotArea">
                        <label>Telekterület</label><br>  
                        <div class="input-wrapper">
                            <input type="number" placeholder="min" id="plotareamin2" name="plotAreaMin">
                            -
                            <input type="number" placeholder="max" id="plotareamax2" name="plotAreaMax">
                        </div>
                    </div>
                    <div id="water">
                    <label>Víz</label>
                        <div class="search_select_box"> 
                            <select class="my-select w-100" name="water">
                                <option value="">Mindegy</option>
                                <option>Telken belül</option>
                                <option>Utcában</option>
                            </select>
                        </div>
                    </div>
                    <div id="gas">
                    <label>Gáz</label>
                        <div class="search_select_box"> 
                            <select class="my-select w-100" name="gas">
                                <option value="">Mindegy</option>
                                <option>Telken belül</option>
                                <option>Utcában</option>
                            </select>
                        </div>
                    </div>
                    <div id="canal">
                    <label>Csatorna</label>
                        <div class="search_select_box"> 
                            <select class="my-select w-100" name="canal">
                                <option value="">Mindegy</option>
                                <option>Telken belül</option>
                                <option>Utcában</option>
                            </select>
                        </div>
                    </div>
                    <div id="electricity">
                    <label>Villany</label>
                        <div class="search_select_box"> 
                            <select class="my-select w-100" name="electricity">
                                <option value="">Mindegy</option>
                                <option>Telken belül</option>
                                <option>Utcában</option>
                            </select>
                        </div>
                    </div>

                    <div id="coverage">
                        <label>Beépíthetőség</label><br>  
                        <div class="input-wrapper">
                            <input type="number" placeholder="min" name="coveragemin">
                            -
                            <input type="number" placeholder="max" name="coveragemax">
                        </div>
                    </div>
                    <div class="row">
                    <div id="roomDiv2">
                    <label>Szobák</label>
                        <div class="search_select_box"> 
                            <select class="my-select w-100" id="room2" name="room">
                                <option value="5">Mindegy</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                    </div>
                    <div id="furnished">
                    <label>Bútorzott</label>
                        <div class="search_select_box"> 
                            <select class="my-select w-100" name="furnished">
                                <option value="">Mindegy</option>
                                <option>Igen</option>
                                <option>Nem</option>
                            </select>
                        </div>
                    </div>
                    </div>
                    <div id="condition">
                    <label>Állapot</label>
                        <div class="search_select_box"> 
                            <select class="my-select w-100" name="condition">
                                <option value="">Mindegy</option>
                                <option>Új építésű</option>
                                <option>Újszerű</option>
                                <option>Felújíitott</option>
                                <option>Jó állapotú</option>
                                <option>Közepes állapotú</option>
                                <option>Felújitandó</option>
                                <option>Befejezetlen</option>
                            </select>
                        </div>
                    </div>
                    <div id="heating">
                    <label>Fűtés</label>
                        <div class="search_select_box"> 
                            <select class="my-select w-100" name="heating">
                                <option value="">Mindegy</option>
                                <option>Gáz</option>
                                <option>Házközponti</option>
                                <option>Kandalló</option>
                                <option>Padlófűtés</option>
                                <option>Kályha</option>
                            </select>
                        </div>
                    </div>
                    <div id="comfort">
                    <label>Komfort</label>
                        <div class="search_select_box"> 
                            <select class="my-select w-100" name="comfort">
                                <option value="">Mindegy</option>
                                <option>Luxus</option>
                                <option>Összkomfortos</option>
                                <option>Komfortos</option>
                                <option>Komfort nélküli</option>
                            </select>
                        </div>
                    </div>
                    <div id="height">
                    <label>Belmagasság</label>
                        <div class="search_select_box"> 
                            <select class="my-select w-100" name="height">
                                <option value="">Mindegy</option>
                                <option>3 méternél alacsonyabb</option>
                                <option>3 méter vagy magasabb</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div id="propertyLevel">
                        <label>Emelet</label>
                            <div class="search_select_box"> 
                                <select class="my-select w-100" name="propertyLevel">
                                    <option value="">Mindegy</option>
                                    <option value="0">Földszint</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </div>
                        </div>
                        <div id="elevator">
                        <label>Lift</label>
                            <div class="search_select_box"> 
                                <select class="my-select w-100" name="elevator">
                                    <option value="">Mindegy</option>
                                    <option>Van</option>
                                </select>
                            </div>
                        </div>


                        <div id="maxLevel">
                        <label>Épület szintje</label>
                            <div class="search_select_box"> 
                                <select class="my-select w-100" name="maxLevel">
                                    <option value="">Mindegy</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div id="cellar">
                        <label>Pince</label>
                            <div class="search_select_box"> 
                                <select class="my-select w-100" name="cellar">
                                    <option value="">Mindegy</option>
                                    <option>Van</option>
                                </select>
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div id="airconditioner">
                        <label>Légkondicionáló</label>
                            <div class="search_select_box"> 
                                <select class="my-select w-100" name="airconditioner">
                                    <option value="">Mindegy</option>
                                    <option>Van</option>
                                </select>
                            </div>
                        </div>
                        <div id="insulation">
                        <label>Szigetelés</label>
                            <div class="search_select_box"> 
                                <select class="my-select w-100" name="insulation">
                                    <option value="">Mindegy</option>
                                    <option>Van</option>
                                </select>
                            </div>
                        </div>
                        <div id="smoking">
                        <label>Dohányzás</label>
                            <div class="search_select_box"> 
                                <select class="my-select w-100" name="smoking">
                                    <option value="">Mindegy</option>
                                    <option>Megengedett</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="animal">
                        <label>Állat hozható-e</label>
                            <div class="search_select_box"> 
                                <select class="my-select w-100" name="animal">
                                    <option value="">Mindegy</option>
                                    <option>Igen</option>
                                </select>
                            </div>
                        </div>
                        <div id="barrier">
                        <label>Akadálymentesített</label>
                            <div class="search_select_box"> 
                                <select class="my-select w-100" name="barrier">
                                    <option value="">Mindegy</option>
                                    <option>Igen</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="wc">
                        <label>Fürdő és wc</label>
                            <div class="search_select_box"> 
                                <select class="my-select w-100" name="wc">
                                    <option value="">Mindegy</option>
                                    <option>Külön helyiségben</option>
                                    <option>Egy helyiségben</option>
                                    <option>Külön és egyben is</option>
                                </select>
                            </div>
                        </div>
                    <div id="overhead">
                        <label>Maximum rezsiköltség</label>
                        <input type="number" class="numberInput" name="overhead">
                    </div>
                </div>
                <div class="modal-footer">
                    <div>
                        <button>Keresés</button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>

            <div>
                <?php
                if(mysqli_num_rows($result) > 0)
                {
                    $number = ceil(mysqli_num_rows($result)/12);
                }
                else{
                    $number = 1;
                }
                

                for($i = 1; $i <= $number; $i++)
                {
                    echo '<div id="page'.$i.'" class="cards pages">';
                    if (mysqli_num_rows($result) > 0)
                    {
                        $j = 0;
                        while($row = mysqli_fetch_assoc($result)) {

                            if(file_exists('../img/'.$row['property_id']))
                            {
                                $images = array_diff(scandir('../img/'.$row['property_id'].''), array('..', '.'));
                                $image = $row['property_id'].'/'.$images[2];
                            }
                            else{
                                $image = "noimage.png";
                            }

                            echo '<a href="property.php?id='.$row['property_id'].'">
                            <div class="card">
                                <img src="../img/'.$image.'" alt="Avatar" style="width:100%">
                                <div class="property_type">
                                '.$row['rent_sell'].' '.strtolower($row['type']).'
                                </div>
                                <div class="container">
                                <h4><b>'.$row['price'].' EUR</b></h4> 
                                <p>'.$row['housenumber'].'. '.$row['street'].', '.$row['city'].'</p> 
                                </div>';
                                if($row['halfrooms'] != "" and $row['halfrooms'] != 0)
                                {
                                    $rooms = $row['rooms'].'+'.$row['halfrooms'].' fél';
                                }
                                else{
                                    $rooms = $row['rooms'];
                                }
                                if($row['type'] == "Telek")
                                {
                                echo '
                                <div class="info">
                                    <div>
                                        <div class="icon">
                                            <i class="fa-solid fa-maximize"></i>
                                            <span><b>'.$row['plotArea'].'m<sup>2</sup></b></span>
                                        </div>
                                        <p>Telekterület</p>
                                    </div>
                                    <div>
                                        <div class="icon">
                                            <i class="fa-solid fa-door-open"></i>
                                            <span><b>'.$row['coverage'].'%</b></span>
                                        </div>
                                        <p>Beépíthetőség</p>
                                    </div>
                                </div>';
                                }
                            echo '</div>';

                            if($j == 11)
                            {
                                break;
                            }

                            $j++;
                        }
                    }
                    else{
                        echo'
                        <style>
                        #page1{
                            display: block;
                        }
                        </style>';
                        echo '<p style="text-align: center; margin: 15rem 0;">Nincs találat</p>';
                    }
                    echo '</div>';
                }
                ?>



            </div>
            <nav aria-label="...">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled" id="prev-btn">
                        <a class="page-link" data-id="prev" href="#">Előző</a>
                    </li>
                    <?php

                    
                    $active = "active";
                    $largestNumber = "";
                    for($i=1; $i <= $number; $i++)
                    {
                        if($i == $number)
                        {
                            $largestNumber = 'id="largest"';
                        }
                        
                        echo '<li class="page-item '.$active.'" id="'.$i.'" data-id="'.$i.'"><a class="page-link" href="#" data-id="'.$i.'" '.$largestNumber.'>'.$i.'</a></li>';
                        $active = "";
                    }

                    if($number == 1)
                    {
                        echo '
                        <li class="page-item disabled" id="next-btn">
                            <a class="page-link" data-id="next" href="#">Következő</a>
                        </li>';
                    }
                    else{
                        echo '
                        <li class="page-item" id="next-btn">
                            <a class="page-link" data-id="next" href="#">Következő</a>
                        </li>';
                    }
                    ?>
                    
                </ul>
            </nav>
    </main>
    </div>
    <?php include 'footer.html'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script> $('.my-select').selectpicker({ noneResultsText: 'Nincs találat erre {0}'}); </script>

    <script src="../script/search-form-change.js"></script>
    <script src="../script/pagination.js"></script>

    <script>
        $( document ).ready(function() {
            searchChange();
        });
    </script>
</body>
</html>