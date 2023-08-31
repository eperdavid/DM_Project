



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

    $sql = 'SELECT * FROM property WHERE type != "Telek"';
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
                    <button data-mdb-toggle="modal" data-mdb-target="#exampleModal"><i class="fa-solid fa-magnifying-glass fa-sm"></i> Kereső</button>
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
            <form action="" method="post">
                    <div class="row">
                        <div class="col modal-col widthSet" style="text-align: center;">
                            <label class="modal-btn rent-sell-btn rent-sell-active" for="rent">Kiadó</label>
                            <input type="radio" id="rent" name="rent-sell-option" onchange="searchChange();" value="Kiadó">
                        </div>
                        <div class="col modal-col widthSet" style="text-align: center;">
                            <label class="modal-btn rent-sell-btn" for="sell">Eladó</label>
                            <input type="radio" id="sell" name="rent-sell-option" onchange="searchChange();" value="Eladó">
                        </div>
                    </div>
                    <div>
                        <label>Város</label>
                        <div class="search_select_box">
                            <select class="my-select w-100" data-live-search="true" id="city2">
                                <option disabled selected hidden></option>
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
                            <select class="my-select w-100" id="type"  onchange="searchChange();">
                                <option>Lakás</option>
                                <option>Ház</option>
                                <option>Telek</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Ár</label><br>  
                        <div class="input-wrapper">
                            <input type="number" placeholder="min" id="pricemin2">
                            -
                            <input type="number" placeholder="max" id="pricemax2">
                        </div>
                    </div>
                    <div id="area2">
                        <label>Alapterület</label><br>  
                        <div class="input-wrapper">
                            <input type="number" placeholder="min" id="areamin2">
                            -
                            <input type="number" placeholder="max" id="areamax2">
                        </div>
                    </div>
                    <div id="plotArea">
                        <label>Telekterület</label><br>  
                        <div class="input-wrapper">
                            <input type="number" placeholder="min" id="plotareamin2">
                            -
                            <input type="number" placeholder="max" id="plotareamax2">
                        </div>
                    </div>
                    <div id="water">
                    <label>Víz</label>
                        <div class="search_select_box"> 
                            <select class="my-select w-100">
                                <option>Mindegy</option>
                                <option>Igen</option>
                                <option>Nem</option>
                            </select>
                        </div>
                    </div>
                    <div id="gas">
                    <label>Gáz</label>
                        <div class="search_select_box"> 
                            <select class="my-select w-100">
                                <option>Mindegy</option>
                                <option>Igen</option>
                                <option>Nem</option>
                            </select>
                        </div>
                    </div>
                    <div id="canal">
                    <label>Csatorna</label>
                        <div class="search_select_box"> 
                            <select class="my-select w-100">
                                <option>Mindegy</option>
                                <option>Igen</option>
                                <option>Nem</option>
                            </select>
                        </div>
                    </div>
                    <div id="electricity">
                    <label>Villany</label>
                        <div class="search_select_box"> 
                            <select class="my-select w-100">
                                <option>Mindegy</option>
                                <option>Igen</option>
                                <option>Nem</option>
                            </select>
                        </div>
                    </div>

                    <div id="coverage">
                        <label>Beépíthetőség</label><br>  
                        <div class="input-wrapper">
                            <input type="number" placeholder="min">
                            -
                            <input type="number" placeholder="max">
                        </div>
                    </div>
                    <div class="row">
                    <div id="roomDiv2">
                    <label>Szobák</label>
                        <div class="search_select_box"> 
                            <select class="my-select w-100" id="room2">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>4+</option>
                            </select>
                        </div>
                    </div>
                    <div id="furnished">
                    <label>Bútorzott</label>
                        <div class="search_select_box"> 
                            <select class="my-select w-100">
                                <option>Mindegy</option>
                                <option>Igen</option>
                                <option>Nem</option>
                            </select>
                        </div>
                    </div>
                    </div>
                    <div id="condition">
                    <label>Állapot</label>
                        <div class="search_select_box"> 
                            <select class="my-select w-100">
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
                            <select class="my-select w-100">
                                <option>Mindegy</option>
                                <option>Gáz</option>
                                <option>Házközponti</option>
                                <option>Elektromos kazán</option>
                                <option>Hűtő - fűtő klíma</option>
                                <option>Kandalló</option>
                                <option>Padlófűtés</option>
                            </select>
                        </div>
                    </div>
                    <div id="comfort">
                    <label>Komfort</label>
                        <div class="search_select_box"> 
                            <select class="my-select w-100">
                                <option>Mindegy</option>
                                <option>Luxus</option>
                                <option>Összkomfortos</option>
                                <option>Komfortos</option>
                                <option>Komfortos</option>
                                <option>Komfort nélküli</option>
                            </select>
                        </div>
                    </div>
                    <div id="height">
                    <label>Belmagasság</label>
                        <div class="search_select_box"> 
                            <select class="my-select w-100">
                                <option>Mindegy</option>
                                <option>3 méternél alacsonyabb</option>
                                <option>3 méter vagy magasabb</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div id="propertyLevel">
                        <label>Emelet</label>
                            <div class="search_select_box"> 
                                <select class="my-select w-100">
                                    <option>Mindegy</option>
                                    <option>Földszint</option>
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
                                    <option>10+</option>
                                </select>
                            </div>
                        </div>
                        <div id="elevator">
                        <label>Lift</label>
                            <div class="search_select_box"> 
                                <select class="my-select w-100">
                                    <option>Mindegy</option>
                                    <option>Van</option>
                                </select>
                            </div>
                        </div>


                        <div id="maxLevel">
                        <label>Épület szintje</label>
                            <div class="search_select_box"> 
                                <select class="my-select w-100">
                                    <option>Mindegy</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3+</option>
                                </select>
                            </div>
                        </div>
                        <div id="cellar">
                        <label>Pince</label>
                            <div class="search_select_box"> 
                                <select class="my-select w-100">
                                    <option>Mindegy</option>
                                    <option>Van</option>
                                </select>
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div id="airconditioner">
                        <label>Légkondicionáló</label>
                            <div class="search_select_box"> 
                                <select class="my-select w-100">
                                    <option>Mindegy</option>
                                    <option>Van</option>
                                </select>
                            </div>
                        </div>
                        <div id="insulation">
                        <label>Szigetelés</label>
                            <div class="search_select_box"> 
                                <select class="my-select w-100">
                                    <option>Mindegy</option>
                                    <option>Van</option>
                                </select>
                            </div>
                        </div>
                        <div id="smoking">
                        <label>Dohányzás</label>
                            <div class="search_select_box"> 
                                <select class="my-select w-100">
                                    <option>Mindegy</option>
                                    <option>Megengedett</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="animal">
                        <label>Állat hozható-e</label>
                            <div class="search_select_box"> 
                                <select class="my-select w-100">
                                    <option>Mindegy</option>
                                    <option>Igen</option>
                                </select>
                            </div>
                        </div>
                        <div id="barrier">
                        <label>Akadálymentesített</label>
                            <div class="search_select_box"> 
                                <select class="my-select w-100">
                                    <option>Mindegy</option>
                                    <option>Igen</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="wc">
                        <label>Fürdő és wc</label>
                            <div class="search_select_box"> 
                                <select class="my-select w-100">
                                    <option>Mindegy</option>
                                    <option>Külön helyiségben</option>
                                    <option>Egy helyiségben</option>
                                    <option>Külön és egyben is</option>
                                </select>
                            </div>
                        </div>
                    <div id="overhead">
                        <label>Maximum rezsiköltség</label>
                        <input type="number" class="numberInput">
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
                                if($row['type'] == "Lakás")
                                {
                                    echo '
                                    <div class="info">
                                        <div>
                                            <div class="icon">
                                                <i class="fa-solid fa-vector-square"></i>
                                                <span><b>'.$row['area'].'m<sup>2</sup></b></span>
                                            </div>
                                            <p>Alapterület</p>
                                        </div>
                                        <div>
                                            <div class="icon">
                                                <i class="fa-solid fa-door-open"></i>
                                                <span><b>'.$rooms.'</b></span>
                                            </div>
                                            <p>Szobák</p>
                                        </div>
                                        <div>
                                            <div class="icon">
                                                <i class="fa-solid fa-building"></i>
                                                <span><b>'.$row['level'].'.</b></span>
                                            </div>
                                            <p>Emelet</p>
                                        </div>
                                    </div>';
                                }
                                if($row['type'] == "Ház")
                                {
                                    echo '
                                    <div class="info">
                                        <div>
                                            <div class="icon">
                                                <i class="fa-solid fa-vector-square"></i>
                                                <span><b>'.$row['area'].'m<sup>2</sup></b></span>
                                            </div>
                                            <p>Alapterület</p>
                                        </div>
                                        <div>
                                            <div class="icon">
                                                <i class="fa-solid fa-door-open"></i>
                                                <span><b>'.$rooms.'</b></span>
                                            </div>
                                            <p>Szobák</p>
                                        </div>
                                        <div>
                                            <div class="icon">
                                                <i class="fa-solid fa-maximize"></i>
                                                <span><b>'.$row['plotArea'].'m<sup>2</sup></b></span>
                                            </div>
                                            <p>Telekterület</p>
                                        </div>
                                    </div>';
                                }
                            echo '</div></a>';

                            if($j == 11)
                            {
                                break;
                            }

                            $j++;
                        }
                    }
                    else{
                        echo 'Nincs találat';
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script> $('.my-select').selectpicker({ noneResultsText: 'Nincs találat erre {0}'}); </script>

    <script src="../script/search-form-change.js"></script>
    <script src="../script/pagination.js"></script>
</body>
</html>