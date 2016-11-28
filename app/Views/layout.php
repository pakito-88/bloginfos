<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?php echo $this->e($title) ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/reset.css') ?>"type="text/css" />
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>" type="text/css" />
	<!-- "<?= $this->assetUrl('css/style.css') ?>"  vaudra assets /css/style.css-->
</head>
<body>
	<header>
		<h1><?php echo $this->e($title); ?></h1>
	</header>
	<aside>
		<h3>
			<a href="<?php echo $this->url('default_home') ?>" title="Revenir a l'accueil"></a>Les salons
		</h3>
		<nav>
			<ul id="menu-salons">

			<li>
				<a class="button" href="<?php echo $this->url('users_list') ?>" title="Liste des utilisateurs">Liste des utilisateurs</a>
			</li>

			<li>
				<a class="button" href="deconnexion.php">Se deconnecter de t-chat</a>
			</li>
			</ul>
		</nav>
	</aside><main>

		<section>
			<?= $this->section('main_content') ?>
		</section>
	</main>
	<footer>
	</footer>
</body>
</html>