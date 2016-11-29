<?php 
function afficherPost($champ){
	echo ( !empty($_POST[$champ]) ? $_POST[$champ] : '');

}

function afficherChecked( $valeurAttendue ){
	echo ( !empty($_POST['sexe']) && $_POST['sexe'] == $valeurAttendue) ? 'checked': '';

} ?>

<?php  $this->layout('layout',['title'=>'Inscrivez-vous !']) ?>


<?php $this->start ('main_content'); ?>

<h1>inscription user</h1>
<?php $fmsg->display(); ?>

	<form action="<?php $this->url('register') ?>" method="POST" enctype="multipart/form-data" >
		<p>
			<label for="pseudo"> Pseudo</label>
			<input type="text" placeholder= "3 a 50 caracteres" name="pseudo" id="pseudo" value="<?php afficherPost('pseudo') ?>">		</p>
		<p>
			<label for="email"> email</label>
			<input type="email" name="email" id="email" value="<?php afficherPost('email') ?>">
		</p>
		<p>
			<label for="mot_de_passe"> mot_de_passe</label>
			<input type="mot_de_passe" name="mot_de_passe" id="mot_de_passe" value="<?php afficherPost('mot_de_passe') ?>">
		</p>
		<p>
			<label for="Femme"> Femme</label>
			<input type="radio" name="sexe" value="Femme" id="Femme" <?php afficherChecked('Femme'); ?>>

			<label for="Homme"> Homme</label>
			<input type="radio" name="sexe" value="Homme" id="Homme" <?php afficherChecked('Homme'); ?>>

			<label for="Autre"> Autre</label>
			<input type="radio" name="sexe" value="Autre" id="Autre" <?php afficherChecked('Autre'); ?>>		</p>

		<p>
			<label for="avatar"> avatar</label>
			<input type="file" name="avatar" id="avatar">
		</p>
		<p>
			<input type="submit" name="send" value="s'incrire">
		</p>
	</form>


<?php $this->stop ('main_content'); ?>