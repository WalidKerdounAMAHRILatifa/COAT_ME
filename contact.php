<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Coat Me: Contactez-Nous</title>
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
<body class="animsition">
	
	<!-- Header -->
	<header class="header-v3">
		<!-- Header desktop -->
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
					<div class="wrap-icon-header flex-w flex-r-m h-full">							
						<div class="flex-c-m h-full p-r-25 bor6">
							<div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="
							<?php  
							
								require_once('database.php');
								if(isset($_SESSION['id_Personne'])==true){
								$id=$_SESSION['id_Personne'] ;
								$resul = $conn->prepare("SELECT count(id_Panier) as id_Panier FROM panier where id_Client=$id ");
								$resul->execute();
								$row = $resul->fetch();
								$data_notify= $row['id_Panier'];
								echo $data_notify;
									}else{
										echo "0";
									}
								
							?>
							">
								<i class="zmdi zmdi-shopping-cart"></i>
							</div>
						</div>
							
						<div class="flex-c-m h-full p-lr-19">
							<div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
								<i class="zmdi zmdi-menu"></i>
							</div>
						</div>
						<?php if(isset($_SESSION['id_Personne'])==true){
							echo "<form method='POST' action='AjouterPanier.php'><button type='submit' name='logout' style='background:url(images/icons/logout.png);width:38px;height:38px;margin-right:5px;'></button></form>";
						}
							?>
					</div>
				</nav>
			</div>	
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
					<div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="
					<?php  
							
								require_once('database.php');
								if(isset($_SESSION['id_Personne'])==true){
								$id=$_SESSION['id_Personne'] ;
								$resul = $conn->prepare("SELECT count(id_Panier) as id_Panier FROM panier where id_Client=$id ");
								$resul->execute();
								$row = $resul->fetch();
								$data_notify= $row['id_Panier'];
								echo $data_notify;
									}else{
										echo "0";
									}
								
							?>
					">
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

	<!-- Sidebar -->
	<aside class="wrap-sidebar js-sidebar">
		<div class="s-full js-hide-sidebar"></div>

		<div class="sidebar flex-col-l p-t-22 p-b-25">
			<div class="flex-r w-full p-b-30 p-r-27">
				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-sidebar">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="sidebar-content flex-w w-full p-lr-65 js-pscroll">
				<ul class="sidebar-link w-full">
					<li class="p-b-13">
						<a href="index.php" class="stext-102 cl2 hov-cl1 trans-04">
							Acceuil
						</a>
					</li>

					<li class="p-b-13">
						<a href="#" class="stext-102 cl2 hov-cl1 trans-04">
							Liste d'envie
						</a>
					</li>

					<li class="p-b-13">
						<a href="#" class="stext-102 cl2 hov-cl1 trans-04">
							Mon Compte
						</a>
					</li>
				</ul>

				<div class="sidebar-gallery w-full p-tb-30">
					<span class="mtext-101 cl5">
						@ CoatMe
					</span>

					<div class="flex-w flex-sb p-t-36 gallery-lb">
						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="imageProduit/class1.jpg" data-lightbox="gallery" 
							style="background-image: url('imageProduit/class1.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="imageProduit/1.jpg" data-lightbox="gallery" 
							style="background-image: url('imageProduit/1.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="imageProduit/casual1.jpg" data-lightbox="gallery" 
							style="background-image: url('imageProduit/casual1.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="imageProduit/ca2.jpg" data-lightbox="gallery" 
							style="background-image: url('imageProduit/ca2.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="imageProduit/sport1.jpg" data-lightbox="gallery" 
							style="background-image: url('imageProduit/sport1.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="imageProduit/w3.jpg" data-lightbox="gallery" 
							style="background-image: url('imageProduit/w3.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="imageProduit/class2.jpg" data-lightbox="gallery" 
							style="background-image: url('imageProduit/class2.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="imageProduit/4.jpg" data-lightbox="gallery" 
							style="background-image: url('imageProduit/4.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="imageProduit/casual2.jpg" data-lightbox="gallery" 
							style="background-image: url('imageProduit/casual2.jpg');"></a>
						</div>
					</div>
				</div>

				<div class="sidebar-gallery w-full">
					<span class="mtext-101 cl5">
						À propos
					</span>

					<p class="stext-108 cl6 p-t-27" >
						Chez Nous vous trouverez des <u><i>Mantaux/vestes</i></u> pour <u><i>Femmes/Hommes</i></u> fourmillent en styles variés pour toute saison. <br><b>Coat-Me</b>, vous propose toutes les tailles , couleurs et bonprix !
					</p>
				</div>
			</div>
		</div>
	</aside>
	
	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Votre Panier
				</span>
			
				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">

					<form method="POST" action="AjouterPanier.php">
						<?php  
							
								require_once('database.php');
								$id=0;
								if(isset($_SESSION['id_Personne'])==true){
								$id=$_SESSION['id_Personne'] ;}
								$resul = $conn->prepare("SELECT id_Panier,image_Produit ,quantite_Panier,sub_total FROM panier p1, produit p2 where id_Client=$id and p1.id_Produit=p2.id_Produit");
								$resul->execute();
								for($i=0; $row = $resul->fetch(); $i++){
									
					?>

					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="imageProduit/<?php echo $row['image_Produit']; ?>" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								Mantau Classique 
							</a>
							<input type="hidden" name="id_Panier" value="<?php echo $row['id_Panier'];?>">
							<button name="delete" type="submit" style="background: url(images/icons/icon-close3.png);width: 15px;height: 15px;float:right;margin-bottom: 10px;"></button>
							<span class="header-cart-item-info">
								<?php echo $row['quantite_Panier']." x ".$row['sub_total']."DH"; ?> 
							</span>
						</div>
					</li>
				<?php }
					?>
					</form>
				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						<?php 
						$resul = $conn->prepare("SELECT sum(total) as total FROM panier where id_Client=$id ");
						$resul->execute();
						$row = $resul->fetch();
						if($id!==0){echo "Total: ".$row['total']." DH";}else{echo "Total: 0 DH";}  ?>
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="shoping-cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							Consulter Votre Panier
						</a>

						<a href="shoping-cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							check-out

						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Contactez-Nous
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form>
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Envoyez-Nous Un Message
						</h4>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Votre Adresse Email">
							<img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
						</div>

						<div class="bor8 m-b-30">
							<textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg" placeholder="Comment Nous Pouvons Vous-Aidez ??"></textarea>
						</div>

						<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
							Envoyez
						</button>
					</form>
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Addresse
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
								Agadir, Morocco.
							</p>
						</div>
					</div>

					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Appelez-Nous
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								+212 512345678
							</p>
						</div>
					</div>

					<div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Support
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								contact@coatme.com
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
	
	
	<!-- Map -->
	<div class="map">
		<div class="size-303" id="google_map" data-map-x="40.691446" data-map-y="-73.886787" data-pin="images/icons/pin.png" data-scrollwhell="0" data-draggable="1" data-zoom="11"></div>
	</div>



	
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
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="js/map-custom.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>