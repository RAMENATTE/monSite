<?php
		//Test des valeur de POST
		$ERREUR_NOM = 1;      // = 1 << 0   => 00000001 = 1
		$ERREUR_PRENOM = 2;   // = 1 << 1   => 00000010 = 2
		$ERREUR_EMAIL = 4;     // = 1 << 2   => 00000100 = 4
		$ERREUR_TELEPHONE = 8;// = 1 << 3   => 00001000 = 8
		$ERREUR_SUJET = 16;    // = 1 << 4   => 00010000 = 16
		$ERREUR_MESSAGE = 32; // = 1 << 5   => 00100000 = 32
		$ERREUR_ENVOIS = 64;  // = 1 << 6   => 01000000 = 64
		$ERREUR_GLOBALE = 128; // = 1 << 7   => 10000000 = 128
		$MESSAGE_MIN_LENGTH = 50;

	$nom = isset($_SESSION['nom']) ? $_SESSION['nom'] : '';
	$prenom = isset($_SESSION['prenom']) ? $_SESSION['prenom'] : '';
	$telephone = isset($_SESSION['telephone']) ? $_SESSION['telephone'] : '';
	$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
	$sujet = isset($_SESSION['sujet']) ? $_SESSION['sujet'] : '';
	$message = isset($_SESSION['message']) ? $_SESSION['message'] : '';

	
	$erreurGlobale =
	$erreurEnvois =
	$erreurNom =
	$erreurPrenom =
	$erreurEmail =
	$erreurSujet =
	$erreurMessage = false;
	if (isset($_SESSION['erreur'])) {
		$erreur = $_SESSION['erreur'];

		$erreurGlobale = ($erreur & $ERREUR_GLOBALE) == $ERREUR_GLOBALE;
		$erreurNom = ($erreur & $ERREUR_NOM) == $ERREUR_NOM;
		$erreurPrenom = ($erreur & $ERREUR_PRENOM) == $ERREUR_PRENOM;
		$erreurTelephone = ($erreur & $ERREUR_TELEPHONE) == $ERREUR_TELEPHONE;
		$erreurEmail = ($erreur & $ERREUR_EMAIL) == $ERREUR_EMAIL;
		$erreurSujet = ($erreur & $ERREUR_SUJET) == $ERREUR_SUJET;
		$erreurMessage = ($erreur & $ERREUR_MESSAGE) == $ERREUR_MESSAGE;
	}
	$success = isset($_SESSION['success']) && $_SESSION['success'] == 1;
	$traitementMail = isset($_SESSION['traitementMail']);

	session_unset();
?>

