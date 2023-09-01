<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/myPropertiesStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php 
    include 'nav.php';
    
    include '../actions/db_config.php';

    if(!isset($_SESSION['id']))
    {
        echo '<script>window.location.href = "index.php";</script>';
    }

    $sql = 'SELECT * FROM property WHERE user_id = "'.$_SESSION['id'].'"';
    $result = mysqli_query($conn, $sql);

    
    ?>
    <main>
        <div class="userData">
            <form id="userDataForm">
            <h3>Saját adataim</h3>
            <p>*minden hirdetésednél ezek az adatok jelennek meg</p>
            <div class="inputsFlex">
                <div class="inputs">
                    <div>
                        <input type="hidden" name="Userid" value="<?php echo $_SESSION['id']; ?>">
                        <label>Vezetéknév</label>
                        <input type="name" name="lastname" value="<?php if(isset($_SESSION['lastname'])) { echo $_SESSION['lastname']; } ?>">
                        <span class="errorMSG" id="lastnameErrorMsg">Ezt a mezőt kötelező kitölteni!</span>
                    </div>
                    <div>
                        <label>Keresztnév</label>
                        <input type="name" name="firstname" value="<?php if(isset($_SESSION['firstname'])) { echo $_SESSION['firstname']; } ?>">
                        <span class="errorMSG" id="firstnameErrorMsg">Ezt a mezőt kötelező kitölteni!</span>
                    </div>
                </div>
                <div class="inputs">
                    <div>
                        <label>Email</label>
                        <input type="email" name="email" value="<?php if(isset($_SESSION['email'])) { echo $_SESSION['email']; } ?>">
                        <span class="errorMSG" id="mailErrorMsg">Ezt a mezőt kötelező kitölteni!</span>
                    </div>
                    <div>
                        <label>Telefonszám</label>
                        <input type="number" name="phone" value="<?php if(isset($_SESSION['phone'])) { echo $_SESSION['phone']; } ?>">
                        <span class="errorMSG" id="phoneErr">Ezt a mezőt kötelező kitölteni!</span>
                    </div>
                </div>
                <div class="inputs">
                    <div>
                        <label>Új jelszó</label>
                        <input type="password" name="password">
                        <span class="errorMSG" id="pswErrorMsg">Minimum 6 karakter</span>
                    </div>
                    <div>
                        <label>Jelszó újra</label>
                        <input type="password" name="passwordAgain">
                        <span class="errorMSG" id="passwordNotMatchErrorMsg">A két jelszó nem egyezik</span>
                    </div>
                </div>
            </div>
            <button>Mentés</button>
            </form>
        </div>
        <div class="wrapper">
            <h3>Hirdetéseim</h3>
            <p>Jelenleg <?php echo mysqli_num_rows($result); ?> hirdetésed van</p>
        <div class="cards">
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

                            echo '<a href="property.php?id='.$row['property_id'].'">
                            <div class="card">
                                <img src="../img/'.$image.'" alt="Avatar" style="width:100%">
                                <div class="card-icons">
                                    <div onclick="updateHref('.$row['property_id'].')"><i class="fa-solid fa-pen-to-square"></i></div>
                                    <div onclick="deleteProperty('.$row['property_id'].')"><i class="fa-solid fa-trash-can"></i></div>
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

            ?>


        </div>
    </div>
    </main>

    <div class="modal fade" id="changeData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sikeres mentés</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <b>Elmentettük beállitásait.</b><br><br>
                *megjegyzés: <br>Új email cím esetén a megerősítés után kerül beállításra.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-mdb-dismiss="modal">Rendben</button>
            </div>
            </div>
        </div>
        </div>

    <script>
        // this is the id of the form
$("#userDataForm").submit(function(e) {

e.preventDefault(); // avoid to execute the actual submit of the form.

var form = $(this);

$.ajax({
    type: "POST",
    url: "../actions/userDataAction.php",
    data: form.serialize(), // serializes the form's elements.
    success: function(data)
    {   
        if(data.includes("lastnameError"))
        {
            $("#lastnameErrorMsg").css("visibility", "visible");
        }
        else{
            $("#lastnameErrorMsg").css("visibility", "hidden");
        }
        if(data.includes("firstnameError"))
        {
            $("#firstnameErrorMsg").css("visibility", "visible");
        }
        else{
            $("#firstnameErrorMsg").css("visibility", "hidden");
        }
        if(data.includes("emailError"))
        {
            $("#mailErrorMsg").text("Ezt a mezőt kötelező kitölteni!");
            $("#mailErrorMsg").css("visibility", "visible");
        }
        else{
            if(data.includes("existError"))
            {
                $("#mailErrorMsg").text("Ez az email cím már fogalt!");
                $("#mailErrorMsg").css("visibility", "visible");
            }
            else{
                $("#mailErrorMsg").css("visibility", "hidden");
            }
            
        }
        if(data.includes("phoneError"))
        {
            $("#phoneErr").text("Ezt a mezőt kötelező kitölteni!");
            $("#phoneErr").css("visibility", "visible");
        }
        else{
            if(data.includes("phoneFormatError"))
            {
                $("#phoneErr").text("Érvénytelen formátum");
                $("#phoneErr").css("visibility", "visible");
            }
            else{
                $("#phoneErr").css("visibility", "hidden");
            }
        }
        if(data.includes("passwordError"))
        {
            $("#pswErrorMsg").css("visibility", "visible");
        }
        else{
            $("#pswErrorMsg").css("visibility", "hidden");
        }
        if(data.includes("passwordNotMatch"))
        {
            $("#passwordNotMatchErrorMsg").css("visibility", "visible");
        }
        else{
            $("#passwordNotMatchErrorMsg").css("visibility", "hidden");
        }

        if(data.includes('ok'))
        {
            $('#changeData').modal('toggle');
            $('#changeData').on('hidden.bs.modal', function () {
                location.reload();
            })
        }
        console.log(data);
    }
});

});
    </script>

    <script>
        function updateHref(id)
        {
            if (event.target.classList.contains('fa-solid')) {
                event.preventDefault();
                window.location.href = "update.php?id=" + id;
            } 
        }



        function deleteProperty(id)
        {
            if (event.target.classList.contains('fa-solid')) {
                event.preventDefault();
                if(confirm("Törölni fogja ezt a hirdetést!"))
                {
                    $.ajax({
                        url: '../actions/deleteProperty.php',
                        type: 'post',
                        data: {'id' : id, 'action' : 'delete'},
                        success: function(data) {
                            location.reload();
                        }
                    })
                }
            }
        } 
    </script>
    <?php include 'footer.html'; ?>
</body>
</html>