<?php $this->layout('layout', ['title' => 'Liste des articles']) ?>

<?php $this->start('main_content');?>

<table>
	<tr>
		<th>Titre</th>
		<th>Contenu</th>
		<th>Auteur</th>
		<th>Catégorie</th>
		<th>Date création</th>
		<th>Utilisateur</th>
		<th>Actions</th>
	</tr>


	<?php foreach ($categoriesArticle as $category) :?>
	<tr>
		<td><?php echo $category['title'] ?></td>
		<td><a href="<?php echo $this->url('see_article', array('id'=>$category['id']))?>">Lire l'article</a></td>
		<td><?php echo $category['author'] ;?></td>
		<td><?php echo $category['id_category'] . '-' . $category['name'];;?></td>



		<td><?php echo $category['creation_date']; ?></td>
		<td>
			<?php if($category['id_user'] != null) { ?>
				<?php echo $category['id_user'] ?>
			<?php } else { echo 0; }?>
		</td>


		<td><a href="<?php echo $this->url('delete_article', array('id'=>$category['id'])) ?>">Supprimer</a></td>
	</tr>
	<?php endforeach; ?>
</table>

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