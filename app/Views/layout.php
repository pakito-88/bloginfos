<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>

	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
</head>
<body>
	<div class="container">
		<header>
			<h1>Bloginfos <?= $this->e($title) ?></h1>
		</header>
			<li>
				<?php if($w_user): ?>

				<a class="button" 
				   href="<?php echo $this->url('logout'); ?>" 
				   title="Se déconnecter de Bloginfos">
					Déconnexion	
				</a>
				<a class="button" 
				   href="<?php echo $this->url('register'); ?>" 
				   title="Modifier son profil Bloginfos">
					Profil
				</a>
				<a class="button" 
				   href="<?php echo $this->url('articles_list'); ?>" 
				   title="Modifier son profil Bloginfos">
					Article
				</a>

				<?php else : ?>
				<a class="button" 
				   href="<?php echo $this->url('login') ?>" 
				   title="Accéder au formulaire de connexion">
					Connexion
				</a>

				<?php endif; ?>
			</li>
		<section>
			<?php $fmsg->display(); ?>
			<?= $this->section('main_content') ?>
		</section>

		<footer>
		</footer>
		<script
			src="https://code.jquery.com/jquery-2.2.4.js"
			integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
		crossorigin="anonymous"></script>
		<script type="text/javascript" src="<?php echo $this->assetUrl('js/adjust-style.js') ?>"></script>
		<script type="text/javascript" src="<?php echo $this->assetUrl('js/close-flash-messages.js') ?>"></script>
		<?php $sectionJavascripts = $this->section('javascripts');
			if( ! empty($sectionJavascripts)) {
				echo $sectionJavascripts;
			}
		?>
	</div>

</body>
</html>