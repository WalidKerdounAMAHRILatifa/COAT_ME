<?php
session_start();
 //fonction de validation de mail
    function validate_email($email)
    {
        try{
            //check if email est sous la bonne format
            if(preg_match('/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/', $email)){
                //echo 'Bon Votre Adresse Email est correcte. <br>';
                return TRUE;
            }
            else {
                return FALSE;
            }
        }
        catch(Exception $e)
        {
            echo "ERROR: ".$e;
        }
    }

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

if (isset($_POST["Inscription"])) {
	require_once('../../database.php');

	$username=$_POST["username"];
	$email=$_POST["email"];
	$password1=$_POST["password1"];
	$password2=$_POST["password2"];

	$result = $conn->prepare("SELECT email_Personne FROM personne where email_Personne=?");
	$result->bindValue( 1, $email );
	$result->execute();
	

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "INSERT INTO personne ( email_Personne,psw_Personne, nickname)
		VALUES ('$email', '$password1', '$username')";
	if($result->rowCount() > 0)	{
			echo "<script>alert('création impossible .Ce compte existe déjà !'); window.location='sign-up.html'</script>";

		}else{

			if(validate_email($email) == TRUE && validate_password($password1) == TRUE && validate_password($password2) == TRUE){
				if(strcmp( $password1, $password2 )==0){
				$conn->exec($sql);
				echo "<script>alert('Votre compte a été créé avec succès!'); window.location='login.php'</script>";
			}else{
				echo "<script>alert('les mots de passe ne correspondent pas.Veuillez réessayer.'); window.location='sign-up.html'</script>";
			}
		}else{
			echo "<script>alert('La format de votre mot de passe/email invalide.<br>Le mot de passe doit contient plus de 8 caracteres et fort!!. '); window.location='sign-up.html'</script>";
		}

			
			
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

						setCookie("login",$email,time()+60*60*24);
						setCookie("password",$password,time()+60*60*24);

						header('location:../GestionDesProduits.php');
					}
				elseif	($role=='Client'){
						$_SESSION['id_Personne']=$row['id_Personne'];
						$_SESSION['username']=$row['nickname'];
						header('location:../../index.php');
				}

		}
	}else{
		echo "<script>alert('Connexion impossible .Email/Mot de Passe incorrect !'); window.location='login.php'</script>";
	}
}
	catch(PDOException $e) {
	    echo "Error: " . $e->getMessage();
	}
	$conn = null;
}



?>