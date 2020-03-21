<?php
		if(isset($_POST['submit3'])){

				require_once('database.php');

				$rating=$_POST['rating'];
				$nom=$_POST['name'];
				$Commentaire=$_POST['review'];
				$email=$_POST['email'];
				$id_Produit=$_POST['id_Produit'];
				$date=date("yy-m-d");

				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO review ( date_Review,stars, commentaire, id_Produit, Nom, Email)
				VALUES ( '$date','$rating', '$Commentaire','$id_Produit', '$nom', '$email')";

				$conn->exec($sql);
				$fichier = fopen('Review.txt','a+');
				$text=$rating."|".$nom."|".$Commentaire."|".$email."|".$id_Produit."|".$date.PHP_EOL;
				fwrite($fichier, $text);
				fclose($fichier);
			    header('location:product.php');
			}
					
?>