<input id="lightbox-switch" type="checkbox" style="display:none">
<div id="lightbox"<?php if($traitementMail) : ?> style="display: block;"<?php endif; ?>>
	<div id="lightbox-container" class="teal grey lighten-1">
		<div id="haut" class="teal orange lighten-4">
			<p>Laissez-moi vos coordonnées et un eventuel message.</p>
			<p>Je répond sous 48h.</p>
		</div>
		
		<div class="row">
			<?php if(!$traitementMail || $erreurGlobale) : ?>
			<form id="form" class="col s12" action="includes/contact.php" method="post">
			<?php if ($erreurGlobale) : ?>
				<div style="text-align: center; background-color: red;">
				<?php if ($erreurNom) : ?>
					<p>Entrez un nom</p>
				<?php endif; ?>
				<?php if ($erreurPrenom) : ?>
					<p>Entrez un prénom</p>
				<?php endif; ?>
				<?php if ($erreurTelephone) : ?>
					<p>Entrez un numéro de téléphone</p>
				<?php endif; ?>
				<?php if ($erreurEmail) : ?>
					<p>Entrez une adresse email</p>
				<?php endif; ?>
				<?php if ($erreurSujet) : ?>
					<p>Selectionnez une prestation</p>
				<?php endif; ?>
				<?php if ($erreurMessage) : ?>
					<p>Entrez un message de cinquante caractère minimum</p>
				<?php endif; ?>
				</div>
			<?php endif; ?>
				<div class="row">
					<div class="input-field col s6">
						<i class="material-icons prefix">account_circle</i>
						<input id="nom" type="text" name="nom" class="validate" value="<?=$nom?>">
						<label for="nom">Nom</label>
					</div>				
				
					<div class="input-field col s6">
						<i class="material-icons prefix">account_circle</i>
						<input id="prenom" type="text" name="prenom" class="validate" value="<?=$prenom?>">
						<label for="prenom">Prénom</label>
					</div>
				</div>
				
				<div class="row">
					<div class="input-field col s6">
						<i class="material-icons prefix">phone</i>
						<input id="telephone" type="tel" name="telephone" class="validate" placeholder="xx.xx.xx.xx.xx" value="<?=$telephone?>">
						<label for="telephone">Telephone</label>
					</div>
			
					<div class="input-field col s6">
						<i class="material-icons prefix">email</i>
						<input id="email" type="email" name="email" class="validate" value="<?=$email?>">
						<label for="email" data-error="Email invalide" data-success="Email valide">Email</label>
					</div>
				</div>
		
				<div class="row">
					<div class="input-field col s12">
						<i class="material-icons prefix">comment</i>
						<?php if(!isset($sujet)){$sujet = '';}; ?>
						<select id="sujet" name="sujet">
							<option value="" disabled <?php if ($sujet == '') echo 'selected'; ?>>Vous souhaiteriez: </option>
							<option value="Site vitrine." <?php if ($sujet == 'Site vitrine.') echo 'selected'; ?>>Site vitrine.</option>
							<option value="Site WordPress." <?php if ($sujet == 'Site WordPress.') echo 'selected'; ?>>Site WordPress.</option>
							<option value="Site personnalise." <?php if ($sujet == 'Site personnalise.') echo 'selected'; ?>>Site personnalisé.</option>
							<option value="Creation de PC." <?php if ($sujet == 'Creation de PC.') echo 'selected'; ?>>Création de PC.</option>
							<option value="Reparation." <?php if ($sujet == 'Reparation.') echo 'selected'; ?>>Réparation.</option>
							<option value="Nettoyage." <?php if ($sujet == 'Nettoyage.') echo 'selected'; ?>>Nettoyage.</option>
						</select>
						<label for="sujet">Choix de la prestation</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<i class="material-icons prefix">mode_edit</i>
						<textarea id="message" name="message" class="materialize-textarea validate" minlength="<?=$MESSAGE_MIN_LENGTH?>" value="<?=$message?>" placeholder="Votre message doit faire 50 caractères minimum"></textarea>
						<label for="message">Votre message</label>
					</div>
				</div>
				<div id="btnForm" class="row contain">
					<div class="col s6">
						<button id="annule" class="btn waves-effect waves-light hide-if-no-js" type="button" name="action">
							Annuler
							<i class="material-icons right">thumb_down</i>
						</button>
						<label for="lightbox-switch" class="show-if-no-js">Annuler</label>
					</div>
					<div class="col s6">
						<button class="btn waves-effect waves-light" type="submit" name="action2">Envoyer
							<i class="material-icons right">thumb_up</i>
						</button>
					</div>
				</div>
			</form>
			<?php endif; // affichage form ?>
			<?php if ($traitementMail && $success) : ?>
			Bravo
			<?php endif; ?>
			
			<div id="anim" class='containe'>
				  <svg height='80' width='210'>
				    <ellipse cx='25' cy='20' fill='none' rx='10' ry='10'></ellipse>
				  </svg>
				  <svg height='80' width='210'>
				    <ellipse cx='25' cy='20' fill='none' rx='10' ry='10'></ellipse>
				  </svg>
				  <svg height='80' width='210'>
				    <ellipse cx='25' cy='20' fill='none' rx='10' ry='10'></ellipse>
				  </svg>
				  <svg height='80' width='210'>
				    <ellipse cx='25' cy='20' fill='none' rx='10' ry='10'></ellipse>
				  </svg>
				  <svg height='80' width='210'>
				    <ellipse cx='25' cy='20' fill='none' rx='10' ry='10'></ellipse>
				  </svg>
				  <svg height='80' width='210'>
				    <ellipse cx='25' cy='20' fill='none' rx='10' ry='10'></ellipse>
				  </svg>
				  <svg height='80' width='210'>
				    <ellipse cx='25' cy='20' fill='none' rx='10' ry='10'></ellipse>
				  </svg>
				  <svg height='80' width='210'>
				    <ellipse cx='25' cy='20' fill='none' rx='10' ry='10'></ellipse>
				  </svg>
				  <svg height='80' width='210'>
				    <ellipse cx='25' cy='20' fill='none' rx='10' ry='10'></ellipse>
				  </svg>
				  <svg height='80' width='210'>
				    <ellipse cx='25' cy='20' fill='none' rx='10' ry='10'></ellipse>
				  </svg>
				</div>
			
		</div>
	</div>
</div>