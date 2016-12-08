<?php $this->layout('layout', ['title' => 'Ajout ou modification']) ?>

<?php $this->start('main_content');?>

<form method="post">
	<!-- Pseudo, mail, mot de passe, sexe et avatar -->
	<p>
		<label for="title">Titre :</label>
		<input type="text" name="title" id="title">
	</p>

	<p>
		<label for="content">Contenu :</label>
		<textarea type="text" name="content" id="content"> </textarea>
	</p>

	<p>
		<label for="author">Auteur :</label>
		<input type="text" name="author" id="author">
	</p>

	<p>
		<select name="id_category">
			<?php foreach($categoriesList as $category) : ?>

				<option value="<?php echo $category['id'] ?>"><?php echo $category['id'] . ' - ' . $category['name'] ;?></option>

			<?php endforeach ; ?>
		</select>
	</p>

	<p>
		<input type="submit" name="send" value="Ajouter">
	</p>
</form>

<?php $this->stop('main_content');?>