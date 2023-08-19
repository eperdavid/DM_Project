<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/propertyStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
  <?php include 'nav.php'; ?>
    <main>
        <div class="img-info">
            <div class="img">
                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <a href="../img/szabadka.jpg" data-toggle="lightbox" data-gallery="example-gallery">
                          <img src="../img/szabadka.jpg" />
                        </a>
                      </div>
                      <div class="swiper-slide">
                        <a href="../img/room.jpg" data-toggle="lightbox" data-gallery="example-gallery">
                          <img src="../img/room.jpg" />
                        </a>
                      </div>
                      <div class="swiper-slide">
                        <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
                      </div>
                      <div class="swiper-slide">
                        <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
                      </div>
                      <div class="swiper-slide">
                        <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
                      </div>
                      <div class="swiper-slide">
                        <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
                      </div>
                      <div class="swiper-slide">
                        <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
                      </div>
                      <div class="swiper-slide">
                        <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
                      </div>
                      <div class="swiper-slide">
                        <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
                      </div>
                      <div class="swiper-slide">
                        <img src="https://swiperjs.com/demos/images/nature-10.jpg" />
                      </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                  </div>
                  <div id="thmSlider" thumbsSlider="" class="swiper mySwiper">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <img src="https://swiperjs.com/demos/images/nature-1.jpg" />
                      </div>
                      <div class="swiper-slide">
                        <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
                      </div>
                      <div class="swiper-slide">
                        <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
                      </div>
                      <div class="swiper-slide">
                        <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
                      </div>
                      <div class="swiper-slide">
                        <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
                      </div>
                      <div class="swiper-slide">
                        <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
                      </div>
                      <div class="swiper-slide">
                        <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
                      </div>
                      <div class="swiper-slide">
                        <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
                      </div>
                      <div class="swiper-slide">
                        <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
                      </div>
                      <div class="swiper-slide">
                        <img src="https://swiperjs.com/demos/images/nature-10.jpg" />
                      </div>
                    </div>
                  </div>
            </div>

            <div class="info">
                <h3>Az ingatlanról</h3>
                <div>
                  <label>Város</label>
                  <span><b>Szabadka</b></span>
                </div>
                <div>
                  <label>Utca</label>
                  <span><b>Kossuth Lajos utca</b></span>
                </div>
                <hr>
                <div>
                  <label>Ár</label>
                  <span><b>EUR 154</b></span>
                </div>
                <div>
                  <label>Alapterület</label>
                  <span><b>64 m<sup>2</sup></b></span>
                </div>
                <div>
                  <label>Szobák</label>
                  <span><b>4</b></span>
                </div>
                <div class="more">
                  <a href="#data">További adatok</a>
                </div>
            </div>
        </div>

        <div class="owner">
          <h3 style="margin-bottom: 1rem;">Hírdető adatai</h3>
          <div class="owner-contact">
            <div>
              <label>Teljes neve</label>
              <span><i class="fa-solid fa-user"></i>&nbsp;<b>Valammmmmmmmi Zoltán</b></span>
            </div>

            <div>
              <label>Email</label>
              <span><i class="fa-solid fa-envelope"></i>&nbsp;<b>valaasdasdasdmi@gmail.com</b></span>
            </div>

            <div>
              <label>Telefon</label>
              <span><i class="fa-solid fa-phone"></i>&nbsp;<b>0631234567</b></span>
            </div>

              <a href="#" class="sendMsg"><i class="fa-solid fa-message"></i>&nbsp;&nbsp;Üzenet küldés</a>
          </div>
        </div>

        <div class="description">
          <h3>Leírás</h3>
          <div class="text">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Pariatur minima eveniet consequuntur aliquid explicabo incidunt
            tempore deleniti debitis vitae id officiis, nostrum quibusdam officia ipsa natus quos? Nisi, maiores impedit. Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
            Officiis consequuntur quasiratione quam, dolor repellendus sunt unde expedita, distinctio quos culpa veritatis ea corporis nesciunt ullam quibusdam accusamus
            explicabo iusto.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Pariatur minima eveniet consequuntur aliquid explicabo incidunt
            tempore deleniti debitis vitae id officiis, nostrum quibusdam officia ipsa natus quos? Nisi, maiores impedit. Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
            Officiis consequuntur quasiratione quam, dolor repellendus sunt unde expedita, distinctio quos culpa veritatis ea corporis nesciunt ullam quibusdam accusamus
            explicabo iusto.
          </div>
        </div>

        <div class="data" id="data">
          <h3 style="margin-bottom: 1rem;">Adatok</h3>
          <div class="data-wrapper">
            <div>
              <div><span>Kategória</span><b>Lakás</b></div>
              <div><span>Állapot</span><b>Újszerű</b></div>
              <div><span>Komfort</span><b>Összkomfortos</b></div>
              <div><span>Bútorzott</span><b>Igen</b></div>
              <div><span>Költözhető</span><b>Azonnal</b></div>
              <div><span>Állat hozható-e?</span><b>Igen</b></div>
            </div>

            <div>
              <div><span>Akadálymentesített</span><b>Igen</b></div>
              <div><span>Belmagasság</span><b>3m-nél alacsonyabb</b></div>
              <div><span>Fürdő és wc</span><b>Külön helyiségben</b></div>
              <div><span>Emelet</span><b>3</b></div>
              <div><span>Épület szintje</span><b>4</b></div>
              <div><span>Lift</span><b>Van</b></div>
            </div>

            <div>
              <div><span>Dohányzás</span><b>Nem megengedett</b></div>
              <div><span>Légkondicionáló</span><b>Van</b></div>
              <div><span>Min. bérleti idő</span><b>12 hónap</b></div>
              <div><span>Rezsiköltség</span><b>42 <i class="fa-solid fa-euro-sign"></i></b></div>
              <div><span>Közös költés</span><b>25 <i class="fa-solid fa-euro-sign"></i></b></div>
              <div><span>Ár</span><b>9999 <i class="fa-solid fa-euro-sign"></i> /hó</b></div>
            </div>
          </div>
        </div>

        
    </main>

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="../script/swiper-property.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.3/dist/index.bundle.min.js"></script>
</body>
</html>