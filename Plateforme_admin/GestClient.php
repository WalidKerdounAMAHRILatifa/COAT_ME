<?php

    //fonction de validation de password
    function validate_password($password)
    {
        try{
             //check if password est sous la bonne format
            if (preg_match('/^(?=.*[A-Z])(?=.*[0-9])(?=.*[*&%$@ !?#]).{8,}$/', $password)) {
                //echo 'Bon Votre mot de passe contient plus que 8 caractere est fort. <br>';
                return TRUE;
            }
            else 
            {
                return FALSE;
            }
        }
        catch(Exception $e){
            echo "ERROR: ".$e;
        }
    }
require_once('../database.php');

	$nom_Personne='';
	$prenom_Personne='';
	$email_Personne='';
	$tele_Personne='';
	$psw_Personne='';
	$adresse='';
	$pays='';
	$role='';
	$nickname='';
try{
		if(isset($_POST['btn_add'])){
	$nom_Personne=$_POST['nom_Personne'];
	$prenom_Personne=$_POST['prenom_Personne'];
	$email_Personne=$_POST['email_Personne'];
	$tele_Personne=$_POST['tele_Personne'];
	$psw_Personne=$_POST['psw_Personne'];
	$adresse=$_POST['adresse'];
	$pays=$_POST['pays'];
	$role=$_POST['role'];
	$nickname=$_POST['nickname'];
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "INSERT INTO personne (nom_Personne,prenom_Personne,email_Personne,tele_Personne,psw_Personne,adresse,pays,role,nickname)
	VALUES ('$nom_Personne', '$prenom_Personne', '$email_Personne','$tele_Personne', '$psw_Personne', '$adresse', '$pays','$role','$nickname')";
		if(validate_password($psw_Personne) == TRUE ){
			$conn->exec($sql);
			echo "<script>alert('Le Client a bien été ajouté!'); window.location='GestionDesClients.php'</script>";
		}if( validate_password($psw_Personne) == FALSE ){
			echo "<script>alert('les mots de passe ne correspondent pas.Veuillez réessayer.'); window.location='GestionDesClients.php'</script>";
		}
}	
	if(isset($_POST['btn_delete'])){
		$id_Personne=$_POST['id_Personne'];
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql="DELETE FROM personne WHERE id_Personne='$id_Personne'";
		$conn->exec($sql);
		echo "<script>alert('Le Client a bien été supprimé!'); window.location='GestionDesClients.php'</script>";
	}

	if(isset($_POST['btn_edit'])){				
		$id_Personne=$_POST['id_Personne'];
		$nom_Personne=$_POST['nom_Personne'];
		$prenom_Personne=$_POST['prenom_Personne'];
		$email_Personne=$_POST['email_Personne'];
		$tele_Personne=$_POST['tele_Personne'];
		$psw_Personne=$_POST['psw_Personne'];
		$adresse=$_POST['adresse'];
		$pays=$_POST['pays'];
		$role=$_POST['role'];
		$nickname=$_POST['nickname'];

		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
			$sql="UPDATE personne SET nom_Personne='$nom_Personne',prenom_Personne='$prenom_Personne',email_Personne='$email_Personne',tele_Personne='$tele_Personne',psw_Personne='$psw_Personne',adresse='$adresse',pays='$pays',role='$role',nickname='$nickname' WHERE id_Personne='$id_Personne' ";
	    $conn->exec($sql);
		echo "<script>alert('Le Client a bien été modifié!'); window.location='GestionDesClients.php'</script>";
	    
	}

	
	

}catch(Exception $e){
	die('Error: '.$e->getMessage());
}

?>