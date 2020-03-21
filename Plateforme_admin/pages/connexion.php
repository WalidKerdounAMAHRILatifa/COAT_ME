<?php
session_start();

if (isset($_POST["Inscription"])) {
	require_once('../../database.php');

	$username=$_POST["username"];
	$email=$_POST["email"];
	$password1=$_POST["password1"];
	$password2=$_POST["password2"];

	$result = $conn->prepare("SELECT * FROM personne where email_Personne=$email ");
	$result->execute();
	

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "INSERT INTO personne ( email_Personne,psw_Personne, nickname)
		VALUES ('$email', '$password1', '$username')";
	if($result->rowCount() == 0)	{
			if(strcmp( $password1, $password2 )==0){
				$conn->exec($sql);
				echo "<script>alert('Votre compte a été créé avec succès!'); window.location='login.html'</script>";
			}else{
				echo "<script>alert('les mots de passe ne correspondent pas.Veuillez réessayer.'); window.location='sign-up.html'</script>";
			}

		}else{
			echo "<script>alert('création impossible .Ce compte existe déjà !'); window.location='sign-up.html'</script>";
		}
}

if (isset($_POST["Connexion"])) {
	
		


try {
   require_once('../../database.php');

	$email=$_POST["email"];
	$password=$_POST["password"];

	$result =$conn->prepare("SELECT * FROM `personne` WHERE email_Personne='$email' and psw_Personne='$password'");
	$result->execute();


	if($result->rowCount() >0)	{
		for($i=0; $row = $result->fetch(); $i++){
					$role=$row['role'];
					if($role=='Admin') {
						$_SESSION['id_Personne']=$row['id_Personne'];
						$_SESSION['username']=$row['nickname'];
						header('location:../index.html');
					}
				elseif	($role=='Client'){
						$_SESSION['id_Personne']=$row['id_Personne'];
						$_SESSION['username']=$row['nickname'];
						header('location:../../index.php');
				}

		}


	}else{
		echo "<script>alert('Connexion impossible .Email/Mot de Passe incorrect !'); window.location='login.html'</script>";
	}
}
	catch(PDOException $e) {
	    echo "Error: " . $e->getMessage();
	}
	$conn = null;
}



?>