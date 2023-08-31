<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/propertiesStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
    <?php include 'nav.php';

        include '../actions/db_config.php';

        if(isset($_SESSION['userlevel']) and $_SESSION['userlevel'] == 2)
        {
            $sql = 'SELECT * FROM property WHERE user_id = '.$_GET['userID'].'';
            $result = mysqli_query($conn, $sql);
        }
        else{
            echo '<script>window.location.href = "index.php";</script>';
        }
    
    
    
    ?>
<div class="maingap">
        <main>
            <h3>Ingatlanok</h3>
            <hr>

            <div id="page1" class="cards">
                <?php
                
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
                        echo '<a href="property.php?id='.$row['property_id'].'">
                        <div class="card">
                            <img src="'.$image.'" alt="Avatar" style="width:100%">
                            <div class="property_type">
                                '.$row['rent_sell'].' '.strtolower($row['type']).'
                                </div>
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
                            
                        echo '</div></a>';
                    }
                }
                else{
                    echo 'Nincs találat';
                }
                ?>



            </div>
    
    </main>
    </div>
</body>
</html>