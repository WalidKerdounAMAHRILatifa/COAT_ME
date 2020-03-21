<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product Detail</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
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
						<div class="flex-c-m h-full p-r-25 bor6">
							<div class="icon-header-item cl12 hov-cl1 trans-04 p-lr-22 p-r-11 icon-header-noti " data-notify="0">
								<i class="zmdi zmdi-favorite-outline"></i>
							</div>
						</div>
						<?php if(isset($_SESSION['id_Personne'])==true){
							echo "<form method='POST' action='AjouterPanier.php' ><button type='submit' name='logout' style='background:url(images/icons/logout.png);width:38px;height:38px;margin-right:5px;'></button></form>";
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
	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="product.php" class="stext-109 cl8 hov-cl1 trans-04">
				Men
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Lightweight Jacket
			</span>
		</div>
	</div>
		

	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
						<?php  
							if(isset($_POST['submit1'])){
							$id_Produit= $_POST['id_Produit'];
								require_once('database.php');
								$result = $conn->prepare("SELECT * FROM produit where id_Produit=$id_Produit ");
								$result->execute();
								for($i=0; $row = $result->fetch(); $i++){
									
							?>
							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb="imageProduit/<?php echo $row['image_Produit']; ?>">
									<div class="wrap-pic-w pos-relative">
										<img src="imageProduit/<?php echo $row['image_Produit']; ?>" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="imageProduit/<?php echo $row['image_Produit']; ?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
					
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							<?php echo $row['description_Produit'];?>
						</h4>


						<span class="mtext-106 cl2">
							<?php echo $row['prix_Produit']; ?> DH
						</span>

						<p class="stext-102 cl3 p-t-23">
								Commandez des manteaux Classiques pour les Femmes sur <b><u>CoatMe</u></b> avec :<br> ✓Une Livraison gratuite<br> ✓ Pour Toutes Les Tailles <br> ✓ Toutes Les Couleurs
						</p>
						
						<!--  -->
						<form method="POST" action="AjouterPanier.php">
							<div class="p-t-33">
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										La taille
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" name="taille">
												<option>Choisissez une taille</option>

												<?php $size_Produit=explode(",", $row['size_Produit']);
														
														for ($n=0; $n <sizeof($size_Produit) ; $n++) { 
															echo "<option value='$size_Produit[$n]'>".$size_Produit[$n]."</option>";
														}
												 ?>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										La Couleur
									</div>
								
									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">

											<select class="js-select2" name="couleur">
												<option>Choisissez une couleur</option>
											<?php $couleur_Produit=explode(",", $row['couleur']);
														
														for ($n=0; $n <sizeof($couleur_Produit) ; $n++) { 
															echo "<option value='$couleur_Produit[$n]'>".$couleur_Produit[$n]."</option>";
														}
												 ?>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-204 flex-w flex-m respon6-next">
										<div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="quantite" value="1" >

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
										<input  name="id_Produit" value="<?php echo $id_Produit?>" type="text" hidden >
										<button name="sub" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
											Ajouter au Panier
										</button>
									</div>
								</div>	
							</div>
						</form>
						<!--  -->
						<div class="flex-w flex-m p-l-100 p-t-40 respon7">
							<div class="flex-m bor9 p-r-10 m-r-11">
								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
									<i class="zmdi zmdi-favorite"></i>
								</a>
							</div>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
								<i class="fa fa-facebook"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
								<i class="fa fa-twitter"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
								<i class="fa fa-google-plus"></i>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="bor10 m-t-50 p-t-43 p-b-40">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">

						<li class="nav-item p-b-10">
							<a class="nav-link active" data-toggle="tab" href="#information" role="tab">Autres Informations</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Avis ()</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-43">

						<!-- - -->
						<div class="tab-pane fade show active" id="information" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<ul class="p-lr-28 p-lr-15-sm">

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Informations Tissu
											</span>

											<span class="stext-102 cl6 size-206">
												<?php echo $row['materiels'];?>
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Couleur
											</span>

											<span class="stext-102 cl6 size-206">
												<?php echo $row['couleur'];?>
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												La Taille
											</span>

											<span class="stext-102 cl6 size-206">
												<?php echo $row['size_Produit'];?>
											</span>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="reviews" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<div class="p-b-30 m-lr-15-sm">
										<!-- Review -->
										
							    <?php
							    	
												  $tab2 = array();
												  $i=0;
												  $j=0;
												  $fichier=fopen("Review.txt", "r+");
												  while (!feof($fichier)) {
												  $tab=explode("|", fgets($fichier));
												  if(!empty($tab[$j])){
												  $tab2[$i] = array($tab[$j],$tab[++$j],$tab[++$j],$tab[++$j],$tab[++$j],$tab[++$j]);}
												  $i++;
												  $j=0;
												}
												$stars=0;
												 for($i=0;$i<sizeof($tab2);$i++){
												 	if( !empty($tab2[$i][4])and ($tab2[$i][4]===$id_Produit)){
												 	echo "	<div class='flex-w flex-t p-b-68'>
											

											<div class='size-207'>
												<div class='flex-w flex-sb-m p-b-17'>
													<span class='mtext-107 cl2 p-r-20'>
														".$tab2[$i][1]."
														</span>

													<span class='fs-18 cl11'>";
													for($z=0;$z<$tab2[$i][0];$z++){echo"	<i class='zmdi zmdi-star'></i>";}
													echo "</span>
												</div>

												<p class='stext-102 cl6'>
													".$tab2[$i][2]."
												</p>
											</div>
										</div>";
												 			
										}}?>		 		
								
												
										
										<!-- Add review -->
										<form class="w-full" method="POST" action="ajouterCommentaire.php">
											<h5 class="mtext-108 cl2 p-b-7">
												Ajouter Un Commentaire
											</h5>

											<div class="flex-w flex-m p-t-50 p-b-23">
												<span class="stext-102 cl3 m-r-16">
													Votre Rating
												</span>

												<span class="wrap-rating fs-18 cl11 pointer">
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<input class="dis-none" type="number" name="rating">
												</span>
											</div>

											<div class="row p-b-25">
												<div class="col-12 p-b-5">
													<label class="stext-102 cl3" for="review">Votre Commentaire</label>
													<textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
												</div>

												<div class="col-sm-6 p-b-5">
													<label class="stext-102 cl3" for="name">Nom</label>
													<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="text" name="name">
												</div>
													<input type="hidden" name="id_Produit" value="<?php echo $row['id_Produit'];?>" >
												<div class="col-sm-6 p-b-5">
													<label class="stext-102 cl3" for="email">Email</label>
													<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email" type="text" name="email">
												</div>
											</div>

											<button name="submit3" class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
												Envoyer
											</button>
										</form>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">

			<span class="stextt-103 cl6 p-lr-25">
				<span ><b>Catégorie: </b></span> <pre  class="stextt-103 cl6 p-lr-25"><?php if($row['gender']=='women'){
					echo $row['nom_Produit'].",Femme";}elseif($row['gender']=='men'){echo $row['nom_Produit'].",Homme";}?></pre>
			</span>
		</div>
	</section>


	<!-- Related Products -->
	<section class="sec-relate-product bg0 p-t-45 p-b-105">
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center">
					Produits Associés
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
					
						<?php
			 $GLOBALS['gender']=$row['gender'];
			  $GLOBALS['id_Produit']=$row['id_Produit'];
			 $GLOBALS['nom_Produit']=$row['nom_Produit'];}
			$result2 = $conn->prepare("SELECT * FROM produit where gender='$gender' and nom_Produit='$nom_Produit' and id_Produit<>$id_Produit");
			$result2->execute();
			for($i=0; $row = $result2->fetch(); $i++){
			$id=$row['id_Produit'];
			?>
			<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
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

								<div class="block2-txt-child2 flex-r p-t-3">
									<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
										<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
										<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
									</a>
								</div>
							</div>
					   </div>
					
					</div>
   <?php } }?>
					
			
				</div>
			</div>
		</div>
	</section>
		

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
										<a href="product.php" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5"  >
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

	<!-- Modal1 -->
	<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
		<div class="overlay-modal1 js-hide-modal1"></div>

		<div class="container">
			<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
				<button class="how-pos3 hov3 trans-04 js-hide-modal1">
					<img src="images/icons/icon-close.png" alt="CLOSE">
				</button>

				<div class="row">
					<div class="col-md-6 col-lg-7 p-b-30">
						<div class="p-l-25 p-r-30 p-lr-0-lg">
							<div class="wrap-slick3 flex-sb flex-w">
								<div class="wrap-slick3-dots"></div>
								<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

								<div class="slick3 gallery-lb">
									<div class="item-slick3" data-thumb="images/product-detail-01.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="images/product-detail-01.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-01.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>

									<div class="item-slick3" data-thumb="images/product-detail-02.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="images/product-detail-02.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-02.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>

									<div class="item-slick3" data-thumb="images/product-detail-03.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="images/product-detail-03.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-03.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
			
				</div>
			</div>
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
				swal(nameProduct, "is added to cart !", "success");
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