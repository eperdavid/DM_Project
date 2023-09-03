<?php 
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
$cities = array('Belgrád','Újvidék','Pristina','Nis','Kragujevac','Szabadka','Zombor','Bor','Verbász','Topolya','Zombor','Bor','Verbász','Topolya');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Document</title>
    <style>
      .container-fluid{
        max-width: 1400px;
      }

      .nav-pills .nav-link.active, .nav-pills .show>.nav-link{
        background-color: #3b72e0;
        color: white;
      }

      .errorMSG{
        font-size: small;
        color: rgb(255, 90, 90);
      }

      .loginErrorMSG{
        font-size: small;
        color: rgb(255, 90, 90);
        display: block;
        text-align: center;
        margin-bottom: 5px;
      }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white mb-4" id="navm0">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0 me-5" href="index.php">
        HomeDeals
      </a>
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link p-2 m-1" href="index.php">Kezdőoldal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link p-2 m-1" href="properties.php">Ingatlanok</a>
        </li>
        <li class="nav-item">
          <a class="nav-link p-2 m-1" href="plots.php">Épitkezési telkek</a>
        </li>
        <li class="nav-item">
          <?php
          if(isset($_SESSION['id']))
          {
            echo '<a class="nav-link p-2 m-1 bg-primary rounded color-danger text-light" href="addProperty.php"><b>Hirdetésfeladás</b></a>';
          }
          else{
            echo '<a class="nav-link p-2 m-1 bg-primary rounded color-danger text-light" data-mdb-toggle="modal" data-mdb-target="#loginModal" role="button"><b>Hirdetésfeladás</b></a>';
          }
          ?>
        </li>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="d-flex align-items-center">
      <!-- Icon -->

      <!-- Avatar -->
      <div class="dropdown">
        <a
          class="link-secondary me-3 dropdown-toggle hidden-arrow"
          href="#"
          id="navbarDropdownMenuLink"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
        >
          <i class="fa-solid fa-circle-user fa-xl"></i>
        </a>
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuLink"
        >
        <?php
        if(isset($_SESSION['userlevel']))
        {
          if($_SESSION['userlevel'] == 1)
          {
            echo '<li>
                    <a class="dropdown-item" href="myProperties.php">Hirdetéseim</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="../actions/logoutAction.php">Kijelentkezés</a>
                  </li>';
          }
          else if($_SESSION['userlevel'] == 2)
          {
            echo '<li>
                    <a class="dropdown-item" href="myProperties.php">Hirdetéseim</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="admin.php">Admin</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="../actions/logoutAction.php">Kijelentkezés</a>
                  </li>';
          }
        }
        else{
          echo '<li class="dropdown-item" data-mdb-toggle="modal" data-mdb-target="#loginModal" role="button">Bejelentkezés</li>';
        }
        ?>
          <!-- -->
          
        </ul>
      </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->

<div class="modal fade" id="ActivateMail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Regisztráció</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        A megadott email címre elkültünk egy aktiváló linket, amivel megerősítheted a profilodat.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-mdb-dismiss="modal">Rendben</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="SuccessActivation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sikeres aktiválás</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Gratulálunk, <b>HomeDeals</b> fiókod mostantól aktív!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-mdb-dismiss="modal">Rendben</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="SuccessActivationnewemail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sikeres aktiválás</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Sikeressen aktiváltad az új email címedet
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-mdb-dismiss="modal">Rendben</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body ">
        <!-- Pills navs -->
<ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab"
      aria-controls="pills-login" aria-selected="true">Bejelentkezés</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab"
      aria-controls="pills-register" aria-selected="false">Regisztráció</a>
  </li>
</ul>
<!-- Pills navs -->

