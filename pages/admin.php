
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="../style/adminStyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.3/dist/chart.umd.min.js"></script>
    <title>Document</title>
</head>
<body>
    <?php

    include 'nav.php'; 
    
    include '../actions/db_config.php';
    
    ?>
    <main>
        <div class="card-info">
            <div class="Card">
                <label>Felhasználók</label>
                <div class="data-icon">
                    <?php
                    $sql = "SELECT firstname FROM users";
                    $result = mysqli_query($conn, $sql);

                    echo '<div><h3>'.mysqli_num_rows($result).'</h3></div>';
                    ?>
                    <div><i class="fa-solid fa-user"></i></div>
                </div>
                
            </div>
            <div class="Card">
                <label>Aktív hirdetések</label>
                <div class="data-icon">
                    <?php
                    $sql = "SELECT type FROM property WHERE verify = 1";
                    $result = mysqli_query($conn, $sql);

                    echo '<div><h3>'.mysqli_num_rows($result).'</h3></div>';
                    ?>
                    <div><i class="fa-solid fa-house fa-xl"></i></div>
                </div>
            </div>
            <div class="Card">
                <label>Megerősítésre vár</label>
                <div class="data-icon">
                    <?php
                    $sql = "SELECT * FROM property WHERE verify = 0";
                    $result = mysqli_query($conn, $sql);

                    echo '<div><h3>'.mysqli_num_rows($result).'</h3></div>';
                    ?>
                    <div><i class="fa-solid fa-circle-check"></i></div>
                </div>
            </div>
            <div class="Card">
                <label>Tiltott felhasználók</label>
                <div class="data-icon">
                    <?php
                    $bansql = "SELECT type FROM property WHERE verify = 0";
                    $banresult = mysqli_query($conn, $bansql);

                    echo '<div><h3>Nincs kész</h3></div>';
                    ?>
                    <div><i class="fa-solid fa-ban"></i></div>
                </div>
            </div>
        </div>

        <div class="ad-chart">
            <div class="ad">
                <div class="table-header">Megerősítésre váró hirdetések</div>
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">


                    <?php

                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            if(file_exists('../img/'.$row['property_id']))
                            {
                                $images = array_diff(scandir('../img/'.$row['property_id'].''), array('..', '.'));
                                $image = $row['property_id'].'/'.$images[2];
                            }
                            else{
                                $image = "noimage.png";
                            }
                            echo '
                            <div class="swiper-slide">
                            <a href="property.php?id='.$row['property_id'].'">
                            <div class="card">
                                <img src="../img/'.$image.'" alt="Avatar" style="width:100%;">
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
                            echo '</div>
                                </div></a>';
                        }
                    }
                    else{
                        echo '<p style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">Nincs megerősítésre váró hirdetés</p>';
                    }

                    ?>

                    </div>
                    <div class="swiper-pagination"></div>
                  </div>
                
            </div>
            <div class="chart">
                <div class="table-header">Ingatlan típusok</div>
                <div class="flex-chart">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
        <div class="table">
            <div class="table-header">Felhasználók</div>
            <div class="table-content">
            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th>Column 1</th>
                        <th>Column 2</th>
                        <th>Column 3</th>
                        <th>Column 4</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 2</td>
                    </tr>
                    <tr>
                        <td>bdsa</td>
                        <td>asd</td>
                        <td>asd</td>
                        <td>asd</td>
                    </tr>
                    <tr>
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 2</td>
                    </tr>
                    <tr>
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 2</td>
                    </tr>
                    <tr>
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 2</td>
                    </tr>
                    <tr>
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 2</td>
                    </tr>
                    <tr>
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 2</td>
                    </tr>
                    <tr>
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 2</td>
                    </tr>
                    <tr>
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 2</td>
                    </tr>
                    <tr>
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 2</td>
                    </tr>
                    <tr>
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 2</td>
                    </tr>
                    <tr>
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 2</td>
                    </tr>
                    <tr>
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 2</td>
                    </tr>
                    <tr>
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 2</td>
                    </tr>
                    <tr>
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 2</td>
                    </tr>
                    <tr>
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 2</td>
                    </tr>
                    <tr>
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 2</td>
                    </tr>
                    <tr>
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 2</td>
                    </tr>
                    
                </tbody>
                
            </table>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>

    <script src="../script/swiper-admin.js"></script>
    <script src="../script/chart.js"></script>

</body>
</html>