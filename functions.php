<?php
	function sendEmail(){
	 	$headers ='From: "Louis Hoebregts"<louis.hoebregts@etud.infographie-sup.eu>'."\n"; 
     	$headers .='Content-Type: text/html; charset="iso-8859-1"'."\n"; 
     	$headers .='Content-Transfer-Encoding: 8bit'; 

		$userName = $_SESSION['pseudo'];
		$message = "<html lang='en'><body style='font-size: 1.5rem;text-align:center;'>".
			"<h1 style='font-size: 2rem;font-weight: bold;'>Hi $userName !</h1>".
			"<p>I'm glad you made it !</p><p>Enjoy your day ;)</p>".
			"<p style='font-size:1rem'><a href='http://mamboleoo.be/tfe/php/index.php'>http://mamboleoo.be/tfe/php/index.php</a></p>".
			"<p><img src='http://mamboleoo.be/tfe/php/cat.jpg' alt='cat'></p>".
			"<p><b>Mamboleoo</b></p></body></html>";
		
		$to = $_POST["email"];
		mail("$to","Welcome on board !",$message, $headers);

	}

	function addJoke(){
		global $db;
		$req = $db->prepare("INSERT INTO jokes(txt, user) VALUES(:txt, :user)");
		$req->execute(array(
			"txt" => $_POST["joke"],
			"user" => $_SESSION["pseudo"]
			));
	}

?>