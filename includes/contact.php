<?php
session_start();

		$_SESSION['traitementMail'] = true;

		$nom = @htmlentities(strip_tags($_POST['nom']));
		$prenom = @htmlentities(strip_tags($_POST['prenom']));
		$telephone = @htmlentities(strip_tags($_POST['telephone']));
		$email = @htmlentities(strip_tags($_POST['email']));
		$sujet = @htmlentities(strip_tags($_POST['sujet']));
		$message = @htmlentities(strip_tags($_POST['message']));

		// test des valeurs de POST
		$ERREUR_NOM = 1;      // = 1 << 0   => 00000001 = 1
		$ERREUR_PRENOM = 2;   // = 1 << 1   => 00000010 = 2
		$ERREUR_EMAIL = 4;     // = 1 << 2   => 00000100 = 4
		$ERREUR_TELEPHONE = 8;// = 1 << 3   => 00001000 = 8
		$ERREUR_SUJET = 16;    // = 1 << 4   => 00010000 = 16
		$ERREUR_MESSAGE = 32; // = 1 << 5   => 00100000 = 32
		$ERREUR_ENVOIS = 64;  // = 1 << 6   => 01000000 = 64
		$ERREUR_GLOBALE = 128; // = 1 << 7   => 10000000 = 128
		$MESSAGE_MIN_LENGTH = 50;

		$tel = "#^(\d\d\.){4}(\d\d)#";
		$adressMail = "#^[\w\.\_]+@+[\w\.\_]+\.+[a-z]{2,5}#i";
		$erreurEmail = !preg_match($adressMail, $email);
		$erreurTelephone = !preg_match($tel, $telephone);
		$erreurNom = strlen($nom) == 0;
		$erreurPrenom = strlen($prenom) == 0;
		$erreurSujet = strlen($sujet) < 10;
		$erreurMessage = strlen($message) < $MESSAGE_MIN_LENGTH;

        $erreur = 0;
		if ($erreurEmail) $erreur |= $ERREUR_GLOBALE | $ERREUR_EMAIL;
		if ($erreurNom) $erreur |= $ERREUR_GLOBALE | $ERREUR_NOM;
		if ($erreurPrenom) $erreur |= $ERREUR_GLOBALE | $ERREUR_PRENOM;
		if ($erreurSujet) $erreur |= $ERREUR_GLOBALE | $ERREUR_SUJET;
		if ($erreurTelephone) $erreur |= $ERREUR_GLOBALE | $ERREUR_TELEPHONE;
		if ($erreurMessage) $erreur |= $ERREUR_GLOBALE | $ERREUR_MESSAGE;
		$_SESSION['erreur'] = $erreur;

		// enregistrement en session des erreurs et des valeurs de POST
		$_SESSION['nom'] = $nom;
		$_SESSION['prenom'] = $prenom;
		$_SESSION['telephone'] = $telephone;
		$_SESSION['email'] = $email;
		$_SESSION['sujet'] = $sujet;
		$_SESSION['message'] = $message;

		if (($erreur & $ERREUR_GLOBALE) != $ERREUR_GLOBALE) {
			require "phpmailer/PHPMailerAutoload.php";
			$mail = new PHPMailer; // nouvel objet de type mail
			$mail->isSMTP(); // connexion directe au serveur SMTP
			$mail->isHTML(true); // on va utiliser le format HTML
			$mail->Host = "smtp.gmail.com"; //le serveur de messagerie
			$mail->Port = 465; //le port obligatoire de google
			$mail->SMTPAuth = true; // on va fournir un login/pass au serveur
			$mail->SMTPSecure = 'ssl'; //certificat SSL
			$mail->Username = 'wf3villefranche@gmail.com'; //utilisateur SMTP
			$mail->Password = 'Azerty1234'; // mot de passe SMTP
			$mail->setFrom($email, $nom, $prenom); //expéditeur
			$mail->addAddress('ramenatted@gmail.com'); //le destinataire
			$mail->Subject = 'message de '.$nom; // le sujet du mail
			$mail->Body = "<html>
							<head>
							</head>
							<body>
								<h2>Message de ".$email."</h2>
								<h3>".$sujet."</h3>
								<p>".$message."</p>
							</body>
							</html>"; // le contenu du mail en HTML
			if(!$mail->send()) // si l'envoi délire...
			{
				http_response_code(500);
				echo 'Erreur envoi: '.$mail->ErrorInfo;
				$_SESSION['erreur'] = $ERREUR_GLOBALE | $ERREUR_ENVOIS;
			} else
				$_SESSION['success'] = 1;
		}
		
		header('Location: ../index.php');


?>