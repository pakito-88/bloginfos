

<?php $this->layout('layout', ['title' => 'Ajouter ou modifier un commentaire']); ?>

<?php $this->start('main_content'); ?>


<form method="POST">

	<input type="hidden" name="id" id="id" value="<?php echo (!empty($idComment)) ? $idComment : "" ?>">  

	<label for="content"> Commentaire : </label>
	<textarea type="text" name="content" id="content"><?php echo (!empty($datas['content'])) ? $datas['content'] : "" ?></textarea>

	<label for="id_user"> Utilisateur : </label>

	<select name="id_user" id="id_user">
		<?php foreach ($commentBindArticles as $commentBindArticle) :?>
			<option <?php if (isset($datas['id_user']) && $datas['id_user'] === $commentBindArticle['id_user'] ) {
				echo 'selected';	
			} ?> id="id_user" value="<?php echo $commentBindArticle['id_user']; ?>" >  <?php echo $commentBindArticle['pseudo']; ?>  </option>
		<?php endforeach; ?>
	</select>

	<label for="id_article"> Article  : </label>
	<select name="id_article" id="id_article">
		<?php foreach ($commentBindArticles as $commentBindArticle) :?>
			<option <?php if (isset($datas['id_article']) && $datas['id_article'] === $commentBindArticle['id_article'] ) {
				echo 'selected';	
			} ?> id="id_article" value="<?php echo $commentBindArticle['id_article']; ?>" >  <?php echo $commentBindArticle['title']; ?>  </option>
		<?php endforeach; ?>
	</select>

	<label for="creation_date"> Date de création : </label>
	<input type="date" name="creation_date" id="creation_date" value="<?php echo (!empty($datas['creation_date'])) ? $datas['creation_date'] : "" ?>"/>


	<label for="modification_date"> Date de modification </label>
	<input type="date" name="modification_date" id="modification_date" value="<?php echo (!empty($datas['modification_date'])) ? $datas['modification_date'] : "" ?>" />
	
	
	
	<input type="submit" name="send" value="Envoyer"/>
</form>

<?php $this->stop('main_content'); ?>