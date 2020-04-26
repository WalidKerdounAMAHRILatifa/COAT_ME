<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="../../index.php"><img class="logo-img" src="../../images/icons/logo4.png" alt="logo"></a><span class="splash-description">Se Connecter à Coat_Me.</span></div>
            <div class="card-body">
                <form method="POST" action="connexion.php">
                    <div class="form-group">
                        <input class="form-control form-control-lg"  type="email" name="email" placeholder="E-mail" value="<?php if(isset($_COOKIE["login"])) { echo $_COOKIE["login"]; } ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" name="password" type="password" placeholder="Mot De Passe" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="Connexion">Connexion</button>
                </form>
            </div>
            <div class="card-footer  p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="sign-up.html" class="footer-link">Créer Un Compte</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">MDP oublié ?</a>
                </div>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>