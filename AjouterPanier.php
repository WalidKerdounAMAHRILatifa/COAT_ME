<?php
session_start();
require_once('database.php');
if(isset($_POST["sub"])){
	if(!isset($_SESSION['id_Personne'])){
		session_destroy();
		header('location:plateforme_admin/pages/login.html');
	}else{
		$taille=$_POST['taille'];
		$couleur=$_POST['couleur'];
		$quantite=$_POST['quantite'];
		$id_Produit=$_POST['id_Produit'];
		$result = $conn->prepare("SELECT prix_Produit FROM produit where id_Produit=$id_Produit ");
		$result->execute();
		$row = $result->fetch();
		$prix_Produit= $row['prix_Produit'];
		$total=$prix_Produit*$quantite;
		$id_Client=$_SESSION['id_Personne'];
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO panier ( sub_total,total, quantite_Panier,id_Produit,couleur,taille,id_Client)
				VALUES ('$prix_Produit', '$total', '$quantite','$id_Produit','$couleur','$taille','$id_Client')";
				$conn->exec($sql);
				header('location:product.php');
	}
}
if(isset($_POST["delete"])){
	require_once('database.php');
$id_Panier=$_POST['id_Panier'];
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "DELETE from panier where id_Panier=$id_Panier";
	$conn->exec($sql);
	header('location:product.php');
}


if(isset($_POST['logout'])){header('location:index.php'); session_destroy();	}




?>