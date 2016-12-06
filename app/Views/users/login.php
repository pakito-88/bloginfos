<?php $this->layout('layout', ['title' => "Connection" ]); ?>

<?php $this->start('main_content'); ?>

<h2>Connectez-vous à Bloginfos</h2>

<form action="<?php $this->url('login') ?>" method="POST">
	<p>
		<label for="pseudo">
			Pseudo :
		</label>
		<input type="text" 
			   name="pseudo" 
			   id="pseudo" 
			   value="<?php echo isset($datas['pseudo']) ? $datas['pseudo'] : '' ?>"/>
	</p>
	<p>
		<label for="password">
			Mot de passe :
		</label>
		<input type="password" name="password" id="password"/>
	</p>
	<p>
		<input type="submit" class="button" value="Me connecter"/>
		<a class="button" href="#" title="Accéder à la page d'inscription">
			Pas encore inscrit ?
		</a>
	</p>

</form>

<?php $this->stop('main_content'); ?>
