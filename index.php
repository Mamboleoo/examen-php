<?php
	include("functions.php");
	session_start();
	try {
		$host = "#";
		$username = "#";
		$password = "#";
		$db = "#";
    	$db = new PDO("mysql:host=$host;dbname=$db", $username,$password);
		$db->exec("SET CHARACTER SET utf8");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
	catch(PDOException $e){echo "Error : ".$e->getMessage();}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Hoebregts Louis - 3TID2</title>
	<link rel="stylesheet" href="style.css" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
</head>
<body>
<?php
	if($_POST["destroy"]){session_destroy();unset($_SESSION["pseudo"]);}
	//Détection si une session a déjà été ouverte
	if(isset($_SESSION["pseudo"])){
		if($_POST["addJoke"]){addJoke();}
		include("homeScreen.html");
	}
	else{
		//Si formulaire d'inscription demandé
		if($_POST["register"]){
			$error = false;
			$errors = (object) array("noPseudo" => false, "emailWrong" => false, "noPassword" => false, "alreadyUser" => false, "alreadyEmail" => false);
			//Détection des erreurs
			if($_POST["pseudo"]=="" || $_POST["pseudo"]==" "){$error=true;$errors->noPseudo=true;}
			if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $_POST["email"])==0){$error=true;$errors->emailWrong=true;}
			if(strlen($_POST["password"])<5){$error=true;$errors->noPassword=true;}
			//Check si l'utilisateur n'existe pas encore
			$checkUser = $db->prepare("SELECT * FROM users WHERE pseudo = ? || email = ?");
			$checkUser->execute(array($_POST["pseudo"], $_POST["email"]));
			$isThere = $checkUser->fetch();
			if($isThere["pseudo"] == $_POST["pseudo"]){$error=true;$errors->alreadyUser=true;}
			else if($isThere["email"] == $_POST["email"]){$error=true;$errors->alreadyEmail=true;}

			//S'il y a une erreur, réafficher le formulaire
			if($error) include("registerForm.html");
			//Sinon afficher la page d'accueil
			else{
				$_SESSION["pseudo"] = $_POST["pseudo"];
				//Crypte le mot de passe
				$pwd = hash("sha512", $_POST["password"]);
				$req = $db->prepare("INSERT INTO users(pseudo, email, password) VALUES(:pseudo, :email, :password)");
				$req->execute(array(
					"pseudo" => $_POST["pseudo"],
					"email" => $_POST["email"],
					"password" => $pwd
					));
				sendEmail();
				include("homeScreen.html");
			}
		}
		else if($_POST["logIn"]){
			$pwd = hash("sha512", $_POST["password"]);
			$checkUser = $db->prepare("SELECT * FROM users WHERE pseudo = ? AND password = ?");
			$checkUser->execute(array($_POST["pseudo"], $pwd));
			$isThere = $checkUser->fetch();
			if($isThere["pseudo"] == $_POST["pseudo"]){
				$_SESSION["pseudo"] = $_POST["pseudo"];
				include("homeScreen.html");
			}
			else{
				$logInError = true;
				include("registerForm.html");
			}
		}
		else {include("registerForm.html");}
	}

?>

</body>
</html>