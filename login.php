<?php 
    error_reporting(0);
    $message = $_GET['error']; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Login - KSUA</title>

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--external css-->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">
</head>

<body>
    <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
    <div id="login-page">
        <div class="container">
            <form class="form-login" action="componen/auth.php" method="post">
                <h2 class="form-login-heading">Sign in Now</h2>
                <br>
                <?php if ($message == 1) { ?>
                <div class="alert alert-danger" role="alert">Username/Password salah, silahkan coba
                    lagi.</div>
                <?php } else if ($message == 2){ ?>
                <div class="alert alert-danger" role="alert">Anda belum login, silahkan login.</div>
                <?php } else if ($message == 3){ ?>
                <div class="alert alert-success" role="alert">Anda berhasil logout.</div>
                <?php } else if ($message == 4){ ?>
                <div class="alert alert-success" role="alert">
                    <center>Username/Password berhasil diganti.<br /> Silahkan login ulang.<center>
                </div>
                <?php } ?>
                <div class="login-wrap">
                    <input type="text" class="form-control" id="username" name="username" placeholder="User ID" />
                    <br>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
                    <br>
                    <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i>
                        SIGN IN</button>
                    <hr>

                </div>

            </form>
        </div>
    </div>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
    <script>
    $.backstretch("img/login-bg.jpg", {
        speed: 500
    });
    </script>
</body>

</html>