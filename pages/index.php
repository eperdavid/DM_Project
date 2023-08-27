<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <title>Document</title>
</head>
<body>
    <div class="overflow-set">
    <?php
    include '../actions/db_config.php';
    include 'nav.php';
    ?>
    <div class="header">
        <div class="swiper2 mySwiper2">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="../img/bg.png"></div>
                <div class="swiper-slide"><img src="../img/bg.png"></div>
                <div class="swiper-slide"><img src="../img/bg.png"></div>
                <div class="swiper-slide"><img src="../img/bg.png"></div>
            </div>
            <div class="swiper-pagination2"></div>
        </div>
    </div>
    <div class="formbg">
        <form id="form1">
                <div class="rent-sell">
                    <input  type="radio" id="rent" name="rent-sell-option" value="rent" checked>
                    <label for="rent">Kiadó</label>
                    <input type="radio" id="sell" name="rent-sell-option" value="sell">
                    <label for="sell">Eladó</label>
                </div>

                <div>
                    <label>Város</label><br>
                    <div class="search_select_box">
                        <select class="my-select" data-live-search="true">
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
                    <label>Típus</label><br>   
                    <div class="search_select_box"> 
                        <select class="my-select">
                            <option>Lakás</option>
                            <option>Kertes ház</option>
                            <option>Iker ház</option>
                            <option>Iroda</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label>Ár</label><br>  
                    <div class="input-wrapper">
                        <input type="number" placeholder="min">
                        -
                        <input type="number" placeholder="max">
                    </div>
                </div>

                <div>
                    <label>Alapterület</label><br>  
                    <div class="input-wrapper">
                        <input type="number" placeholder="min">
                        -
                        <input type="number" placeholder="max">
                    </div>
                </div>

                <div>
                    <label>Szobák</label><br>    
                    <div class="search_select_box" id="rooms">
                        <select class="my-select">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>4+</option>
                        </select>
                    </div>
                </div>
                <div>
                    <br>
                    <button class="searchBtn"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                <div class="filters"><i class="fa-solid fa-filter"></i><span data-mdb-toggle="modal" data-mdb-target="#exampleModal">Részletes kereső</span></div>
            </form>
        </div>
   
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Részletes kereső</h5>
            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="post">
                    <div class="row">
                        <div class="col modal-col widthSet" style="text-align: center;">
                            <label class="modal-btn rent-sell-btn" for="rent">Kiadó</label>
                        </div>
                        <div class="col modal-col widthSet" style="text-align: center;">
                            <label class="modal-btn rent-sell-btn" for="sell">Eladó</label>
                        </div>
                    </div>
                    <div>
                        <label>Város</label>
                        <input class="typeText" type="text">
                    </div>
                    <div>
                        <label>Típus</label>
                        <select>
                            <option>Lakás</option>
                            <option>Ház</option>
                        </select>
                    </div>
                    <div>
                        <label>Ár</label><br>  
                        <div class="input-wrapper">
                            <input type="number" placeholder="min">
                            -
                            <input type="number" placeholder="max">
                        </div>
                    </div>
                    <div>
                        <label>Alapterület</label><br>  
                        <div class="input-wrapper">
                            <input type="number" placeholder="min">
                            -
                            <input type="number" placeholder="max">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col modal-col">
                            <label>Szobák</label>
                            <select>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>4+</option>
                            </select>
                        </div>
                        <div class="col modal-col">
                        <label>Bútorzott</label>
                            <select>
                                <option>Mindegy</option>
                                <option>Igen</option>
                                <option>Nem</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Állapot</label>
                        <select>
                            <option>Új építésű</option>
                            <option>Újszerű</option>
                            <option>Felújított</option>
                            <option>Jó állapotú</option>
                            <option>Közepes állapotú</option>
                            <option>Felújitandó</option>
                            <option>Befejezetlen</option>
                        </select>
                    </div>
                    <div>
                        <label>Fűtés</label>
                        <select>
                            <option>Mindegy</option>
                            <option>Gáz</option>
                            <option>Házközponti</option>
                            <option>Elektromos kazán</option>
                            <option>Hűtő - fűtő klíma</option>
                            <option>Kandalló</option>
                            <option>Padlófűtés</option>
                        </select>
                    </div>
                    <div>
                        <label>Komfort</label>
                        <select>
                            <option>Mindegy</option>
                            <option>Luxus</option>
                            <option>Összkomfortos</option>
                            <option>Komfortos</option>
                            <option>Komfort nélküli</option>
                        </select>
                    </div>
                    <div>
                        <label>Belmagasság</label>
                        <select>
                            <option>Mindegy</option>
                            <option>3 méternél alacsonyabb</option>
                            <option>3 méter vagy magasabb</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col modal-col">
                            <label>Emelet</label>
                            <select>
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
                        <div class="col modal-col">
                        <label>Lift</label>
                            <select>
                                <option>Mindegy</option>
                                <option>Van</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col modal-col">
                            <label>Légkondicionáló</label>
                            <select>
                                <option>Mindegy</option>
                                <option>Van</option>
                            </select>
                        </div>
                        <div class="col modal-col">
                        <label>Dohányzás</label>
                            <select>
                                <option>Mindegy</option>
                                <option>Megengedett</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col modal-col">
                            <label>Fürdő és wc</label>
                            <select>
                                <option>Mindegy</option>
                                <option>Külön helyiségben</option>
                                <option>Egy helyiségben</option>
                                <option>Külön és egyben is</option>
                            </select>
                        </div>
                        <div class="col modal-col">
                        <label>Akadálymentesített</label>
                            <select>
                                <option>Mindegy</option>
                                <option>Igen</option>
                            </select>
                        </div>
                    </div>
                    <div>
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
    </div>
    <main>
        <div class="citys">
            <h3 style="text-align: center; margin-bottom: 4rem">Gyorsszűrő városok szerint</h3>
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                <?php

                for($i=0; $i<6; $i++)
                {
                    $citysql = 'SELECT city FROM property WHERE city="'.$cities[$i].'"';
                    echo '
                    <div class="swiper-slide">
                        <div class="city-card">
                            <img src="../img/cities/'.$cities[$i].'.jpg" alt="'.$cities[$i].'" style="width:100%">
                            <div class="city-container">
                              <h4><b>'.$cities[$i].'</b></h4> 
                              <p>'.mysqli_num_rows(mysqli_query($conn, $citysql)).' találat</p> 
                            </div>
                          </div>                          
                    </div>';
                }
                ?>

                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
        <div class="wrappergap">
        <div class="wrapper">
            <h3>Legfrissebb hirdetések</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            <button><a href="#">Mutass többet</a></button>
            <div class="cards">
            <?php

            $sql = "SELECT * FROM property ORDER BY property_id DESC LIMIT 6";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $rooms=$row['rooms'];
                    $image = '../img/'.$row['property_id'].'';

                    if(file_exists($image))
                    {
                        if(file_exists($image.'/1.jpg'))
                        {
                            $image = $image.'/1.jpg';
                        }
                        if(file_exists($image.'/1.jpeg'))
                        {
                            $image = $image.'/1.jpeg';
                        }
                        if(file_exists($image.'/1.png'))
                        {
                            $image = $image.'/1.png';
                        }
                    }
                    else{
                        $image = '../img/noimage.png';
                    }

                    if($row['halfrooms'] != "" and $row['halfrooms'] != 0)
                    {
                        $rooms = $rooms.'+'.$row['halfrooms'].' fél';
                    }
                    echo '
                    <div class="card">
                        <img src="'.$image.'" alt="Avatar" style="width:100%">
                        <div class="container">
                        <h4><b>'.$row['price'].' EUR</b></h4> 
                        <p>'.$row['housenumber'].'. '.$row['street'].', '.$row['city'].'</p> 
                        </div>';
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
                }
            }
            ?>
                
            </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="../script/swiper-index.js"></script>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script> $('.my-select').selectpicker({ noneResultsText: 'Nincs találat erre {0}'}); </script>
    </div>
</body>
</html>