<?php
    ob_start();
    session_start();

    include("include/config.php");
    include("include/defs.php");

     if(isset($_SESSION['MR_USER_ID']) && $_SESSION['MR_USER_ID'] !="")
     {
          header("Location: main.php");
          exit;
     }

    $errMSG="";

     if( isset($_POST['btn-login']) ) {

        $username = $_POST['username'];
        $password = encryptIt($_POST['password']);
        $username = strip_tags(trim($username));
        $password = strip_tags(trim($password));


        if(RecCount("users", "user_name = '".$username."' and pass = '".$password."' and stat = 1"))
        {

            $row = GetRecord("users", "user_name = '".$username."' and pass = '".$password."' and stat = 1");

            $_SESSION['MR_USER_ID'] = $row['id'];
            $_SESSION['MR_USER_NAME'] = $row['user_name'];
            $_SESSION['MR_USER_ROLE'] = $row['type_user'];
            $_SESSION['MR_NAME'] = $row['real_name'];
            $_SESSION['MR_LAST_NAME'] = $row['last_name'];

          /* Log Seguimiento */
          $arrVal = array(
                          "id_module" => 1,
                          "description" => "El usuasrio ".$row['real_name']." ".$row['last_name']." ha ingresado al sistema.",
                          "id_user" => $_SESSION['MR_USER_ID'],
                          "log_time" => date("Y-m-d H:i:s")
                         );

          $nId = InsertRec("log_tracing", $arrVal);
          /*  Fin Log Seguimiento */

            header("Location: main.php");

        }
        else
          $errMSG = '<div class="alert alert-danger"><a href="#" class="close" style="color:#000;" data-dismiss="alert">&times;</a><strong>Usuario o contraseña invalida, Intenta de nuevo...!</strong></div>';
     }
?>
<!DOCTYPE html>
<html lang="en" class=" ">
<head>
  <meta charset="utf-8" />
  <title>Mega Ramen</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/animate.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/icon.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" />
    <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>
<body class="" >
  <section id="content" class="m-t-lg wrapper-md animated fadeInUp">
    <div class="container aside-xl">
      <a class="navbar-brand block"></a>
      <section class="m-b-lg">
        <header class="wrapper text-center">
          <img src="images/1.png" alt="">
          <strong>Ramen v-1.0</strong>
        </header>
        <form name="frmForm" method="post" action="index.php">
          <div class="list-group">
            <div class="list-group-item">
              <input type="text" placeholder="Usuario" name="username" class="form-control no-border">
            </div>
            <div class="list-group-item">
               <input type="password" placeholder="Contraseña" name="password" class="form-control no-border">
            </div>
          </div>
          <input type="hidden" name="ingreso" value="1">
          <button type="submit" name="btn-login" class="btn btn-lg btn-primary btn-block">Ingresar</button>
          <div class="text-center m-t m-b"><a href="#"><small></small></a></div>

        </form>
      </section>
    </div>
  </section>
  <!-- footer -->

  <!-- / footer -->
  <script src="js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.js"></script>
  <!-- App -->
  <script src="js/app.js"></script>
  <script src="js/slimscroll/jquery.slimscroll.min.js"></script>
  <script src="js/app.plugin.js"></script>
</body>
</html>
