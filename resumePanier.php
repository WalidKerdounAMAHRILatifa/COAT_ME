<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Coat Me: Panier d'Achat</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/coat.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<script> document.getElementById("aa").disabled = true; </script>
<body class="animsition">
	
<!-- Header -->
	<!-- Header desktop -->
<header class="header-m3">
		
		<div class="container-menu-desktop trans-03">
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop p-l-45">
					
					<!-- Logo desktop -->		
					<a href="index.php" class="logo">
						<img src="images/icons/logo4.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="index.php">Acceuil</a>
							</li>

							<li>
								<a href="product.php">Produit</a>
							</li>

							<li>
								<a href="contact.php">Contactez-Nous</a>
							</li>
						</ul>
					</div>	

					<!-- Icon header -->
			
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.php"><img src="images/icons/logo4.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
				<div class="flex-c-m h-full p-r-5">
					<div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="">
						<i class="zmdi zmdi-shopping-cart"></i>
					</div>
				</div>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">

			<ul class="main-menu-m">
				<li>
					<a href="index.php">Acceuil</a>
				</li>

				<li>
					<a href="product.php">Produit</a>
				</li>

				<li>
					<a href="contact.php">Contactez-Nous</a>
				</li>

			</ul>
		</div>

	</header>

	<!-- Cart -->
	
	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>
		

	<!-- Shoping Cart --><br><br><br>
	<form class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Produit</th>
									<th class="column-2"></th>
									<th class="column-3">Prix</th>
									<th class="column-3">Quantité</th>
									<th class="column-5">Total</th>
								</tr>
								<?php  
							
								require_once('database.php');
								$id=0;
								if(isset($_SESSION['id_Personne'])==true){
								$id=$_SESSION['id_Personne'] ;}
								$resul = $conn->prepare("SELECT id_Panier,image_Produit,nom_Produit ,quantite_Panier,sub_total FROM panier p1, produit p2 where id_Client=$id and p1.id_Produit=p2.id_Produit");
								$resul->execute();
								for($i=0; $row1 = $resul->fetch(); $i++){
									
								?>

								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="imageProduit/<?php echo $row1['image_Produit']; ?>" alt="IMG">
										</div>
									</td>
									<td class="column-2"><?php echo $row1['nom_Produit']; ?></td>
									<td class="column-3"><?php echo $row1['sub_total']; ?></td>
									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div id="aa" class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input type="number"  name="<?= $row1['quantite_Panier']?>" class="mtext-104 cl3 txt-center num-product"  value="<?php echo $row1['quantite_Panier']?>">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>
									<td class="column-5"><?php echo $row1['quantite_Panier']*$row1['sub_total']."DH"; ?> </td>
								</tr>
								<?php } ?>
								
							</table>
						</div>

						
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Totals de Panier
						</h4>		

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
								<?php 
									$resul = $conn->prepare("SELECT sum(total) as total FROM panier where id_Client=$id ");
									$resul->execute();
									$row = $resul->fetch();
									if($id!==0){echo "Total: ".$row['total']." DH";}else{echo "Total: 0 DH";}  ?>
								</span>
							</div>
						</div>

						
					</div>
				</div>
			</div>
		</div>
	</form>
		
	
		


	<!-- Footer -->
		<!-- Footer -->
		<footer class="bg3 p-t-75 p-b-32">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-lg-3 p-b-50">
						<h4 class="stext-301 cl0 p-b-30">
							Categories
						</h4>
	
					</div>
	
					<div class="flex-w flex-l-m filter-tope-group m-tb-10">
	
							<div class="col-sm-6 col-lg-3 p-b-50">
								<li class="p-b-10">
										<a href="product.php" class="stext-107 cl7 hov-cl1 trans-04">
											<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" >
												Homme
											</button>
										</a>
								</li>
						   </div>
							<div class="col-sm-6 col-lg-3 p-b-50" id="step-back">
								<li class="p-b-10">
										<a href="product.php" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" >
											<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" >
												Femme
											</button>
										</a>			
								</li>
						   </div>
					</div>
	
				</div>
						<p class="stext-107 cl6 txt-center">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;<script>document.write(new Date().getFullYear());</script> | Ce Site est Realisé par <a href="index.php" target="_blank">KERDOUN Walid && AMAHRI Latifa</a>
	
						</p>
				</div>
		</footer>

	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
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
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>