<!-- Pills content -->
<div class="tab-content">
  <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
    <form id="loginForm">
      <span class="loginErrorMSG" id="loginError"></span>
      <!-- Email input -->
      <div class="mb-4">
        <div class="form-outline">
          <input type="email" id="loginName" name="email" class="form-control" />
          <label class="form-label" for="loginName">Email</label>
        </div>
        <span class="errorMSG" id="emailErrorMsg"></span>
      </div>

      <!-- Password input -->
      <div class="mb-4">
        <div class="form-outline">
          <input type="password" id="loginPassword" name="password" class="form-control" />
          <label class="form-label" for="loginPassword">Jelszó</label>
        </div>
        <span class="errorMSG" id="passwordErrorMsg"></span>
      </div>

      <!-- 2 column grid layout -->
      <div class="row mb-4">
        <div class="col-md-6 d-flex justify-content-center">
          <!-- Checkbox -->
        </div>

        <div class="col-md-6 d-flex justify-content-center">
          <!-- Simple link -->
          <a href="forgotPassword.php">Elfelejtette jelszavát?</a>
        </div>
      </div>

      <!-- Submit button -->
      <button type="submit" name="loginSubmitBtn" class="btn btn-primary btn-block mb-4">Bejelentkezés</button>

    </form>
  </div>
  <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
    <form id="regForm">

      <!-- Lastname input -->
      <div class="mb-4">
        <div class="form-outline">
          <input type="text" id="registerName" name="lastname" class="form-control" />
          <label class="form-label" for="registerName">Vezetéknév</label>
        </div>
        <span class="errorMSG" id="errorLastname"></span>
      </div>
     

      <!-- Firstname input -->
      <div class="mb-4">
        <div class="form-outline">
          <input type="text" id="registerUsername" name="firstname" class="form-control" />
          <label class="form-label" for="registerUsername">Keresztnév</label>
        </div>
        <span class="errorMSG" id="errorFirstname"></span>
      </div>

      <!-- Email input -->
      <div class="mb-4">
        <div class="form-outline">
          <input type="email" id="registerEmail" name="email" class="form-control" />
          <label class="form-label" for="registerEmail">Email</label>
        </div>
        <span class="errorMSG" id="errorEmail"></span>
      </div>

      <!-- Phone input -->
      <div class="mb-4">
        <div class="form-outline">
          <input type="number" id="registerPhone" name="phone" class="form-control" />
          <label class="form-label" for="registerEmail">Telefonszám</label>
        </div>
        <span class="errorMSG" id="phoneErrorMsg"></span>
      </div>

      <!-- Password input -->
      <div class="mb-4">
        <div class="form-outline">
          <input type="password" id="registerPassword" name="password" class="form-control" />
          <label class="form-label" for="registerPassword">Jelszó</label>
        </div>
        <span class="errorMSG" id="errorPassword"></span>
      </div>

      <!-- Repeat Password input -->
      <div class="mb-4">
        <div class="form-outline">
          <input type="password" id="registerRepeatPassword" name="passwordRepeat" class="form-control" />
          <label class="form-label" for="registerRepeatPassword">Jelszó újra</label>
        </div>
        <span class="errorMSG" id="errorPasswordRepeat"></span>
      </div>
      <br>

      <!-- Submit button -->
      <button type="submit" id="regBtn" class="btn btn-primary btn-block mb-3">Regisztráció</button>
    </form>
  </div>
