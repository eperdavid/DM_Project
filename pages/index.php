<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <title>Document</title>
</head>
<body>
    <?php include 'nav.html' ?>
    <div class="header">
        <form>
            <div class="rent-sell">
                <input type="radio" id="rent" name="rent-sell-option" value="rent" checked>
                <label for="rent">Kiadó</label>
                <input type="radio" id="sell" name="rent-sell-option" value="sell">
                <label for="sell">Eladó</label>
            </div>

            <div>
                <label>Város</label><br>    
                <input type="text" placeholder="asd">
            </div>
            <div>
                <label>Típus</label><br>    
                <select>
                    <option>Lakás</option>
                    <option>Kertes ház</option>
                    <option>Iker ház</option>
                    <option>Iroda</option>
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

            <div>
                <label>Szobák</label><br>    
                <select>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>4+</option>
                </select>
            </div>
            <div>
                <br>
                <button class="searchBtn"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="filters"><i class="fa-solid fa-filter"></i><span>Részletes kereső</span></div>
        </form>
    </div>

    <main>
        <div class="citys">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="city-card">
                            <img src="../img/szabadka.jpg" alt="Avatar" style="width:100%">
                            <div class="city-container">
                              <h4><b>Tokio</b></h4> 
                              <p>14 találat</p> 
                            </div>
                          </div>                          
                    </div>

                    <div class="swiper-slide">
                        <div class="city-card">
                            <img src="../img/szabadka.jpg" alt="Avatar" style="width:100%">
                            <div class="city-container">
                              <h4><b>Szabadka</b></h4> 
                              <p>14 találat</p> 
                            </div>
                          </div>                          
                    </div>

                    <div class="swiper-slide">
                        <div class="city-card">
                            <img src="../img/szabadka.jpg" alt="Avatar" style="width:100%">
                            <div class="city-container">
                              <h4><b>Szabadka</b></h4> 
                              <p>14 találat</p> 
                            </div>
                          </div>                          
                    </div>

                    <div class="swiper-slide">
                        <div class="city-card">
                            <img src="../img/szabadka.jpg" alt="Avatar" style="width:100%">
                            <div class="city-container">
                              <h4><b>Szabadka</b></h4> 
                              <p>14 találat</p> 
                            </div>
                          </div>                          
                    </div>

                    <div class="swiper-slide">
                        <div class="city-card">
                            <img src="../img/szabadka.jpg" alt="Avatar" style="width:100%">
                            <div class="city-container">
                              <h4><b>Szabadka</b></h4> 
                              <p>14 találat</p> 
                            </div>
                          </div>                          
                    </div>

                    <div class="swiper-slide">
                        <div class="city-card">
                            <img src="../img/szabadka.jpg" alt="Avatar" style="width:100%">
                            <div class="city-container">
                              <h4><b>Szabadka</b></h4> 
                              <p>14 találat</p> 
                            </div>
                          </div>                          
                    </div>

                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
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
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="../script/swiper-index.js"></script>
</body>
</html>