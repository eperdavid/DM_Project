<?php
if(!empty($_GET['id']))
{
  include '../actions/db_config.php';

  $sql = 'SELECT * FROM property WHERE property_id="'.$_GET['id'].'"';
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $city = $row['city'];
      $street = $row['street'];
      $price = $row['price'];
      $area = $row['area'];
      $room = $row['rooms'];

      
      $description = $row['description'];



      $usersql = 'SELECT * FROM users WHERE id="'.$row['user_id'].'"';
      $userresult = mysqli_query($conn, $usersql);
      if (mysqli_num_rows($userresult) > 0) {
        while($row = mysqli_fetch_assoc($userresult)) {
          $phone = $row['phone'];
        }
      }
    }
  }
  else{
    header('Location: index.php');
  }
}
else{
  header('Location: index.php');
}




?>

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
                  <span><b><?php echo $city; ?></b></span>
                </div>
                <div>
                  <label>Utca</label>
                  <span><b><?php echo $street; ?></b></span>
                </div>
                <hr>
                <div>
                  <label>Ár</label>
                  <span><b>EUR <?php echo $price; ?></b></span>
                </div>
                <div>
                  <label>Alapterület</label>
                  <span><b><?php echo $area; ?> m<sup>2</sup></b></span>
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
              <label>Telefon</label>
              <span><i class="fa-solid fa-phone"></i>&nbsp;<b><?php echo $phone; ?></b></span>
            </div>

              <a href="#" class="sendMsg"><i class="fa-solid fa-message"></i>&nbsp;&nbsp;Üzenet küldés</a>
          </div>
        </div>

        <div class="description">
          <h3>Leírás</h3>
          <div class="text">
            <?php echo $description; ?>
          </div>
        </div>

        <div class="data" id="data">
          <h3 style="margin-bottom: 1rem;">Adatok</h3>

          <?php 
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              if($row['rent_sell'] == "Kiadó")
              {
                if($row['type'] == "Lakás")
                {
                echo '<div class="data-wrapper">
                        <div>
                          <div><span>Kategória</span><b>'.$row['type'].'</b></div>
                          <div><span>Állapot</span><b>'.$row['propertycondition'].'</b></div>
                          <div><span>Komfort</span><b>'.$row['comfort'].'</b></div>
                          <div><span>Bútorzott</span><b>'.$row['furnished'].'</b></div>
                          <div><span>Költözhető</span><b>'.$row['moved'].'</b></div>
                          <div><span>Állat hozható-e?</span><b>'.$row['animal'].'</b></div>
                        </div>
            
                        <div>
                          <div><span>Akadálymentesített</span><b>'.$row['barrier_free'].'</b></div>
                          <div><span>Belmagasság</span><b>'.$row['height'].'</b></div>
                          <div><span>Fürdő és wc</span><b>'.$row['wc'].'</b></div>
                          <div><span>Emelet</span><b>'.$row['level'].'</b></div>
                          <div><span>Épület szintje</span><b>'.$row['maxLevel'].'</b></div>
                          <div><span>Lift</span><b>'.$row['elevator'].'</b></div>
                        </div>
            
                        <div>
                          <div><span>Fűtés</span><b>'.$row['heating'].'</b></div>
                          <div><span>Dohányzás</span><b>'.$row['smoking'].'</b></div>
                          <div><span>Légkondicionáló</span><b>'.$row['airconditioner'].'</b></div>
                          <div><span>Min. bérleti idő</span><b>'.$row['rentalPeriod'].' hónap</b></div>
                          <div><span>Rezsiköltség</span><b>'.$row['overhead'].' <i class="fa-solid fa-euro-sign"></i></b></div>
                          <div><span>Ár</span><b>'.$row['price'].' <i class="fa-solid fa-euro-sign"></i> /hó</b></div>
                        </div>
                      </div>';
                }
                if($row['type'] == "Ház")
                {
                echo '<div class="data-wrapper">
                        <div>
                          <div><span>Kategória</span><b>'.$row['type'].'</b></div>
                          <div><span>Állapot</span><b>'.$row['propertycondition'].'</b></div>
                          <div><span>Komfort</span><b>'.$row['comfort'].'</b></div>
                          <div><span>Bútorzott</span><b>'.$row['furnished'].'</b></div>
                          <div><span>Költözhető</span><b>'.$row['moved'].'</b></div>
                          <div><span>Állat hozható-e?</span><b>'.$row['animal'].'</b></div>
                        </div>
            
                        <div>
                          <div><span>Akadálymentesített</span><b>'.$row['barrier_free'].'</b></div>
                          <div><span>Belmagasság</span><b>'.$row['height'].'</b></div>
                          <div><span>Fürdő és wc</span><b>'.$row['wc'].'</b></div>
                          <div><span>Telekterület</span><b>'.$row['plotArea'].'  m<sup>2</sup></b></div>
                          <div><span>Épület szintje</span><b>'.$row['maxLevel'].'</b></div>
                          <div><span>Pince</span><b>'.$row['cellar'].'</b></div>
                        </div>
            
                        <div>
                          <div><span>Fűtés</span><b>'.$row['heating'].'</b></div>
                          <div><span>Dohányzás</span><b>'.$row['smoking'].'</b></div>
                          <div><span>Légkondicionáló</span><b>'.$row['airconditioner'].'</b></div>
                          <div><span>Min. bérleti idő</span><b>'.$row['rentalPeriod'].' hónap</b></div>
                          <div><span>Rezsiköltség</span><b>'.$row['overhead'].' <i class="fa-solid fa-euro-sign"></i></b></div>
                          <div><span>Ár</span><b>'.$row['price'].' <i class="fa-solid fa-euro-sign"></i> /hó</b></div>
                        </div>
                      </div>';
                }
              }
              else if($row['rent_sell'] == "Eladó")
              {
                if($row['type'] == "Lakás")
                {
                  echo '<div class="data-wrapper">
                          <div>
                            <div><span>Kategória</span><b>'.$row['type'].'</b></div>
                            <div><span>Állapot</span><b>'.$row['propertycondition'].'</b></div>
                            <div><span>Komfort</span><b>'.$row['comfort'].'</b></div>
                            <div><span>Bútorzott</span><b>'.$row['furnished'].'</b></div>
                            <div><span>Akadálymentesített</span><b>'.$row['barrier_free'].'</b></div>
                          </div>
              
                          <div>
                            <div><span>Belmagasság</span><b>'.$row['height'].'</b></div>
                            <div><span>Fürdő és wc</span><b>'.$row['wc'].'</b></div>
                            <div><span>Emelet</span><b>'.$row['level'].'</b></div>
                            <div><span>Épület szintje</span><b>'.$row['maxLevel'].'</b></div>
                            <div><span>Lift</span><b>'.$row['elevator'].'</b></div>
                          </div>
              
                          <div>
                            <div><span>Fűtés</span><b>'.$row['heating'].'</b></div>
                            <div><span>Szigetelés</span><b>'.$row['insulation'].'</b></div>
                            <div><span>Légkondicionáló</span><b>'.$row['airconditioner'].'</b></div>
                            <div><span>Rezsiköltség</span><b>'.$row['overhead'].' <i class="fa-solid fa-euro-sign"></i></b></div>
                            <div><span>Ár</span><b>'.$row['price'].' <i class="fa-solid fa-euro-sign"></i> /hó</b></div>
                          </div>
                        </div>';
                }
              }
            }
          }

          ?>
          
        </div>

        
    </main>

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="../script/swiper-property.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.3/dist/index.bundle.min.js"></script>
</body>
</html>