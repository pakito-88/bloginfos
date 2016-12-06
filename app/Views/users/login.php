<?php $this->layout('layout', ['title' => 'Connectez-vous !']); ?>

<?php $this->start('main_content'); ?>

<h2>Connectez-vous à BlogInfos</h2>

<form action="<?php $this->url('login') ?>" method="POST" enctype="multipart/form-data">
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
		<label for="mail">
			Email :
		</label>
		<input type="Email" name="mail" id="mail" value="<?php echo isset($datas['mail']) ? $datas['mail'] : '' ?>"/>
	</p>
	<p>
		<label for="password">
			Mot de passe :
		</label>
		<input type="password" name="password" id="password" value="<?php echo isset($datas['password']) ? $datas['password'] : '' ?>"/>
	</p>
	<p>
	<label for="avatar">
			Sexe
		</label>
		<Select name="sexe">
			<option value="man">man</option>
			<option value="woman">woman</option>
		</Select>
	</p>
	<p>
		<label for="avatar">
			Avatar
		</label>
		<input type="file" name="avatar" id="avatar" value="<?php echo isset($datas['avatar']) ? $datas['avatar'] : '' ?>"/>
	</p>

	<p>
		<input type="submit" class="button" value="Me connecter"/>
		<a class="button" href="#" title="Accéder à la page d'inscription">
			Pas encore inscrit ?
		</a>
	</p>

</form>

<?php $this->stop('main_content'); ?>
