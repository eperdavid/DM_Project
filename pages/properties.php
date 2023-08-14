<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/propertiesStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet"/>
    <title>Document</title>
</head>
<body>
    <?php include 'nav.php'; ?>
    <div class="maingap">
        <main>
            <h3>Ingatlanok</h3>
            <hr>
            <div class="flex">
                <div>
                    1234 találat
                </div>
                <div class="filter">
                    <button data-mdb-toggle="modal" data-mdb-target="#exampleModal"><i class="fa-solid fa-magnifying-glass fa-sm"></i> Kereső</button>
                </div>
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
                            <div class="col modal-col" style="text-align: center;">
                                <input  type="radio" id="rent" name="rent-sell-option" value="rent" checked>
                                <label for="rent" class="labels">Kiadó</label>
                            </div>
                            <div class="col modal-col" style="text-align: center;">
                                <input type="radio" id="sell" name="rent-sell-option" value="sell">
                                <label for="sell" class="labels">Eladó</label>
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
                            <div>
                                <button>Keresés</button>
                            </div>
                    </form>
                </div>
                </div>
            </div>
            </div>

            <div class="cards">
                <div class="card">
                    <img src="../img/szabadka.jpg" alt="Avatar" style="width:100%">
                    <div class="container">
                    <h4><b>24,000 USD</b></h4> 
                    <p>12. Váci utca, Budapest</p> 
                    </div>
                    <div class="info">
                        <div>
                            <div class="icon">
                                <i class="fa-solid fa-vector-square"></i>
                                <span><b>360m<sup>2</sup></b></span>
                            </div>
                            <p>Alapterület</p>
                        </div>
                        <div>
                            <div class="icon">
                                <i class="fa-solid fa-door-open"></i>
                                <span><b>3</b></span>
                            </div>
                            <p>Szobák</p>
                        </div>
                        <div>
                            <div class="icon">
                                <i class="fa-solid fa-building"></i>
                                <span><b>1.</b></span>
                            </div>
                            <p>Emelet</p>
                        </div>
                    </div>
                </div>
            
                <div class="card">
                    <img src="../img/szabadka.jpg" alt="Avatar" style="width:100%">
                    <div class="container">
                    <h4><b>24,000 USD</b></h4> 
                    <p>12. Váci utca, Budapest</p> 
                    </div>
                    <div class="info">
                        <div>
                            <div class="icon">
                                <i class="fa-solid fa-vector-square"></i>
                                <span><b>360m<sup>2</sup></b></span>
                            </div>
                            <p>Alapterület</p>
                        </div>
                        <div>
                            <div class="icon">
                                <i class="fa-solid fa-door-open"></i>
                                <span><b>3+1 fél</b></span>
                            </div>
                            <p>Szobák</p>
                        </div>
                        <div>
                            <div class="icon">
                                <i class="fa-solid fa-maximize"></i>
                                <span><b>1107m<sup>2</sup></b></span>
                            </div>
                            <p>Telekterület</p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <img src="../img/szabadka.jpg" alt="Avatar" style="width:100%">
                    <div class="container">
                    <h4><b>24,000 USD</b></h4> 
                    <p>12. Váci utca, Budapest</p> 
                    </div>
                    <div class="info">
                        <div>
                            <div class="icon">
                                <i class="fa-solid fa-vector-square"></i>
                                <span><b>360m<sup>2</sup></b></span>
                            </div>
                            <p>Alapterület</p>
                        </div>
                        <div>
                            <div class="icon">
                                <i class="fa-solid fa-door-open"></i>
                                <span><b>3</b></span>
                            </div>
                            <p>Szobák</p>
                        </div>
                        <div>
                            <div class="icon">
                                <i class="fa-solid fa-building"></i>
                                <span><b>1.</b></span>
                            </div>
                            <p>Emelet</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <img src="../img/szabadka.jpg" alt="Avatar" style="width:100%">
                    <div class="container">
                    <h4><b>24,000 USD</b></h4> 
                    <p>12. Váci utca, Budapest</p> 
                    </div>
                    <div class="info">
                        <div>
                            <div class="icon">
                                <i class="fa-solid fa-vector-square"></i>
                                <span><b>360m<sup>2</sup></b></span>
                            </div>
                            <p>Alapterület</p>
                        </div>
                        <div>
                            <div class="icon">
                                <i class="fa-solid fa-door-open"></i>
                                <span><b>3</b></span>
                            </div>
                            <p>Szobák</p>
                        </div>
                        <div>
                            <div class="icon">
                                <i class="fa-solid fa-building"></i>
                                <span><b>1.</b></span>
                            </div>
                            <p>Emelet</p>
                        </div>
                    </div>
                </div>




            </div>
            
    </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>