</div>
<!-- Pills content -->
      </div>
    </div>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <?php
    if(strpos($_SERVER['REQUEST_URI'], "property.php") == false)
    {
      echo '<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>';
    }

    if(isset($_GET['emailActivated']) and isset($_SESSION['check']))
    {
      echo "<script type='text/javascript'>
              $(document).ready(function(){
              $('#SuccessActivation').modal('toggle');
              });
            </script>";

      unset($_SESSION['check']);
    }
    if(isset($_GET['newemailActivated']) and isset($_SESSION['check']))
    {
      echo "<script type='text/javascript'>
              $(document).ready(function(){
              $('#SuccessActivationnewemail').modal('toggle');
              });
            </script>";

      unset($_SESSION['check']);
    }
    if(isset($_GET['uploaded']) and isset($_SESSION['check']))
    {
      echo "<script type='text/javascript'>
              $(document).ready(function(){
              $('#uploadedProperty').modal('toggle');
              });
            </script>";

      unset($_SESSION['check']);
    }

    ?>
    
    <script>
      // this is the id of the form
      $("#regForm").submit(function(e) {

      e.preventDefault(); // avoid to execute the actual submit of the form.

      var form = $(this);

      $.ajax({
          type: "POST",
          url: "../actions/registrationAction.php",
          data: form.serialize(), // serializes the form's elements.
          beforeSend: function(){
            $("#regBtn").prop('disabled', true);
          },
          success: function(data)
          {
            if(data.includes("none"))
            {
              $('input[name="firstname"]').val("");
              $('input[name="lastname"]').val("");
              $('input[name="email"]').val("");
              $('input[name="password"]').val("");
              $('input[name="passwordRepeat"]').val("");

              $("#loginModal").modal('toggle');
              $("#ActivateMail").modal('toggle');
            }

            if(data.includes("invalidLastname"))
            {
              $("#errorLastname").text("Ezt a mezőt kötelező kitölteni!");
            }
            else{
              $("#errorLastname").text("");
            }

            if(data.includes("invalidFirstname"))
            {
              $("#errorFirstname").text("Ezt a mezőt kötelező kitölteni!");
            }
            else{
              $("#errorFirstname").text("");
            }
            if(data.includes("invalidPhonenumber"))
            {
              $("#phoneErrorMsg").text("Ezt a mezőt kötelező kitölteni!");
            }
            else{
              if(data.includes("notValidNumber"))
              {
                $("#phoneErrorMsg").text("Érvénytelen formátum");
              }
              else{
                if(data.includes("existPhoneNum"))
                {
                  $("#phoneErrorMsg").text("Ez a telefonszám már foglalt");
                }
                else{
                  $("#phoneErrorMsg").text("");
                }
              } 
            }

            if(data.includes("invalidEmail"))
            {
              $("#errorEmail").text("Ezt a mezőt kötelező kitölteni!");
            }
            else{
              if(data.includes("existEmail"))
              {
                $("#errorEmail").text("Ez az email cím foglalt!");
              }
              else{
                $("#errorEmail").text("");
              }
            }

            if(data.includes("invalidPwd"))
            {
              $("#errorPassword").text("Ezt a mezőt kötelező kitölteni!");
            }
            else{
              if(data.includes("shortPassword"))
              {
                $("#errorPassword").text("Legalább 6 karakter!");
              }
              else{
                if(data.includes("differentPassword"))
                {
                  $("#errorPassword").text("A két jelszó nem egyezik!");
                }
                else{
                  $("#errorPassword").text("");
                }
              }
            }

            if(data.includes("invalidPasswordRepeat"))
            {
              $("#errorPasswordRepeat").text("Ezt a mezőt kötelező kitölteni!");
            }
            else{
              $("#errorPasswordRepeat").text("");
            }

            $("#regBtn").prop('disabled', false);

            console.log(data);
          }
      });

      });
    </script>

<script>
  // this is the id of the form
  $("#loginForm").submit(function(e) {

  e.preventDefault(); // avoid to execute the actual submit of the form.

  var form = $(this);

  $.ajax({
      type: "POST",
      url: "../actions/loginAction.php",
      data: form.serialize(), // serializes the form's elements.
      success: function(data)
      {
        if(data.includes("emailError"))
        {
          $("#emailErrorMsg").text("Ezt a mezőt kötelező kitölteni!");
        }
        else{
          $("#emailErrorMsg").text("");
        }
        if(data.includes("passwordError"))
        {
          $("#passwordErrorMsg").text("Ezt a mezőt kötelező kitölteni!");
        }
        else{
          $("#passwordErrorMsg").text("");
        }
        if(data.includes("loginFail"))
        {
          $("#loginError").text("Hibás email vagy jelszó!");
        }
        else{
          if(data.includes("notActiveError"))
          {
            $("#loginError").text("Nincs aktiválva a fiók");
          }
          else{
            if(data.includes("bannedError"))
            {
              $("#loginError").text("Profilja zárolva van");
            }
            else{
              $("#loginError").text("");
            }
            
          }
        }
        if(data.includes("none"))
        {
          location.reload();
        }
        console.log(data);
      }
  });

  });
</script>

<script>
  // this is the id of the form
  $("#logoutForm").submit(function(e) {

  e.preventDefault(); // avoid to execute the actual submit of the form.

  var form = $(this);

  $.ajax({
      type: "POST",
      url: "../actions/logoutAction.php",
      data: form.serialize(), // serializes the form's elements.
      success: function(data)
      {
        console.log(data);
      }
  });

  });
</script>
  </body>
</html>