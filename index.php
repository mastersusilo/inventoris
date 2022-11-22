<!DOCTYPE html>
<html lang="en">
<head>
  <title>SISFO RM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icons" type="image/png" href="images/icons/favicon.ico"/>
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-vl.0.0/icon-font.min.css">
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>

  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">

        <?php
        if (isset($_GET["err"])) 
        {
          if ($_GET["err"]==1) 
          { 
             echo " <div class='alert alert-danger'
             role='alert'>
             ANDA TIDAK PUNYA HAK  AKSES !!
             </div>";
           }
             if ($_GET["err"]==2) 
           
             {
               echo " <div class='alert alert-succes'
             role='alert'>
             ANDA TELAH KELUAR SISTEM!!
             </div>";
          }
        }

        ?>

        <form class="login100-form validate-form" action="logincek.php" method="post">
          <span class="login100-form-title p-b-55">
                SISFO Rekam Medis
          </span>

          <div class="wrap-input100 validate-input m-b-16" data-validate ="Username kosong">
            <input class="input100" type="text" name="username" placeholder="Username">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
            <span class="lnr lnr-user"></span>
          </span>
          </div>

          <div class="wrap-input100 validate-input m-b-16" data-validate ="Password is required">
            <input class="input100" type="password" name="password" placeholder="Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
            <span class="lnr lnr-lock"></span>
          </span>
          </div>
          <div class="container-login100-form-btn p-t-25">
            <button class="login100-form-btn">
               Login
            </button>
          </div>
        </form>

      </div>
    </div>
  </div>
  
  <script scr="vendor/jquery/jquery-3.2.1.min.js"></script>
  <script scr="vendor/bootstrap/js/popper.js"></script>
  <script scr="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script scr="vendor/select2/select2.min.js"></script>
  <script scr="js/main.js"></script>

</body>
</html>