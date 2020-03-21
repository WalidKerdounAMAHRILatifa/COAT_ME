<?php
session_start();

if(isset($_POST['Envoyer']))
{
	echo "<script>alert('Votre Commande Sera Délivrer dans 7 Jours '); window.location='../resumePanier.php'</script>";

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Coat Me: Mantaux et Vestes Pour les Femmes&Hommes</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<link rel="icon" type="image/png" href="../images/icons/coat.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

</head>
<body>


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" method="POST" action="checkout.php">
				<span class="contact100-form-title">
					Page de Check-Out
				</span>

				<label class="label-input100" for="first-name">Votre Nom *</label>
				<div class="wrap-input100 rs1 validate-input">
					<input id="first-name" class="input100" type="text" name="Nom" placeholder="First name">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 rs1 validate-input">
					<input class="input100" type="text" name="Prenom" placeholder="Last name">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="email">Addresse Email *</label>
				<div class="wrap-input100 validate-input">
					<input id="email" class="input100" type="text" name="Email" placeholder="Ex. exemple@email.com">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="phone">Numero de Téléphone *</label>
				<div class="wrap-input100 validate-input">
					<input id="phone" class="input100" type="text" name="Tel" placeholder="Ex. +212 500 000000">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="phone">Adresse *</label>
				<div class="wrap-input100 validate-input">
					<input class="input100" type="text" name="Adresse" placeholder="">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="first-name">Ville/ZipCode *</label>
				<div class="wrap-input100 rs1 validate-input">
					<input class="input100" type="text" name="Ville" placeholder="">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 rs1 validate-input">
					<input class="input100" type="text" name="ZipCode" placeholder="">
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<button type="submit" name="Envoyer" class="contact100-form-btn">
						<span>
							Envoyer
							<i class="zmdi zmdi-arrow-right m-l-8"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>



<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
