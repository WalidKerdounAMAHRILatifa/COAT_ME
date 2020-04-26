<?php
require_once('../database.php');

	$nom_Produit='';
	$prix_Produit=0;
	$size_Produit='';
	$gender='';
	$Quantite_Produit=0;
	$description_Produit='';
	$couleur='';
	$materiels='';
	$image='';
try{
		if(isset($_POST['btn_add'])){
	move_uploaded_file($_FILES["image_Produit"]["tmp_name"],"C:\Apache24\htdocs\COAT_ME\imageProduit/" . $_FILES["image_Produit"]["name"]);			
	$image=$_FILES["image_Produit"]["name"];
	$nom_Produit=$_POST['nom_Produit'];
	$prix_Produit=$_POST['prix_Produit'];
	$size_Produit=$_POST['size_Produit'];
	$gender=$_POST['gender'];
	$Quantite_Produit=$_POST['Quantite_Produit'];
	$description_Produit=$_POST['description_Produit'];
	$couleur=$_POST['couleur'];
	$materiels=$_POST['materiels'];
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "INSERT INTO produit ( nom_Produit, image_Produit, prix_Produit, size_Produit, gender, Quantite_Produit, description_Produit,couleur,materiels)
	VALUES ('$nom_Produit', '$image', '$prix_Produit','$size_Produit', '$gender', '$Quantite_Produit', '$description_Produit','$couleur','$materiels')";

		$conn->exec($sql);
		echo "<script>alert('Le Produit a bien été ajouté!'); window.location='GestionDesProduits.php'</script>";
	
}	
	if(isset($_POST['btn_delete'])){
		$id_Produit=$_POST['id_Produit'];
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql="DELETE FROM produit WHERE id_Produit='$id_Produit'";
		$conn->exec($sql);
		echo "<script>alert('Le Produit a bien été supprimé!'); window.location='GestionDesProduits.php'</script>";
	}

	if(isset($_POST['btn_edit'])){
				
		$id_Produit=$_POST['id_Produit'];
		
		$nom_Produit=$_POST['nom_Produit'];
		$prix_Produit=$_POST['prix_Produit'];
		$size_Produit=$_POST['size_Produit'];
		$gender=$_POST['gender'];
		$Quantite_Produit=$_POST['Quantite_Produit'];
		$description_Produit=$_POST['description_Produit'];
		$couleur=$_POST['couleur'];
		$materiels=$_POST['materiels'];
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if($_FILES["image_Produit"]["tmp_name"] !=''){
			move_uploaded_file($_FILES["image_Produit"]["tmp_name"],"C:\Apache24\htdocs\COAT_ME\imageProduit/" . $_FILES["image_Produit"]["name"]);	
			$image=$_FILES["image_Produit"]["name"];
			$sql="UPDATE produit SET nom_Produit='$nom_Produit',prix_Produit='$prix_Produit',size_Produit='$size_Produit',gender='$gender',Quantite_Produit='$Quantite_Produit',description_Produit='$description_Produit',couleur='$couleur',materiels='$materiels',image_Produit='$image' WHERE id_Produit='$id_Produit' ";
	    $conn->exec($sql);
		echo "<script>alert('Le Produit a bien été modifié!'); window.location='GestionDesProduits.php'</script>";
		}else{
			$sql="UPDATE produit SET nom_Produit='$nom_Produit',prix_Produit='$prix_Produit',size_Produit='$size_Produit',gender='$gender',Quantite_Produit='$Quantite_Produit',description_Produit='$description_Produit',couleur='$couleur',materiels='$materiels' WHERE id_Produit='$id_Produit' ";
	    $conn->exec($sql);
		echo "<script>alert('Le Produit a bien été modifié!'); window.location='GestionDesProduits.php'</script>";
		}
	    
	}

	if(isset($_POST['logout'])){
		header('location:pages/login.php'); session_destroy();
	}
	
	

}catch(Exception $e){
	die('Error: '.$e->getMessage());
}

?>