<?php
include "includes/head.php";
?>

<body class="teal brown lighten-5">

<?php
include "includes/navbar.php";
?>
	
	<!--CODAGE DU HEADER-->

	<header class="teal blue-grey">

		<div id="header" class="contain">
			<div class="row">
				<div id="photo" class="col s2">
					<img src="images/photo.png" alt="" />
				</div>
				<div id="com" class="col s8">
                    <h3>Ramenatte David<span class="enleve"> - Développeur / Intégrateur web</span></h3>
                    <h1>Création de site internet<span class="enleve"> - Montmelas Saint Sorlin</span></h1>
					<h2>Réparation, nettoyage ou fabrication de pc sur mesure.</h2>
					<div class="contact">
						<p>Besoin de mes services, contactez moi!</p>
						<button id="btnFixe" class="btn waves-effect waves-light hide-if-no-js" type="button" name="btnFixe">
								Contact
						</button>
						<label for="lightbox-switch" class="show-if-no-js">
							Contact
						</label>
					</div>
				</div>
			</div>
		</div>

	</header>

	<!-- CODAGE DU BODY -->

	<div id="web" class="row contain">

		<div id="titre1" class="teal blue-grey">
			<h3>Site internet</h3>
		</div>

		<div id="article1" class="col s4">
			<img class="z-depth-5" src="images/photo.png" alt="" />
			<h5>Site vitrine.</h5>
			<p>Un site dont le contenu reste statique dans le temps.</p>
			<p>Je me charge d'y exposer vos produits et/ou services, </p>
			<p>et vous devrez me demander d'intervenir </p>
			<p>si vous désirez mettre à jour vos contenus.</p>
			<div class="atout teal brown lighten-2">
				<p>Idéal si votre offre commerciale évolue peu dans le temps.</p>
			</div>
		</div>
		<div id="article2" class="col s4">
			<img class="z-depth-5" src="images/photo.png" alt="" />
			<h5><span class="ion-social-wordpress"></span> Site WordPress.</h5>
			<p>Avec le système WordPress, vous gérez le contenu de votre site.</p>
			<p>Via une interface dédiée, similaire à Word, </p>
			<p>vous maîtrisez textes, images, </p>
			<p>et médias affichés sur votre site.</p>
			<div class="atout teal brown lighten-2">
				<p>Cette formule inclue 10h de formation à l'usage de WordPress.</p>
			</div>
		</div>
		<div id="article3" class="col s4">
			<div id="image1" class="z-depth-5">
				<canvas id="q"></canvas>
			</div>
			<h5>Site personnalisé.</h5>
			<p>Création de site sur mesure selon la demande,</p>
            <p>avec ou sans base de données, tout en restant</p>
			<p>dans le domaine du raisonnable et du réalisable</p>
			<p>Blog, site e-commerce, reprise de site...</p>
			<div class="atout teal brown lighten-2">
				<p>Si internet est un élément qui pourrait aider au developpement de votre entreprise.</p>
			</div>
		</div>

	</div>

	<div id="prod" class="row contain">

		<div id="titre2" class="teal blue-grey">
			<h3>Informatique</h3>
		</div>

		<div id="article4" class="col s4">
			<img class="z-depth-5" src="images/photo.png" alt="" />
			<h5>Montage PC.</h5>
			<p>Une analyse de vos besoins me premettra</p>
			<p>de définir l'équipement adéquate qui répondra à vos attente.</p>
		</div>

		<div id="article5" class="col s4">
			<img class="z-depth-5" src="images/photo.png" alt="" />
			<h5>Réparation.</h5>
			<p>Changement de pièces défaillantes ou HS, </p>
			<p>récupération de données (sans garantit de résultat), </p>
			<p>installation de kit d'évolution pour prolonger la vie </p>
			<p>de votre ordinateur préféré.</p>
		</div>

		<div id="article6" class="col s4">
			<img class="z-depth-5" src="images/photo.png" alt="" />
			<h5>Nettoyage.</h5>
			<p>Un Nettoyage interne de vos machines.</p>
			<p>La micro poussière qui s'accumule tout au long des années </p>
			<p>et une vrai source de problème car elle engendre une mauvaise </p>
			<p>ventillation qui cause une surchauffe des composantes.</p>
		</div>

	</div>

	<?php
	include "includes/formulaire.php";

	
	include "includes/footer.php";
	?>