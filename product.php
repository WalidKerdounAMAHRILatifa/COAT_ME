<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Coat Me: Produits</title>
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
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
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
								<a href="Contact/contact.php">Contactez-Nous</a>
							</li>
						</ul>
					</div>	

					<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m">
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
					<a href="Contact/contact.php">Contactez-Nous</a>
				</li>

			</ul>
		</div>

		<!-- Modal Search -->
	
	</header>

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
								$resul = $conn->prepare("SELECT nom_Produit,id_Panier,image_Produit ,quantite_Panier,sub_total FROM panier p1, produit p2 where id_Client=$id and p1.id_Produit=p2.id_Produit");
								$resul->execute();
								for($i=0; $row = $resul->fetch(); $i++){
									
					?>

					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="imageProduit/<?php echo $row['image_Produit']; ?>" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
							<?php echo $row['nom_Produit']; ?>
							</a>
							<input type="hidden" name="id_Panier" value="<?php echo $row['id_Panier'];?>">
							<button name="delete" type="submit" style="background: url(images/icons/icon-close3.png);width: 15px;height: 15px;margin-left: 150px;"></button>
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

						<a href="checkoutPage/checkout.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							check-out

						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	
	<!-- Product -->
	<div class="bg0 m-t-23 p-bx-140"><!--it was bg0 m-t-23 p-b-140"-->
		<br><br><br><br><br>
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						Tous Les Produits
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".women">
						Femme
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".men">
						Homme
					</button>
				</div>
			</div>
	
			<div class="row isotope-grid">
				
	<?php

			require_once('database.php');
			$result = $conn->prepare("SELECT * FROM produit ORDER BY id_Produit ASC LIMIT 16");
			$result->execute();
			for($i=0; $row = $result->fetch(); $i++){
			$id=$row['id_Produit'];
			?>
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo $row['gender']; ?>">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="imageProduit/<?php echo $row['image_Produit']; ?>" alt="IMG-PRODUCT">
							  	<form method="POST" action="product-detail.php" >
										<input type="hidden" name="id_Produit" value="<?php echo $row['id_Produit'];?>" >
										<button name="submit1"class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 " >Aperçu rapide</button> 
							  </form>

						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<input type="hidden" name="id_Produit" value="<?php echo $row['id_Produit'];?>" >
								<a  href="#" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">			
									<?php echo $row['nom_Produit']; ?> 
								</a>
								<span class="stext-105 cl3">
									<?php echo $row['prix_Produit']; ?> DH
								</span>
							</div>
						</div>
					</div>
				</div>
<?php } ?>
				
			<!-- Load more -->
		<!--	<div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Voir Plus
				</a>
			</div>-->
		</div>
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
										<a  href="#" class="stext-107 cl7 hov-cl1 trans-04" data-filter=".men">
											<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5"  data-filter=".men">
												Homme
											</button>
										</a>
								</li>
						   </div>
							<div class="col-sm-6 col-lg-3 p-b-50" id="step-back">
								<li class="p-b-10">
										<a href="#" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".women"  >
											<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 " data-filter=".women">
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

	<!-- Modal1 -->
	
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
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2, .js-addwish-detail').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "est ajouté à votre panier !", "success");
			});
		});
	
	</script>
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