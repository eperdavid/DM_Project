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
      $type = $row['type'];
      $plotArea = $row['plotArea'];
      $coverage = $row['coverage'];

      if($row['halfrooms'] != "" and $row['halfrooms'] != 0)
      {
        $room = $row['rooms'].' + '.$row['halfrooms'];
      }
      
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
                      <?php
                      $img = false;
                      if(file_exists('../img/'.$_GET['id'].''))
                      {
                        $img = true;
                        $imgages = array_diff(scandir('../img/'.$_GET['id'].''), array('..', '.'));
                        foreach($imgages as $img)
                        {
                          echo '
                          <div class="swiper-slide">
                            <img src="../img/'.$_GET['id'].'/'.$img.'" />
                          </div>';
                        }
                      }
                      else{
                        echo '
                          <div class="swiper-slide">
                            <img src="../img/noimage.png" />
                          </div>';
                      }

                      ?>
                      
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                  </div>
                  <div id="thmSlider" thumbsSlider="" class="swiper mySwiper">
                    <div class="swiper-wrapper">
                      <?php
                      if($img == true)
                      {
                        foreach($imgages as $img)
                        {
                          echo '
                          <div class="swiper-slide">
                            <img src="../img/'.$_GET['id'].'/'.$img.'" />
                          </div>';
                        }
                      }

                      ?>
                      
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
                <?php
                  if($type == "Telek")
                  {
                    echo '
                    <div>
                      <label>Telekterület</label>
                      <span><b>'.$plotArea.' m<sup>2</sup></b></span>
                    </div>
                    <div>
                      <label>Beépíthetőség</label>
                      <span><b>'.$coverage.' %</b></span>
                    </div>';
                  }
                  else{
                    echo '
                    <div>
                      <label>Alapterület</label>
                      <span><b>'.$area.' m<sup>2</sup></b></span>
                    </div>
                    <div>
                      <label>Szobák</label>
                      <span><b>'.$room.'</b></span>
                    </div>';
                  }
                ?>
                
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

              <a class="sendMsg" href="#" data-mdb-toggle="modal" data-mdb-target="#messageModal"><i class="fa-solid fa-message"></i>&nbsp;&nbsp;Üzenet küldés</a>
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
                if($row['type'] == "Ház")
                {
                  echo '<div class="data-wrapper">
                          <div>
                            <div><span>Kategória</span><b>'.$row['type'].'</b></div>
                            <div><span>Állapot</span><b>'.$row['propertycondition'].'</b></div>
                            <div><span>Komfort</span><b>'.$row['comfort'].'</b></div>
                            <div><span>Bútorzott</span><b>'.$row['furnished'].'</b></div>
                            <div><span>Telekterület</span><b>'.$row['plotArea'].' m<sup>2</sup></b></div>
                          </div>
              
                          <div>
                            <div><span>Akadálymentesített</span><b>'.$row['barrier_free'].'</b></div>
                            <div><span>Belmagasság</span><b>'.$row['height'].'</b></div>
                            <div><span>Fürdő és wc</span><b>'.$row['wc'].'</b></div>
                            <div><span>Épület szintje</span><b>'.$row['maxLevel'].'</b></div>
                            <div><span>Pince</span><b>'.$row['cellar'].'</b></div>
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

              if($row['type'] == "Telek")
                {
                echo '<div class="data-wrapper">
                        <div>
                          <div><span>Kategória</span><b>'.$row['type'].'</b></div>
                          <div><span>Villany</span><b>'.$row['electricity'].'</b></div>
                        </div>
            
                        <div>
                          <div><span>Víz</span><b>'.$row['water'].'</b></div>
                          <div><span>Gáz</span><b>'.$row['gas'].'</b></div>
                        </div>
            
                        <div>
                          <div><span>Csatorna</span><b>'.$row['canal'].'</b></div>
                          <div><span>Ár</span><b>'.$row['price'].' <i class="fa-solid fa-euro-sign"></i> /hó</b></b></div>
                        </div>
                      </div>';
                }
            }
          }

          ?>
          
        </div>
        <!-- Modal -->
        <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
          <form id="messageForm" action="../sendMessageAction.php" method="post">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Írj a hirdetőnek</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
              </div>
              
              <div class="modal-body">
              <div>
                <div class="form-outline">
                  <input type="text" id="form12" class="form-control" <?php if(isset($_SESSION['lastname'])) { echo 'value="'.$_SESSION['lastname'].'" disabled'; } else { echo 'name="lastname"'; } ?>/>
                  <label class="form-label" for="form12">Vezetéknév</label>
                </div>
                <span class="errorMsg" id="lastnameErrorMSG">Ezt a mezőt kötelező kitölteni</span>
              </div>
              <div>
                <div class="form-outline">
                  <input type="text" id="form13" class="form-control" <?php if(isset($_SESSION['firstname'])) { echo 'value="'.$_SESSION['firstname'].'" disabled'; } else { echo 'name="firstname"'; } ?>/>
                  <label class="form-label" for="form13">Keresztnév</label>
                </div>
                <span class="errorMsg" id="firstnameErrorMSG">Ezt a mezőt kötelező kitölteni</span>
              </div>
              <div>
                <div class="form-outline">
                  <input type="email" id="form14" class="form-control" <?php if(isset($_SESSION['email'])) { echo 'value="'.$_SESSION['email'].'" disabled'; } else { echo 'name="email"'; } ?>/>
                  <label class="form-label" for="form14">Email</label>
                </div>
                <span class="errorMsg" id="emailErrorMSG">Ezt a mezőt kötelező kitölteni</span>
              </div>
              <div>
                <div class="form-outline">
                  <input type="text" id="form15" name="phone" class="form-control" <?php if(isset($_SESSION['phone'])) { echo 'value="'.$_SESSION['phone'].'" disabled'; } else { echo 'name="phone"'; } ?>/>
                  <label class="form-label" for="form15">Telefon</label>
                </div>
                <span class="errorMsg" id="phoneErrorMSG">Ezt a mezőt kötelező kitölteni</span>
              </div>
              <div>
                <div class="form-outline">
                  <textarea class="form-control" name="message" id="textAreaExample" data-mdb-showcounter="true" maxlength="200" rows="5"></textarea>
                  <label class="form-label" for="textAreaExample">Üzenet</label>
                  <div class="form-helper"></div>
                </div>
                <span class="errorMsg" id="messageErrorMSG">Ezt a mezőt kötelező kitölteni</span>
              </div>
              
              </div>
              <div class="modal-footer">
                <button class="sendMSG">Küldés</button>
              </div>
            </div>
          </form>
          </div>
        </div>

        
    </main>

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="../script/swiper-property.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.3/dist/index.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>

    <script src="../script/message-check.js"></script>
</body>
</html>